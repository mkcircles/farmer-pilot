import {
    Card,
    Title,
    Text,
    Flex,
    Table,
    TableRow,
    TableCell,
    TableHead,
    TableHeaderCell,
    TableBody,
    Badge,
    Button,
    MultiSelect,
    MultiSelectItem,
} from "@tremor/react";
import { useNavigate } from "react-router-dom";

import { useEffect, useState } from "react";
import axios from "axios";
import { API_KEY, BASE_API_URL } from "../../../env";
import { AppContext } from "../../../context/RootContext";
import { useContext } from "react";
import { useSelector } from "react-redux";
import { useAppDispatch } from "../../../stores/hooks";
import { setFpos } from "../../../stores/fpoSlice";
import { debounce, isEqual, without } from "lodash";
import { Download, FilePlus2, Trash, Trash2 } from "lucide-react";
import CreateReportModal from "../CreateReportModal";
import Pagination from "../../../components/Pagination";
import WithConfirmAlert from "../../../helpers/WithConfirmAlert";

export default function ReportsList() {
    const dispatch = useAppDispatch();
    const navigate = useNavigate();
    const token = useSelector((state) => state.auth.token);
    const { updateAppContextState } = useContext(AppContext);
    const [showCreateReportModal, setShowCreateReportModal] = useState(false);
    const [reports, setReports] = useState([]);
    const [currentPage, setCurrentPage] = useState(1);
    const [moveToPage, setMoveToPage] = useState(1);
    const [lastPage, setLastPage] = useState(1);
    const [prevPageUrl, setPrevPageUrl] = useState("");
    const [nextPageUrl, setNextPageUrl] = useState("");

    const [selectedNames, setSelectedNames] = useState([]);
    const isReportSelected = (data) => {
        if (selectedNames.length === 0) return true;
        let report_name = selectedNames?.find((report_name) =>
            isEqual(report_name, data?.name)
        );
        if (report_name) return true;
    };

    const fetchReports = (
        { showLoading } = {
            showLoading: true,
        }
    ) => {
        let url = `${BASE_API_URL}/reports`;
        updateAppContextState("loading", showLoading);
        axios
            .get(url, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((res) => {
                console.log("Reports Data", res?.data?.data);
                let resData = res?.data?.data;
                if (res?.data) {
                    setCurrentPage(resData?.current_page);
                    setPrevPageUrl(resData?.prev_page_url);
                    setNextPageUrl(resData?.next_page_url);
                    setLastPage(resData?.last_page);
                    setReports(resData);
                }
            })
            .catch((err) => {
                console.log(err);
            })
            .finally(() => {
                updateAppContextState("loading", false);
            });
    };

    useEffect(() => {
        fetchReports();
    }, [token]);

    useEffect(() => {
        if (moveToPage == currentPage) return;
        setMoveToPage(currentPage);
    }, [currentPage]);

    useEffect(() => {
        if (moveToPage == currentPage) return;
        debounce(
            fetchReports,
            1000
        )(`${BASE_API_URL}/reports?page=${moveToPage || 1}`);
    }, [moveToPage]);

    useEffect(() => {
        if (!showCreateReportModal) fetchReports({ showLoading: false });
    }, [showCreateReportModal]);

    const formatDateString = (date) => {
        return new Date(date).toLocaleDateString("en-us", {
            day: "numeric",
            year: "numeric",
            month: "short",
        });
    };

    const deleteReport = (id) => {
        updateAppContextState("loading", true);
        return new Promise((resolve, reject) => {
            axios
            .delete(`${BASE_API_URL}/report/${id}`, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then(() => {
                fetchReports();
                resolve({
                    title: "success",
                    message: "Report deleted successfully",
                })
            })
            .catch((err) => {
                console.log(err);
                reject({
                    message: "Something went wrong. Report could not be deleted",
                    title: "error",
                })
            })
            .finally(() => {
                updateAppContextState("loading", false);
            });
        })
    }

    const formatReportType = (type) => {
        switch (type) {
            case "crop-report":
                return "Crops Report";
            case "farmer-report":
                return "Farmers Report";
            case "custom-report":
                return "Custom Report";
            default:
                return type;
        }
    }

    return (
        <div className="w-full h-full">
            <Card className=" px-0">
                <div className="flex border-b space-x-4 items-center w-full lg:justify-between justify-start pb-4">
                    <div className="flex items-center w-52 lg:w-80">
                        <MultiSelect
                            onValueChange={setSelectedNames}
                            placeholder="Search Reports..."
                            className="max-w-md"
                        >
                            {reports?.data?.map((report) => (
                                <MultiSelectItem
                                    key={report?.id}
                                    value={report?.name}
                                >
                                    {report?.name}
                                </MultiSelectItem>
                            ))}
                        </MultiSelect>
                    </div>
                    <div className="flex">
                        <button
                            onClick={() => setShowCreateReportModal(true)}
                            className="group flex space-x-2 px-4 py-3 border border-secondary rounded text-secondary"
                        >
                            <FilePlus2 className="w-5 h-5 group-hover:scale-125 " />
                            <span className="group-hover:scale-95">
                                New Report
                            </span>
                        </button>
                    </div>
                </div>

                <Table className="">
                    <TableHead>
                        <TableRow className="">
                            <TableHeaderCell>Name</TableHeaderCell>
                            <TableHeaderCell>Type</TableHeaderCell>
                            <TableHeaderCell>Date</TableHeaderCell>
                            <TableHeaderCell>Filters</TableHeaderCell>
                            <TableHeaderCell>Status</TableHeaderCell>
                            <TableHeaderCell>Action</TableHeaderCell>
                        </TableRow>
                    </TableHead>

                    <TableBody>
                        {reports?.data
                            ?.filter((report) => isReportSelected(report))
                            .map((report) => {
                                report = {
                                    ...report,
                                    ...JSON.parse(report?.report_params),
                                };
                                return (
                                    <TableRow key={report?.id} className="m-0">
                                        <TableCell>{report?.name}</TableCell>
                                        <TableCell>
                                            {formatReportType(report?.report_type)}
                                        </TableCell>
                                        <TableCell>
                                            {formatDateString(
                                                report?.from_date
                                            )}{" "}
                                            -{" "}
                                            {formatDateString(report?.to_date)}
                                        </TableCell>
                                        <TableCell>
                                            {report?.district && <Badge color="gray" className="capitalize">
                                                District: {report?.district}
                                            </Badge>}
                                            {report?.gender && <Badge color="gray" className="capitalize">
                                                Gender: {report?.gender}
                                            </Badge>}
                                            {report?.product && <Badge color="gray" className="capitalize">
                                                Crop: {report?.product}
                                            </Badge>}
                                            {report?.farm_size && <Badge color="gray" className="capitalize">
                                                Farm size: {report?.farm_size}
                                            </Badge>}
                                            {report?.agent_id && <Badge color="gray" className="capitalize">
                                                Agent
                                            </Badge>}
                                            {report?.fpo_id && <Badge color="gray" className="capitalize">
                                                FPO
                                            </Badge>}
                                        </TableCell>
                                        <TableCell>
                                            {report?.report_status ===
                                            "pending" ? (
                                                <Badge
                                                    className="capitalize"
                                                    size="md"
                                                    color="orange"
                                                >
                                                    pending
                                                </Badge>
                                            ) : report?.report_status ===
                                              "completed" ? (
                                                <Badge
                                                    className="capitalize"
                                                    size="md"
                                                    color="green"
                                                >
                                                    completed
                                                </Badge>
                                            ) : (
                                                <Badge
                                                    className="capitalize"
                                                    size="md"
                                                    color="red"
                                                >
                                                    failed
                                                </Badge>
                                            )}
                                        </TableCell>
                                        <TableCell>
                                            <div className="flex items-center space-x-4">
                                                {report?.report_status ===
                                                "completed" ? (
                                                    <a
                                                        target="_blank"
                                                        title="Download"
                                                        href={`/reports/${report?.report_url}`}
                                                        className="text-secondary transition-all duration-700"
                                                    >
                                                        <Download className="h-5 w-5 hover:scale-125" />
                                                    </a>
                                                ) : (
                                                    <Download className="h-5 w-5 text-tremor-brand-muted cursor-not-allowed" />
                                                )}
                                                <span onClick={() => {
                                                    WithConfirmAlert(() => deleteReport(report?.id));
                                                }} title="Delete">
                                                    <Trash2 className="h-5 w-5 text-danger cursor-pointer" />
                                                </span>
                                            </div>
                                        </TableCell>
                                    </TableRow>
                                );
                            })}
                    </TableBody>
                </Table>

                <Pagination
                    currentPage={currentPage}
                    moveToPage={moveToPage}
                    fetchPage={fetchReports}
                    setMoveToPage={setMoveToPage}
                    nextPageUrl={nextPageUrl}
                    prevPageUrl={prevPageUrl}
                    lastPage={lastPage}
                    totalPages={reports?.last_page}
                />

                <CreateReportModal
                    showModal={showCreateReportModal}
                    setShowModal={setShowCreateReportModal}
                />
            </Card>
        </div>
    );
}
