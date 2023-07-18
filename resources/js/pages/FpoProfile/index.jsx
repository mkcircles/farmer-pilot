import {
    ProgressBar,
    Card,
    Flex,
    Text,
    Metric,
    TabList,
    Tab,
    TabGroup,
    TabPanels,
    TabPanel,
    List,
    ListItem,
    BadgeDelta,
    Bold,
    Grid,
} from "@tremor/react";
import { UserGroupIcon, UserIcon } from "@heroicons/react/solid";
import Lucide from "../../base-components/Lucide";
import Button from "../../base-components/Button";
import _ from "lodash";
import { useContext, useEffect, useState } from "react";
import { AppContext } from "../../context/RootContext";
import { useSelector } from "react-redux";
import { useNavigate, useParams } from "react-router-dom";
import { BASE_API_URL } from "../../env";
import FarmersList from "../FarmersList";
import { EDIT_AGENT, EDIT_FPO } from "../../router/routes";
import AgentsList from "../AgentsList";
import { numberFormatter } from "../../utils/numberFormatter";
import FpoAdminList from "../FpoAdminList";

function Main() {
    const navigate = useNavigate();
    const token = useSelector((state) => state.auth.token);
    const { updateAppContextState } = useContext(AppContext);
    const [fpo, setFpoData] = useState(null);
    let { id } = useParams();

    useEffect(() => {
        updateAppContextState("loading", true);
        axios
            .get(`${BASE_API_URL}/fpo/${id}`, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then(({ data: res }) => {
                console.log("FPO Data", res.data);
                if (res?.data) {
                    setFpoData(res?.data);
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
            <div className="flex flex-col items-center mt-8 intro-y sm:flex-row">
                <h2 className="flex items-center mr-auto text-lg font-medium">
                    {fpo?.fpo_name}
                </h2>
                <div className="flex w-full mt-4 sm:w-auto sm:mt-0">
                    <Button
                        onClick={() => {
                            navigate(EDIT_FPO, {
                                state: {
                                    fpo,
                                },
                            });
                        }}
                        variant="primary"
                        className="mr-2 shadow-md"
                    >
                        <Lucide icon="Pencil" className="w-4 h-4 mr-2" /> Update
                        Profile
                    </Button>
                    {/* <Button variant="outline-secondary" className="shadow-md">
            <Lucide icon="Download" className="w-4 h-4 mr-2" /> View Profile
          </Button> */}
                </div>
            </div>
            <div className="grid grid-cols-12 gap-5 mt-5">
                {/* BEGIN: Profile Cover */}
                <div className="col-span-12">
                    <div className="px-3 lg:pt-0 md:pt-3 box intro-y">
                        <div className="lg:flex sm:block flex-col items-center justify-center lg:items-start lg:justify-between text-center lg:flex-row lg:text-left py-4 lg:py-6">
                            <div className="md:flex flex-col border-dashed px-2 space-y-2">
                                <div className="w-fit sm:w-full  flex items-center mr-8">
                                    <Lucide
                                        icon="MapPin"
                                        className="w-4 h-4 mr-2"
                                    />{" "}
                                    {fpo?.district}, UG
                                </div>
                                <div className="w-fit sm:w-full flex items-center mr-8 opacity-70">
                                    <span className="w-4 h-4 mr-2" />
                                    {fpo?.county} - {fpo?.sub_county}
                                </div>
                                <div className="w-fit sm:w-full flex items-center mr-8 opacity-70">
                                    <span className="w-4 h-4 mr-2" />
                                    {fpo?.parish} - {fpo?.village}
                                </div>

                                {/* <div className="grid mt-2 h-20 grid-cols-2 px-10 mx-auto mb-6 border-dashed gap-y-2 md:gap-y-0 lg:border-l  border-slate-200 lg:mb-0">
                                    <div className="flex items-center justify-center col-span-2 md:col-span-1 lg:justify-start">
                                        
                                        <Lucide
                                            icon="Phone"
                                            className="w-4 h-4 mr-2"
                                        />
                                        {fpo?.contact_phone_number}
                                    </div> 

                                    <div className="flex items-center justify-center col-span-2 md:col-span-1 lg:justify-start">
                                        <Lucide
                                            icon="User"
                                            className="w-4 h-4 mr-2"
                                        />
                                        {fpo?.fpo_contact_name}
                                    </div>
                                </div>

                                <div className="grid mt-2 h-20 grid-cols-2 px-10 mx-auto mb-6 border-dashed gap-y-2 md:gap-y-0 lg:border-l border-slate-200 lg:mb-0">
                                    <div className="flex items-center justify-center col-span-2 md:col-span-1 lg:justify-start">
                                        <Lucide
                                            icon="Phone"
                                            className="w-4 h-4 mr-2"
                                        />
                                        {fpo?.contact_phone_number}
                                    </div>

                                    <div className="flex items-center justify-center col-span-2 md:col-span-1 lg:justify-start">
                                        <Lucide
                                            icon="User"
                                            className="w-4 h-4 mr-2"
                                        />
                                        {fpo?.fpo_contact_name}
                                    </div>
                                </div> */}
                            </div>

                            <div className="md:flex flex-col border-dashed lg:border-l px-4 md:mt-0 mt-4 md:px-10 space-y-2">
                                <span className="w-fit sm:w-full flex items-center mr-8">
                                    <Lucide
                                        icon="User"
                                        className="w-4 h-4 mr-2"
                                    />
                                    {fpo?.fpo_contact_name}
                                </span>
                                <span className="w-fit flex items-center mr-8">
                                    <Lucide
                                        icon="Phone"
                                        className="w-4 h-4 mr-2"
                                    />
                                    {fpo?.contact_phone_number}
                                </span>
                                <span className="w-fit flex items-center mr-8">
                                    <Lucide
                                        icon="Mail"
                                        className="w-4 h-4 mr-2"
                                    />
                                    {fpo?.contact_email}
                                </span>

                                {/* <div className="grid mt-2 h-20 grid-cols-2 px-10 mx-auto mb-6 border-dashed gap-y-2 md:gap-y-0 lg:border-l  border-slate-200 lg:mb-0">
                                    <div className="flex items-center justify-center col-span-2 md:col-span-1 lg:justify-start">
                                        
                                        <Lucide
                                            icon="Phone"
                                            className="w-4 h-4 mr-2"
                                        />
                                        {fpo?.contact_phone_number}
                                    </div> 

                                    <div className="flex items-center justify-center col-span-2 md:col-span-1 lg:justify-start">
                                        <Lucide
                                            icon="User"
                                            className="w-4 h-4 mr-2"
                                        />
                                        {fpo?.fpo_contact_name}
                                    </div>
                                </div>

                                <div className="grid mt-2 h-20 grid-cols-2 px-10 mx-auto mb-6 border-dashed gap-y-2 md:gap-y-0 lg:border-l border-slate-200 lg:mb-0">
                                    <div className="flex items-center justify-center col-span-2 md:col-span-1 lg:justify-start">
                                        <Lucide
                                            icon="Phone"
                                            className="w-4 h-4 mr-2"
                                        />
                                        {fpo?.contact_phone_number}
                                    </div>

                                    <div className="flex items-center justify-center col-span-2 md:col-span-1 lg:justify-start">
                                        <Lucide
                                            icon="User"
                                            className="w-4 h-4 mr-2"
                                        />
                                        {fpo?.fpo_contact_name}
                                    </div>
                                </div> */}
                            </div>

                            <div className="md:flex flex-col border-dashed lg:border-l px-4 md:mt-0 mt-4 md:px-10 space-y-2">
                                <div className="w-fit sm:w-full  flex items-center mr-8">
                                    <span className="opacity-70">
                                        Main crop :&nbsp;
                                    </span>
                                    <span>{fpo?.main_crop}</span>
                                </div>
                                <div className="w-fit sm:w-full  flex items-center mr-8">
                                    <span className="opacity-70">
                                        Core staff : &nbsp;
                                    </span>
                                    <span>{fpo?.core_staff_count}</span>
                                </div>
                                <div className="w-fit sm:w-full  flex items-center mr-8">
                                    <span className="opacity-70">
                                        Registration status : &nbsp;
                                    </span>
                                    <span>{fpo?.registration_status}</span>
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

            {/* <Grid numItemsSm={1} numItemsLg={1} className="gap-6 my-4">
                <Card>
                    <Text>Members</Text>
                    <Metric>
                        {numberFormatter(parseInt(fpo?.fpo_membership_number))}
                    </Metric>
                    <Flex className="mt-6">
                        <Text>
                            <Bold>Stats</Bold>
                        </Text>
                        <Text>
                            <Bold></Bold>
                        </Text>
                    </Flex>
                    <List className="mt-1">
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">Female</Text>
                            </Flex>
                            <Text>
                                {numberFormatter(
                                    parseInt(fpo?.fpo_female_membership)
                                )}
                            </Text>
                        </ListItem>
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">Female Youth</Text>
                            </Flex>
                            <Text>
                                {numberFormatter(
                                    parseInt(fpo?.fpo_female_youth)
                                )}
                            </Text>
                        </ListItem>
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">Male Youth</Text>
                            </Flex>
                            <Text>
                                {numberFormatter(parseInt(fpo?.fpo_male_youth))}
                            </Text>
                        </ListItem>
                    </List>
                </Card>
                
            </Grid> */}

            <div className="w-full h-full mt-4">
                <Card>
                    <TabGroup>
                        <TabList className="">
                            <Tab icon={UserGroupIcon}>Farmers</Tab>
                            <Tab icon={UserGroupIcon}>Agents</Tab>
                            <Tab icon={UserIcon}>FPO Admins</Tab>
                            <Tab icon={UserGroupIcon}>Members</Tab>
                        </TabList>
                        <TabPanels>
                            <TabPanel>
                                <FarmersList fpo_id={id} />
                            </TabPanel>
                            <TabPanel>
                                <AgentsList fpo_id={id} />
                            </TabPanel>
                            <TabPanel>
                                <FpoAdminList fpo_id={id} />
                            </TabPanel>
                            <TabPanel>
                                <Grid
                                    numItemsSm={1}
                                    numItemsLg={2}
                                    className="gap-6 my-4"
                                >
                                    <Card>
                                        <Text>Members</Text>
                                        <Metric>
                                            <span className="text-secondary">
                                            {numberFormatter(
                                                parseInt(
                                                    fpo?.fpo_membership_number
                                                )
                                            )}
                                            </span>
                                            
                                        </Metric>
                                        <Flex className="mt-6">
                                            <Text>
                                                <Bold>Stats</Bold>
                                            </Text>
                                            <Text>
                                                <Bold></Bold>
                                            </Text>
                                        </Flex>
                                        <List className="mt-1">
                                            <ListItem>
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-2.5"
                                                >
                                                    <Text className="truncate">
                                                        Female
                                                    </Text>
                                                </Flex>
                                                <Text>
                                                    {numberFormatter(
                                                        parseInt(
                                                            fpo?.fpo_female_membership
                                                        )
                                                    )}
                                                </Text>
                                            </ListItem>
                                            <ListItem>
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-2.5"
                                                >
                                                    <Text className="truncate">
                                                        Female Youth
                                                    </Text>
                                                </Flex>
                                                <Text>
                                                    {numberFormatter(
                                                        parseInt(
                                                            fpo?.fpo_female_youth
                                                        )
                                                    )}
                                                </Text>
                                            </ListItem>
                                            <ListItem>
                                                <Flex
                                                    justifyContent="start"
                                                    className="truncate space-x-2.5"
                                                >
                                                    <Text className="truncate">
                                                        Male Youth
                                                    </Text>
                                                </Flex>
                                                <Text>
                                                    {numberFormatter(
                                                        parseInt(
                                                            fpo?.fpo_male_youth
                                                        )
                                                    )}
                                                </Text>
                                            </ListItem>
                                        </List>
                                    </Card>
                                    {/* <Card>
                    <Text>Farmers</Text>
                    <Metric>
                        {numberFormatter(parseInt(fpo?.fpo_membership_number))}
                    </Metric>
                    <Flex className="mt-6">
                        <Text>
                            <Bold>Stats</Bold>
                        </Text>
                        <Text>
                            <Bold></Bold>
                        </Text>
                    </Flex>
                    <List className="mt-1">
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">Female</Text>
                            </Flex>
                            <Text>
                                {numberFormatter(
                                    parseInt(fpo?.fpo_female_membership)
                                )}
                            </Text>
                        </ListItem>
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">Female Youth</Text>
                            </Flex>
                            <Text>
                                {numberFormatter(
                                    parseInt(fpo?.fpo_female_youth)
                                )}
                            </Text>
                        </ListItem>
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">Male Youth</Text>
                            </Flex>
                            <Text>
                                {numberFormatter(parseInt(fpo?.fpo_male_youth))}
                            </Text>
                        </ListItem>
                    </List>
                </Card> */}

                                    {/* <Card>
                    <Text>Agents</Text>
                    <Metric>
                        {numberFormatter(parseInt(fpo?.fpo_membership_number))}
                    </Metric>
                    <Flex className="mt-6">
                        <Text>
                            <Bold>Stats</Bold>
                        </Text>
                        <Text>
                            <Bold></Bold>
                        </Text>
                    </Flex>
                    <List className="mt-1">
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">Female</Text>
                            </Flex>
                            <Text>
                                {numberFormatter(
                                    parseInt(fpo?.fpo_female_membership)
                                )}
                            </Text>
                        </ListItem>
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">Female Youth</Text>
                            </Flex>
                            <Text>
                                {numberFormatter(
                                    parseInt(fpo?.fpo_female_youth)
                                )}
                            </Text>
                        </ListItem>
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">Male Youth</Text>
                            </Flex>
                            <Text>
                                {numberFormatter(parseInt(fpo?.fpo_male_youth))}
                            </Text>
                        </ListItem>
                    </List>
                </Card> */}
                                </Grid>
                            </TabPanel>
                        </TabPanels>
                    </TabGroup>
                </Card>
            </div>
        </>
    );
}

export default Main;
