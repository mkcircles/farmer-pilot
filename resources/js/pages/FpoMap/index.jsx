
import { Card } from "@tremor/react";
import Map from "./Map"
import { useContext, useEffect, useState } from "react";
import { useSelector } from "react-redux";
import { AppContext } from "@/context/RootContext";
import { BASE_API_URL } from "@/env";

const FpoMap = () => {
    const token = useSelector((state) => state.auth.token);
    const { updateAppContextState } = useContext(AppContext);
    const [fpoData, setFpoData] = useState(null);

    const fetchFPOs = (url = `${BASE_API_URL}/fpos/coordinates`) => {
        updateAppContextState("loading", true);
        axios
            .get(url, {
                headers: {
                    // API_KEY: API_KEY,
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((res) => {
                console.log("FPO Data", res?.data?.data);
                let resData = res?.data?.data;
                if (res?.data) {
                    setFpoData(resData);
                    // dispatch(setFpos(resData?.data));
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
        fetchFPOs();
    }, []);

    return (
        <Card className="my-4 h-full w-full absolute inset-0">
            {fpoData && <Map fpoData={fpoData} />}
        </Card>
    )
}

export default FpoMap;