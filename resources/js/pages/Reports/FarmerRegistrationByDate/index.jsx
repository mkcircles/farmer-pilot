import { Card, Metric, Text, Divider, AreaChart } from "@tremor/react";
import { useContext, useEffect, useState } from "react";
import { useSelector } from "react-redux";
import { AppContext } from "../../../context/RootContext";
import { numberFormatter } from "../../../utils/numberFormatter";
import { BASE_API_URL } from "../../../env";

const valueFormatter = (number) => `${numberFormatter(number)}`;

export default function FarmerRegistrationByDate() {

    const token = useSelector((state) => state.auth.token);
    const { updateAppContextState } = useContext(AppContext);
    const [registrationData, setRegistrationData] = useState([]);
    const [stats, setStats] = useState({});

    const data = Object.keys(registrationData).map((key) => ({date: key, "Farmers Registered": registrationData[key]}));

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

    const fetchFarmerRegistrationByDate = (url = `${BASE_API_URL}/farmer/date/summary`) => {
        updateAppContextState("loading", true);
        axios
            .get(url, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((res) => {
                console.log("Registration Data", res?.data?.data);
                let resData = res?.data?.data;
                if (res?.data) {
                    setRegistrationData(resData);
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
        fetchFarmerRegistrationByDate();
    }, [token]);


  return (
    <Card className="mx-auto">
   
      <Text>Total Farmers</Text>
      <Metric>{numberFormatter(stats?.system_stats?.total_farmers)}</Metric>
      <AreaChart
        className="mt-8 h-44"
        data={data}
        categories={["Farmers Registered"]}
        index="date"
        colors={["orange"]}
        valueFormatter={valueFormatter}
        showYAxis={false}
        showLegend={false}
      />
    </Card>
  );
}