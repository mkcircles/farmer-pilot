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
import { FARMER_PROFILE } from "../../../router/routes";
import { useEffect, useState } from "react";
import axios from "axios";
import { API_KEY, BASE_API_URL } from "../../../env";
import { numberFormatter } from "../../../utils/numberFormatter";
import { AppContext } from "../../../context/RootContext";
import { useContext } from "react";
import { useSelector } from "react-redux";
import { debounce } from "lodash";
import Pagination from "../../../components/Pagination";

export default function BiometricsList(props) {
    const navigate = useNavigate();
    const token = useSelector((state) => state.auth.token);
    const { updateAppContextState } = useContext(AppContext);
    const [currentPage, setCurrentPage] = useState(1);
    const [moveToPage, setMoveToPage] = useState(1);
    const [lastPage, setLastPage] = useState(1);
    const [prevPageUrl, setPrevPageUrl] = useState("");
    const [nextPageUrl, setNextPageUrl] = useState("");
    const [profilesData, setProfilesData] = useState({});

    const bio_api_url =
        props?.biometrics_api_url || `${BASE_API_URL}/farmers/bio`;
    const fetchProfiles = (url = bio_api_url) => {
        updateAppContextState("loading", true);
        axios
            .get(url, {
                headers: {
                    API_KEY: API_KEY,
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((res) => {
                let responseData = res.data?.data;

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
    }, [token]);

    useEffect(() => {
        if (moveToPage == currentPage) return;
        setMoveToPage(currentPage);
    }, [currentPage]);

    useEffect(() => {
        if (moveToPage == currentPage) return;
        debounceFetchProfiles(`${bio_api_url}?page=${moveToPage}`);
    }, [moveToPage]);

    return (
        <div className="w-full h-full py-4">
            {profilesData?.data?.length > 0 ? (
                <Card className="bg-white h-full w-full">
                    <Flex justifyContent="start" className="space-x-2">
                        <Title>Biometrics</Title>
                        <Badge color="gray">
                            {numberFormatter(
                                parseInt(profilesData?.total || 0)
                            )}
                        </Badge>
                    </Flex>
                    <Text className="mt-2">
                        Overview of {props?.title || "Biometrics captured"}
                    </Text>

                    <Table className="mt-6">
                        <TableHead>
                            <TableRow>
                                <TableHeaderCell>Farmer ID</TableHeaderCell>
                                <TableHeaderCell>Name</TableHeaderCell>
                                <TableHeaderCell>
                                    Enrollment Status
                                </TableHeaderCell>
                                <TableHeaderCell>
                                    Possible Duplicate
                                </TableHeaderCell>
                                <TableHeaderCell className="">
                                    Has BioToken
                                </TableHeaderCell>
                                <TableHeaderCell className="">
                                    Reason
                                </TableHeaderCell>
                                <TableHeaderCell className="">
                                    Registered On
                                </TableHeaderCell>
                                <TableHeaderCell className="">
                                    Subject ID
                                </TableHeaderCell>
                                <TableHeaderCell>Link</TableHeaderCell>
                            </TableRow>
                        </TableHead>

                        <TableBody>
                            {profilesData?.data?.map((data) => {
                                let farmer = data.farmer_profile;
                                return (
                                    <TableRow key={farmer.id}>
                                        <TableCell>
                                            {farmer.farmer_id}
                                        </TableCell>
                                        <TableCell>
                                            {farmer.first_name +
                                                " " +
                                                farmer.last_name}
                                        </TableCell>
                                        <TableCell>
                                            {data?.enrollmentStatus}
                                        </TableCell>
                                        <TableCell>
                                            {data?.possible_duplicate
                                                ? "Yes"
                                                : "No"}
                                        </TableCell>

                                        <TableCell className="">
                                            {data?.hasBiometricToken
                                                ? "Yes"
                                                : "No"}
                                        </TableCell>
                                        <TableCell className="">
                                            {data?.reason || "No Reason"}
                                        </TableCell>
                                        <TableCell>
                                            {new Date(
                                                farmer?.created_at
                                            )?.toLocaleDateString("en-US", {
                                                year: "numeric",
                                                month: "short",
                                                day: "numeric",
                                            })}
                                        </TableCell>
                                        <TableCell>{data?.subjectID}</TableCell>

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
                                );
                            })}
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
            ) : (
                <Card className="flex justify-center items-center border border-dashed p-16 border-gray-300">
                    <Text>No data</Text>
                </Card>
            )}
        </div>
    );
}
