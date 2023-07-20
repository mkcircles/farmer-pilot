import { debounce } from "lodash";
import React, { createContext, useEffect, useState } from "react";

// Create the context
const AppContext = createContext(null);

// Create a provider component
const AppContextProvider = ({ children }) => {
    const [appContextState, setAppContextState] = useState({
        loading: false,
    });

    const updateAppContextState = (key: string, value: any) => {

        if(key == 'loading' && value === false) {
            setTimeout(() => {
                setAppContextState({
                    ...appContextState,
                    [key]: value,
                });
            }, 1000);
            return;
        }

        setAppContextState({
            ...appContextState,
            [key]: value,
        });
    };

    return (
        <AppContext.Provider
            value={{
                appContextState,
                setAppContextState,
                updateAppContextState,
            }}
        >
            {children}
        </AppContext.Provider>
    );
};

export { AppContext, AppContextProvider };
