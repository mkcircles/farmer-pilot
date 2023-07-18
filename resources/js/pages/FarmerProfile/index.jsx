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
} from "@tremor/react";
import FarmInfoCard from "./FarmInfoCard";
import { HomeIcon, UserGroupIcon } from "@heroicons/react/solid";
import { useParams } from "react-router";
import { useContext, useEffect, useState } from "react";
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

const FarmerProfile = () => {
    const navigate = useNavigate();
    const token = useSelector((state) => state.auth.token);
    const fpos = useSelector((state) => state.fpos?.fpos);
    const { updateAppContextState } = useContext(AppContext);
    const [farmerData, setFarmerData] = useState({});
    const [fpoName, setFpoName] = useState("");
    let { id } = useParams();

    useEffect(() => {
        updateAppContextState("loading", true);
        axios
            .get(`${BASE_API_URL}/farmer/${id}`, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((res) => {
                console.log("Farmer Data", res.data);
                if (res?.data) {
                    setFarmerData(res?.data);
                }
            })
            .catch((err) => {
                console.log(err);
            })
            .finally(() => {
                updateAppContextState("loading", false);
            });
    }, [id]);

    useEffect(() => {
        if (farmerData?.fpo_id) {
            setFpoName(
                fpos?.find((fpo) => fpo?.id == farmerData?.fpo_id)?.fpo_name
            );
        }
    }, [farmerData]);

    return (
        <div className="w-full h-full mt-6">
            <div className="w-full flex items-center space-x-4">
                <ArrowLeft onClick={() => navigate(-1)} />
                <Title>
                    {farmerData?.first_name} {farmerData?.last_name} Profile
                </Title>
            </div>

            <div className="w-full h-fit relative py-4 grid grid-cols-12 px-10 gap-8 mx-auto">
                <div className="flex justify-center items-center w-full col-span-12 lg:col-span-4 rounded-md bg-white">
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
                                <span className="flex items-center">
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
                                <span className="flex items-center">
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
                                <span className="flex items-center">
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
            </div>

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
                                        subTitle="Farmer Personal Info"
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
                                                        <span>_</span>
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
                                                        <span>_</span>
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
                                                        <span>
                                                            {farmerData?.gender}
                                                        </span>
                                                    ) : (
                                                        <span>_</span>
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
                                                        <span>
                                                            {
                                                                farmerData?.marital_status
                                                            }
                                                        </span>
                                                    ) : (
                                                        <span>_</span>
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
                                                        <span>_</span>
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
                                                        <span>_</span>
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
                                                        <span>_</span>
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
                                                        <span>_</span>
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
                                                        <span>_</span>
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
                                                        <span>_</span>
                                                    )}
                                                </Text>
                                            </ListItem>
                                        </List>
                                    </FarmInfoCard>

                                    <div className="flex flex-col space-y-8">
                                        <FarmInfoCard
                                            title="Family Information"
                                            subTitle="Family Info"
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
                                                            <span>_</span>
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
                                                            <span>_</span>
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
                                                            <span>_</span>
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
                                                            <span>_</span>
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
                                                            <span>_</span>
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
                                                            <span>_</span>
                                                        )}
                                                    </Text>
                                                </ListItem>
                                            </List>
                                        </FarmInfoCard>

                                        <FarmInfoCard
                                            title="Community Pass Information"
                                            subTitle="CP Info"
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
                                                                    Consumer
                                                                    Device ID
                                                                </Bold>
                                                            </Text>
                                                        </div>
                                                    </Flex>
                                                    <Text className="text-secondary">
                                                        {farmerData?.consumerDeviceId ? (
                                                            <span>
                                                                {
                                                                    farmerData?.consumerDeviceId
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span>_</span>
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
                                                                    R_ID
                                                                </Bold>
                                                            </Text>
                                                        </div>
                                                    </Flex>
                                                    <Text className="text-secondary">
                                                        {farmerData?.rId ? (
                                                            <span>
                                                                {
                                                                    farmerData?.rId
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span>_</span>
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
                                                                    Data
                                                                    Captured By
                                                                </Bold>
                                                            </Text>
                                                        </div>
                                                    </Flex>
                                                    <Text className="text-secondary">
                                                        {farmerData?.data_captured_by ? (
                                                            <span>
                                                                {
                                                                    farmerData?.data_captured_by
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span>_</span>
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
                                        subTitle="Farm Info"
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
                                                    {
                                                        farmerData?.type_of_farming ? (
                                                            <span>
                                                                {
                                                                    farmerData?.type_of_farming
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span>_</span>
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
                                                            <span>_</span>
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
                                                            <span>_</span>
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
                                                    {
                                                        farmerData?.farm_size_under_agriculture ? (
                                                            <span>
                                                                {
                                                                    farmerData?.farm_size_under_agriculture
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span>_</span>
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
                                                                Land Ownership
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {farmerData?.land_ownership ? (
                                                            <span>
                                                                {
                                                                    farmerData?.land_ownership
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span>_</span>
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
                                                            <span>_</span>
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
                                                                {
                                                                    numberFormatter(parseFloat(farmerData?.how_much_do_you_earn_from_agricultural_activities))
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span>_</span>
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
                                                                {
                                                                    numberFormatter(parseFloat(farmerData?.how_much_do_you_earn_from_non_agricultural_activities))
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span>_</span>
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
                                                    {
                                                        farmerData?.estimated_produce_value_last_season ? (
                                                            <span>
                                                                {
                                                                    numberFormatter(parseFloat(farmerData?.estimated_produce_value_last_season))
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span>_</span>
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
                                                                produce value
                                                                this season
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {
                                                        farmerData?.estimated_produce_value_this_season ? (
                                                            <span>
                                                                {
                                                                    numberFormatter(parseFloat(farmerData?.estimated_produce_value_this_season))
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span>_</span>
                                                        )
                                                        
                                                    }
                                                </Text>
                                            </ListItem>
                                        </List>
                                    </FarmInfoCard>

                                    <FarmInfoCard
                                        title="Location Information"
                                        subTitle="Location Info"
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
                                                                Farm Coordinates
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {
                                                        farmerData?.farmer_cordinates ? (
                                                            <span>
                                                                {
                                                                    farmerData?.farmer_cordinates
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span>_</span>
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
                                                                District
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {
                                                        farmerData?.district ? (
                                                            <span>
                                                                {
                                                                    farmerData?.district
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span>_</span>
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
                                                                County
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {
                                                        farmerData?.county ? (
                                                            <span>
                                                                {
                                                                    farmerData?.county
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span>_</span>
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
                                                                Sub County
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {
                                                        farmerData?.sub_county ? (
                                                            <span>
                                                                {
                                                                    farmerData?.sub_county
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span>_</span>
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
                                                                Parish
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {
                                                        farmerData?.parish ? (
                                                            <span>
                                                                {
                                                                    farmerData?.parish
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span>_</span>
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
                                                                Village
                                                            </Bold>
                                                        </Text>
                                                    </div>
                                                </Flex>
                                                <Text className="text-secondary">
                                                    {
                                                        farmerData?.village ? (
                                                            <span>
                                                                {
                                                                    farmerData?.village
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span>_</span>
                                                        )
                                                        
                                                    }
                                                </Text>
                                            </ListItem>
                                        </List>
                                    </FarmInfoCard>
                                </div>
                            </TabPanel>

                            <TabPanel>
                                <FarmInfoCard
                                    title="Community Pass Information"
                                    subTitle="CP Info"
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
                                                            Consumer Device ID
                                                        </Bold>
                                                    </Text>
                                                </div>
                                            </Flex>
                                            <Text className="text-secondary">
                                                    {
                                                        farmerData?.consumerDeviceId ? (
                                                            <span>
                                                                {
                                                                    farmerData?.consumerDeviceId
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span>_</span>
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
                                                            R_ID
                                                        </Bold>
                                                    </Text>
                                                </div>
                                            </Flex>
                                            <Text className="text-secondary">
                                                    {
                                                        farmerData?.rId ? (
                                                            <span>
                                                                {
                                                                    farmerData?.rId
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span>_</span>
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
                                                            Data Captured By
                                                        </Bold>
                                                    </Text>
                                                </div>
                                            </Flex>
                                            
                                            <Text className="text-secondary">
                                                    {
                                                        farmerData?.data_captured_by ? (
                                                            <span>
                                                                {
                                                                    farmerData?.data_captured_by
                                                                }
                                                            </span>
                                                        ) : (
                                                            <span>_</span>
                                                        )
                                                        
                                                    }
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

    return (
        <>
            <div className="w-full py-5 text-2xl font-bold">
                {farmerData?.first_name + " " + farmerData?.last_name}
            </div>
            <Grid numItemsSm={1} numItemsLg={4} className="gap-6 my-4">
                <div className="col-span-1 h-40 p-4 flex justify-center items-center bg-gray-200">
                    {/* <img className="bg-slate-100" alt="Profile Photo" src={`https://ui-avatars.com/api/?background=random&size=128&name=${farmerData?.first_name}+${farmerData?.last_name}`} /> */}
                    <UserIcon className="h-full w-auto p-2 rounded-full border-2 border-primary" />
                </div>
                <Grid
                    numItemsSm={1}
                    numItemsLg={2}
                    className="gap-6 my-4 col-span-3"
                >
                    <div className="flex flex-col">
                        <div className="w-full flex space-x-4">
                            <span>FPO</span>
                            <span>{farmerData?.fpo_name || "Not set"}</span>
                        </div>
                        <div className="w-full flex space-x-4">
                            <span>FPO</span>
                            <span>{farmerData?.fpo_name || "Not set"}</span>
                        </div>
                        <div className="w-full flex space-x-4">
                            <span>SEX</span>
                            <span>{farmerData?.gender || "Not set"}</span>
                        </div>
                        <div className="w-full flex space-x-4">
                            <span>Marital status</span>
                            <span>
                                {farmerData?.marital_status || "Not set"}
                            </span>
                        </div>
                        <div className="w-full flex space-x-4">
                            <span>Education Level</span>
                            <span>
                                {farmerData?.marital_status || "Not set"}
                            </span>
                        </div>

                        <div className="w-full flex space-x-4">
                            <span>Next of Kin</span>
                            <span>
                                {farmerData?.marital_status || "Not set"}
                            </span>
                        </div>
                    </div>
                    <div className="flex flex-col">
                        <div className="w-full flex space-x-4">
                            <span>Phone Number</span>
                            <span>
                                {farmerData?.marital_status || "Not set"}
                            </span>
                        </div>
                        <div className="w-full flex space-x-4">
                            <span>Account with FI</span>
                            <span>
                                {farmerData?.marital_status || "Not set"}
                            </span>
                        </div>
                    </div>
                </Grid>
            </Grid>

            {/* <div className="w-full h-full">
                <Card>
                    
                    <TabGroup>
                        <TabList className="">
                            <Tab icon={UserGroupIcon}>Info</Tab>
                            <Tab icon={UserGroupIcon}>Farm</Tab>
                            <Tab icon={UserIcon}>Family</Tab>
                            <Tab icon={UserIcon}>Community Pass</Tab>
                        </TabList>
                        <TabPanels>
                            <TabPanel></TabPanel>
                            <TabPanel></TabPanel>
                            <TabPanel></TabPanel>
                            <TabPanel></TabPanel>
                        </TabPanels>
                    </TabGroup>
                </Card>
            </div> */}
        </>
    );
};

export default FarmerProfile;
