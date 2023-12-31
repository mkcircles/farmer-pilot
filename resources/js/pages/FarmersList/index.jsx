import {
    Card,
    Title,
    Text,
    Flex,
    Table,
    TableRow,
    TableCell,
    TableHead,
    TableHeaderCell,
    TableBody,
    Badge,
    Button,
} from "@tremor/react";
import { useNavigate } from "react-router-dom";
import { FARMER_PROFILE } from "../../router/routes";
import { useEffect, useState } from "react";
import axios from "axios";
import { API_KEY, BASE_API_URL } from "../../env";
import { numberFormatter } from "../../utils/numberFormatter";
import { AppContext } from "../../context/RootContext";
import { useContext } from "react";
import { useSelector } from "react-redux";
import { debounce } from "lodash";
import Pagination from "../../components/Pagination";

export default function FarmersList({ fpo_id, agent_id, ...props }) {
    const navigate = useNavigate();
    const token = useSelector((state) => state.auth.token);
    const user = useSelector((state) => state.auth.user);
    const { updateAppContextState } = useContext(AppContext);
    const [currentPage, setCurrentPage] = useState(1);
    const [moveToPage, setMoveToPage] = useState(1);
    const [lastPage, setLastPage] = useState(1);
    const [prevPageUrl, setPrevPageUrl] = useState("");
    const [nextPageUrl, setNextPageUrl] = useState("");
    const [profilesData, setProfilesData] = useState({});

    let farmers_api_url = `${BASE_API_URL}/farmers`;

    if(user?.role !== "admin") {
        farmers_api_url = `${BASE_API_URL}/fpo/${user?.entity_id}/farmers`;
    }

    if (fpo_id) {
        farmers_api_url = `${BASE_API_URL}/fpo/${fpo_id}/farmers`;
    }
    if (agent_id) {
        farmers_api_url = `${BASE_API_URL}/agent/${agent_id}/farmers`;
    }

    const fetchProfiles = (url = (farmers_api_url)) => {
        updateAppContextState("loading", true);
        // console.log(url);
        axios
            .get(url, {
                headers: {
                    API_KEY: API_KEY,
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((res) => {
                let responseData = res?.data?.data;

                if (fpo_id || agent_id) {
                    // responseData = res?.data?.data;
                }

                console.log("Profiles", responseData);
                if (res?.data) {
                    setCurrentPage(parseInt(responseData?.current_page));
                    setPrevPageUrl(responseData?.prev_page_url);
                    setNextPageUrl(responseData?.next_page_url);
                    setLastPage(responseData?.last_page);
                    setProfilesData(responseData);
                }
            })
            .catch((err) => {
                console.log(err);
            })
            .finally(() => {
                updateAppContextState("loading", false);
            });
    };

    const debounceFetchProfiles = debounce(fetchProfiles, 1000);

    useEffect(() => {
        fetchProfiles();
    }, [token, fpo_id]);

    useEffect(() => {
        if (moveToPage == currentPage) return;
        setMoveToPage(currentPage);
    }, [currentPage]);

    useEffect(() => {
        if (moveToPage == currentPage) return;
        debounceFetchProfiles(`${farmers_api_url}?page=${moveToPage}`);
    }, [moveToPage]);

    return (
        <div className="w-full h-full py-4" {...props}>
            <Card className="bg-white h-full w-full">
                <Flex justifyContent="start" className="space-x-2">
                    <Title>Farmers</Title>
                    <Badge color="gray">
                        {numberFormatter(parseInt(profilesData?.total || 0))}
                    </Badge>
                </Flex>
                <Text className="mt-2">Overview of farmers profiled</Text>

                <Table className="mt-6">
                    <TableHead>
                        <TableRow>
                            <TableHeaderCell>Farmer ID</TableHeaderCell>
                            <TableHeaderCell>Name</TableHeaderCell>
                            <TableHeaderCell>Phone</TableHeaderCell>
                            <TableHeaderCell>FPO</TableHeaderCell>
                            <TableHeaderCell className="">
                                District
                            </TableHeaderCell>
                            <TableHeaderCell className="">
                                Registered On
                            </TableHeaderCell>
                            <TableHeaderCell className="">
                                Status
                            </TableHeaderCell>
                            <TableHeaderCell>Link</TableHeaderCell>
                        </TableRow>
                    </TableHead>

                    <TableBody>
                        {profilesData?.data?.map((farmer) => (
                            <TableRow key={farmer.id}>
                                <TableCell>{farmer.farmer_id}</TableCell>
                                <TableCell>
                                    {farmer.first_name + " " + farmer.last_name}
                                </TableCell>
                                <TableCell>{farmer.phone_number || "N/A"}</TableCell>
                                <TableCell>{farmer.fpo_name || farmer?.fpo?.fpo_name || farmer?.agent?.fpo?.fpo_name}</TableCell>

                                <TableCell className="">
                                    {farmer.district}
                                </TableCell>
                                <TableCell>
                                    {new Date(farmer?.created_at)?.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })}
                                </TableCell>
                                <TableCell>
                                    {farmer.status === "complete" ? (
                                        <Badge className="capitalize" size="md" color="green">{farmer?.status}</Badge>
                                    ): (
                                        farmer?.status === "pending" ? (
                                            <Badge className="capitalize" size="md" color="gray">{farmer?.status}</Badge> 
                                        ): (
                                            <Badge className="capitalize" size="md" color="red">{farmer?.status}</Badge>
                                        )
                                    )}
                                </TableCell>
                                
                                <TableCell>
                                    <Button
                                        size="xs"
                                        variant="secondary"
                                        color="orange"
                                        onClick={() => {
                                            navigate(
                                                `${FARMER_PROFILE}/${farmer?.farmer_id}`
                                            );
                                        }}
                                    >
                                        See details
                                    </Button>
                                </TableCell>
                            </TableRow>
                        ))}
                    </TableBody>
                </Table>

                <Pagination
                    currentPage={currentPage}
                    moveToPage={moveToPage}
                    fetchPage={fetchProfiles}
                    setMoveToPage={setMoveToPage}
                    nextPageUrl={nextPageUrl}
                    prevPageUrl={prevPageUrl}
                    lastPage={lastPage}
                    totalPages={profilesData?.last_page}
                />

            </Card>
        </div>
    );
}
