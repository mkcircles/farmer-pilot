import {
    Card,
    Metric,
    Text,
    Icon,
    Flex,
    Grid,
    List,
    ListItem,
    Bold,
} from "@tremor/react";
import { UserGroupIcon, HomeIcon } from "@heroicons/react/solid";
import { numberFormatter } from "../../utils/numberFormatter";
import { BASE_API_URL } from "../../env";
import { useState, useEffect, useContext } from "react";
import { AppContext } from "../../context/RootContext";
import { useSelector } from "react-redux";

const Dashboard = () => {
    const token = useSelector((state) => state.auth.token);
    const { updateAppContextState } = useContext(AppContext);

    const [stats, setStats] = useState({});

    const fetchStats = (url = `${BASE_API_URL}/summary`) => {
        updateAppContextState("loading", true);
        axios
            .get(url, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((res) => {
                console.log("Stats Data", res?.data);
                let resData = res?.data;
                if (res?.data) {
                    setStats(resData);
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
        fetchStats();
    }, []);

    const { fpo_stats, system_stats } = stats;

    return (
        <div className="my-4">
            <Grid numItemsSm={2} numItemsLg={3} className="gap-6 my-4">
                <Card className="sm:col-span-2 lg:col-span-3">
                    <Text>FPOs</Text>
                    <Metric className="text-secondary">
                        {numberFormatter(parseInt(system_stats?.total_fpos))}
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
                                    Total membership
                                </Text>
                            </Flex>
                            <Text>
                                {numberFormatter(
                                    parseInt(fpo_stats?.total_fpos_membership)
                                )}
                            </Text>
                        </ListItem>
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">
                                    Registered FPOs
                                </Text>
                            </Flex>
                            <Text>
                                {numberFormatter(
                                    parseInt(fpo_stats?.total_registered_fpos)
                                )}
                            </Text>
                        </ListItem>
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">
                                    Unregistered FPOs
                                </Text>
                            </Flex>
                            <Text>
                                {numberFormatter(
                                    parseInt(fpo_stats?.total_unregistered_fpos)
                                )}
                            </Text>
                        </ListItem>
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">Female</Text>
                            </Flex>
                            <Text>
                                {numberFormatter(
                                    parseInt(fpo_stats?.total_female_membership)
                                )}
                            </Text>
                        </ListItem>
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">Male</Text>
                            </Flex>
                            <Text>
                                {numberFormatter(
                                    parseInt(fpo_stats?.total_male_membership)
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
                                    parseInt(
                                        fpo_stats?.total_female_youth_membership
                                    )
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
                                {numberFormatter(
                                    parseInt(
                                        fpo_stats?.total_male_youth_membership
                                    )
                                )}
                            </Text>
                        </ListItem>
                    </List>
                </Card>

                <Card>
                    <Text>Farmers</Text>
                    <Metric className="text-secondary">
                        {numberFormatter(parseInt(system_stats?.total_farmers))}
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
                                    parseInt(system_stats?.female_farmers)
                                )}
                            </Text>
                        </ListItem>
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">Male</Text>
                            </Flex>
                            <Text>
                                {numberFormatter(
                                    parseInt(system_stats?.male_farmers)
                                )}
                            </Text>
                        </ListItem>
                    </List>
                </Card>

                <Card>
                    <Text>Agents</Text>
                    <Metric className="text-secondary">
                        {numberFormatter(parseInt(system_stats?.total_agents))}
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
                                    parseInt(system_stats?.female_agents)
                                )}
                            </Text>
                        </ListItem>
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">Male</Text>
                            </Flex>
                            <Text>
                                {numberFormatter(
                                    parseInt(system_stats?.male_agents)
                                )}
                            </Text>
                        </ListItem>
                    </List>
                </Card>
            </Grid>
        </div>
    );
};

export default Dashboard;
