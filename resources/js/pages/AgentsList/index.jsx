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
import { AGENT_PROFILE, CREATE_AGENT, CREATE_FPO, EDIT_AGENT, FARMER_PROFILE } from "../../router/routes";
import { useEffect, useState } from "react";
import axios from "axios";
import { API_KEY, BASE_API_URL } from "../../env";
import { numberFormatter } from "../../utils/numberFormatter";
import { AppContext } from "../../context/RootContext";
import { useContext } from "react";
import { useSelector } from "react-redux";
import { UserIcon } from "@heroicons/react/solid";

export default function AgentsList({fpo_id, fpo_name}) {
    const navigate = useNavigate();
    const token = useSelector((state) => state.auth.token);
    const user = useSelector((state) => state.auth?.user);
    const { updateAppContextState } = useContext(AppContext);
    const [currentPage, setCurrentPage] = useState(1);
    const [prevPageUrl, setPrevPageUrl] = useState("");
    const [nextPageUrl, setNextPageUrl] = useState("");
    const [agentData, setAgentData] = useState(null);

    let agents_api_url = `${BASE_API_URL}/agents`;
    if(user?.role !== "admin") {
        agents_api_url = `${BASE_API_URL}/fpo/${user?.entity_id}/agents`;
    }
    if(fpo_id) {
        agents_api_url = `${BASE_API_URL}/fpo/${fpo_id}/agents`
    }
    // console.log("Agents URL:", agents_api_url)
    const fetchAgents = (url = agents_api_url) => {
        updateAppContextState("loading", true);
        axios
            .get(url, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((res) => {
                console.log("Agent Data", res?.data?.data);
                let resData = res?.data?.data;
                if (res?.data) {
                    setCurrentPage(resData?.current_page);
                    setPrevPageUrl(resData?.prev_page_url);
                    setNextPageUrl(resData?.next_page_url);
                    setAgentData(resData);
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
        fetchAgents();
    }, [token, fpo_id]);

    return (
        <div className="w-full h-full py-4">
            <Card className="bg-white h-full w-full">
                <Flex justifyContent="start" className="space-x-2">
                    <Title>Agents</Title>
                    <Badge color="gray">
                        {numberFormatter(parseInt(agentData?.total || 0))}
                    </Badge>
                </Flex>
                <Flex justifyContent="between">
                    <Text className="mt-2">Overview of Agents</Text>
                    <span
                    role="btn-create-agent"
                        onClick={() => {
                            navigate(CREATE_AGENT, {
                                state: {
                                    fpo: {fpo_id: fpo_id, fpo_name: fpo_name}
                                }
                            });
                        }}
                        className="inline-flex overflow-hidden rounded-md border bg-secondary shadow-sm"
                    >
                        <button className="inline-block border-e px-4 py-2 text-sm font-medium text-white hover:bg-orange-500 focus:relative">
                            Create New Agent
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
                            <TableHeaderCell>Agent Code</TableHeaderCell>
                            <TableHeaderCell>Name</TableHeaderCell>
                            <TableHeaderCell>Phone</TableHeaderCell>
                            {/* <TableHeaderCell>Email</TableHeaderCell> */}
                            <TableHeaderCell className="">
                                Registered On
                            </TableHeaderCell>
                            <TableHeaderCell>Status</TableHeaderCell>
                            <TableHeaderCell>Action</TableHeaderCell>
                            {/* <TableHeaderCell>Residence</TableHeaderCell>
                            <TableHeaderCell>Referee Name</TableHeaderCell>
                            <TableHeaderCell>Referee Phone</TableHeaderCell>
                            <TableHeaderCell>Address</TableHeaderCell> */}
                        </TableRow>
                    </TableHead>

                    <TableBody>
                        {agentData?.data?.map((agent) => (
                            <TableRow key={agent.id}>
                                <TableCell>{agent.agent_code}</TableCell>
                                <TableCell>
                                    {agent.first_name + " " + agent.last_name}
                                </TableCell>
                                <TableCell>{agent.phone_number}</TableCell>
                                {/* <TableCell>{agent.email|| '-'}</TableCell> */}
                                <TableCell>
                                    {new Date(agent?.created_at)?.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric', })}
                                </TableCell>
                                <TableCell>
                                    {agent.status === "active" ? (
                                        <Badge className="capitalize font-bold" size="md" color="green">active</Badge>
                                    ): (
                                        <Badge className="capitalize font-bold" size="md" color="red">{agent?.status}</Badge>
                                    )}
                                </TableCell>
                                <TableCell>
                                    <span class="inline-flex overflow-hidden rounded-md border bg-white shadow-sm">
                                        <button
                                        onClick={() => navigate(`${AGENT_PROFILE}/${agent.agent_code}`)}
                                            className="inline-block border-e p-3 text-gray-700 hover:bg-gray-50 focus:relative"
                                            title="View Profile"
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

                <div className="w-full py-1 text-xs opacity-60">
                    showing {currentPage} of {agentData?.last_page} pages
                </div>

                <div className="flex justify-start py-2 items-center">
                    <div className="inline-flex items-center justify-center rounded bg-primary py-1 text-white">
                        <a
                            href="#"
                            className="inline-flex h-8 w-8 items-center justify-center rtl:rotate-180"
                            onClick={() => {
                                if (prevPageUrl) fetchAgents(prevPageUrl);
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
                                if (nextPageUrl) fetchAgents(nextPageUrl);
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
