import {
    Card,
    Grid,
    Metric,
    Text,
    TabGroup,
    TabList,
    Tab,
    TabPanels,
    TabPanel,
} from "@tremor/react";
import { BASE_API_URL } from "../../env";
import { useSelector } from "react-redux";
import { Suspense, lazy, useContext, useEffect, useState } from "react";
import { AppContext } from "../../context/RootContext";
import { numberFormatter } from "../../utils/numberFormatter";
import { CircleOff, ScanLine, SquareStack } from "lucide-react";
import Loading from "../../components/Loading";

const BiometricsList = lazy(() => import("./BiometricsList"));

const FarmerBiometrics = () => {
    const token = useSelector((state) => state.auth.token);
    const { updateAppContextState } = useContext(AppContext);

    const [bioSummaryData, setBioSummaryData] = useState({});
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
    const fetchFarmersBiometricsSummary = (
        url = `${BASE_API_URL}/bio/summary`
    ) => {
        updateAppContextState("loading", true);
        axios
            .get(url, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((res) => {
                console.log("Bio Summary Data", res?.data?.data);
                let resData = res?.data?.data;
                if (res?.data) {
                    setBioSummaryData(JSON.parse(resData));
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
        fetchFarmersBiometricsSummary();
    }, []);

    const { fpo_stats, system_stats } = stats;

    return (
        <>
            <Grid numItemsSm={2} numItemsLg={3} className="gap-6 mt-4">
                <Card>
                    <Text>Biometrics Captured</Text>
                    <Metric>
                        {numberFormatter(bioSummaryData?.bio_summary)}
                    </Metric>
                </Card>
                <Card>
                    <Text>Failed Captures</Text>
                    <Metric>
                        {numberFormatter(bioSummaryData?.denied_captures)}
                    </Metric>
                </Card>
                <Card>
                    <Text>Possibe Duplicates</Text>
                    <Metric>
                        {numberFormatter(bioSummaryData?.possible_duplicates)}
                    </Metric>
                </Card>
            </Grid>

            <Card className="mt-4">
                <TabGroup>
                    <TabList className="">
                        <Tab icon={ScanLine}>Biometrics Captured</Tab>
                        <Tab icon={CircleOff}>Failed Captures</Tab>
                        <Tab icon={SquareStack}>Possible Duplicates</Tab>
                    </TabList>
                    <TabPanels>
                        <TabPanel>
                            <Suspense fallback={<Loading />}>
                                <BiometricsList
                                    title="All Biometrics Captures"
                                    biometrics_api_url={`${BASE_API_URL}/farmers/bio`}
                                ></BiometricsList>
                            </Suspense>
                        </TabPanel>
                        <TabPanel>
                            <Suspense fallback={<Loading />}>
                                <BiometricsList
                                    title="Failed Captures"
                                    biometrics_api_url={`${BASE_API_URL}/farmers/bio/failed`}
                                ></BiometricsList>
                            </Suspense>
                        </TabPanel>
                        <TabPanel>
                            <Suspense fallback={<Loading />}>
                                <BiometricsList
                                    title="Possible Duplicates"
                                    biometrics_api_url={`${BASE_API_URL}/farmers/bio/duplicates`}
                                ></BiometricsList>
                            </Suspense>
                        </TabPanel>
                        <TabPanel></TabPanel>
                    </TabPanels>
                </TabGroup>
            </Card>
        </>
    );
};

export default FarmerBiometrics;
