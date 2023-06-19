import { createBrowserRouter } from "react-router-dom";
import Dashboard from "../pages/Dashboard";
import FarmersList from "../pages/FarmersList";
import { FARMERS_LIST, FARMER_PROFILE, HOME, REPORTS } from "./routes";
import RootLayout from "../RootLayout";
import Reports from "../pages/Reports";

const router = createBrowserRouter([
    {
        path: "/",
        element: <RootLayout />,
        children: [
            {
                path: HOME,
                element: <Dashboard />,
            },
            {
                path: FARMERS_LIST,
                element: <FarmersList />,
            },
            {
                path: FARMER_PROFILE,
                element: <FarmersList />,
            },
            {
                path: REPORTS,
                element: <Reports />,
            },
        ],
    },
]);

export default router;
