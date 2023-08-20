import { ArrowLeft, Disc } from "react-feather";
import { useNavigate } from "react-router-dom";
import MaleAvatar from "../../assets/images/male_avatar.svg";
import FemaleAvatar from "../../assets/images/female_avatar.svg";
import {
    Bold,
    Card,
    Flex,
    Icon,
    List,
    ListItem,
    Title,
    Text,
    Divider,
    Grid,
    TabGroup,
    TabList,
    Tab,
    TabPanels,
    TabPanel,
    Badge,
} from "@tremor/react";
import FarmInfoCard from "./FarmInfoCard";
import { HomeIcon, UserGroupIcon } from "@heroicons/react/solid";
import { useParams } from "react-router";
import { useContext, useEffect, useRef, useState } from "react";
import axios from "axios";
import { API_KEY, BASE_API_URL } from "../../env";
import { AppContext } from "../../context/RootContext";
import { useSelector } from "react-redux";
import {
    User as UserIcon,
    Phone as PhoneIcon,
    Mail as MailIcon,
    UserCheck as UserCheckIcon,
    Home as FpoIcon,
    Map as MapIcon,
    Tablet as TabletIcon,
} from "react-feather";
import { numberFormatter } from "../../utils/numberFormatter";
import Button from "../../base-components/Button";
import Lucide from "../../base-components/Lucide";
import {
    AlertTriangle,
    BadgeAlert,
    BadgeMinus,
    BadgeX,
    CheckSquare,
    Copy,
    Unplug,
    UserCheck,
    UserMinus,
    UserX,
} from "lucide-react";
import { BadgeCheckIcon } from "@heroicons/react/outline";
import WithConfirmAlert from "../../helpers/WithConfirmAlert";
import { AGENT_PROFILE, FARMER_PROFILE } from "../../router/routes";
import Loading from "../../components/Loading";
import LocationOnMap from "./LocationOnMap";
import { useAppDispatch } from "../../stores/hooks";
import { setAppSuccessAlert } from "../../stores/appSuccessAlert";
import FarmersList from "../FarmersList";
import BiometricsList from "../FarmerBiometrics/BiometricsList";

const FarmerProfile = () => {
    const dispatch = useAppDispatch();
    const navigate = useNavigate();
    const token = useSelector((state) => state.auth.token);
    const fpos = useSelector((state) => state.fpos?.fpos);
    const { updateAppContextState } = useContext(AppContext);
    const [farmerData, setFarmerData] = useState(null);
    const [showManageAccountMenu, setShowManageAccountMenu] = useState(false);
    const [fpoName, setFpoName] = useState("");
    const [bioDuplicates, setBioDuplicates] = useState([]);
    const scrollToTop = useRef(null);
    let { id } = useParams();

    const UpdateAgentStatus = (status) => {
        return new Promise((resolve, reject) => {
            updateAppContextState("loading", true);
            axios
                .put(
                    `${BASE_API_URL}/farmer/update/status`,
                    {
                        id: id,
                        status: status,
                    },
                    {
                        headers: {
                            Authorization: `Bearer ${token}`,
                        },
                    }
                )
                .then(({ data: res }) => {
                    console.log("Agent Data", res.data);
                    if (res?.data) {
                        // setAgentData(res?.data);
                        fetchFarmerData();
                        return resolve({
                            message:
                                "Farmer profile status updated successfully",
                            title: "success",
                        });
                    }
                    reject({
                        message: "Something went wrong",
                        title: "error",
                    });
                })
                .catch((err) => {
                    console.log(err);
                    reject({
                        message: "Something went wrong",
                        title: "error",
                    });
                })
                .finally(() => {
                    updateAppContextState("loading", false);
                });
        });
    };

    const fetchFarmerData = () => {
        updateAppContextState("loading", true);
        axios
            .get(`${BASE_API_URL}/farmer/${id}`, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((res) => {
                // console.log("Farmer Data", res.data?.data);
                if (res?.data) {
                    setFarmerData(res?.data?.data);
                }
                if(res?.data?.duplicateBiometricCaptures) {
                    setBioDuplicates(res?.data?.duplicateBiometricCaptures);
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
        scrollToTop?.current?.scrollIntoView({
            behavior: "smooth",
        });
    }, []);

    useEffect(() => {
        fetchFarmerData();
    }, [id, token]);

    useEffect(() => {
        if (farmerData?.fpo_id) {
            setFpoName(
                fpos?.find((fpo) => fpo?.id == farmerData?.fpo_id)?.fpo_name
            );
        }
    }, [farmerData]);

    if (!farmerData) return <Loading />;

    return (
        <div ref={scrollToTop} className="w-full h-full mt-6">
            <div className="flex justify-between items-center px-10 mx-auto">
                <div className="flex items-center space-x-4">
                    <ArrowLeft onClick={() => navigate(-1)} />
                    <Title>
                        {farmerData?.first_name} {farmerData?.last_name}
                    </Title>
                    <div className="flex items-center justify-between text-center py-2">
                        {farmerData?.status === "complete" ? (
                            <Badge
                                className="capitalize shadow-md bg-green-300"
                                size="sm"
                                color="green"
                            >
                                {farmerData?.status}
                            </Badge>
                        ) : (
                            <Badge
                                className="shadow-md capitalize"
                                size="sm"
                                color="red"
                            >
                                {farmerData?.status || "Not Verified"}
                            </Badge>
                        )}
                    </div>
                </div>

                <div className="flex mt-4 sm:w-auto sm:mt-0">
                    <Button
                        onClick={() => {
                            setShowManageAccountMenu(!showManageAccountMenu);
                        }}
                        variant="primary"
                        className="mr-2 shadow-md space-x-2"
                    >
                        <Lucide icon="Settings" className="w-4 h-4" />{" "}
                        <span className="hidden md:block">
                            Manage Farmer Profile
                        </span>
                    </Button>
                </div>
            </div>

            <div className="w-full h-fit relative py-4 grid grid-cols-12 px-10 gap-8 mx-auto">
                <div className="flex flex-col justify-center items-center w-full col-span-12 lg:col-span-4 rounded-md bg-white">
                    {farmerData?.gender === "male" ? (
                        <img
                            className="h-40 w-auto"
                            alt="Profile Picture"
                            src={MaleAvatar}
                        />
                    ) : (
                        <img
                            className="h-40 w-auto"
                            alt="Profile Picture"
                            src={FemaleAvatar}
                        />
                    )}
                </div>
                <div className="border border-primary w-full flex space-x-4 col-span-12 lg:col-span-8 bg-white justify-center rounded-md">
                    <div className="h-full w-full flex flex-col space-y-5 justify-center bg-primary text-white border  lg:px-8 px-4 py-4 rounded-l-md shadow-sm">
                        <div
                            title="FPO"
                            className="w-full flex items-center lg:space-x-8 space-x-4 py-1 lg:px-4 px-2"
                        >
                            <span className="text-slate-500 ">
                                <FpoIcon className="h-5 w-5" />
                            </span>

                            {fpoName ? (
                                <span>{fpoName}</span>
                            ) : (
                                <span className="opacity-70">
                                    {"FPO Not set"}
                                </span>
                            )}
                        </div>
                        <div className="w-full flex items-center space-x-8 py-1 px-4">
                            <span className="text-slate-500 ">
                                <PhoneIcon className="h-5 w-5" />
                            </span>

                            {farmerData?.phone_number ? (
                                <span>{farmerData?.phone_number}</span>
                            ) : (
                                <span className="opacity-70">
                                    {"Phone Not set"}
                                </span>
                            )}
                        </div>

                        <div className="w-full flex items-center space-x-8 py-1 px-4">
                            <span className="text-slate-500 ">
                                <MailIcon className="h-5 w-5" />
                            </span>

                            {farmerData?.email ? (
                                <span>{farmerData?.email}</span>
                            ) : (
                                <span className="opacity-70">
                                    {"Email Not set"}
                                </span>
                            )}
                        </div>
                        <div
                            title="ID Number"
                            className="w-full flex items-center space-x-8 py-1 px-4"
                        >
                            <span className="text-slate-500 ">
                                <UserCheckIcon className="h-5 w-5" />
                            </span>
                            {farmerData?.id_number ? (
                                <span>{farmerData?.id_number}</span>
                            ) : (
                                <span className="opacity-70">
                                    {"ID No. Not set"}
                                </span>
                            )}
                        </div>
                    </div>
                    <div className="h-full w-full flex flex-col space-y-5 justify-center pr-8">
                        <div className="w-full flex items-center justify-between space-x-8 py-1 px-4 border-b border-dotted">
                            <span className="text-slate-500 uppercase">
                                Marital Status
                            </span>

                            {farmerData?.marital_status ? (
                                <span className="flex items-center capitalize">
                                    {farmerData?.marital_status}
                                </span>
                            ) : (
                                <span className="opacity-70">{"Not set"}</span>
                            )}
                        </div>
                        <div className="w-full flex items-center justify-between  space-x-8 py-1 px-4 border-b border-dotted">
                            <span className="text-slate-500 uppercase">
                                Education Level
                            </span>

                            {farmerData?.education_level ? (
                                <span className="flex items-center capitalize">
                                    {farmerData?.education_level}
                                </span>
                            ) : (
                                <span className="opacity-70">{"Not set"}</span>
                            )}
                        </div>
                        <div className="w-full flex items-center justify-between  space-x-8 py-1 px-4 border-b border-dotted">
                            <span className="text-slate-500 uppercase">
                                Next of kin
                            </span>

                            {farmerData?.education_level ? (
                                <span className="flex items-center capitalize">
                                    {farmerData?.next_of_kin}
                                </span>
                            ) : (
                                <span className="opacity-70">{"Not set"}</span>
                            )}
                        </div>
                        <div className="w-full flex items-center justify-between  space-x-8 py-1 px-4 border-b border-dotted">
                            <span className="text-slate-500 uppercase">
                                Next of kin contact
                            </span>

                            {farmerData?.next_of_kin_contact ? (
                                <span className="flex items-center">
                                    {farmerData?.next_of_kin_contact}
                                </span>
                            ) : (
                                <span className="opacity-70">{"Not set"}</span>
                            )}
                        </div>
                    </div>
                </div>

                <div
                    className={`flex flex-col absolute transition-all duration-700 sm:end-0 end-auto w-48 mr-1 !right-8 ${
                        showManageAccountMenu
                            ? "top-2  z-50 h-fit box"
                            : "top-8 z-50 h-0 overflow-hidden"
                    }`}
                >
                    {farmerData?.status !== "complete" && (
                        <div
                            onClick={() => {
                                WithConfirmAlert(() =>
                                    UpdateAgentStatus("complete")
                                );
                                setShowManageAccountMenu(false);
                            }}
                            className="flex border-b space-x-2 p-4 items-center cursor-pointer"
                        >
                            <CheckSquare className="w-5 h-5 text-secondary " />
                            <span className="text-primary">
                                Mark as Complete
                            </span>
                        </div>
                    )}

                    {farmerData?.status !== "pending" && (
                        <div
                            onClick={() => {
                                WithConfirmAlert(() =>
                                    UpdateAgentStatus("pending")
                                );
                                setShowManageAccountMenu(false);
                            }}
                            className="flex border-b space-x-2 p-4 items-center cursor-pointer"
                        >
                            <BadgeAlert className="w-5 h-5 text-secondary " />
                            <span className="text-primary">
                                Mark as Pending
                            </span>
                        </div>
                    )}

                    {farmerData?.status !== "valid" && (
                        <div
                            onClick={() => {
                                WithConfirmAlert(() =>
                                    UpdateAgentStatus("valid")
                                );
                                setShowManageAccountMenu(false);
                            }}
                            className="flex border-b space-x-2 p-4 items-center cursor-pointer"
                        >
                            <BadgeCheckIcon className="w-5 h-5 text-secondary " />
                            <span className="text-primary">Mark as Valid</span>
                        </div>
                    )}

                    {farmerData?.status !== "invalid" && (
                        <div
                            onClick={() => {
                                WithConfirmAlert(() =>
                                    UpdateAgentStatus("invalid")
                                );
                                setShowManageAccountMenu(false);
                            }}
                            className="flex border-b space-x-2 p-4 items-center cursor-pointer"
                        >
                            <BadgeX className="w-5 h-5 text-secondary " />
                            <span className="text-primary">
                                Mark as Invalid
                            </span>
                        </div>
                    )}

                    {farmerData?.status !== "invalid" && (
                        <div
                            onClick={() => {
                                WithConfirmAlert(() =>
                                    UpdateAgentStatus("blacklisted")
                                );
                                setShowManageAccountMenu(false);
                            }}
                            className="flex border-b space-x-2 p-4 items-center cursor-pointer"
                        >
                            <BadgeMinus className="w-5 h-5 text-secondary " />
                            <span className="text-primary">Blacklist</span>
                        </div>
                    )}

                    {farmerData?.deceased !== "invalid" && (
                        <div
                            onClick={() => {
                                WithConfirmAlert(() =>
                                    UpdateAgentStatus("deceased")
                                );
                                setShowManageAccountMenu(false);
                            }}
                            className="flex border-b space-x-2 p-4 items-center cursor-pointer"
                        >
                            <UserX className="w-5 h-5 text-secondary " />
                            <span className="text-primary">
                                Mark as Deceased
                            </span>
                        </div>
                    )}
                </div>
            </div>

            {farmerData?.validation_reason &&
                JSON?.parse(farmerData?.validation_reason)?.status !==
                    "valid" && (
                    <div className="w-full px-10 pb-4 ">
                        <Card className="h-full border-l-4 bg-orange-100 border-secondary shadow-md">
                            <div className="flex justify-between px-4">
                                <div className="text-lg text-primary">
                                    Data validation error
                                </div>
                                <div>
                                    <AlertTriangle className="w-8 h-8 text-primary" />
                                </div>
                            </div>
                            <div className="flex flex-col p-4 ">
                                {Object.keys(
                                    JSON.parse(farmerData?.validation_reason) ||
                                        {}
                                )?.map((key, index) => {
                                    let validation_reason = JSON.parse(
                                        farmerData?.validation_reason
                                    )[key];
                                    if (key === "status") return;
                                    return (
                                        <div
                                            className="flex space-x-2 items-center"
                                            key={index}
                                        >
                                            <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                            <span className="capitalize">
                                                {key.split("_").join(" ")} :{" "}
                                            </span>
                                            <span
                                                title="Duplicate farmer profile"
                                                onClick={() => {
                                                    navigate(
                                                        `${FARMER_PROFILE}/${validation_reason}`
                                                    );
                                                }}
                                                className="text-secondary cursor-pointer"
                                            >
                                                {validation_reason}
                                            </span>
                                        </div>
                                    );
                                })}
                            </div>
                        </Card>
                    </div>
                )}

            <div className="w-full h-full px-10">
                <Card>
                    <TabGroup>
                        <TabList className="">
                            <Tab icon={UserIcon}>Bio Data</Tab>
                            <Tab icon={MapIcon}>Farm</Tab>
                            <Tab icon={TabletIcon}>Community Pass</Tab>
                        </TabList>
                        <TabPanels>
                            <TabPanel>
                                <div className="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8">
                                    <FarmInfoCard
                                        title="Personal Information"
                                        subtitle="Farmer Personal Info"
                                        className="col-1"
                                    >
                                        <List className="mt-4 space-y-2">
                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Name
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.first_name}{" "}
                                                    {farmerData?.last_name}
                                                </Text>
                                            </ListItem>
                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                ID Number
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.id_number ? (
                                                        <span>
                                                            {
                                                                farmerData?.id_number
                                                            }
                                                        </span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>
                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Date of Birth
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.dob ? (
                                                        <span>
                                                            {farmerData?.dob}
                                                        </span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>

                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Sex
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.gender ? (
                                                        <span className="capitalize">
                                                            {farmerData?.gender}
                                                        </span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>

                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Marital Status
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.marital_status ? (
                                                        <span className="capitalize">
                                                            {
                                                                farmerData?.marital_status
                                                            }
                                                        </span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>

                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Education Level
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.education_level ? (
                                                        <span>
                                                            {
                                                                farmerData?.education_level
                                                            }
                                                        </span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>

                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Phone Number
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.phone_number ? (
                                                        <span>
                                                            {
                                                                farmerData?.phone_number
                                                            }
                                                        </span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>
                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Next of kin
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.next_of_kin ? (
                                                        <span>
                                                            {
                                                                farmerData?.next_of_kin
                                                            }
                                                        </span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>
                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Next of kin
                                                                contact
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.next_of_kin_contact ? (
                                                        <span>
                                                            {
                                                                farmerData?.next_of_kin_contact
                                                            }
                                                        </span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>
                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Next of kin
                                                                relationship
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.next_of_kin_relationship ? (
                                                        <span>
                                                            {
                                                                farmerData?.next_of_kin_relationship
                                                            }
                                                        </span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>

                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Account with FI
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.do_you_have_an_account_with_an_FI ? (
                                                        <span>
                                                            {
                                                                farmerData?.do_you_have_an_account_with_an_FI
                                                            }
                                                        </span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>
                                        </List>
                                    </FarmInfoCard>

                                    <div className="flex flex-col space-y-8">
                                        <FarmInfoCard
                                            title="Family Information"
                                            subtitle="Family Info"
                                            className="col-1"
                                        >
                                            <List className="mt-4 space-y-2">
                                                <ListItem className="">
                                                    <Flex
                                                        justifyContent="start"
                                                        className="truncate space-x-4 px-2"
                                                    >
                                                        <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                        <div className="truncate">
                                                            <Text className="truncate">
                                                                <Bold className="uppercase text-primary">
                                                                    Head of
                                                                    family
                                                                </Bold>
                                                            </Text>
                                                        </div>
                                                    </Flex>
                                                    <Text className="text-secondary">
                                                        {farmerData?.head_of_family ? (
                                                            <span>
                                                                {
                                                                    farmerData?.head_of_family
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span className="text-primary">
                                                                N/A
                                                            </span>
                                                        )}
                                                    </Text>
                                                </ListItem>
                                                <ListItem>
                                                    <Flex
                                                        justifyContent="start"
                                                        className="truncate space-x-4 px-2"
                                                    >
                                                        <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                        <div className="truncate">
                                                            <Text className="truncate">
                                                                <Bold className="uppercase text-primary">
                                                                    Male members
                                                                </Bold>
                                                            </Text>
                                                        </div>
                                                    </Flex>
                                                    <Text className="text-secondary">
                                                        {farmerData?.male_members_in_household ? (
                                                            <span>
                                                                {
                                                                    farmerData?.male_members_in_household
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span className="text-primary">
                                                                N/A
                                                            </span>
                                                        )}
                                                    </Text>
                                                </ListItem>

                                                <ListItem className="">
                                                    <Flex
                                                        justifyContent="start"
                                                        className="truncate space-x-4 px-2"
                                                    >
                                                        <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                        <div className="truncate">
                                                            <Text className="truncate">
                                                                <Bold className="uppercase text-primary">
                                                                    Female
                                                                    members in
                                                                    household{" "}
                                                                </Bold>
                                                            </Text>
                                                        </div>
                                                    </Flex>
                                                    <Text className="text-secondary">
                                                        {farmerData?.female_members_in_household ? (
                                                            <span>
                                                                {
                                                                    farmerData?.female_members_in_household
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span className="text-primary">
                                                                N/A
                                                            </span>
                                                        )}
                                                    </Text>
                                                </ListItem>
                                                <ListItem className="">
                                                    <Flex
                                                        justifyContent="start"
                                                        className="truncate space-x-4 px-2"
                                                    >
                                                        <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                        <div className="truncate">
                                                            <Text className="truncate">
                                                                <Bold className="uppercase text-primary">
                                                                    Members
                                                                    above 18
                                                                </Bold>
                                                            </Text>
                                                        </div>
                                                    </Flex>
                                                    <Text className="text-secondary">
                                                        {farmerData?.members_above_18 ? (
                                                            <span>
                                                                {
                                                                    farmerData?.members_above_18
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span className="text-primary">
                                                                N/A
                                                            </span>
                                                        )}
                                                    </Text>
                                                </ListItem>
                                                <ListItem className="">
                                                    <Flex
                                                        justifyContent="start"
                                                        className="truncate space-x-4 px-2"
                                                    >
                                                        <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                        <div className="truncate">
                                                            <Text className="truncate">
                                                                <Bold className="uppercase text-primary">
                                                                    Children
                                                                    below 5
                                                                </Bold>
                                                            </Text>
                                                        </div>
                                                    </Flex>
                                                    <Text className="text-secondary">
                                                        {farmerData?.children_below_5 ? (
                                                            <span>
                                                                {
                                                                    farmerData?.children_below_5
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span className="text-primary">
                                                                N/A
                                                            </span>
                                                        )}
                                                    </Text>
                                                </ListItem>
                                                <ListItem className="">
                                                    <Flex
                                                        justifyContent="start"
                                                        className="truncate space-x-4 px-2"
                                                    >
                                                        <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                        <div className="truncate">
                                                            <Text className="truncate">
                                                                <Bold className="uppercase text-primary">
                                                                    School going
                                                                    children
                                                                </Bold>
                                                            </Text>
                                                        </div>
                                                    </Flex>
                                                    <Text className="text-secondary">
                                                        {farmerData?.school_going_children ? (
                                                            <span>
                                                                {
                                                                    farmerData?.school_going_children
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span className="text-primary">
                                                                N/A
                                                            </span>
                                                        )}
                                                    </Text>
                                                </ListItem>
                                            </List>
                                        </FarmInfoCard>
                                    </div>
                                </div>
                            </TabPanel>

                            <TabPanel>
                                <div className="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8">
                                    <FarmInfoCard
                                        title="Farm Information"
                                        subtitle="Farm Info"
                                        className="col-1"
                                    >
                                        <List className="mt-4 space-y-2">
                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Type
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.type_of_farming ? (
                                                        <span className="capitalize">
                                                            {
                                                                farmerData?.type_of_farming
                                                            }
                                                        </span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>

                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Crops
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.crops_grown ? (
                                                        <span>
                                                            {
                                                                farmerData?.crops_grown
                                                            }
                                                        </span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>

                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Farm Size
                                                                (Acres)
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.farm_size ? (
                                                        <span>
                                                            {
                                                                farmerData?.farm_size
                                                            }
                                                        </span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>

                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Farm Size under
                                                                Agric (Acres)
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.farm_size_under_agriculture ? (
                                                        <span>
                                                            {
                                                                farmerData?.farm_size_under_agriculture
                                                            }
                                                        </span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>

                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Land Ownership
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.land_ownership ? (
                                                        <span className="capitalize">
                                                            {
                                                                farmerData?.land_ownership
                                                            }
                                                        </span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>

                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Animals Kept
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.animals_kept ? (
                                                        <span>
                                                            {
                                                                farmerData?.animals_kept
                                                            }
                                                        </span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>

                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Agricultural
                                                                Activities
                                                                Earnings
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {
                                                        // farmerData?.how_much_do_you_earn_from_agricultural_activities
                                                        farmerData?.how_much_do_you_earn_from_agricultural_activities ? (
                                                            <span>
                                                                {numberFormatter(
                                                                    parseFloat(
                                                                        farmerData?.how_much_do_you_earn_from_agricultural_activities
                                                                    )
                                                                )}
                                                            </span>
                                                        ) : (
                                                            <span className="text-primary">
                                                                N/A
                                                            </span>
                                                        )
                                                    }
                                                </Text>
                                            </ListItem>

                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Non Agricultural
                                                                Activities
                                                                Earnings
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {
                                                        // farmerData?.how_much_do_you_earn_from_agricultural_activities
                                                        farmerData?.how_much_do_you_earn_from_non_agricultural_activities ? (
                                                            <span>
                                                                {numberFormatter(
                                                                    parseFloat(
                                                                        farmerData?.how_much_do_you_earn_from_non_agricultural_activities
                                                                    )
                                                                )}
                                                            </span>
                                                        ) : (
                                                            <span className="text-primary">
                                                                N/A
                                                            </span>
                                                        )
                                                    }
                                                </Text>
                                            </ListItem>

                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Eastimated
                                                                Produce last
                                                                season
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.estimated_produce_value_last_season ? (
                                                        <span>
                                                            {numberFormatter(
                                                                parseFloat(
                                                                    farmerData?.estimated_produce_value_last_season
                                                                )
                                                            )}
                                                        </span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>

                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Eastimated
                                                                produce value
                                                                this season
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.estimated_produce_value_this_season ? (
                                                        <span>
                                                            {numberFormatter(
                                                                parseFloat(
                                                                    farmerData?.estimated_produce_value_this_season
                                                                )
                                                            )}
                                                        </span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>
                                        </List>
                                    </FarmInfoCard>

                                    <div className="flex flex-col space-y-4 relative">
                                        <FarmInfoCard
                                            title="Location Information"
                                            subtitle="Location Info"
                                            className="col-1"
                                        >
                                            <List className="mt-4 space-y-2">
                                                <ListItem className="">
                                                    <Flex
                                                        justifyContent="start"
                                                        className="truncate space-x-4 px-2"
                                                    >
                                                        <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                        <div className="truncate">
                                                            <Text className="truncate">
                                                                <Bold className="uppercase text-primary">
                                                                    District
                                                                </Bold>
                                                            </Text>
                                                        </div>
                                                    </Flex>
                                                    <Text className="text-secondary">
                                                        {farmerData?.district ? (
                                                            <span>
                                                                {
                                                                    farmerData?.district
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span className="text-primary">
                                                                N/A
                                                            </span>
                                                        )}
                                                    </Text>
                                                </ListItem>

                                                <ListItem className="">
                                                    <Flex
                                                        justifyContent="start"
                                                        className="truncate space-x-4 px-2"
                                                    >
                                                        <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                        <div className="truncate">
                                                            <Text className="truncate">
                                                                <Bold className="uppercase text-primary">
                                                                    County
                                                                </Bold>
                                                            </Text>
                                                        </div>
                                                    </Flex>
                                                    <Text className="text-secondary">
                                                        {farmerData?.county ? (
                                                            <span>
                                                                {
                                                                    farmerData?.county
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span className="text-primary">
                                                                N/A
                                                            </span>
                                                        )}
                                                    </Text>
                                                </ListItem>

                                                <ListItem className="">
                                                    <Flex
                                                        justifyContent="start"
                                                        className="truncate space-x-4 px-2"
                                                    >
                                                        <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                        <div className="truncate">
                                                            <Text className="truncate">
                                                                <Bold className="uppercase text-primary">
                                                                    Sub County
                                                                </Bold>
                                                            </Text>
                                                        </div>
                                                    </Flex>
                                                    <Text className="text-secondary">
                                                        {farmerData?.sub_county ? (
                                                            <span>
                                                                {
                                                                    farmerData?.sub_county
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span className="text-primary">
                                                                N/A
                                                            </span>
                                                        )}
                                                    </Text>
                                                </ListItem>

                                                <ListItem className="">
                                                    <Flex
                                                        justifyContent="start"
                                                        className="truncate space-x-4 px-2"
                                                    >
                                                        <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                        <div className="truncate">
                                                            <Text className="truncate">
                                                                <Bold className="uppercase text-primary">
                                                                    Parish
                                                                </Bold>
                                                            </Text>
                                                        </div>
                                                    </Flex>
                                                    <Text className="text-secondary">
                                                        {farmerData?.parish ? (
                                                            <span>
                                                                {
                                                                    farmerData?.parish
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span className="text-primary">
                                                                N/A
                                                            </span>
                                                        )}
                                                    </Text>
                                                </ListItem>

                                                <ListItem className="">
                                                    <Flex
                                                        justifyContent="start"
                                                        className="truncate space-x-4 px-2"
                                                    >
                                                        <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                        <div className="truncate">
                                                            <Text className="truncate">
                                                                <Bold className="uppercase text-primary">
                                                                    Village
                                                                </Bold>
                                                            </Text>
                                                        </div>
                                                    </Flex>
                                                    <Text className="text-secondary">
                                                        {farmerData?.village ? (
                                                            <span>
                                                                {
                                                                    farmerData?.village
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span className="text-primary">
                                                                N/A
                                                            </span>
                                                        )}
                                                    </Text>
                                                </ListItem>
                                            </List>
                                        </FarmInfoCard>
                                        <Card className="h-52 bottom-0  right-0 items-center justify-center bg-slate-50">
                                            <LocationOnMap
                                                data={{
                                                    latitude: parseFloat(
                                                        farmerData?.farmer_cordinates
                                                            ?.split(",")[0]
                                                            ?.trim()
                                                    ),
                                                    longitude: parseFloat(
                                                        farmerData?.farmer_cordinates
                                                            ?.split(",")[1]
                                                            ?.trim()
                                                    ),
                                                    title: "Farm Location",
                                                }}
                                            />
                                        </Card>
                                    </div>
                                </div>
                            </TabPanel>

                            <TabPanel>
                            <FarmInfoCard
                                        title="Community Pass Information"
                                        subtitle="CP Info"
                                        className="col-1"
                                    >
                                        <List className="mt-4 space-y-2">
                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Bio Token
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {parseInt(farmerData?.biometrics
                                                        ?.hasBiometricToken) ? (
                                                        <span>Present</span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>

                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Enrollment Status
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.biometrics
                                                        ?.enrollmentStatus ? (
                                                        <span>
                                                            {
                                                                farmerData
                                                                    ?.biometrics
                                                                    ?.enrollmentStatus
                                                            }
                                                        </span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>

                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Subject ID
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.biometrics
                                                        ?.subjectID ? (
                                                        <div className="flex items-center">
                                                            <span title="Copy" className="px-2">
                                                                <Copy
                                                                    onClick={() => {
                                                                        navigator.clipboard.writeText(
                                                                            farmerData
                                                                                ?.biometrics
                                                                                ?.subjectID
                                                                        );
                                                                        dispatch(
                                                                            setAppSuccessAlert(
                                                                                {
                                                                                    message:
                                                                                        "Subject ID Copied to Clipboard",
                                                                                }
                                                                            )
                                                                        );
                                                                    }}
                                                                    
                                                                    className="w-4 h-4 text-primary cursor-pointer hover:scale-125 "
                                                                />
                                                            </span>
                                                            <span>Present</span>
                                                            
                                                        </div>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>

                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Consent-ID
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.biometrics
                                                        ?.consentGUID ? (
                                                        <span>Present</span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>

                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                R-ID
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.biometrics?.rID ? (
                                                        <span>Present</span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>

                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Possible Duplicates
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.biometrics
                                                        ?.possible_duplicate ? (<div className="flex space-x-2 flex-wrap justify-end items-center">
                                                        {
                                                            bioDuplicates?.map(duplicate => {
                                                                return (
                                                                    <span className="text-primary text-center cursor-pointer underline" onClick={() => {
                                                                        navigate(
                                                                            `${FARMER_PROFILE}/${duplicate?.entityID}`
                                                                        );
                                                                    }}>
                                                                        {duplicate?.entityID}
                                                                    </span>
                                                                )
                                                            })
                                                        }</div>
                                                    ) : (
                                                        <span>No</span>
                                                    )}
                                                </Text>
                                            </ListItem>

                                            <ListItem className="">
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-4 px-2"
                                                >
                                                    <span className="w-1 h-1 bg-secondary rounded-full"></span>
                                                    <div className="truncate">
                                                        <Text className="truncate">
                                                            <Bold className="uppercase text-primary">
                                                                Data Captured By
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.data_captured_by ? (
                                                        <span
                                                            onClick={() => {
                                                                navigate(
                                                                    `${AGENT_PROFILE}/${farmerData?.agent?.agent_code}`
                                                                );
                                                            }}
                                                            className="cursor-pointer hover:text-primary"
                                                        >
                                                            {farmerData?.agent
                                                                ?.first_name +
                                                                " " +
                                                                farmerData?.agent
                                                                    ?.last_name}
                                                        </span>
                                                    ) : (
                                                        <span className="text-primary">
                                                            N/A
                                                        </span>
                                                    )}
                                                </Text>
                                            </ListItem>
                                        </List>
                                    </FarmInfoCard>
                            </TabPanel>
                        </TabPanels>
                    </TabGroup>
                </Card>
            </div>

            <div className="w-full grid grid-cols-2 py-6 px-10 gap-8"></div>
        </div>
    );

};

export default FarmerProfile;
