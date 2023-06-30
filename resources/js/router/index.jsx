import { createBrowserRouter } from "react-router-dom";
import Dashboard from "../pages/Dashboard";
import FarmersList from "../pages/FarmersList";
import { AGENTS_LIST, AGENT_PROFILE, CREATE_AGENT, CREATE_FPO, FARMERS_LIST, FARMER_PROFILE, FPO_LIST, HOME, LOGIN, REPORTS } from "./routes";
import Reports from "../pages/Reports";
import FarmerProfile from "../pages/FarmerProfile";
import AgentProfile from "../pages/AgentProfile";
import FpoList from "../pages/FpoList";
import Login from "../pages/Login";
import CreateFpo from "../pages/CreateFpo";
import CreateAgent from "../pages/CreateAgent";
import AgentsList from "../pages/AgentsList";
import Menu from "../layouts/SideMenu";

const router = createBrowserRouter([
    {
        path: LOGIN,
        element: <Login />
    }
    ,
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
                path: FPO_LIST,
                element: <FpoList />,
            },
            {
                path: AGENTS_LIST,
                element: <AgentsList />,
            },
            {
                path: CREATE_FPO,
                element: <CreateFpo />,
            },
            {
                path: CREATE_AGENT,
                element: <CreateAgent />,
            },
            {
                path: `${FARMER_PROFILE}/:id`,
                element: <FarmerProfile />,
            },
            {
                path: `${AGENT_PROFILE}/:id`,
                element: <AgentProfile />,
            },
            {
                path: REPORTS,
                element: <Reports />,
            },
        ],
    },
]);

export default router;
