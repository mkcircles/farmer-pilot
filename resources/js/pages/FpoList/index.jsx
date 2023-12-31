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
    MultiSelect,
    MultiSelectItem,
} from "@tremor/react";
import { useNavigate } from "react-router-dom";
import {
    CREATE_FPO,
    EDIT_FPO,
    FARMER_PROFILE,
    FPO_PROFILE,
} from "../../router/routes";
import { useEffect, useState } from "react";
import axios from "axios";
import { API_KEY, BASE_API_URL } from "../../env";
import { numberFormatter } from "../../utils/numberFormatter";
import { AppContext } from "../../context/RootContext";
import { useContext } from "react";
import { useSelector } from "react-redux";
import { useAppDispatch } from "../../stores/hooks";
import { setFpos } from "../../stores/fpoSlice";
import { debounce, isEqual } from "lodash";
import Pagination from "../../components/Pagination";

export default function fpoList() {
    const dispatch = useAppDispatch();
    const navigate = useNavigate();
    const token = useSelector((state) => state.auth.token);
    const user = useSelector((state) => state.auth.user);
    const { updateAppContextState } = useContext(AppContext);
    const [currentPage, setCurrentPage] = useState(1);
    const [moveToPage, setMoveToPage] = useState(1);
    const [lastPage, setLastPage] = useState(1);
    const [prevPageUrl, setPrevPageUrl] = useState("");
    const [nextPageUrl, setNextPageUrl] = useState("");
    const [profilesData, setProfilesData] = useState(null);
    const [fpoData, setFpoData] = useState(null);

    const [selectedNames, setSelectedNames] = useState([]);

    const isFpoSelected = (data) => {
        if (selectedNames.length === 0) return true;
        let fpo_name = selectedNames?.find((fpo_name) =>
            isEqual(fpo_name, data?.fpo_name)
        );
        if (fpo_name) return true;
    };

    let fpos_url = `${BASE_API_URL}/fpos`;

    if(user?.role !== "admin") {
        fpos_url = `${BASE_API_URL}/fpo/${user?.entity_id}/agents`;
    }

    const fetchFPOs = (url = fpos_url) => {
        updateAppContextState("loading", true);
        axios
            .get(url, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((res) => {
                console.log("FPO Data", res?.data?.data);
                let resData = res?.data?.data;
                if (res?.data) {
                    setCurrentPage(resData?.current_page);
                    setPrevPageUrl(resData?.prev_page_url);
                    setNextPageUrl(resData?.next_page_url);
                    setLastPage(resData?.last_page);
                    setFpoData(resData);
                    // dispatch(setFpos(resData?.data));
                }
            })
            .catch((err) => {
                console.log(err);
            })
            .finally(() => {
                updateAppContextState("loading", false);
            });
    };

    useEffect(() => {
        fetchFPOs();
    }, [token]);

    useEffect(() => {
        if (moveToPage == currentPage) return;
        setMoveToPage(currentPage);
    }, [currentPage]);

    useEffect(() => {
        if (moveToPage == currentPage) return;
        debounce(fetchFPOs, 1000)(`${fpos_url}?page=${moveToPage || 1}`);
    }, [moveToPage]);

    return (
        <div className="w-full h-full py-4">
            <Card className="bg-white h-full w-full">
                <Flex justifyContent="start" className="space-x-2">
                    <Title>FPOs</Title>
                    <Badge color="gray">
                        Showing {fpoData?.data?.length || 0} of{" "}
                        {numberFormatter(parseInt(fpoData?.total || 0))}
                    </Badge>
                </Flex>

                <div className="flex space-x-4 items-center w-full lg:justify-between justify-start py-5">
                    <div className="flex items-center w-52 lg:w-80">
                        <MultiSelect
                            onValueChange={setSelectedNames}
                            placeholder="Search FPOs..."
                            className="max-w-md"
                        >
                            {fpoData?.data.map((fpo) => (
                                <MultiSelectItem
                                    key={fpo.id}
                                    value={fpo.fpo_name}
                                >
                                    {fpo?.fpo_name}
                                </MultiSelectItem>
                            ))}
                        </MultiSelect>
                    </div>

                    <div className="flex items-center">
                        <span
                            role="btn-create-fpo"
                            onClick={() => {
                                navigate(CREATE_FPO);
                            }}
                            className="inline-flex overflow-hidden rounded-md border bg-secondary shadow-sm"
                        >
                            <button className="inline-block border-e px-4 py-2 text-sm font-medium text-white hover:bg-orange-500 focus:relative">
                                Create FPO
                            </button>

                            <button
                                className="inline-block px-4 py-2 text-white hover:bg-orange-500 focus:relative"
                                title="Create FPO"
                            >
                                <svg
                                    fill="none"
                                    stroke="currentColor"
                                    strokeWidth="1.5"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                    aria-hidden="true"
                                    className="h-4 w-4"
                                >
                                    <path
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        d="M12 4.5v15m7.5-7.5h-15"
                                    ></path>
                                </svg>
                            </button>
                        </span>
                    </div>
                </div>

                <Table className="">
                    <TableHead>
                        <TableRow>
                            <TableHeaderCell>FPO ID</TableHeaderCell>
                            <TableHeaderCell>Name</TableHeaderCell>
                            <TableHeaderCell>Phone</TableHeaderCell>
                            <TableHeaderCell>District</TableHeaderCell>
                            <TableHeaderCell>Address</TableHeaderCell>
                            <TableHeaderCell>Member Count</TableHeaderCell>
                            <TableHeaderCell>Action</TableHeaderCell>
                            {/* <TableHeaderCell>Link</TableHeaderCell> */}
                        </TableRow>
                    </TableHead>

                    <TableBody>
                        {fpoData?.data
                            ?.filter((fpo) => isFpoSelected(fpo))
                            .map((fpo) => (
                                <TableRow key={fpo.id} className="m-0">
                                    <TableCell># {fpo.id}</TableCell>
                                    <TableCell>{fpo.fpo_name}</TableCell>
                                    <TableCell>
                                        {fpo.contact_phone_number}
                                    </TableCell>
                                    <TableCell>{fpo.district}</TableCell>
                                    <TableCell>{fpo.address}</TableCell>

                                    <TableCell>
                                        {numberFormatter(
                                            parseInt(fpo.fpo_membership_number)
                                        )}
                                    </TableCell>
                                    <TableCell>
                                        <span className="group relative flex items-center justify-end transition-all duration-700">
                                            <span className="hidden absolute z-10  group-hover:inline-flex overflow-hidden rounded-md border bg-white shadow-sm">
                                                <button
                                                    onClick={() =>
                                                        navigate(
                                                            `${FPO_PROFILE}/${fpo.id}`
                                                        )
                                                    }
                                                    className="inline-block border-e px-3 py-3 text-gray-700 hover:bg-gray-50 focus:relative"
                                                    title="View FPO Profile"
                                                >
                                                    <svg
                                                        className="h-4 w-4"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        strokeWidth={1.5}
                                                        viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            strokeLinecap="round"
                                                            strokeLinejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                                                        />
                                                        <path
                                                            strokeLinecap="round"
                                                            strokeLinejoin="round"
                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                                        />
                                                    </svg>
                                                </button>
                                                <button
                                                    onClick={() => {
                                                        navigate(EDIT_FPO, {
                                                            state: {
                                                                fpo,
                                                            },
                                                        });
                                                    }}
                                                    className="inline-block border-e px-3 py-3 text-gray-700 hover:bg-gray-50 focus:relative"
                                                    title="Edit FPO"
                                                >
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        strokeWidth="1.5"
                                                        stroke="currentColor"
                                                        className="h-4 w-4"
                                                    >
                                                        <path
                                                            strokeLinecap="round"
                                                            strokeLinejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                                                        />
                                                    </svg>
                                                </button>

                                                <button
                                                    className="inline-block px-3 py-3 text-gray-700 hover:bg-gray-50 focus:relative"
                                                    title="Delete"
                                                >
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        strokeWidth="1.5"
                                                        stroke="currentColor"
                                                        className="h-4 w-4"
                                                    >
                                                        <path
                                                            strokeLinecap="round"
                                                            strokeLinejoin="round"
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                                        />
                                                    </svg>
                                                </button>
                                            </span>

                                            <svg
                                                className="h-4 w-4"
                                                fill="none"
                                                stroke="currentColor"
                                                strokeWidth={1.5}
                                                viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg"
                                                aria-hidden="true"
                                            >
                                                <path
                                                    strokeLinecap="round"
                                                    strokeLinejoin="round"
                                                    d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z"
                                                />
                                            </svg>
                                        </span>
                                    </TableCell>
                                </TableRow>
                            ))}
                    </TableBody>
                </Table>

                <Pagination
                    currentPage={currentPage}
                    moveToPage={moveToPage}
                    fetchPage={fetchFPOs}
                    setMoveToPage={setMoveToPage}
                    nextPageUrl={nextPageUrl}
                    prevPageUrl={prevPageUrl}
                    lastPage={lastPage}
                    totalPages={fpoData?.last_page}
                />
            </Card>
        </div>
    );
}
