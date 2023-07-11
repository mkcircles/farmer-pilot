import { Card } from "@tremor/react";
import { Link } from "react-router-dom";
import clsx from "clsx";
import { FARMERS_LIST, DASHBOARD, HOME, REPORTS } from "../../router/routes";
import { useFindPath } from "../../hooks";

const Menu = () => {
    const path = useFindPath();

    // console.log("path =>", path);

    return (
        <Card className="h-full">
            <ul className="hidden md:block space-y-1">
                <li>
                    <Link
                        to={HOME}
                        className={clsx({
                            [" border-blue-500 bg-blue-50  text-blue-700"]:
                                path == HOME,
                            ["border-transparent text-gray-500 hover:border-gray-100 hover:bg-gray-50 hover:text-gray-700"]:
                                path != HOME,
                            ["flex py-3 items-center gap-2 border-s-[3px]  px-4"]: true,
                        })}
                    >
                        <svg
                            className="h-5 w-5 opacity-75"
                            fill="none"
                            stroke="currentColor"
                            strokeWidth={2}
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                        >
                            <path
                                strokeLinecap="round"
                                strokeLinejoin="round"
                                d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"
                            />
                        </svg>

                        <span className="text-sm font-medium"> Dashboard </span>
                    </Link>
                </li>

                <li>
                    <Link
                        to={FARMERS_LIST}
                        className={clsx({
                            [" border-blue-500 bg-blue-50  text-blue-700"]:
                                path == FARMERS_LIST,
                            ["border-transparent text-gray-500 hover:border-gray-100 hover:bg-gray-50 hover:text-gray-700"]:
                                path != FARMERS_LIST,
                            ["flex py-3 items-center gap-2 border-s-[3px]  px-4"]: true,
                        })}
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            className="h-5 w-5 opacity-75"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            strokeWwidth="2"
                        >
                            <path
                                strokeLinecap="round"
                                strokeLinejoin="round"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                            />
                        </svg>

                        <span className="text-sm font-medium"> Farmers </span>
                    </Link>
                </li>
                <li>
                    <Link
                        to={REPORTS}
                        className={clsx({
                            [" border-blue-500 bg-blue-50  text-blue-700"]:
                                path == REPORTS,
                            ["border-transparent text-gray-500 hover:border-gray-100 hover:bg-gray-50 hover:text-gray-700"]:
                                path != REPORTS,
                            ["flex py-3 items-center gap-2 border-s-[3px]  px-4"]: true,
                        })}
                    >
                        <svg
                            fill="none"
                            className="h-5 w-5 opacity-75"
                            stroke="currentColor"
                            strokeWidth={2}
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                        >
                            <path
                                strokeLinecap="round"
                                strokeLinejoin="round"
                                d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6"
                            />
                        </svg>

                        <span className="text-sm font-medium"> Reports </span>
                    </Link>
                </li>
            </ul>
        </Card>
    );
};

export default Menu;
