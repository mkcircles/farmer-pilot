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

const farmers = [
    {
        farmerID: "#123456",
        fullname: "Lena Mayer",
        phone: "256776896754",
        fpo: "KYAP",
        district: "Kabale",
        link: "#",
    },
    {
        farmerID: "#234567",
        fullname: "Max Smith",
        phone: "256776896754",
        fpo: "KYAP",
        district: "Kabale",
        link: "#",
    },
    {
        farmerID: "#345678",
        fullname: "Anna Stone",
        phone: "256776896754",
        fpo: "KYAP",
        district: "Kabale",
        link: "#",
    },
    {
        farmerID: "#4567890",
        fullname: "Truls Cumbersome",
        phone: "256776896754",
        fpo: "KYAP",
        district: "Kabale",
        link: "#",
    },
    {
        farmerID: "#5678901",
        fullname: "Peter Pikser",
        phone: "256776896754",
        fpo: "KYAP",
        district: "Kabale",
        link: "#",
    },
    {
        farmerID: "#6789012",
        fullname: "Phlipp Forest",
        phone: "256776896754",
        fpo: "KYAP",
        district: "Kabale",
        link: "#",
    },
    {
        farmerID: "#78901234",
        fullname: "Mara Pacemaker",
        phone: "256776896754",
        fpo: "KYAP",
        district: "Kabale",
        link: "#",
    },
    {
        farmerID: "#89012345",
        fullname: "Sev Major",
        phone: "256776896754",
        fpo: "KYAP",
        district: "Kabale",
        link: "#",
    },
];

export default function FarmersList() {
    const navigate = useNavigate();
    const [currentPage, setCurrentPage] = useState(1);
    const [prevPageUrl, setPrevPageUrl] = useState("");
    const [nextPageUrl, setNextPageUrl] = useState("");
    const [profilesData, setProfilesData] = useState([]);
    const [isFetching, setIsFetching] = useState(false);

    const fetchProfiles = (url = `${BASE_API_URL}/farmer/profiles`) => {
        setIsFetching(true);
        console.log(url);
        axios
            .get(url, {
                headers: {
                    'API_KEY': API_KEY,
                }
            },)
            .then((res) => {
                console.log("Profiles", res.data);
                if (res?.data) {
                    setCurrentPage(res?.data?.current_page);
                    setPrevPageUrl(profilesData?.prev_page_url);
                    setNextPageUrl(profilesData?.next_page_url);
                    setProfilesData(res.data);
                }
            })
            .catch((err) => {
                console.log(err);
            })
            .finally(() => {
                setIsFetching(false);
            });
    };

    useEffect(() => {
        fetchProfiles();
    }, []);

    return (
        <div className="w-full h-full">
            <Card className="bg-white h-full">
                <Flex justifyContent="start" className="space-x-2">
                    <Title>Farmers</Title>
                    <Badge color="gray">1,000</Badge>
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
                                <TableCell>{farmer.id}</TableCell>
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
                                        color="gray"
                                        onClick={() => {
                                            navigate(FARMER_PROFILE);
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
                    <div className="inline-flex items-center justify-center rounded bg-blue-600 py-1 text-white">
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
                                min="1"
                                value={currentPage}
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
