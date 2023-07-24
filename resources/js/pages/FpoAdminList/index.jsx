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
import {
    AGENT_PROFILE,
    CREATE_AGENT,
    CREATE_FPO,
    CREATE_FPO_ADMIN_USER_ACCOUNT,
    EDIT_AGENT,
    FARMER_PROFILE,
} from "../../router/routes";
import { useEffect, useState } from "react";
import axios from "axios";
import { API_KEY, BASE_API_URL } from "../../env";
import { numberFormatter } from "../../utils/numberFormatter";
import { AppContext } from "../../context/RootContext";
import { useContext } from "react";
import { useSelector } from "react-redux";
import { UserIcon } from "@heroicons/react/solid";
import AddFpoUserAccountModal from "../FpoProfile/AddFpoUserAccountModal";

export default function FpoAdminList({ fpo_id }) {
    const navigate = useNavigate();
    const token = useSelector((state) => state.auth.token);
    const { updateAppContextState } = useContext(AppContext);
    const [currentPage, setCurrentPage] = useState(1);
    const [prevPageUrl, setPrevPageUrl] = useState("");
    const [nextPageUrl, setNextPageUrl] = useState("");
    const [fpoAdmins, setFpoAdmins] = useState([]);
    const [showModal, setShowModal] = useState(false);

    const fetchFpoUsers = () => {
        updateAppContextState("loading", true);
        axios
            .get(`${BASE_API_URL}/fpo/${fpo_id}/users`, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then(({ data: res }) => {
                console.log("FPO Users Data", res.data);
                if (res?.data) {
                    setFpoAdmins(res?.data);
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
        fetchFpoUsers();
    }, [fpo_id, token]);

    return (
        <div className="w-full h-full py-4">
            <Card className="bg-white h-full w-full">
                <Flex justifyContent="start" className="space-x-2">
                    <Title>FPO Admins</Title>
                    <Badge color="gray">
                        {numberFormatter(parseInt(fpoAdmins?.length))}
                    </Badge>
                </Flex>
                <Flex justifyContent="between">
                    <Text className="mt-2">Overview of Admins</Text>
                    <span
                        onClick={() => {
                            setShowModal(true);
                        }}
                        className="inline-flex overflow-hidden rounded-md border bg-secondary shadow-sm"
                    >
                        <button className="inline-block border-e px-4 py-2 text-sm font-medium text-white hover:bg-orange-500 focus:relative">
                            Create New Admin
                        </button>

                        <button
                            className="inline-block px-4 py-2 text-white hover:bg-orange-500 focus:relative"
                            title="Create FPO"
                        >
                            <UserIcon className="h-4 w-4" />
                        </button>
                    </span>
                </Flex>

                <Table className="mt-6">
                    <TableHead>
                        <TableRow>
                            <TableHeaderCell>User ID</TableHeaderCell>
                            <TableHeaderCell>Name</TableHeaderCell>
                            <TableHeaderCell>Phone</TableHeaderCell>
                            <TableHeaderCell>Email</TableHeaderCell>
                            <TableHeaderCell>Action</TableHeaderCell>
                            {/* <TableHeaderCell>Residence</TableHeaderCell>
                            <TableHeaderCell>Referee Name</TableHeaderCell>
                            <TableHeaderCell>Referee Phone</TableHeaderCell>
                            <TableHeaderCell>Address</TableHeaderCell> */}
                        </TableRow>
                    </TableHead>

                    <TableBody>
                        {fpoAdmins?.map((admin) => (
                            <TableRow key={admin.id}>
                                <TableCell>{admin.id}</TableCell>
                                <TableCell>{admin.name}</TableCell>
                                <TableCell>{admin.phone_number}</TableCell>
                                <TableCell>{admin.email}</TableCell>
                                <TableCell>
                                    <span class="inline-flex overflow-hidden rounded-md border bg-white shadow-sm">
                                        <button
                                            onClick={() => {}}
                                            className="inline-block border-e p-3 text-gray-700 hover:bg-gray-50 focus:relative"
                                            title="View"
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
                                                navigate(EDIT_AGENT, {
                                                    state: {
                                                        agent,
                                                    },
                                                });
                                            }}
                                            className="inline-block border-e p-3 text-gray-700 hover:bg-gray-50 focus:relative"
                                            title="Edit Agent"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="h-4 w-4"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                                                />
                                            </svg>
                                        </button>

                                        <button
                                            class="inline-block p-3 text-gray-700 hover:bg-gray-50 focus:relative"
                                            title="Delete"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="h-4 w-4"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                                />
                                            </svg>
                                        </button>
                                    </span>
                                </TableCell>
                            </TableRow>
                        ))}
                    </TableBody>
                </Table>
            </Card>

            <AddFpoUserAccountModal
                showModal={showModal}
                setShowModal={setShowModal}
                fpo={{ fpo_id: fpo_id }}
                fetchFpoUsers={fetchFpoUsers}
            />
        </div>
    );
}
