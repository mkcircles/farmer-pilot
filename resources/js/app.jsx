import "./bootstrap";

import React from "react";
import ReactDOM from "react-dom/client";
import { RouterProvider } from "react-router-dom";
import { Provider } from "react-redux";
import { store } from "./stores/store";
import router from "./router";
import { AppContextProvider } from "./context/RootContext";
import Loading from "./components/Loading";
import "./assets/css/app.css";


ReactDOM.createRoot(document.getElementById("app")).render(
    <React.StrictMode>
        <Provider store={store}>
            <AppContextProvider>
                <Loading />
                <RouterProvider router={router} />
            </AppContextProvider>
        </Provider>
    </React.StrictMode>
);
