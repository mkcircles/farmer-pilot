import { v4 as uuidv4 } from "uuid";
import { useContext, useState } from "react";
import Lucide from "../../../base-components/Lucide";
import { AppContext } from "../../../context/RootContext";
import { useSelector } from "react-redux";
import { BASE_API_URL } from "../../../env";
import { SearchSelect, SearchSelectItem, Title } from "@tremor/react";
import { FormInput, FormLabel } from "../../../base-components/Form";
import Button from "../../../base-components/Button";
import { Tablet } from "react-feather";
import { useNavigate } from "react-router-dom";
import { useAppDispatch } from "../../../stores/hooks";
import { setAppSuccessAlert } from "../../../stores/appSuccessAlert";

const IssueDeviceModal = ({ showModal, setShowModal, agent, setAgentData }) => {
    const dispatch = useAppDispatch();
    const navigate = useNavigate();
    const { updateAppContextState } = useContext(AppContext);
    const token = useSelector((state) => state.auth?.token);
    const [deviceData, setDeviceData] = useState({
        agent_id: agent?.id,
        brand: "",
        device_id: "",
        assigned_phone_number: "",
    });

    const handleIssueDeviceToAgent = () => {
        updateAppContextState("loading", true);
        axios
            .post(`${BASE_API_URL}/agent/device/add`, {
                ...deviceData,
                agent_id: agent?.id
            }, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((res) => {
                setShowModal(false);
                setAgentData({...agent, device_id: `${deviceData?.brand}-${deviceData?.device_id}`});
                dispatch(setAppSuccessAlert({
                    id: uuidv4(),
                    message: "Device has been Issued successfully",
                }))
            })
            .catch((err) => {
                // TODO: Notify Error
                // console.log(err);
            })
            .finally(() => {
                updateAppContextState("loading", false);
            });
    };

    return (
        <div
            className={`z-[1000] fixed bg-primary rounded-md shadow-md transition-all h-full top-32 bottom-0 right-0 w-full lg:w-1/2 duration-700  ${
                showModal ? "  translate-x-0  " : "translate-x-full"
            }`}
        >
            <div className="flex w-full space-x-8 p-4 ">
                <span
                    className="text-white"
                    onClick={() => setShowModal(false)}
                >
                    <Lucide icon="XSquare" />
                </span>
                <Title className="text-white">
                    Issue Device to {agent?.first_name + " " + agent?.last_name}
                </Title>
            </div>
            <div className="h-full flex flex-col bg-slate-50">
                <form
                    className="py-8 px-8"
                    onSubmit={(e) => {
                        e.preventDefault();
                        handleIssueDeviceToAgent();
                    }}
                >
                    <div className="py-4">
                        <FormLabel htmlFor="brand">Brand</FormLabel>
                        <SearchSelect
                            value={deviceData?.brand}
                            onValueChange={(value) =>
                                setDeviceData({ ...deviceData, brand: value })
                            }
                        >
                            {[
                                "Samsung Active Tab Pro - SM-T540 (Wi-Fi only)",
                                "Samsung Active Tab Pro - SM-T547 (LTE)",
                                "Famoco FX 205 SE",
                                "Samsung Galaxy Tab Active 3",
                                "Samsung A53 (SM-A536U1 model only)",
                            ]?.map((brand, index) => {
                                return (
                                    <SearchSelectItem
                                        key={index}
                                        value={brand}
                                        icon={Tablet}
                                    >
                                        {brand}
                                    </SearchSelectItem>
                                );
                            })}
                        </SearchSelect>
                    </div>
                    <div className="py-4">
                        <FormLabel htmlFor="name">Device ID</FormLabel>
                        <FormInput
                            id="device_id"
                            required
                            type="text"
                            placeholder=""
                            value={deviceData?.device_id}
                            onChange={(e) =>
                                setDeviceData({
                                    ...deviceData,
                                    device_id: e.target.value,
                                })
                            }
                        />
                    </div>
                    <div className="py-4">
                        <FormLabel htmlFor="name">Assigned Phone Number</FormLabel>
                        <FormInput
                            id="assigned_phone_number"
                            required
                            type="text"
                            placeholder=""
                            value={deviceData?.assigned_phone_number}
                            onChange={(e) =>
                                setDeviceData({
                                    ...deviceData,
                                    assigned_phone_number: e.target.value,
                                })
                            }
                        />
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

export default IssueDeviceModal;
