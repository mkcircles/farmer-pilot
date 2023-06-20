import { ArrowLeft, Disc } from "react-feather";
import { useNavigate } from "react-router-dom";
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
} from "@tremor/react";
import FarmInfoCard from "./FarmInfoCard";
import { HomeIcon } from "@heroicons/react/solid";
import { useParams } from "react-router";
import { useContext, useEffect, useState } from "react";
import axios from "axios";
import { API_KEY, BASE_API_URL } from "../../env";
import { AppContext } from "../../context/RootContext";

const FarmerProfile = () => {
    const navigate = useNavigate();
    const { updateAppContextState } = useContext(AppContext);
    const [farmerData, setFarmerData] = useState({});
    let { id } = useParams();

    useEffect(() => {
        updateAppContextState("loading", true);
        axios
            .get(`${BASE_API_URL}/farmer/${id}`, {
                headers: {
                    API_KEY: API_KEY,
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

    return (
        <div className="w-full h-full mt-6">
            <div className="w-full flex items-center space-x-4">
                <ArrowLeft onClick={() => navigate(-1)} />
                <Title>Farmer Profile</Title>
            </div>

            <div className="w-full grid grid-cols-2 py-6 px-10 gap-8">
                <FarmInfoCard
                    title="Personal Information"
                    subTitle="Farmer Personal Info"
                    className="col-2 col-span-2"
                >
                    <List className="mt-4">
                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Name</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>
                                {farmerData?.first_name} {farmerData?.last_name}
                            </Text>
                        </ListItem>
                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>ID Number</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.id_number}</Text>
                        </ListItem>
                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Date of Birth</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.dob}</Text>
                        </ListItem>
                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>FPO</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.fpo_name} </Text>
                        </ListItem>

                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Sex</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.gender}</Text>
                        </ListItem>

                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Marital Status</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.marital_status}</Text>
                        </ListItem>

                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Education Level</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.education_level}</Text>
                        </ListItem>

                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Phone Number</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.phone_number}</Text>
                        </ListItem>
                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Next of kin</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.next_of_kin}</Text>
                        </ListItem>
                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Next of kin contact</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.next_of_kin_contact}</Text>
                        </ListItem>
                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Next of kin relationship</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.next_of_kin_contact}</Text>
                        </ListItem>
                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Account with FI</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>
                                {farmerData?.do_you_have_an_account_with_an_FI}
                            </Text>
                        </ListItem>
                    </List>
                </FarmInfoCard>

                <FarmInfoCard
                    title="Farm Information"
                    subTitle="Farm Info"
                    className="col-1"
                >
                    <List className="mt-4">
                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Type</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.type_of_farming}</Text>
                        </ListItem>

                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Farm Coordinates</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.farmer_cordinates}</Text>
                        </ListItem>

                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>District</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.district}</Text>
                        </ListItem>

                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>County</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.county}</Text>
                        </ListItem>

                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Sub County</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.sub_county}</Text>
                        </ListItem>

                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Parish</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.parish}</Text>
                        </ListItem>

                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Village</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.village}</Text>
                        </ListItem>

                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Crops</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.crops_grown}</Text>
                        </ListItem>

                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Farm Size</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.farm_size}</Text>
                        </ListItem>

                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Farm Size under Agric</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>
                                {farmerData?.farm_size_under_agriculture}
                            </Text>
                        </ListItem>

                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Land Ownership</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.land_ownership}</Text>
                        </ListItem>

                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Animals Kept</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.animals_kept}</Text>
                        </ListItem>

                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>
                                            Agricultural Activities Earnings
                                        </Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>
                                {
                                    farmerData?.how_much_do_you_earn_from_agricultural_activities
                                }
                            </Text>
                        </ListItem>

                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>
                                            Non Agricultural Activities Earnings
                                        </Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>
                                {
                                    farmerData?.how_much_do_you_earn_from_non_agricultural_activities
                                }
                            </Text>
                        </ListItem>

                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>
                                            Eastimated Produce last season
                                        </Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>
                                {
                                    farmerData?.estimated_produce_value_last_season
                                }
                            </Text>
                        </ListItem>

                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>
                                            Eastimated produce value this season
                                        </Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>
                                {
                                    farmerData?.estimated_produce_value_this_season
                                }
                            </Text>
                        </ListItem>
                    </List>
                </FarmInfoCard>

                <FarmInfoCard
                    title="Family Information"
                    subTitle="Family Info"
                    className="col-1"
                >
                    <List className="mt-4">
                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Head of family</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.head_of_family}</Text>
                        </ListItem>
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Male members</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.male_members_in_household}</Text>
                        </ListItem>

                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>
                                            Female members in household{" "}
                                        </Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>
                                {farmerData?.female_members_in_household}
                            </Text>
                        </ListItem>
                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Members above 18</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.members_above_18}</Text>
                        </ListItem>
                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Children below 5</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.children_below_5}</Text>
                        </ListItem>
                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>School going children</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.school_going_children}</Text>
                        </ListItem>
                    </List>
                </FarmInfoCard>

                <FarmInfoCard
                    title="Community Pass Information"
                    subTitle="CP Info"
                    className="col-1"
                >
                    <List className="mt-4">
                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Consumer Device ID</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.consumerDeviceId}</Text>
                        </ListItem>
                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>R_ID</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.rId}</Text>
                        </ListItem>
                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-primary rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Data Captured By</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>{farmerData?.data_captured_by}</Text>
                        </ListItem>
                    </List>
                </FarmInfoCard>
            </div>
        </div>
    );
};

export default FarmerProfile;
