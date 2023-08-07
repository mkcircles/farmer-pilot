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
import { useContext, useEffect, useState } from "react";
import { BASE_API_URL } from "../../../env";
import Loading from "../../../components/Loading";
import { useAppDispatch } from "../../../stores/hooks";
import { saveReport } from "../../../stores/reportsSlice";
  
  
  
  const valueFormatterRelative = (number) =>
    `${Intl.NumberFormat("us").format(number).toString()}%`;
  
  const valueFormatterAbsolute = (number) =>
    Intl.NumberFormat("us").format(number).toString();
  
  export default function FarmersPerDistrict() {
    const dispatch = useAppDispatch();
    const token = useSelector((state) => state.auth.token);
    const districtData = useSelector((state) => state.reports.farmersPerDistrict);
    const stats = useSelector((state) => state.reports.stats);
    const { updateAppContextState } = useContext(AppContext);
    // const [districtData, setDistrictData] = useState([]);
    // const [stats, setStats] = useState({});

    const data = {
      relative: districtData.map(district => ({district_name: district.name, "Farmers Profiled": ((district.farmers_count/stats?.system_stats?.total_farmers)*100).toFixed(2)})),
      absolute: districtData.map(district => ({district_name: district.name, "Farmers Profiled": district.farmers_count})),
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
                dispatch(saveReport(
                  {
                    reportType: "stats",
                    reportData: resData
                  }
                ))
                  //setStats(resData);
              }
          })
          .catch((err) => {
              console.log(err);
          })
          .finally(() => {
              updateAppContextState("loading", false);
          });
  };

    const fetchDistrictsData = (url = `${BASE_API_URL}/districts`) => {
        updateAppContextState("loading", true);
        axios
            .get(url, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((res) => {
                console.log("District Data", res?.data?.data);
                let resData = res?.data?.data;
                if (res?.data) {
                  dispatch(saveReport(
                    {
                      reportType: "farmersPerDistrict",
                      reportData: Object.keys(resData).map((key) => ({name: key, farmers_count: resData[key]}))
                    }
                  ))
                    //setDistrictData(Object.keys(resData).map((key) => ({name: key, farmers_count: resData[key]})));
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
        fetchDistrictsData();
        
    }, [token]);

    // const { fpo_stats, system_stats } = stats;
    // if(districtData.length === 0) return <Loading />;

    return (
      <Card className="my-4">
        <TabGroup>
          <div className="block sm:flex sm:justify-between">
            <div>
              <Title>District Performance</Title>
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
                index="district_name"
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
                index="district_name"
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