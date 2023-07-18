import { useContext, useEffect, useState } from "react"
import { useAppDispatch, useAppSelector } from "../stores/hooks";
import { AppContext } from "../context/RootContext";
import { setFpos } from "../stores/fpoSlice";
import { BASE_API_URL } from "../env";


const useFpos = () => {
    const [fposData, setFposData] = useState([]);

    const dispatch = useAppDispatch();
    const token = useAppSelector((state) => state.auth.token);
    const { updateAppContextState } = useContext(AppContext);

    useEffect(() => {
        updateAppContextState("loading", true);
        axios
            .get(`${BASE_API_URL}/fpos/summary`, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((res) => {
                //console.log("FPOS SUMMARY ", res?.data?.data)
                setFposData(res?.data?.data);
                dispatch(setFpos(res?.data?.data));
            })
            .catch((err) => {
                console.log(err);
            })
            .finally(() => {
                updateAppContextState("loading", false);
            });
    }, []);

    return fposData;


}

export default useFpos;