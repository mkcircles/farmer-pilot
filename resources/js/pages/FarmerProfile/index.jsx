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

const FarmerProfile = () => {
    const navigate = useNavigate();

    return (
        <div className="w-full h-full">
            <div className="w-full flex items-center space-x-4">
                <ArrowLeft onClick={() => navigate(-1)} />
                <Title>Farmer Profile</Title>
            </div>

            <div className="w-full grid grid-cols-2 py-6 px-10 gap-8">
                <FarmInfoCard
                    title="Personal Information"
                    subTitle="Farmer Personal Info"
                    className="col-1"
                >
                    <List className="mt-4">
                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-blue-600 rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Name</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>Eric Kalujja</Text>
                        </ListItem>
                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-blue-600 rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Sex</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>Male</Text>
                        </ListItem>
                        <ListItem className="">
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-4 px-2"
                            >
                                <span className="w-1 h-1 bg-blue-600 rounded-full"></span>
                                <div className="truncate">
                                    <Text className="truncate">
                                        <Bold>Phone Number</Bold>
                                    </Text>
                                </div>
                            </Flex>
                            <Text>256776017168</Text>
                        </ListItem>
                    </List>
                </FarmInfoCard>
                <Card className="col-1">
                    <div>Farm Information</div>
                </Card>

                <Card className="col-1">
                    <div>Family Information</div>
                </Card>
                <Card className="col-1">
                    <div>CP Card Information</div>
                </Card>
            </div>
        </div>
    );
};

export default FarmerProfile;
