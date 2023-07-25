import { useContext, useEffect } from "react";
import { BASE_API_URL } from "../env";
import { AppContext } from "../context/RootContext";
import { useSelector } from "react-redux";
import { useAppDispatch } from "../stores/hooks";
import { logOut, setToken } from "../stores/authSlice";
import { debounce } from "lodash";

const useRefreshToken = () => {
    const { updateAppContextState } = useContext(AppContext);
    const token = useSelector((state) => state.auth.token);
    const dispatch = useAppDispatch();

    const refreshToken = (url = `${BASE_API_URL}/refresh`) => {
        updateAppContextState("loading", true);
        axios
            .post(
                url,
                {},
                {
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                }
            )
            .then((res) => {
                // console.log("New Token", res?.data);
                let resData = res?.data;
                if (res?.data) {
                    dispatch(setToken(resData?.token));
                }
            })
            .catch((err) => {
                console.log(err);
                if (err) {
                    dispatch(logOut(""));
                }
            })
            .finally(() => {
                updateAppContextState("loading", false);
            });
    };

    const debounceRefreshToken = debounce(refreshToken, 500);

    useEffect(() => {
        if (!token || token === "null") {
            debounceRefreshToken();
        }
    }, []);
};

export default useRefreshToken;
