import { useContext, useEffect, useState } from "react";
import {
    Card,
    Title,
    Text,
    LineChart,
    TabList,
    Tab,
    TabGroup,
    TabPanel,
    TabPanels,
  } from "@tremor/react";
import { useSelector } from "react-redux";
import { AppContext } from "../../../context/RootContext";
import { BASE_API_URL } from "../../../env";
import { useAppDispatch } from "../../../stores/hooks";
import { saveReport } from "../../../stores/reportsSlice";
  
  
  
  const valueFormatterRelative = (number) =>
    `${Intl.NumberFormat("us").format(number).toString()}%`;
  
  const valueFormatterAbsolute = (number) =>
    Intl.NumberFormat("us").format(number).toString();
  
  export default function AgentPerformance() {
    const dispatch = useAppDispatch();
    const token = useSelector((state) => state.auth.token);
    const agentsData = useSelector((state) => state.reports.agentsPerformance);
    const stats = useSelector((state) => state.reports.stats);
    const { updateAppContextState } = useContext(AppContext);
    // const [agentsData, setAgentsData] = useState([]);
    // const [stats, setStats] = useState({});

    const data = {
      relative: agentsData?.map(agent => ({agent_name: agent.name, "Farmers Profiled": ((agent.farmers_count/stats?.system_stats?.total_farmers)*100).toFixed(2)})),
      absolute: agentsData?.map(agent => ({agent_name: agent.name, "Farmers Profiled": agent.farmers_count})),
    };
    

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
                  // setStats(resData);
                  dispatch(saveReport(
                    {
                      reportType: "stats",
                      reportData: resData,
                    }
                  ));
              }
          })
          .catch((err) => {
              console.log(err);
          })
          .finally(() => {
              updateAppContextState("loading", false);
          });
  };

    const fetchAgentGraph = (url = `${BASE_API_URL}/agents/graph`) => {
        updateAppContextState("loading", true);
        axios
            .get(url, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((res) => {
                console.log("Agent Graph Data", res?.data?.data);
                let resData = res?.data?.data;
                if (res?.data) {
                  dispatch(saveReport(
                    {
                      reportType: "agentsPerformance",
                      reportData: resData,
                    }
                  ));
                    //setAgentsData(resData);
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
        fetchAgentGraph();
        fetchStats();
    }, []);

    // const { fpo_stats, system_stats } = stats;

    return (
      <Card className="my-4">
        <TabGroup>
          <div className="block sm:flex sm:justify-between">
            <div>
              <Title>Agent Performance</Title>
              <Text>Farmers Profiled</Text>
            </div>
            <div className="mt-4 sm:mt-0">
              <TabList variant="solid">
                <Tab>relative</Tab>
                <Tab>absolute</Tab>
              </TabList>
            </div>
          </div>
          <TabPanels>
            <TabPanel>
              <LineChart
              
                className="mt-8 h-80"
                data={data.relative}
                index="agent_name"
                categories={["Farmers Profiled"]}
                colors={["orange"]}
                showLegend={true}
                valueFormatter={valueFormatterRelative}
                yAxisWidth={40}
                
              />
            </TabPanel>
            <TabPanel>
              <LineChart
                className="mt-8 h-80"
                data={data.absolute}
                index="agent_name"
                categories={["Farmers Profiled"]}
                colors={["orange"]}
                showLegend={true}
                valueFormatter={valueFormatterAbsolute}
                yAxisWidth={40}
                showXAxis={true}
                
              />
            </TabPanel>
          </TabPanels>
        </TabGroup>
      </Card>
    );
  }