import React, { useContext, useEffect } from "react";
import { useState } from "react";
import Lucide from "../../base-components/Lucide";
import Breadcrumb from "../../base-components/Breadcrumb";
import { FormInput } from "../../base-components/Form";
import { Menu, Popover, Dialog } from "../../base-components/Headless";
import _ from "lodash";
import clsx from "clsx";
import { useFindPath } from "../../hooks";
import {
    AGENTS_LIST,
    AGENT_PROFILE,
    CREATE_FPO,
    DASHBOARD,
    EDIT_AGENT,
    EDIT_FPO,
    FARMERS_LIST,
    FARMER_PROFILE,
    FPO_LIST,
    FPO_PROFILE,
    HOME,
    REPORTS,
} from "../../router/routes";
import { useAppDispatch, useAppSelector } from "../../stores/hooks";
import { logOut } from "../../stores/authSlice";
import { AppContext } from "../../context/RootContext";
import { BASE_API_URL } from "../../env";
import { useNavigate } from "react-router-dom";

function Main(props: { toggleMobileMenu: (event: React.MouseEvent) => void }) {
    const { updateAppContextState } = useContext(AppContext);
    const dispatch = useAppDispatch();
    const navigate = useNavigate();
    const token = useAppSelector((state) => state.auth.token);
    const path = useFindPath();
    const [searchResultModal, setSearchResultModal] = useState(false);
    const [searchText, setSearchText] = useState("");
    const [searchResults, setSearchResults] = useState({
        fpos: [],
        agents: [],
        farmers: [],
    });
    let pathName = "";

    const getPathName = (): string => {
        switch (path) {
            case HOME:
                return "Home";
            case DASHBOARD:
                return "Dashboard";
            case FARMERS_LIST:
                return "Farmers List";
            case AGENTS_LIST:
                return "Agents List";
            case FPO_LIST:
                return "FPO List";
            case CREATE_FPO:
                return "Create FPO";
            case EDIT_FPO:
                return "Update FPO";
            case EDIT_AGENT:
                return "Update Agent";
            case FPO_PROFILE:
                return "FPO Profile";
            case FARMER_PROFILE:
                return "Farmer Profile";
            case AGENT_PROFILE:
                return "Agent Profile";
            case REPORTS:
                return "Reports";
            default:
                return "Dashboard";
        }
    };

    // Show search result modal
    const showSearchResultModal = () => {
        setSearchResultModal(true);
    };

    // On press event (Ctrl+k)
    document.querySelectorAll("body")[0].onkeydown = (e) => {
        if ((e.ctrlKey || e.metaKey) && e.which == 75) {
            setSearchResultModal(true);
        }
    };

    const handleDataSearch = () => {
        if(!searchText) return;
        updateAppContextState("loading", true);
        // @ts-ignore
        axios
            .post(
                `${BASE_API_URL}/search`,
                {
                    search: searchText,
                },
                {
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                }
            )
            .then((res: any) => {
                setSearchResults(res?.data);
            })
            .catch((err: any) => {
                // console.log(err);
            })
            .finally(() => {
                updateAppContextState("loading", false);
            });
    };

    const debouncedHandleDataSearch = _.debounce(handleDataSearch, 1000);

    useEffect(() => {
        if (searchText.length > 0) {
            return; // debouncedHandleDataSearch();
        }

        return setSearchResults({
            fpos: [],
            agents: [],
            farmers: [],
        });
    }, [searchText]);

    useEffect(() => {
        if (!searchResultModal) {
            setSearchText("");
        }
    }, [searchResultModal]);

    return (
        <>
            {/* BEGIN: Top Bar */}
            <div className="h-[63px] z-[51] flex items-center relative xl:px-5">
                {/* BEGIN: Breadcrumb */}
                <Breadcrumb light className="hidden -intro-x xl:flex">
                    <Breadcrumb.Link to="/">App</Breadcrumb.Link>
                    <Breadcrumb.Link to="/">Farmer Pilot</Breadcrumb.Link>
                    <Breadcrumb.Link to="/" active={true}>
                        {getPathName()}
                    </Breadcrumb.Link>
                </Breadcrumb>
                {/* END: Breadcrumb */}
                {/* BEGIN: Mobile Menu */}
                <div className="mr-3 -intro-x xl:hidden sm:mr-6">
                    <div
                        className="cursor-pointer w-[38px] h-[38px] rounded-full border border-white/20 flex items-center justify-center"
                        onClick={props.toggleMobileMenu}
                    >
                        <Lucide
                            icon="BarChart2"
                            className="w-5 h-5 text-white transform rotate-90 dark:text-slate-500"
                        />
                    </div>
                </div>
                {/* END: Mobile Menu */}
                {/* BEGIN: Search */}
                <div className="relative ml-auto intro-x sm:mx-auto">
                    <div className="relative hidden mt-1 sm:block">
                        <FormInput
                            onClick={showSearchResultModal}
                            type="text"
                            className="w-80 shadow-none rounded-full text-slate-200 border-transparent bg-white/[0.11] pl-3.5 pr-8 transition-[width] duration-300 ease-in-out placeholder:text-slate-400 focus:border-transparent dark:bg-darkmode-400/70"
                            placeholder="Quick Search... (Ctrl+k)"
                        />
                        <Lucide
                            icon="Search"
                            className="absolute inset-y-0 right-0 w-5 h-5 my-auto mr-3 text-slate-400 dark:text-slate-500"
                        />
                    </div>
                    <a className="relative text-white/70 sm:hidden" href="">
                        <Lucide
                            icon="Search"
                            className="w-5 h-5 mr-5 dark:text-slate-500"
                        />
                    </a>
                </div>
                {/* END: Search */}

                {/* BEGIN: Search Result */}

                <Dialog
                    size="lg"
                    open={searchResultModal}
                    onClose={() => {
                        setSearchResultModal(false);
                    }}
                    className="flex items-center justify-center"
                >
                    <Dialog.Panel className="p-0">
                        <div className="relative border-b border-slate-200/60">
                            <Lucide
                                icon="Search"
                                className="absolute inset-y-0 w-5 h-5 my-auto ml-4 text-slate-500"
                            />
                            <FormInput
                                type="text"
                                value={searchText}
                                onChange={(e) => {
                                    setSearchText(e.target.value);
                                }}
                                onKeyDown={(e) =>
                                    e.key === "Enter" && handleDataSearch()
                                }
                                className="px-12 py-5 border-0 shadow-none focus:ring-0"
                                placeholder="Search farmer name or agent name or code or FPO or phone number"
                            />
                            <div className="absolute inset-y-0 right-0 flex items-center h-6 px-2 my-auto mr-4 text-xs rounded-md bg-slate-200 text-slate-500">
                                ESC
                            </div>
                        </div>
                        <div className="p-5">
                            <div className="mb-3 font-medium">Farmers</div>
                            <div className="mb-5">
                                {searchResults.farmers.map((farmer, index) => {
                                    return (
                                        <a
                                            key={index}
                                            onClick={(e) => {
                                                e.preventDefault();
                                                navigate(
                                                    `${FARMER_PROFILE}/${farmer.id}`
                                                );
                                                setSearchResultModal(false);
                                            }}
                                            href=""
                                            className="flex items-center mt-3 first:mt-0"
                                        >
                                            <div className="flex items-center justify-center rounded-full w-7 h-7 bg-secondary/20 dark:bg-secondary/10 text-secondary">
                                                <Lucide
                                                    icon="User"
                                                    className="w-3.5 h-3.5"
                                                />
                                            </div>
                                            <div className="ml-3 truncate">
                                                {farmer?.first_name}{" "}
                                                {farmer?.last_name} |{" "}
                                                {farmer?.farmer_id} |{" "}
                                                {farmer?.phone_number}
                                            </div>
                                            <div className="flex items-center justify-end w-48 ml-auto text-xs truncate text-slate-500">
                                                <Lucide
                                                    icon="Link"
                                                    className="w-3.5 h-3.5 mr-2"
                                                />{" "}
                                                Quick Access
                                            </div>
                                        </a>
                                    );
                                })}
                                {searchResults.farmers.length === 0 && (
                                    <div className="text-start text-slate-400 font-thin">
                                        No Results Found
                                    </div>
                                )}
                            </div>
                            <div className="mb-3 font-medium">Agents</div>
                            <div className="mb-5">
                                {searchResults.agents.map((agent, index) => {
                                    return (
                                        <a
                                            key={index}
                                            onClick={(e) => {
                                                e.preventDefault();
                                                navigate(
                                                    `${AGENT_PROFILE}/${agent.id}`
                                                );
                                                setSearchResultModal(false);
                                            }}
                                            href=""
                                            className="flex items-center mt-3 first:mt-0"
                                        >
                                            <div className="flex items-center justify-center rounded-full w-7 h-7 bg-secondary/20 dark:bg-secondary/10 text-secondary">
                                                <Lucide
                                                    icon="User"
                                                    className="w-3.5 h-3.5"
                                                />
                                            </div>
                                            <div className="ml-3 truncate">
                                                {agent?.first_name}{" "}
                                                {agent?.last_name} |{" "}
                                                {agent?.agent_code} |{" "}
                                                {agent?.phone_number}
                                            </div>
                                            <div className="flex items-center justify-end w-48 ml-auto text-xs truncate text-slate-500">
                                                <Lucide
                                                    icon="Link"
                                                    className="w-3.5 h-3.5 mr-2"
                                                />{" "}
                                                Quick Access
                                            </div>
                                        </a>
                                    );
                                })}
                                {searchResults.agents.length === 0 && (
                                    <div className="text-start text-slate-400 font-thin">
                                        No Results Found
                                    </div>
                                )}
                            </div>
                            <div className="mb-3 font-medium">FPOs</div>
                            <div className="mb-5">
                                {searchResults.fpos.map((fpo, index) => {
                                    return (
                                        <a
                                            key={index}
                                            onClick={(e) => {
                                                e.preventDefault();
                                                navigate(
                                                    `${FPO_PROFILE}/${fpo.id}`
                                                );
                                                setSearchResultModal(false);
                                            }}
                                            href=""
                                            className="flex items-center mt-3 first:mt-0"
                                        >
                                            <div className="flex items-center justify-center rounded-full w-7 h-7 bg-secondary/20 dark:bg-secondary/10 text-secondary">
                                                <Lucide
                                                    icon="Home"
                                                    className="w-3.5 h-3.5"
                                                />
                                            </div>
                                            <div className="ml-3 truncate">
                                                {fpo?.fpo_name}
                                            </div>
                                            <div className="flex items-center justify-end w-48 ml-auto text-xs truncate text-slate-500">
                                                <Lucide
                                                    icon="Link"
                                                    className="w-3.5 h-3.5 mr-2"
                                                />{" "}
                                                Quick Access
                                            </div>
                                        </a>
                                    );
                                })}
                                {searchResults.fpos.length === 0 && (
                                    <div className="text-start text-slate-400 font-thin">
                                        No Results Found
                                    </div>
                                )}
                            </div>
                        </div>
                    </Dialog.Panel>
                </Dialog>

                {/* END: Search Result */}

                {/* BEGIN: Notifications */}
                <Popover className="mr-5 intro-x sm:mr-6">
                    <Popover.Button
                        className={clsx([
                            "relative text-white/70 outline-none block",
                            "before:content-[''] before:w-[8px] before:h-[8px] before:rounded-full before:absolute before:top-[-2px] before:right-0 before:bg-white before:opacity-50 before:animate-ping",
                            "after:content-[''] after:w-[8px] after:h-[8px] after:rounded-full after:absolute after:top-[-2px] after:right-0 after:bg-danger",
                        ])}
                    >
                        <Lucide
                            icon="Bell"
                            className="w-5 h-5 dark:text-slate-500"
                        />
                    </Popover.Button>
                    <Popover.Panel className="w-[280px] sm:w-[350px] p-5 mt-2">
                        <div className="mb-5 text-base font-medium">
                            Notifications
                        </div>
                    </Popover.Panel>
                </Popover>
                {/* END: Notifications */}
                {/* BEGIN: Notifications */}
                <div className="mr-auto intro-x sm:mr-6">
                    <div className="relative cursor-pointer text-white/70">
                        <Lucide
                            icon="Inbox"
                            className="w-5 h-5 dark:text-slate-500"
                        />
                    </div>
                </div>
                {/* END: Notifications */}
                {/* BEGIN: Account Menu */}
                <Menu className="h-10 intro-x">
                    <Menu.Button className="flex items-center h-full dropdown-toggle">
                        <div className="ml-3 md:block text-orange-500 rounded-full h-8 w-8 bg-white">
                            <svg
                                role="account-menu-dropdown"
                                fill="none"
                                stroke="currentColor"
                                strokeWidth={1.5}
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                            >
                                <path
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"
                                />
                            </svg>
                        </div>
                    </Menu.Button>
                    <Menu.Items className="w-56 mt-px">
                        <Menu.Item>
                            <Lucide icon="User" className="w-4 h-4 mr-2" />{" "}
                            Profile
                        </Menu.Item>

                        <Menu.Item>
                            <Lucide icon="Lock" className="w-4 h-4 mr-2" />{" "}
                            Reset Password
                        </Menu.Item>
                        <Menu.Item>
                            <Lucide
                                icon="HelpCircle"
                                className="w-4 h-4 mr-2"
                            />{" "}
                            Help
                        </Menu.Item>
                        <Menu.Divider />
                        <Menu.Item
                            data-menu-item-role="log-out-menu-button"
                            onClick={() => {
                                dispatch(logOut(""));
                            }}
                        >
                            <Lucide
                                icon="ToggleRight"
                                className="w-4 h-4 mr-2"
                            />{" "}
                            Logout
                        </Menu.Item>
                    </Menu.Items>
                </Menu>
                {/* END: Account Menu */}
            </div>
            {/* END: Top Bar */}
        </>
    );
}

export default Main;
