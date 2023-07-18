import Lucide from "../../base-components/Lucide";
import Button from "../../base-components/Button";
import _ from "lodash";
import { useContext, useEffect, useState } from "react";
import { AppContext } from "../../context/RootContext";
import { useSelector } from "react-redux";
import { useNavigate, useParams } from "react-router-dom";
import { BASE_API_URL } from "../../env";
import FarmersList from "../FarmersList";
import { EDIT_AGENT } from "../../router/routes";
import IssueDeviceModal from "./IssueDeviceModal";

function Main() {
    const navigate = useNavigate();
    const token = useSelector((state) => state.auth.token);
    const { updateAppContextState } = useContext(AppContext);
    const [agent, setAgentData] = useState(null);
    const [showIssueDeviceModal, setShowIssueDeviceModal] = useState(false);
    let { id } = useParams();

    useEffect(() => {
        updateAppContextState("loading", true);
        axios
            .get(`${BASE_API_URL}/agent/${id}`, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then(({ data: res }) => {
                console.log("Agent Data", res.data);
                if (res?.data) {
                    setAgentData(res?.data);
                }
            })
            .catch((err) => {
                console.log(err);
            })
            .finally(() => {
                updateAppContextState("loading", false);
            });
    }, [id]);

    return (
        <>
            <IssueDeviceModal
                agent={agent}
                showModal={showIssueDeviceModal}
                setShowModal={setShowIssueDeviceModal}
                setAgentData={setAgentData}
            />
            <div className="flex flex-col items-center mt-8 intro-y sm:flex-row">
                <h2 className="flex items-center mr-auto text-lg font-medium">
                    Profile
                </h2>
                <div className="flex w-full mt-4 space-x-2 sm:w-auto sm:mt-0">
                    <Button
                        onClick={() => setShowIssueDeviceModal(true)}
                        variant="outline-primary"
                        className="shadow-md"
                    >
                        <Lucide icon="Tablet" className="w-4 h-4 mr-2" /> Issue
                        Device
                    </Button>
                    <Button
                        onClick={() => {
                            navigate(EDIT_AGENT, {
                                state: {
                                    agent,
                                },
                            });
                        }}
                        variant="primary"
                        className="mr-2 shadow-md"
                    >
                        <Lucide icon="Pencil" className="w-4 h-4 mr-2" /> Update
                        Profile
                    </Button>
                </div>
            </div>
            <div className="grid grid-cols-12 gap-5 mt-5">
                {/* BEGIN: Profile Cover */}
                <div className="col-span-12">
                    <div className="px-3 pt-3 pb-5 box intro-y">
                        <div className="flex flex-col items-center justify-center text-center lg:flex-row lg:text-left">
                            <div className="z-20 lg:-mt-10 lg:ml-10">
                                <div className="w-40 h-40 overflow-hidden border-4 border-white rounded-full shadow-md image-fit">
                                    <img
                                        alt="Profile Photo"
                                        className="rounded-md"
                                        src={agent?.photo}
                                    />
                                </div>
                            </div>
                            <div className="lg:ml-5">
                                <h2 className="mt-5 text-lg font-medium">
                                    {agent?.first_name + " " + agent?.last_name}
                                </h2>
                                <div className="flex items-center justify-center mt-2 text-slate-500 lg:justify-start">
                                    <Lucide
                                        icon="Briefcase"
                                        className="w-4 h-4 mr-2"
                                    />{" "}
                                    {agent?.designation}
                                </div>
                                <div className="flex items-center justify-center mt-2 text-slate-500 lg:justify-start">
                                    <Lucide
                                        icon="MapPin"
                                        className="w-4 h-4 mr-2"
                                    />{" "}
                                    {agent?.residence}, UG
                                </div>
                            </div>
                            <div className="grid h-24 grid-cols-2 px-10 mx-auto mb-6 border-dashed gap-y-2 md:gap-y-0 lg:border-l lg:border-r border-slate-200 lg:mb-0">
                                <div className="flex items-center justify-center col-span-2 md:col-span-1 lg:justify-start">
                                    <Lucide
                                        icon="Phone"
                                        className="w-4 h-4 mr-2"
                                    />
                                    {agent?.phone_number}
                                </div>

                                <div className="flex items-center justify-center col-span-2 md:col-span-1 lg:justify-start">
                                    <Lucide
                                        icon="Mail"
                                        className="w-4 h-4 mr-2"
                                    />
                                    {agent?.email}
                                </div>

                                <div className="flex items-center justify-center col-span-2 md:col-span-1 lg:justify-start">
                                    <span className="w-fit h-4 mr-2 flex items-center opacity-75">
                                        Referee:
                                    </span>
                                    {agent?.referee_name}
                                </div>

                                <div className="flex items-center justify-center col-span-2 md:col-span-1 lg:justify-start">
                                    <span className="w-fit h-4 mr-2 flex items-center opacity-75">
                                        Referee Phone:
                                    </span>
                                    {agent?.referee_phone_number}
                                </div>

                                <div className="flex items-center justify-center col-span-2 lg:justify-start">
                                    <Lucide
                                        icon="Tablet"
                                        className="w-4 h-4 mr-2"
                                    />

                                    {agent?.device_id ? (
                                        <span className="text-primary font-bold">
                                            {agent?.device_id}
                                        </span>
                                    ) : (
                                        <span className="text-white bg-primary px-2 rounded">
                                            Device Not Issued
                                        </span>
                                    )}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {/* END: Profile Cover */}

                {/* BEGIN: Profile Content */}

                {/* END: Profile Content */}

                {/* BEGIN: Profile Side Menu */}

                {/* END: Profile Side Menu */}
            </div>

            <div className="w-full h-full">
                <FarmersList agent_id={id} />
            </div>
        </>
    );
}

export default Main;
