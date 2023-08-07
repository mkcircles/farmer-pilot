import { Card, Metric, Text, Divider, AreaChart } from "@tremor/react";
import { useContext, useEffect, useState } from "react";
import { useSelector } from "react-redux";
import { AppContext } from "../../../context/RootContext";
import { numberFormatter } from "../../../utils/numberFormatter";
import { BASE_API_URL } from "../../../env";

const data = [
  {
    Month: "Jan 21",
    "Gross Volume": 2890,
    "Successful Payments": 2400,
    Customers: 4938,
  },
  {
    Month: "Feb 21",
    "Gross Volume": 1890,
    "Successful Payments": 1398,
    Customers: 2938,
  },
  // ...
  {
    Month: "Jan 22",
    "Gross Volume": 3890,
    "Successful Payments": 2980,
    Customers: 2645,
  },
];

const valueFormatter = (number) => `${numberFormatter(number)}`;

export default function FarmerRegistrationByDate() {

    const token = useSelector((state) => state.auth.token);
    const { updateAppContextState } = useContext(AppContext);
    const [registrationData, setRegistrationData] = useState([]);
    const [stats, setStats] = useState({});

    const data = Object.keys(registrationData).map((key) => ({date: key, farmers_count: registrationData[key]}));

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
        categories={["farmers_count"]}
        index="date"
        colors={["orange"]}
        valueFormatter={valueFormatter}
        showYAxis={false}
        showLegend={false}
      />
    </Card>
  );
}