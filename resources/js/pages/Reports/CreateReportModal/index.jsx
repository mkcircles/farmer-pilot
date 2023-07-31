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

const CreateReportModal = ({ showModal, setShowModal }) => {
    const dispatch = useAppDispatch();
    const navigate = useNavigate();
    const { updateAppContextState } = useContext(AppContext);
    const token = useSelector((state) => state.auth?.token);
    const [reportData, setReportData] = useState({
        name: "",
        report_type: "farmer-report",
        from_date: "2023-07-01",
        to_date: "2023-07-01",
        district: "",
        agent_id: "",
        crops_grown: "",
        farm_size: "",
        gender: "",
        fpo_id: "",
    });
    const [agents, setAgents] = useState([]);
    const [fpos, setFpos] = useState([]);

    const handleCreateReport = () => {
        updateAppContextState("loading", true);
        axios
            .post(
                `${BASE_API_URL}/report/register`,
                {
                    ...reportData,
                },
                {
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                }
            )
            .then((res) => {
                setShowModal(false);
                dispatch(
                    setAppSuccessAlert({
                        id: uuidv4(),
                        message:
                            "Report has been created successfully and queued for processing!",
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

    const fetchAgents = () => {
        updateAppContextState("loading", true);
        axios
            .get(`${BASE_API_URL}/agents/all`, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((res) => {
                console.log("Agent Data", res?.data?.data);
                let resData = res?.data?.data;
                if (res?.data) {
                    setAgents(resData);
                }
            })
            .catch((err) => {
                console.log(err);
            })
            .finally(() => {
                updateAppContextState("loading", false);
            });
    };
    const fetchFpos = () => {
        updateAppContextState("loading", true);
        axios
            .get(`${BASE_API_URL}/fpos/summary`, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((res) => {
                console.log("FPO Data", res?.data?.data);
                let resData = res?.data?.data;
                if (res?.data) {
                    setFpos(resData);
                }
            })
            .catch((err) => {
                console.log(err);
            })
            .finally(() => {
                updateAppContextState("loading", false);
            });
    };

    const formatDate = (date) => {
        return `${date?.getFullYear()}-${
            date?.getMonth() + 1 < 10
                ? `0${date?.getMonth() + 1}`
                : date?.getMonth() + 1
        }-${
            date?.getDate() < 10
                ? `0${date?.getDate()}`
                : date?.getDate()
        }`;
    };

    useEffect(() => {
        fetchAgents();
        fetchFpos();
    }, []);

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
                <Title className="text-white">Create New Report</Title>
            </div>
            <div className="h-full flex flex-col flex-grow bg-slate-50">
                <form
                    className="py-4 px-8 bg-slate-50"
                    onSubmit={(e) => {
                        e.preventDefault();
                        handleCreateReport();
                    }}
                >
                    <div className=" grid grid-cols-1 md:grid-cols-2 gap-x-4 items-center">
                        <div className="py-4">
                            <FormLabel htmlFor="name">Report Name</FormLabel>
                            <FormInput
                                id="name"
                                required
                                type="text"
                                placeholder=""
                                value={reportData?.name}
                                onChange={(e) =>
                                    setReportData({
                                        ...reportData,
                                        name: e.target.value,
                                    })
                                }
                            />
                        </div>

                        <div className="py-4">
                            <FormLabel htmlFor="report_type">
                                Report Type
                            </FormLabel>
                            <SearchSelect
                                defaultValue="farmer-report"
                                value={reportData?.report_type}
                                onValueChange={(value) =>
                                    setReportData({
                                        ...reportData,
                                        report_type: value,
                                    })
                                }
                            >
                                {["farmer-report", "crop-report"]?.map(
                                    (type, index) => {
                                        return (
                                            <SearchSelectItem
                                                key={index}
                                                value={type}
                                                icon={File}
                                            >
                                                {type}
                                            </SearchSelectItem>
                                        );
                                    }
                                )}
                            </SearchSelect>
                        </div>
                    </div>

                    <div className=" grid grid-cols-1 md:grid-cols-2 gap-x-4 items-center">
                        <div className="py-4 w-full">
                            <FormLabel htmlFor="from_date">From</FormLabel>

                            <DatePicker
                                defaultValue={new Date(reportData?.from_date)}
                                onValueChange={(value) => {
                                    setReportData({
                                        ...reportData,
                                        from_date: formatDate(value),
                                    });
                                }}
                                className=""
                            />
                        </div>
                        <div className="py-4 w-full">
                            <FormLabel htmlFor="to_date">To</FormLabel>
                            <DatePicker
                                defaultValue={new Date(reportData?.to_date)}
                                onValueChange={(value) => {
                                    setReportData({
                                        ...reportData,
                                        to_date: formatDate(value),
                                    });
                                }}
                                className=""
                            />
                        </div>
                    </div>

                    <div className=" grid grid-cols-1 md:grid-cols-2 gap-x-4 items-center">
                        <div className="py-4">
                            <FormLabel htmlFor="fpo_id">FPO</FormLabel>
                            <SearchSelect
                                defaultValue=""
                                value={reportData?.fpo_id}
                                onValueChange={(value) =>
                                    setReportData({
                                        ...reportData,
                                        fpo_id: value,
                                    })
                                }
                            >
                                {["All", ...fpos]?.map((fpo, index) => {
                                    if (fpo === "All") {
                                        return (
                                            <SearchSelectItem
                                                key={index}
                                                value={""}
                                                icon={Home}
                                            >
                                                All FPOs
                                            </SearchSelectItem>
                                        );
                                    }
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

                        <div className="py-4">
                            <FormLabel htmlFor="agent_id">Agent</FormLabel>
                            <SearchSelect
                                defaultValue=""
                                value={reportData?.agent_id}
                                onValueChange={(value) =>
                                    setReportData({
                                        ...reportData,
                                        agent_id: value,
                                    })
                                }
                            >
                                {["All", ...agents]?.map((agent, index) => {
                                    if (agent === "All") {
                                        return (
                                            <SearchSelectItem
                                                key={index}
                                                value={""}
                                                icon={UserGroupIcon}
                                            >
                                                All agents
                                            </SearchSelectItem>
                                        );
                                    }
                                    return (
                                        <SearchSelectItem
                                            key={index}
                                            value={agent?.id}
                                            icon={User}
                                        >
                                            {agent?.first_name +
                                                " " +
                                                agent?.last_name}
                                        </SearchSelectItem>
                                    );
                                })}
                            </SearchSelect>
                        </div>
                    </div>

                    <div className=" grid grid-cols-1 md:grid-cols-2 gap-x-4 items-center">
                        <div className="py-4">
                            <FormLabel htmlFor="district">District</FormLabel>
                            <FormInput
                                id="district"
                                type="text"
                                placeholder="District"
                                value={reportData?.district}
                                onChange={(e) =>
                                    setReportData({
                                        ...reportData,
                                        district: e.target.value,
                                    })
                                }
                            />
                        </div>

                        <div className="py-4">
                            <FormLabel htmlFor="gender">Gender</FormLabel>
                            <SearchSelect
                                value={reportData?.gender}
                                onValueChange={(value) =>
                                    setReportData({
                                        ...reportData,
                                        gender: value,
                                    })
                                }
                            >
                                {["All", "Male", "Female"]?.map(
                                    (gender, index) => {
                                        if (gender === "All") {
                                            return (
                                                <SearchSelectItem
                                                    key={index}
                                                    value={""}
                                                    // icon={}
                                                >
                                                    {gender}
                                                </SearchSelectItem>
                                            );
                                        }
                                        return (
                                            <SearchSelectItem
                                                key={index}
                                                value={gender}
                                                // icon={}
                                            >
                                                {gender}
                                            </SearchSelectItem>
                                        );
                                    }
                                )}
                            </SearchSelect>
                        </div>
                    </div>

                    <div className=" grid grid-cols-1 md:grid-cols-2 gap-x-4 items-center">
                        <div className="py-4">
                            <FormLabel htmlFor="product">Product</FormLabel>
                            <FormInput
                                id="product"
                                type="text"
                                placeholder="E.g Maize"
                                value={reportData?.product}
                                onChange={(e) =>
                                    setReportData({
                                        ...reportData,
                                        product: e.target.value,
                                    })
                                }
                            />
                        </div>
                        <div className="py-4">
                            <FormLabel htmlFor="farm_size">
                                Farm Size (Acres)
                            </FormLabel>
                            <FormInput
                                id="farm_size"
                                type="number"
                                placeholder=""
                                value={reportData?.farm_size}
                                onChange={(e) =>
                                    setReportData({
                                        ...reportData,
                                        farm_size: e.target.value,
                                    })
                                }
                            />
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

export default CreateReportModal;
