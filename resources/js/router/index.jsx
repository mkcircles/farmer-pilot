import { createBrowserRouter } from "react-router-dom";
import {
    AGENTS_LIST,
    AGENT_PROFILE,
    CREATE_AGENT,
    CREATE_FPO,
    CREATE_FPO_ADMIN_USER_ACCOUNT,
    EDIT_AGENT,
    EDIT_FPO,
    FARMERS_LIST,
    FARMER_PROFILE,
    FPO_LIST,
    FPO_MAP,
    FPO_PROFILE,
    HOME,
    LOGIN,
    LOGOUT,
    REPORTS,
    USERS_LIST,
} from "./routes";
import { useDispatch } from "react-redux";
import { logOut } from "../stores/authSlice";
import { Suspense, lazy, useEffect } from "react";
import Loading from "../components/Loading";

const Dashboard = lazy(() => import("../pages/Dashboard"));
const FarmersList = lazy(() => import("../pages/FarmersList"));
const Reports = lazy(() => import("../pages/Reports"));
const FarmerProfile = lazy(() => import("../pages/FarmerProfile"));
const AgentProfile = lazy(() => import("../pages/AgentProfile"));
const FpoList = lazy(() => import("../pages/FpoList"));
const Login = lazy(() => import("../pages/Login"));
const CreateFpo = lazy(() => import("../pages/CreateFpo"));
const CreateAgent = lazy(() => import("../pages/CreateAgent"));
const AgentsList = lazy(() => import("../pages/AgentsList"));
const Menu = lazy(() => import("../layouts/SideMenu"));
const EditAgent = lazy(() => import("../pages/EditAgent"));
const FpoProfile = lazy(() => import("../pages/FpoProfile"));
const EditFpo = lazy(() => import("../pages/EditFpo"));
const FpoMap = lazy(() => import("../pages/FpoMap"));
const CreateFpoAdminUserAccount = lazy(() =>
    import("../pages/CreateFpoAdminUserAccount")
);
const UsersList = lazy(() => import("../pages/Users/UsersList"));

const Logout = () => {
    const dispatch = useDispatch();

    useEffect(() => {
        dispatch(logOut());
    }, []);

    return <></>;
};

const router = createBrowserRouter([
    {
        path: LOGIN,
        element: (
            <Suspense fallback={<Loading />}>
                <Login />
            </Suspense>
        ),
    },
    {
        path: "/",
        element: (
            <Suspense fallback={<Loading />}>
                <Menu />
            </Suspense>
        ),
        children: [
            {
                path: HOME,
                element: (
                    <Suspense fallback={<Loading />}>
                        <Dashboard />
                    </Suspense>
                ),
            },
            {
                path: USERS_LIST,
                element: (
                    <Suspense fallback={<Loading />}>
                        <UsersList />
                    </Suspense>
                ),
            },
            {
                path: FARMERS_LIST,
                element: (
                    <Suspense fallback={<Loading />}>
                        <FarmersList />
                    </Suspense>
                ),
            },
            {
                path: FPO_LIST,
                element: (
                    <Suspense fallback={<Loading />}>
                        <FpoList />
                    </Suspense>
                ),
            },
            {
                path: FPO_MAP,
                element: (
                    <Suspense fallback={<Loading />}>
                        <FpoMap />
                    </Suspense>
                ),
            },
            {
                path: `${FPO_PROFILE}/:id`,
                element: (
                    <Suspense fallback={<Loading />}>
                        <FpoProfile />
                    </Suspense>
                ),
            },
            {
                path: AGENTS_LIST,
                element: (
                    <Suspense fallback={<Loading />}>
                        <AgentsList />
                    </Suspense>
                ),
            },
            {
                path: CREATE_FPO,
                element: (
                    <Suspense fallback={<Loading />}>
                        <CreateFpo />
                    </Suspense>
                ),
            },
            {
                path: CREATE_AGENT,
                element: (
                    <Suspense fallback={<Loading />}>
                        <CreateAgent />
                    </Suspense>
                ),
            },
            {
                path: CREATE_FPO_ADMIN_USER_ACCOUNT,
                element: (
                    <Suspense fallback={<Loading />}>
                        <CreateFpoAdminUserAccount />
                    </Suspense>
                ),
            },
            {
                path: EDIT_AGENT,
                element: (
                    <Suspense fallback={<Loading />}>
                        <EditAgent />
                    </Suspense>
                ),
            },
            {
                path: EDIT_FPO,
                element: (
                    <Suspense fallback={<Loading />}>
                        <EditFpo />
                    </Suspense>
                ),
            },
            {
                path: `${FARMER_PROFILE}/:id`,
                element: (
                    <Suspense fallback={<Loading />}>
                        <FarmerProfile />
                    </Suspense>
                ),
            },
            {
                path: `${AGENT_PROFILE}/:id`,
                element: (
                    <Suspense fallback={<Loading />}>
                        <AgentProfile />
                    </Suspense>
                ),
            },
            {
                path: REPORTS,
                element: (
                    <Suspense fallback={<Loading />}>
                        <Reports />
                    </Suspense>
                ),
            },
            {
                path: LOGOUT,
                element: <Logout />,
            },
        ],
    },
]);

export default router;
