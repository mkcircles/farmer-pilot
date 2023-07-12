import React, { createContext, useEffect, useState } from "react";
import { v4 as uuidv4 } from "uuid";

// Create the context
const AppContext = createContext(null);

// Create a provider component
const AppContextProvider = ({ children }) => {
    const [appContextState, setAppContextState] = useState({
        loading: false,
        errorMessages: [],
    });

    const updateAppContextState = (key: string, value: any) => {
        setAppContextState({
            ...appContextState,
            [key]: value,
        });
    };

    const setNewAppErrorMessage = (msg: string) => {
      let messages = [...appContextState?.errorMessages];
      messages.push({id: uuidv4(), message: msg,});
      setTimeout(() => {
        setAppContextState({
          ...appContextState,
          errorMessages: messages,
      });
      }, 1000)
        
    };

    const removeAppErrorMessage = (err: {id: string, message: string}) => {
        setAppContextState({
            ...appContextState,
            errorMessages: [...appContextState?.errorMessages.filter(msg => msg.id !== err?.id)],
        });
    };

    return (
        <AppContext.Provider
            value={{
                appContextState,
                setAppContextState,
                updateAppContextState,
                setNewAppErrorMessage,
                removeAppErrorMessage
            }}
        >
            {children}
        </AppContext.Provider>
    );
};

export { AppContext, AppContextProvider };
