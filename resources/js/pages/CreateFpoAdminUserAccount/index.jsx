import React, { useContext, useEffect } from "react";
import { Title, SearchSelect, SearchSelectItem } from "@tremor/react";
import { twMerge } from "tailwind-merge";
import { HomeIcon } from "@heroicons/react/outline";
import Button from "../../base-components/Button";
import {
    FormLabel,
    FormInput,
    FormHelp,
    FormSelect,
} from "../../base-components/Form";
import { useNavigate } from "react-router-dom";
import { AppContext } from "../../context/RootContext";
import axios from "axios";
import { BASE_API_URL } from "../../env";
import { useSelector } from "react-redux";
import { AGENTS_LIST, FPO_LIST } from "../../router/routes";

const CreateFpoAdminUserAccount = () => {
    const navigate = useNavigate();
    const { updateAppContextState } = useContext(AppContext);
    const token = useSelector((state) => state.auth?.token);
    const user = useSelector((state) => state.auth?.user);
    const [fpoAdmin, setFpoAdmin] = React.useState({
        name: "",
        email: "",
        phone_number: "",
        fpo_id: "",
        //created_by: user.id,
    });
    const [fpos, setFpos] = React.useState([]);

    const handleCreateFpoUserAccount = () => {
        updateAppContextState("loading", true);
        axios
            .post(`${BASE_API_URL}/fpo/${fpoAdmin?.fpo_id}/user/add`, fpoAdmin, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((res) => {
                // TODO: Notify success
                navigate(-1);
            })
            .catch((err) => {
                // TODO: Notify Error
                console.log(err);
            })
            .finally(() => {
                updateAppContextState("loading", false);
            });
    };

    useEffect(() => {
        updateAppContextState("loading", true);
        axios
            .get(`${BASE_API_URL}/fpos/summary`, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((res) => {
                //console.log("FPOS SUMMARY ", res?.data?.data)
                setFpos(res?.data?.data);
            })
            .catch((err) => {
                console.log(err);
            })
            .finally(() => {
                updateAppContextState("loading", false);
            });
    }, []);

    return (
        <form
            className="py-8 px-8"
            onSubmit={(e) => {
                e.preventDefault();
                handleCreateFpoUserAccount();
            }}
        >
            <Title>New FPO Admin User Account </Title>

            <div className="flex space-x-4 items-center py-4">
                <div className="flex-1">
                    <FormLabel htmlFor="name">Name</FormLabel>
                    <FormInput
                        id="name"
                        required
                        type="text"
                        placeholder="Name"
                        value={fpoAdmin.name}
                        onChange={(e) =>
                            setFpoAdmin({
                                ...fpoAdmin,
                                name: e.target.value,
                            })
                        }
                    />
                </div>
                <div className="flex-1">
                    <FormLabel htmlFor="fpo_id">FPO</FormLabel>
                    <SearchSelect
                        value={fpoAdmin?.fpo_id}
                        onValueChange={(value) =>
                            setFpoAdmin({ ...fpoAdmin, fpo_id: value })
                        }
                    >
                        {fpos?.map((fpo) => {
                            return (
                                <SearchSelectItem
                                    key={fpo?.id}
                                    value={fpo?.id}
                                    icon={HomeIcon}
                                >
                                    {fpo.fpo_name}
                                </SearchSelectItem>
                            );
                        })}
                    </SearchSelect>
                </div>
            </div>

            <div className="flex space-x-4 items-center py-4">
                <div className="flex-1">
                    <FormLabel htmlFor="email">Email</FormLabel>
                    <FormInput
                        id="email"
                        required
                        type="email"
                        value={fpoAdmin.email}
                        onChange={(e) =>
                            setFpoAdmin({
                                ...fpoAdmin,
                                email: e.target.value,
                            })
                        }
                    />
                </div>

                <div className="flex-1">
                    <FormLabel htmlFor="regular-form-1">Phone Number</FormLabel>
                    <FormInput
                        id="phone_number"
                        required
                        type="text"
                        value={fpoAdmin.phone_number}
                        onChange={(e) =>
                            setFpoAdmin({
                                ...fpoAdmin,
                                phone_number: e.target.value,
                            })
                        }
                    />
                </div>
            </div>

            <div className="flex py-4">
                <Button
                    variant="primary"
                    className="w-full xl:mr-3"
                    onClick={() => {}}
                >
                    Save
                </Button>
            </div>
        </form>
    );
};

export default CreateFpoAdminUserAccount;
