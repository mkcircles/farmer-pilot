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
import { FARMER_PROFILE } from "../../../router/routes";
import { useEffect, useRef, useState } from "react";
import axios from "axios";
import { API_KEY, BASE_API_URL } from "../../../env";
import { numberFormatter } from "../../../utils/numberFormatter";
import { AppContext } from "../../../context/RootContext";
import { useContext } from "react";
import { useSelector } from "react-redux";
import { debounce, isEqual } from "lodash";
import Pagination from "../../../components/Pagination";
import {
    Check,
    Edit,
    Edit2,
    KeyRound,
    MoreVertical,
    PenSquare,
    UserCheck,
    UserCircle,
    UserSquare,
    UserX,
    X,
} from "lucide-react";
import { useAppDispatch } from "../../../stores/hooks";
import { setAppSuccessAlert } from "../../../stores/appSuccessAlert";
import { setAppError } from "../../../stores/appErrorSlice";
import { v4 as uuidv4 } from "uuid";
import CreateUserModal from "../CreateUserModal";
import EditUserModal from "../EditUserModal";
import WithConfirmAlert from "../../../helpers/WithConfirmAlert";
import UpdateUserPasswordModal from "../UpdateUserPasswordModal";

const TableActionsModal = ({
    user,
    setSelectedUser,
    changeUserStatus,
    setShowEditUserModal,
    resetUserPassword,
    setShowUpdateUserPasswordModal,
    actionsRef,
}) => {
    if (!user) return null;
    return (
        <div ref={actionsRef} className="left-0 right-0 flex justify-center items-center  h-28 fixed bottom-32 lg:bottom-8  bg-transparent z-50">
            <div className="box mx-auto  h-full flex shadow-lg">
                <div className="h-full w-52 px-2 space-y-2 bg-primary rounded-l text-white text-2xl font-bold flex flex-col justify-center items-center">
                    <UserSquare className="w-8 h-8" />
                    <span className="text-xs w-fit text-center overflow-ellipsis">
                        {user?.name}
                    </span>
                </div>
                <div className="flex w-full items-center justify-center space-x-10">
                    <div
                        onClick={() => {
                            setShowEditUserModal(true);
                            //setSelectedUser(null);
                        }}
                        className="flex flex-col px-2 items-center justify-center text-center font-thin cursor-pointer"
                    >
                        <span className="font-thin text-center p-2">
                            <PenSquare
                                strokeWidth={1}
                                className="w-8 h-8 text-secondary"
                            />
                        </span>
                        <span className="text-primary">Edit Info</span>
                    </div>
                    {user?.status !== "active" && (
                        <div
                            onClick={() => {
                                changeUserStatus("active", user);
                                setSelectedUser(null);
                            }}
                            className="flex flex-col px-2 items-center justify-center text-center font-thin cursor-pointer"
                        >
                            <span className="font-thin text-center p-2">
                                <UserCheck
                                    strokeWidth={1}
                                    className="w-8 h-8 text-secondary"
                                />
                            </span>
                            <span className="text-primary">Activate</span>
                        </div>
                    )}
                    {user?.status !== "inactive" && (
                        <div
                            onClick={() => {
                                changeUserStatus("inactive", user);
                                setSelectedUser(null);
                            }}
                            className=" flex flex-col px-2 items-center justify-center text-center font-thin cursor-pointer"
                        >
                            <span className="font-thin text-center p-2">
                                <UserX
                                    strokeWidth={1}
                                    className="w-8 h-8 text-secondary"
                                />
                            </span>
                            <span className="text-primary">De-activate</span>
                        </div>
                    )}

                    <div onClick={() => {
                        WithConfirmAlert(() => {
                            resetUserPassword(user);
                            setSelectedUser(null);
                        })
                    }} className=" flex flex-col px-2 items-center justify-center text-center font-thin cursor-pointer">
                        <span className="font-thin text-center p-2">
                            <KeyRound
                                strokeWidth={1}
                                className="w-8 h-8 text-secondary"
                            />
                        </span>
                        <span className="text-primary">Reset Password</span>
                    </div>
                    <div onClick={() => setShowUpdateUserPasswordModal(true)} className=" flex flex-col px-2 items-center justify-center text-center font-thin cursor-pointer">
                        <span className="font-thin text-center p-2">
                            <UserCircle
                                strokeWidth={1}
                                className="w-8 h-8 text-secondary"
                            />
                        </span>
                        <span className="text-primary">Update Password</span>
                    </div>
                </div>
                <div className=" w-32 h-full flex justify-center items-center border-l">
                    <X
                        onClick={() => {
                            setSelectedUser(null);
                        }}
                        strokeWidth={1}
                        className="w-8 h-8 cursor-pointer"
                    />
                </div>
            </div>
        </div>
    );
};

export default function UsersList() {
    const navigate = useNavigate();
    const dispatch = useAppDispatch();
    const token = useSelector((state) => state.auth.token);
    const { updateAppContextState } = useContext(AppContext);
    const [currentPage, setCurrentPage] = useState(1);
    const [moveToPage, setMoveToPage] = useState(1);
    const [lastPage, setLastPage] = useState(1);
    const [prevPageUrl, setPrevPageUrl] = useState("");
    const [nextPageUrl, setNextPageUrl] = useState("");
    const [users, setUsers] = useState({});
    const [selectedUser, setSelectedUser] = useState(null);
    const [showCreateNewUserModal, setShowCreateNewUserModal] = useState(false);
    const [showEditUserModal, setShowEditUserModal] = useState(false);
    const [showUpdateUserPasswordModal, setShowUpdateUserPasswordModal] = useState(false);
    const actionsRef = useRef(null);

    const fetchUsers = (url = `${BASE_API_URL}/users`) => {
        updateAppContextState("loading", true);
        console.log(url);
        axios
            .get(url, {
                headers: {
                    API_KEY: API_KEY,
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((res) => {
                let responseData = res?.data?.data;

                console.log("Users Data", responseData);
                if (res?.data) {
                    setCurrentPage(parseInt(responseData?.current_page));
                    setPrevPageUrl(responseData?.prev_page_url);
                    setNextPageUrl(responseData?.next_page_url);
                    setLastPage(responseData?.last_page);
                    setUsers(responseData);
                }
            })
            .catch((err) => {
                console.log(err);
            })
            .finally(() => {
                updateAppContextState("loading", false);
            });
    };

    const changeUserStatus = (status, user) => {
        updateAppContextState("loading", true);
        axios
            .put(
                `${BASE_API_URL}/user/status/update`,
                {
                    id: user?.id?.toString(),
                    status: status,
                },
                {
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                }
            )
            .then((res) => {
                fetchUsers();
                dispatch(
                    setAppSuccessAlert({
                        id: uuidv4(),
                        message: "User status has been updated successfully!",
                    })
                );
                setSelectedUser(null);
            })
            .catch((err) => {
                console.log(err);
                dispatch(
                    setAppError({
                        id: uuidv4(),
                        message:
                            "Something went wrong! User status could not be updated!",
                    })
                );
            })
            .finally(() => {
                updateAppContextState("loading", false);
            });
    };

    const resetUserPassword = (user) => {
        updateAppContextState("loading", true);
        return new Promise((resolve, reject) => {
            axios
                .get(`${BASE_API_URL}/user/${user?.id}/password/reset`, {
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                })
                .then((res) => {
                    fetchUsers();
                    dispatch(
                        setAppSuccessAlert({
                            id: uuidv4(),
                            message:
                                user?.name +
                                "'s password has been reset successfully!",
                        })
                    );
                    resolve({
                        message:
                            user?.name +
                            "'s password has been reset successfully!",
                        title: "success",
                    });
                })
                .catch((err) => {
                    console.log(err);
                    dispatch(
                        setAppError({
                            id: uuidv4(),
                            message:
                                "Something went wrong! User password could not be reset!",
                        })
                    );
                    reject({
                        message:
                            "Something went wrong! User password could not be reset!",
                        title: "error",
                    });
                })
                .finally(() => {
                    updateAppContextState("loading", false);
                });
        });
    };

    const debounceFetchUsers = debounce(fetchUsers, 1000);

    useEffect(() => {
        fetchUsers();
    }, [token]);

    useEffect(() => {
        if (moveToPage == currentPage) return;
        setMoveToPage(currentPage);
    }, [currentPage]);

    useEffect(() => {
        if (moveToPage == currentPage) return;
        debounceFetchUsers(`${BASE_API_URL}/users?page=${moveToPage}`);
    }, [moveToPage]);

    useEffect(() => {
        if(selectedUser) {
            actionsRef?.current?.scrollIntoView({ behavior: 'smooth' });
        }
    }, [selectedUser]);

    const [selectedNames, setSelectedNames] = useState([]);
    const isUserSelected = (data) => {
        if (selectedNames.length === 0) return true;
        let user_name = selectedNames?.find((user_name) =>
            isEqual(user_name, data?.name)
        );
        if (user_name) return true;
    };

    return (
        <div className="w-full h-full relative py-4">
            <Card className="bg-white h-full w-full">
                <Flex justifyContent="start" className="space-x-2">
                    <Title>Users</Title>
                    <Badge color="gray">
                        Showing {users?.data?.length || 0} of{" "}
                        {numberFormatter(parseInt(users?.total || 0))}
                    </Badge>
                </Flex>
                <Text className="mt-2">Overview of Users</Text>

                <div className="flex space-x-4 items-center w-full lg:justify-between justify-start pt-4">
                    <div className="flex items-center w-52 lg:w-80">
                        <MultiSelect
                            onValueChange={setSelectedNames}
                            placeholder="Search users..."
                            className="max-w-md"
                        >
                            {users?.data?.map((user) => (
                                <MultiSelectItem
                                    key={user.id}
                                    value={user?.name}
                                >
                                    {user?.name}
                                </MultiSelectItem>
                            ))}
                        </MultiSelect>
                    </div>

                    <div className="flex items-center">
                        <span
                            role="btn-create-user"
                            onClick={() => {
                                setShowCreateNewUserModal(true);
                            }}
                            className="inline-flex overflow-hidden rounded-md border bg-secondary shadow-sm"
                        >
                            <button className="inline-block border-e px-4 py-2 text-sm font-medium text-white hover:bg-orange-500 focus:relative">
                                New User
                            </button>

                            <button
                                className="inline-block px-4 py-2 text-white hover:bg-orange-500 focus:relative"
                                title="Create User"
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

                <Table className="mt-6">
                    <TableHead>
                        <TableRow>
                            <TableHeaderCell>#</TableHeaderCell>
                            <TableHeaderCell>Name</TableHeaderCell>
                            <TableHeaderCell>Phone</TableHeaderCell>
                            <TableHeaderCell>Role</TableHeaderCell>
                            <TableHeaderCell className="">
                                Status
                            </TableHeaderCell>
                            <TableHeaderCell className="">
                                Action
                            </TableHeaderCell>
                        </TableRow>
                    </TableHead>

                    <TableBody className="bg-slate-50">
                        {users?.data
                            ?.filter((user) => isUserSelected(user))
                            .map((user) => (
                                <TableRow key={user.id}>
                                    <TableCell>
                                        <div
                                            onClick={() => {
                                                // if(!selectedUser) setSelectedUser(user);
                                                if (
                                                    selectedUser?.id !== user.id
                                                )
                                                    return setSelectedUser(
                                                        user
                                                    );
                                                setSelectedUser(null);
                                            }}
                                            className="flex justify-center items-center w-5 h-5 border border-primary rounded"
                                        >
                                            {selectedUser?.id === user.id && (
                                                <div className="w-4 h-4 bg-primary border border-primary rounded flex justify-center items-center">
                                                    <Check className="w-4 h-4 text-white" />
                                                </div>
                                            )}
                                        </div>
                                    </TableCell>
                                    <TableCell>{user.name}</TableCell>
                                    <TableCell>{user.phone_number}</TableCell>
                                    <TableCell className="capitalize">
                                        {user.role}
                                    </TableCell>
                                    <TableCell>
                                        {user.status === "active" ? (
                                            <Badge
                                                className="capitalize"
                                                size="md"
                                                color="green"
                                            >
                                                {user?.status}
                                            </Badge>
                                        ) : (
                                            <Badge
                                                className="capitalize"
                                                size="md"
                                                color="red"
                                            >
                                                {user?.status}
                                            </Badge>
                                        )}
                                    </TableCell>
                                    <TableCell className="text-right">
                                        <MoreVertical
                                            onClick={() =>
                                                setSelectedUser(user)
                                            }
                                            className=" w-4 h-4 cursor-pointer"
                                        />
                                    </TableCell>
                                </TableRow>
                            ))}
                    </TableBody>
                </Table>

                <Pagination
                    currentPage={currentPage}
                    moveToPage={moveToPage}
                    fetchPage={fetchUsers}
                    setMoveToPage={setMoveToPage}
                    nextPageUrl={nextPageUrl}
                    prevPageUrl={prevPageUrl}
                    lastPage={lastPage}
                    totalPages={users?.last_page}
                />
            </Card>
            <TableActionsModal
                user={selectedUser}
                setSelectedUser={setSelectedUser}
                changeUserStatus={changeUserStatus}
                setShowEditUserModal={setShowEditUserModal}
                resetUserPassword={resetUserPassword}
                setShowUpdateUserPasswordModal={setShowUpdateUserPasswordModal}
                actionsRef={actionsRef}
            />
            <CreateUserModal
                onSuccessCallback={fetchUsers}
                showModal={showCreateNewUserModal}
                setShowModal={setShowCreateNewUserModal}
            />
            <EditUserModal
                userInfo={selectedUser}
                onSuccessCallback={() => {
                    setSelectedUser(null);
                    fetchUsers();
                }}
                showModal={showEditUserModal}
                setShowModal={setShowEditUserModal}
            />
            <UpdateUserPasswordModal
                user={selectedUser}
                onSuccessCallback={() => {
                    setSelectedUser(null);
                    // fetchUsers();
                }}
                showModal={showUpdateUserPasswordModal}
                setShowModal={setShowUpdateUserPasswordModal}
            />
        </div>
    );
}
