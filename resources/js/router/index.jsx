import { createBrowserRouter } from "react-router-dom";
import Dashboard from "../pages/Dashboard";
import FarmersList from "../pages/FarmersList";
import { FARMERS_LIST, FARMER_PROFILE, HOME, REPORTS } from "./routes";
import Reports from "../pages/Reports";
import FarmerProfile from "../pages/FarmerProfile";
import Menu from "../layouts/SideMenu";

const router = createBrowserRouter([
    {
        path: "/",
        element: <Menu />,
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
                path: `${FARMER_PROFILE}/:id`,
                element: <FarmerProfile />,
            },
            {
                path: REPORTS,
                element: <Reports />,
            },
        ],
    },
]);

export default router;
