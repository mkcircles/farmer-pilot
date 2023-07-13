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
    CategoryBar,
    Legend,
} from "@tremor/react";
import {
    UserGroupIcon,
    HomeIcon,
    InformationCircleIcon,
} from "@heroicons/react/solid";
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
            <Grid numItemsSm={2} numItemsLg={4} className="gap-6">
                <Card decoration="top" decorationColor="orange">
                    <Flex justifyContent="start" className="space-x-4">
                        <Icon
                            icon={HomeIcon}
                            variant="light"
                            size="xl"
                            color="orange"
                        />
                        <div className="truncate">
                            <Text>FPOs</Text>
                            <Metric className="truncate">
                                {numberFormatter(
                                    parseInt(system_stats?.total_fpos)
                                )}
                            </Metric>
                        </div>
                    </Flex>
                </Card>

                <Card decoration="top" decorationColor="orange">
                    <Flex justifyContent="start" className="space-x-4">
                        <Icon
                            icon={InformationCircleIcon}
                            variant="light"
                            size="xl"
                            color="orange"
                        />
                        <div className="truncate">
                            <Text>Registered FPOs</Text>
                            <Metric className="truncate">
                                {numberFormatter(
                                    parseInt(fpo_stats?.total_registered_fpos)
                                )}
                            </Metric>
                        </div>
                    </Flex>
                </Card>

                <Card decoration="top" decorationColor="orange">
                    <Flex justifyContent="start" className="space-x-4">
                        <Icon
                            icon={InformationCircleIcon}
                            variant="light"
                            size="xl"
                            color="orange"
                        />
                        <div className="truncate">
                            <Text>Unregistered FPOs</Text>
                            <Metric className="truncate">
                                {numberFormatter(
                                    parseInt(fpo_stats?.total_unregistered_fpos)
                                )}
                            </Metric>
                        </div>
                    </Flex>
                </Card>
                <Card decoration="top" decorationColor="orange">
                    <Flex justifyContent="start" className="space-x-4">
                        <Icon
                            icon={UserGroupIcon}
                            variant="light"
                            size="xl"
                            color="orange"
                        />
                        <div className="truncate">
                            <Text>Agents</Text>
                            <Metric className="truncate">
                                {numberFormatter(
                                    parseInt(system_stats?.total_agents)
                                )}
                            </Metric>
                        </div>
                    </Flex>
                </Card>
            </Grid>

            <Grid numItemsSm={1} numItemsLg={2} className="gap-6 py-6">
                <Card className="">
                    <Card>
                        <Text>FPOs Total Membership</Text>
                        <Metric>
                            {numberFormatter(
                                parseInt(fpo_stats?.total_fpos_membership)
                            )}
                        </Metric>
                        <CategoryBar
                            values={[
                                parseInt(
                                    (fpo_stats?.total_female_membership /
                                        fpo_stats?.total_fpos_membership) *
                                        100
                                ),
                                100 -
                                    parseInt(
                                        (fpo_stats?.total_female_membership /
                                            fpo_stats?.total_fpos_membership) *
                                            100
                                    ),
                            ]}
                            colors={["orange", "yellow"]}
                            className="mt-4"
                        />
                        <Legend
                            categories={["Female", "Male"]}
                            colors={["orange", "yellow"]}
                            className="mt-3"
                        />
                    </Card>
                    <Grid numItemsSm={2} className="mt-4 gap-4">
                        <Card>
                            <Text>Total Female Membership</Text>
                            <Metric>
                                {numberFormatter(
                                    parseInt(fpo_stats?.total_female_membership)
                                )}
                            </Metric>
                        </Card>
                        <Card>
                            <Text>Total Male Membership</Text>
                            <Metric>
                                {numberFormatter(
                                    parseInt(fpo_stats?.total_male_membership)
                                )}
                            </Metric>
                        </Card>
                    </Grid>
                </Card>

                <Card className="">
                    <Card>
                        <Text>Total Youth Membership</Text>
                        <Metric>
                            {numberFormatter(
                                parseInt(
                                    fpo_stats?.total_female_youth_membership +
                                        fpo_stats?.total_male_youth_membership
                                )
                            )}
                        </Metric>
                        <CategoryBar
                            values={[
                                parseInt(
                                    (fpo_stats?.total_female_youth_membership /
                                        parseInt(
                                            fpo_stats?.total_female_youth_membership +
                                                fpo_stats?.total_male_youth_membership
                                        )) *
                                        100
                                ),
                                100 -
                                    parseInt(
                                        (fpo_stats?.total_female_youth_membership /
                                            parseInt(
                                                fpo_stats?.total_female_youth_membership +
                                                    fpo_stats?.total_male_youth_membership
                                            )) *
                                            100
                                    ),
                            ]}
                            colors={["orange", "yellow"]}
                            className="mt-4"
                        />
                        <Legend
                            categories={["Female", "Male"]}
                            colors={["orange", "yellow"]}
                            className="mt-3"
                        />
                    </Card>
                    <Grid numItemsSm={2} className="mt-4 gap-4">
                        <Card>
                            <Text>Total Female Youth Membership</Text>
                            <Metric>
                                {numberFormatter(
                                    parseInt(
                                        fpo_stats?.total_female_youth_membership
                                    )
                                )}
                            </Metric>
                        </Card>
                        <Card>
                            <Text>Total Male Youth Membership</Text>
                            <Metric>
                                {numberFormatter(
                                    parseInt(
                                        fpo_stats?.total_male_youth_membership
                                    )
                                )}
                            </Metric>
                        </Card>
                    </Grid>
                </Card>
            </Grid>

            <Grid numItemsSm={1} numItemsLg={2} className="gap-6 py-6">
                <Card className="">
                    <Card>
                        <Text>Farmers</Text>
                        <Metric>
                            {numberFormatter(
                                parseInt(system_stats?.total_farmers)
                            )}
                        </Metric>
                        {system_stats?.total_farmers ? (
                            <CategoryBar
                                values={[
                                    parseInt(
                                        (system_stats?.female_farmers /
                                            parseInt(
                                                system_stats?.total_farmers
                                            )) *
                                            100
                                    ),
                                    100 -
                                        parseInt(
                                            (system_stats?.female_farmers /
                                                parseInt(
                                                    system_stats?.total_farmers
                                                )) *
                                                100
                                        ),
                                ]}
                                colors={["orange", "yellow"]}
                                className="mt-4"
                            />
                        ) : (
                            <CategoryBar />
                        )}
                        <Legend
                            categories={["Female", "Male"]}
                            colors={["orange", "yellow"]}
                            className="mt-3"
                        />
                    </Card>

                    <Grid numItemsSm={2} className="mt-4 gap-4">
                        <Card>
                            <Text>Female Farmers</Text>
                            <Metric>
                                {numberFormatter(
                                    parseInt(system_stats?.female_farmers)
                                )}
                            </Metric>
                        </Card>
                        <Card>
                            <Text>Male Farmers</Text>
                            <Metric>
                                {numberFormatter(
                                    parseInt(system_stats?.male_farmers)
                                )}
                            </Metric>
                        </Card>
                    </Grid>
                </Card>

                <Card className="">
                    <Card>
                        <Text>Agents</Text>
                        <Metric>
                            {numberFormatter(
                                parseInt(system_stats?.total_agents)
                            )}
                        </Metric>
                        <CategoryBar
                            values={[
                                parseInt(
                                    (system_stats?.female_agents /
                                        parseInt(system_stats?.total_agents)) *
                                        100
                                ),
                                100 -
                                    parseInt(
                                        (system_stats?.female_agents /
                                            parseInt(
                                                system_stats?.total_agents
                                            )) *
                                            100
                                    ),
                            ]}
                            colors={["orange", "yellow"]}
                            className="mt-4"
                        />
                        <Legend
                            categories={["Female", "Male"]}
                            colors={["orange", "yellow"]}
                            className="mt-3"
                        />
                    </Card>

                    <Grid numItemsSm={2} className="mt-4 gap-4">
                        <Card>
                            <Text>Female Agents</Text>
                            <Metric>
                                {numberFormatter(
                                    parseInt(system_stats?.female_agents)
                                )}
                            </Metric>
                        </Card>
                        <Card>
                            <Text>Male Agents</Text>
                            <Metric>
                                {numberFormatter(
                                    parseInt(system_stats?.male_agents)
                                )}
                            </Metric>
                        </Card>
                    </Grid>
                </Card>
            </Grid>

            {/* <Grid numItemsSm={2} numItemsLg={4} className="gap-6 py-6">
                <Card>
                    <Text>Farmers</Text>
                    <Metric>
                        {numberFormatter(parseInt(system_stats?.total_farmers))}
                    </Metric>
                    {system_stats?.total_farmers ? (
                        <CategoryBar
                            values={[
                                parseInt(
                                    (system_stats?.female_farmers /
                                        parseInt(system_stats?.total_farmers)) *
                                        100
                                ),
                                100 -
                                    parseInt(
                                        (system_stats?.female_farmers /
                                            parseInt(
                                                system_stats?.total_farmers
                                            )) *
                                            100
                                    ),
                            ]}
                            colors={["orange", "yellow"]}
                            className="mt-4"
                        />
                    ) : (
                        <CategoryBar />
                    )}
                    <Legend
                        categories={["Female", "Male"]}
                        colors={["orange", "yellow"]}
                        className="mt-3"
                    />
                </Card>

                <Card>
                    <Text>FPOs Total Membership</Text>
                    <Metric>
                        {numberFormatter(
                            parseInt(fpo_stats?.total_fpos_membership)
                        )}
                    </Metric>
                    <CategoryBar
                        values={[
                            parseInt(
                                (fpo_stats?.total_female_membership /
                                    fpo_stats?.total_fpos_membership) *
                                    100
                            ),
                            100 -
                                parseInt(
                                    (fpo_stats?.total_female_membership /
                                        fpo_stats?.total_fpos_membership) *
                                        100
                                ),
                        ]}
                        colors={["orange", "yellow"]}
                        className="mt-4"
                    />
                    <Legend
                        categories={["Female", "Male"]}
                        colors={["orange", "yellow"]}
                        className="mt-3"
                    />
                </Card>

                <Card>
                    <Text>Total Youth Membership</Text>
                    <Metric>
                        {numberFormatter(
                            parseInt(
                                fpo_stats?.total_female_youth_membership +
                                    fpo_stats?.total_male_youth_membership
                            )
                        )}
                    </Metric>
                    <CategoryBar
                        values={[
                            parseInt(
                                (fpo_stats?.total_female_youth_membership /
                                    parseInt(
                                        fpo_stats?.total_female_youth_membership +
                                            fpo_stats?.total_male_youth_membership
                                    )) *
                                    100
                            ),
                            100 -
                                parseInt(
                                    (fpo_stats?.total_female_youth_membership /
                                        parseInt(
                                            fpo_stats?.total_female_youth_membership +
                                                fpo_stats?.total_male_youth_membership
                                        )) *
                                        100
                                ),
                        ]}
                        colors={["orange", "yellow"]}
                        className="mt-4"
                    />
                    <Legend
                        categories={["Female", "Male"]}
                        colors={["orange", "yellow"]}
                        className="mt-3"
                    />
                </Card>

                <Card>
                    <Text>Agents</Text>
                    <Metric>
                        {numberFormatter(parseInt(system_stats?.total_agents))}
                    </Metric>
                    <CategoryBar
                        values={[
                            parseInt(
                                (system_stats?.female_agents /
                                    parseInt(system_stats?.total_agents)) *
                                    100
                            ),
                            100 -
                                parseInt(
                                    (system_stats?.female_agents /
                                        parseInt(system_stats?.total_agents)) *
                                        100
                                ),
                        ]}
                        colors={["orange", "yellow"]}
                        className="mt-4"
                    />
                    <Legend
                        categories={["Female", "Male"]}
                        colors={["orange", "yellow"]}
                        className="mt-3"
                    />
                </Card>
            </Grid> */}

            {/* <Grid numItemsSm={2} numItemsLg={3} className="gap-6">
                <Card>
                    <Text>Total Female Membership</Text>
                    <Metric>
                        {numberFormatter(
                            parseInt(fpo_stats?.total_female_membership)
                        )}
                    </Metric>
                </Card>
                <Card>
                    <Text>Total Male Membership</Text>
                    <Metric>
                        {numberFormatter(
                            parseInt(fpo_stats?.total_male_membership)
                        )}
                    </Metric>
                </Card>
                <Card>
                    <Text>Total Female Youth Membership</Text>
                    <Metric>
                        {numberFormatter(
                            parseInt(fpo_stats?.total_female_youth_membership)
                        )}
                    </Metric>
                </Card>
                <Card>
                    <Text>Total Male Youth Membership</Text>
                    <Metric>
                        {numberFormatter(
                            parseInt(fpo_stats?.total_male_youth_membership)
                        )}
                    </Metric>
                </Card>
                <Card>
                    <Text>Female Farmers</Text>
                    <Metric>
                        {numberFormatter(
                            parseInt(system_stats?.female_farmers)
                        )}
                    </Metric>
                </Card>
                <Card>
                    <Text>Male Farmers</Text>
                    <Metric>
                        {numberFormatter(parseInt(system_stats?.male_farmers))}
                    </Metric>
                </Card>
            </Grid> */}

            {/* <Grid numItemsSm={2} numItemsLg={3} className="gap-6 my-4">
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
            </Grid> */}
        </div>
    );
};

export default Dashboard;
