import { v4 as uuidv4 } from "uuid";
import { useContext, useEffect, useState } from "react";
import Lucide from "../../../base-components/Lucide";
import { AppContext } from "../../../context/RootContext";
import { useSelector } from "react-redux";
import { BASE_API_URL } from "../../../env";
import {
    SearchSelect,
    SearchSelectItem,
    Title,
    DatePicker,
} from "@tremor/react";
import { FormInput, FormLabel } from "../../../base-components/Form";
import Button from "../../../base-components/Button";
import { Tablet } from "react-feather";
import { useNavigate } from "react-router-dom";
import { useAppDispatch } from "../../../stores/hooks";
import { setAppSuccessAlert } from "../../../stores/appSuccessAlert";
import { File, Home, User } from "lucide-react";
import { UserGroupIcon } from "@heroicons/react/solid";

const EditUserModal = ({userInfo, showModal, setShowModal, onSuccessCallback }) => {
    const dispatch = useAppDispatch();
    const navigate = useNavigate();
    const { updateAppContextState } = useContext(AppContext);
    const token = useSelector((state) => state.auth?.token);
    const [user, setUser] = useState({
        name: "",
        email: "",
        phone_number: "",
        role: "",
    });

    const handleEditUser = () => {
        updateAppContextState("loading", true);
        axios
            .post(
                `${BASE_API_URL}/user/${userInfo?.id}/update`,
                {
                    ...user,
                },
                {
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                }
            )
            .then((res) => {
                setShowModal(false);
                onSuccessCallback();
                dispatch(
                    setAppSuccessAlert({
                        id: uuidv4(),
                        message:
                            "User updated successfully",
                    })
                );
                
            })
            .catch((err) => {
                // TODO: Notify Error
                // console.log(err);
            })
            .finally(() => {
                updateAppContextState("loading", false);
            });
    };

    useEffect(() => {
        setUser({...userInfo});
    }, [userInfo])

    return (
        <div
            className={`z-[1000] my-3 fixed bg-primary rounded-md shadow-md transition-all h-full top-20 bottom-0 right-0 w-full lg:w-1/2 duration-700  ${
                showModal ? "translate-x-0  " : "translate-x-full"
            }`}
        >
            <div className="flex w-full space-x-8 p-4 ">
                <span
                    className="text-white"
                    onClick={() => setShowModal(false)}
                >
                    <Lucide icon="XSquare" />
                </span>
                <Title className="text-white">Edit {user?.name}'s Info</Title>
            </div>
            <div className="h-full flex flex-col flex-grow bg-slate-50">
                <form
                    className="py-4 px-8 bg-slate-50"
                    onSubmit={(e) => {
                        e.preventDefault();
                        handleEditUser();
                    }}
                >
                    <div className=" grid grid-cols-1 gap-x-4 items-center">
                        <div className="py-4">
                            <FormLabel htmlFor="name">Name</FormLabel>
                            <FormInput
                                id="name"
                                required
                                type="text"
                                placeholder=""
                                value={user?.name}
                                onChange={(e) =>
                                    setUser({
                                        ...user,
                                        name: e.target.value,
                                    })
                                }
                            />
                        </div>
                        <div className="py-4">
                            <FormLabel htmlFor="email">Email</FormLabel>
                            <FormInput
                                id="email"
                                required
                                type="email"
                                placeholder=""
                                value={user?.email}
                                onChange={(e) =>
                                    setUser({
                                        ...user,
                                        email: e.target.value,
                                    })
                                }
                            />
                        </div>
                        <div className="py-4">
                            <FormLabel htmlFor="phone">Phone number</FormLabel>
                            <FormInput
                                id="phone"
                                required
                                type="tel"
                                placeholder=""
                                value={user?.phone_number}
                                onChange={(e) =>
                                    setUser({
                                        ...user,
                                        phone_number: e.target.value,
                                    })
                                }
                            />
                        </div>

                        <div className="py-4">
                            <FormLabel htmlFor="role">
                                Role
                            </FormLabel>
                            <SearchSelect
                                defaultValue="user"
                                value={user?.role}
                                onValueChange={(value) =>
                                    setUser({
                                        ...user,
                                        role: value,
                                    })
                                }
                            >
                                {["user", "admin"]?.map(
                                    (role, index) => {
                                        return (
                                            <SearchSelectItem
                                                key={index}
                                                value={role}
                                                icon={User}
                                            >
                                                <span className="capitalize">{role}</span>
                                                
                                            </SearchSelectItem>
                                        );
                                    }
                                )}
                            </SearchSelect>
                        </div>
                    </div>

                    <div className="flex py-4">
                        <Button
                            variant="primary"
                            className="w-full"
                            onClick={() => {}}
                        >
                            Save
                        </Button>
                    </div>
                </form>
            </div>
        </div>
    );
};

export default EditUserModal;
