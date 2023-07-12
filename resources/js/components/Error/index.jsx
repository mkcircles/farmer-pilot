import { useContext, useEffect, useState } from "react";
import { AppContext } from "../../context/RootContext";

const AppError = () => {
    const {
        appContextState,
        setNewAppErrorMessage,
        removeAppErrorMessage,
    } = useContext(AppContext);
    const errorMessages = appContextState?.errorMessages;
    const [axiosError, setAxiosError] = useState(null);

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
                setAxiosError(message);
                return Promise.reject(error);
            }
        );
    }, []);

    useEffect(() => {
        if (axiosError) {
            setNewAppErrorMessage(axiosError);
            setAxiosError(null);
        }
    }, [axiosError]);

    if (errorMessages?.length === 0) {
        return null;
    }

    return (
        <div className="absolute mx-16 top-1 flex flex-col  left-0 right-0 z-[999]">
            {errorMessages?.map((err) => {
                return (
                    <div
                    key={err?.id}
                        class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert"
                    >
                        <svg
                            class="flex-shrink-0 w-4 h-4"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Error</span>
                        <div class="ml-3 text-sm font-medium">
                            {err?.message}
                        </div>
                        <button
                            onClick={() =>
                                removeAppErrorMessage(err)
                            }
                            type="button"
                            class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                            data-dismiss-target="#alert-2"
                            aria-label="Close"
                        >
                            <span class="sr-only">Close</span>
                            <svg
                                class="w-3 h-3"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 14 14"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
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
