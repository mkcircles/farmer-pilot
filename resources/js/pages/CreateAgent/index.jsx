import React, { useContext, useEffect } from "react";
import { SearchSelect, SearchSelectItem, Title } from "@tremor/react";
import Button from "../../base-components/Button";
import {
    FormLabel,
    FormInput,
    FormHelp,
    FormSelect,
} from "../../base-components/Form";
import { useLocation, useNavigate } from "react-router-dom";
import { AppContext } from "../../context/RootContext";
import axios from "axios";
import { BASE_API_URL } from "../../env";
import { useSelector } from "react-redux";
import { AGENTS_LIST, FPO_LIST } from "../../router/routes";
import { Home } from "react-feather";
import { useAppDispatch } from "../../stores/hooks";
import { setAppSuccessAlert } from "../../stores/appSuccessAlert";

const CreateAgent = () => {
    const navigate = useNavigate();
    const dispatch = useAppDispatch();
    const {
        state: { fpo },
    } = useLocation();
    const { updateAppContextState } = useContext(AppContext);
    const token = useSelector((state) => state.auth?.token);
    const user = useSelector((state) => state.auth?.user);
    const [agentData, setAgentData] = React.useState({
        first_name: "",
        last_name: "",
        email: "",
        phone_number: "",
        age: "",
        gender: "",
        residence: "",
        referee_name: "",
        referee_phone_number: "",
        designation: "",
        fpo_id: fpo?.fpo_id || "",
        created_by: user.id,
    });
    const [fpos, setFpos] = React.useState([]);

    console.log("LOGGED IN USER : ", user.entity_id);

    const handleCreateAgent = () => {
        updateAppContextState("loading", true);
        axios
            .post(`${BASE_API_URL}/agent/register`, agentData, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((res) => {
                // TODO: Notify success
                navigate(AGENTS_LIST);
                dispatch(
                    setAppSuccessAlert({
                        message: "New Agent has been added successfully",
                    })
                );
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
        if (fpo) {
            setAgentData({ ...agentData, fpo_id: fpo?.fpo_id });
        }
    }, [fpo]);

    useEffect(() => {
        if((user?.role !== "admin" && !fpo?.fpo_id)) {
            setAgentData({ ...agentData, fpo_id: user?.entity_id });
        }
    }, [user]);

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
                handleCreateAgent();
            }}
        >
            <Title>{ fpo?.fpo_name ? `Create a new Agent for ${fpo?.fpo_name}` : 'Create New Agent'}</Title>

            {(fpo?.fpo_id || (user?.role !== "admin")) ? null : (
                <div className="py-4">
                    <FormLabel htmlFor="fpo_id">Select FPO</FormLabel>

                    <SearchSelect
                        id="fpo_id"
                        value={agentData?.fpo_id}
                        onValueChange={(value) =>
                            setAgentData({ ...agentData, fpo_id: value })
                        }
                    >
                        {fpos?.map((fpo, index) => {
                            return (
                                <SearchSelectItem
                                    key={index}
                                    value={fpo?.id}
                                    icon={Home}
                                >
                                    {fpo?.fpo_name}
                                </SearchSelectItem>
                            );
                        })}
                    </SearchSelect>
                </div>
            )}

            <div className="flex space-x-4 items-center py-4">
                <div className="flex-1">
                    <FormLabel htmlFor="regular-form-1">First Name</FormLabel>
                    <FormInput
                        id="first_name"
                        required
                        type="text"
                        placeholder="First Name"
                        value={agentData.first_name}
                        onChange={(e) =>
                            setAgentData({
                                ...agentData,
                                first_name: e.target.value,
                            })
                        }
                    />
                </div>

                <div className="flex-1">
                    <FormLabel htmlFor="regular-form-1">Last Name</FormLabel>
                    <FormInput
                        id="last_name"
                        required
                        type="text"
                        placeholder="Last Name"
                        value={agentData.last_name}
                        onChange={(e) =>
                            setAgentData({
                                ...agentData,
                                last_name: e.target.value,
                            })
                        }
                    />
                </div>
            </div>

            <div className="flex space-x-4 items-center py-4">
                <div className="flex-1">
                    <FormLabel htmlFor="regular-form-1">Email</FormLabel>
                    <FormInput
                        id="email"
                        type="email"
                        placeholder=""
                        value={agentData.email}
                        onChange={(e) =>
                            setAgentData({
                                ...agentData,
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
                        placeholder=""
                        value={agentData.phone_number}
                        onChange={(e) =>
                            setAgentData({
                                ...agentData,
                                phone_number: e.target.value,
                            })
                        }
                    />
                </div>
            </div>

            <div className="flex space-x-4 items-center py-4">
                <div className="flex-1">
                    <FormLabel htmlFor="regular-form-1">Age</FormLabel>
                    <FormInput
                        id="age"
                        required
                        type="number"
                        placeholder=""
                        value={agentData.age}
                        onChange={(e) =>
                            setAgentData({
                                ...agentData,
                                age: e.target.value,
                            })
                        }
                    />
                </div>

                <div className="flex-1">
                    <FormLabel htmlFor="regular-form-1">Gender</FormLabel>
                    <FormSelect
                        id="gender"
                        required
                        value={agentData.gender}
                        onChange={(e) =>
                            setAgentData({
                                ...agentData,
                                gender: e.target.value,
                            })
                        }
                    >
                        <option selected value="">
                            -- Choose gender --
                        </option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </FormSelect>
                </div>
            </div>

            <div className="flex space-x-4 items-center py-4">
                <div className="flex-1">
                    <FormLabel htmlFor="regular-form-1">Designation</FormLabel>
                    <FormInput
                        id="designation"
                        required
                        type="text"
                        placeholder=""
                        value={agentData.designation}
                        onChange={(e) =>
                            setAgentData({
                                ...agentData,
                                designation: e.target.value,
                            })
                        }
                    />
                </div>
                <div className="flex-1">
                    <FormLabel htmlFor="regular-form-1">Residence</FormLabel>
                    <FormInput
                        id="residence"
                        required
                        type="text"
                        placeholder=""
                        value={agentData.residence}
                        onChange={(e) =>
                            setAgentData({
                                ...agentData,
                                residence: e.target.value,
                            })
                        }
                    />
                </div>
            </div>

            <div className="flex space-x-4 items-center py-4">
                <div className="flex-1">
                    <FormLabel htmlFor="regular-form-1">Referee Name</FormLabel>
                    <FormInput
                        id="referee_name"
                        required
                        type="text"
                        placeholder=""
                        value={agentData.referee_name}
                        onChange={(e) =>
                            setAgentData({
                                ...agentData,
                                referee_name: e.target.value,
                            })
                        }
                    />
                </div>

                <div className="flex-1">
                    <FormLabel htmlFor="regular-form-1">
                        Referee Phone number
                    </FormLabel>
                    <FormInput
                        id="referee_phone_number"
                        type="text"
                        required
                        placeholder=""
                        value={agentData.referee_phone_number}
                        onChange={(e) =>
                            setAgentData({
                                ...agentData,
                                referee_phone_number: e.target.value,
                            })
                        }
                    />
                </div>
            </div>

            <div className="flex py-4">
                <Button
                    data-btn-role="submit"
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

export default CreateAgent;
