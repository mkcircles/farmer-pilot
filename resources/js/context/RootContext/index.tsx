import React, { createContext, useState } from 'react';

// Create the context
const AppContext = createContext();


// Create a provider component
const AppContextProvider = ({ children }) => {
  const [appContextState, setAppContextState] = useState({
    loading : false,
  });

  const updateAppContextState = (key: string, value: any) => {
    setAppContextState({
        ...appContextState,
        [key] : value
    })
  }

  return (
    <AppContext.Provider value={{ appContextState, setAppContextState , updateAppContextState}}>
      {children}
    </AppContext.Provider>
  );
};

export { AppContext, AppContextProvider };