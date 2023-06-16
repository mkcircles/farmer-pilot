import { Card } from "@tremor/react";
import Menu from "./components/menu";
import { RouterProvider, Outlet } from "react-router-dom";
import router from "./router";

export default function RootLayout() {
    return (
        <div className="w-screen h-screen p-4 grid grid-cols-6 space-x-2">
            <Menu />

            <Card className="h-full w-full col-span-5">
                <Outlet />
            </Card>
        </div>
    );
}
