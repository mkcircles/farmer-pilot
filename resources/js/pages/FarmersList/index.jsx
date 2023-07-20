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


export default function FarmersList({fpo_id, agent_id}) {
    const navigate = useNavigate();
    const token = useSelector(state => state.auth.token);
    const { updateAppContextState } = useContext(AppContext);
    const [currentPage, setCurrentPage] = useState(1);
    const [moveToPage, setMoveToPage] = useState(1);
    const [lastPage, setLastPage] = useState(1);
    const [prevPageUrl, setPrevPageUrl] = useState("");
    const [nextPageUrl, setNextPageUrl] = useState("");
    const [profilesData, setProfilesData] = useState({});

    let farmers_api_url = `${BASE_API_URL}/farmers`;
    if(fpo_id) {
        farmers_api_url = `${BASE_API_URL}/fpo/${fpo_id}/farmers`
    }
    if(agent_id) {
        farmers_api_url = `${BASE_API_URL}/agent/${agent_id}/farmers`
    }

    const fetchProfiles = (url = farmers_api_url) => {
        updateAppContextState('loading', true);
        console.log(url);
        axios
            .get(url, {
                headers: {
                    'API_KEY': API_KEY,
                    'Authorization': `Bearer ${token}`
                }
            },)
            .then((res) => {
                let responseData = res?.data;

                if(fpo_id || agent_id) {
                    responseData = res.data?.data
                }
                console.log("Profiles", responseData);
                if (res?.data) {
                    setCurrentPage(parseInt(responseData?.current_page));
                    //setMoveToPage(parseInt(responseData?.current_page));
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
                updateAppContextState('loading', false);
            });
    };

    const debounceFetchProfiles= debounce(fetchProfiles, 2000);

    useEffect(() => {
        debounceFetchProfiles();
    }, []);

    useEffect(() => {
        if(moveToPage == currentPage) return;
        setMoveToPage(currentPage);
    }, [currentPage]);

    useEffect(() => {
        if(moveToPage == currentPage) return;
        debounceFetchProfiles(`${farmers_api_url}?page=${moveToPage}`);
    }, [moveToPage]);

    return (
        <div className="w-full h-full py-4">
            <Card className="bg-white h-full w-full">
                <Flex justifyContent="start" className="space-x-2">
                    <Title>Farmers</Title>
                    <Badge color="gray">{numberFormatter(parseInt(profilesData?.total || 0))}</Badge>
                </Flex>
                <Text className="mt-2">Overview of farmers profiled</Text>

                <Table className="mt-6">
                    <TableHead>
                        <TableRow>
                            <TableHeaderCell>Farmer ID</TableHeaderCell>
                            <TableHeaderCell>Name</TableHeaderCell>
                            <TableHeaderCell>Phone</TableHeaderCell>
                            <TableHeaderCell>FPO</TableHeaderCell>
                            <TableHeaderCell className="text-right">
                                District
                            </TableHeaderCell>
                            <TableHeaderCell>Link</TableHeaderCell>
                        </TableRow>
                    </TableHead>

                    <TableBody>
                        {profilesData?.data?.map((farmer) => (
                            <TableRow key={farmer.id}>
                                <TableCell># {farmer.id}</TableCell>
                                <TableCell>
                                    {farmer.first_name + " " + farmer.last_name}
                                </TableCell>
                                <TableCell>{farmer.phone_number}</TableCell>
                                <TableCell>{farmer.fpo_name}</TableCell>

                                <TableCell className="text-right">
                                    {farmer.district}
                                </TableCell>
                                <TableCell>
                                    <Button
                                        size="xs"
                                        variant="secondary"
                                        color="orange"
                                        onClick={() => {
                                            navigate(`${FARMER_PROFILE}/${farmer.id}`);
                                        }}
                                    >
                                        See details
                                    </Button>
                                </TableCell>
                            </TableRow>
                        ))}
                    </TableBody>
                </Table>

                <div className="w-full py-1 text-xs opacity-60">
                    showing {currentPage} of {profilesData?.last_page} pages
                    </div>

                <div className="flex justify-start py-2 items-center">
                    <div className="inline-flex items-center justify-center rounded bg-primary py-1 text-white">
                        <a
                            href="#"
                            className="inline-flex h-8 w-8 items-center justify-center rtl:rotate-180"
                            onClick={() => {
                                if (prevPageUrl) fetchProfiles(prevPageUrl);
                            }}
                        >
                            <span className="sr-only">Prev Page</span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                className="h-3 w-3"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fillRule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clipRule="evenodd"
                                />
                            </svg>
                        </a>

                        <span
                            className="h-4 w-px bg-white/25"
                            aria-hidden="true"
                        ></span>

                        <div>
                            <label htmlFor="PaginationPage" className="sr-only">
                                Page
                            </label>

                            <input
                                type="number"
                                className="h-8 w-12 rounded border-none bg-transparent p-0 text-center text-xs font-medium [-moz-appearance:_textfield] focus:outline-none focus:ring-inset focus:ring-white [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none"
                                min="0"
                                step={1}
                                max={lastPage}
                                value={moveToPage}
                                onChange={(e) => {
                                    if(parseInt(e.target.value) > lastPage) return;
                                    setMoveToPage(parseInt(e.target.value));
                                }}
                                id="PaginationPage"
                            />
                        </div>

                        <span className="h-4 w-px bg-white/25"></span>

                        <a
                            href="#"
                            className="inline-flex h-8 w-8 items-center justify-center rtl:rotate-180"
                            onClick={() => {
                                if (nextPageUrl) fetchProfiles(nextPageUrl);
                            }}
                        >
                            <span className="sr-only">Next Page</span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                className="h-3 w-3"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fillRule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clipRule="evenodd"
                                />
                            </svg>
                        </a>
                    </div>
                </div>
            </Card>
        </div>
    );
}
