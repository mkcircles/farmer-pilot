import { useEffect, useState } from "react";
import { useAppDispatch, useAppSelector } from "../../stores/hooks";
import { setAppError, removeAppError } from "../../stores/appErrorSlice";
import { v4 as uuidv4 } from "uuid";
import { debounce } from "lodash";
// import { useRefreshTokenMutation } from "../../services/RefreshTokenAPI";

const AppError = () => {
    const appErrors = useAppSelector(state => state.app_error?.errorMessages);
    const token = useAppSelector(state => state.auth.token);
    const dispatch = useAppDispatch();
    const [dispatchedErrorMessages, setDispatchedErrorMessages] = useState([]);

    const  debounceErrorDispatch = debounce(dispatch, 500);

    useEffect(() => {
        axios.interceptors.response.use(
            function (response) {
                return response;
            },
            function (error) {
                let message =
                    error?.response?.data?.message ||
                    error?.response?.message ||
                    error?.message;
                    let msg = {message: message, id: uuidv4()};
                    if([401].includes(error?.response?.status)) {
                        if(token && token != 'null') {
                            // window.location.reload();
                        }
                    }
                    if(![404].includes(error.response.status)) {
                       debounceErrorDispatch(setAppError(msg)); 
                       setDispatchedErrorMessages([...dispatchedErrorMessages, msg]);
                    }
                     
                return Promise.reject(error);
            }
        );
    }, []);

    useEffect(() => {
        if(dispatchedErrorMessages?.length) {
            dispatchedErrorMessages.forEach(msg => {
                setTimeout(() => {
                    dispatch(removeAppError(msg));
                }, 6000)
            });
            setDispatchedErrorMessages([]);
        }

    }, [dispatchedErrorMessages]);

    if (appErrors?.length === 0) {
        return null;
    }    

    return (
        <div className="absolute mx-16 top-2 flex flex-col  left-0 right-0 z-[999]">
            {appErrors?.map((err) => {
                return (
                    <div
                    key={err?.id}
                        className="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert"
                        data-error-alert="error-alert"
                    >
                        <svg
                            className="flex-shrink-0 w-4 h-4"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span className="sr-only">Error</span>
                        <div className="ml-3 text-sm font-medium">
                            {err?.message}
                        </div>
                        <button
                            onClick={() => {
                                dispatch(removeAppError(err));
                            }
                            }
                            type="button"
                            className="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                            data-dismiss-target="#alert-2"
                            aria-label="Close"
                        >
                            <span className="sr-only">Close</span>
                            <svg
                                className="w-3 h-3"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 14 14"
                            >
                                <path
                                    stroke="currentColor"
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                    strokeWidth="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                                />
                            </svg>
                        </button>
                    </div>
                );
            })}
        </div>
    );
};

export default AppError;
