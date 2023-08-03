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
import { debounce, isEqual } from "lodash";
import { Download, FilePlus2, Trash, Trash2 } from "lucide-react";
import CreateReportModal from "../CreateReportModal";

export default function ReportsList() {
    const dispatch = useAppDispatch();
    const navigate = useNavigate();
    const token = useSelector((state) => state.auth.token);
    const { updateAppContextState } = useContext(AppContext);
    const [showCreateReportModal, setShowCreateReportModal] = useState(false);
    const [reports, setReports] = useState([]);

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
                    setReports(resData);
                    // dispatch(setFpos(resData?.data));
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
        if (!showCreateReportModal) fetchReports({ showLoading: false });
    }, [showCreateReportModal]);

    const formatDateString = (date) => {
        return new Date(date).toLocaleDateString("en-us", {
            day: "numeric",
            year: "numeric",
            month: "short",
        });
    };

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
                            {reports?.map((report) => (
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
                            <TableHeaderCell>District</TableHeaderCell>
                            <TableHeaderCell>Agent</TableHeaderCell>
                            <TableHeaderCell>Product</TableHeaderCell>
                            <TableHeaderCell>Farm Size (Acres)</TableHeaderCell>
                            <TableHeaderCell>Gender</TableHeaderCell>
                            <TableHeaderCell>Status</TableHeaderCell>
                            <TableHeaderCell>Action</TableHeaderCell>
                        </TableRow>
                    </TableHead>

                    <TableBody>
                        {reports
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
                                            {report?.report_type}
                                        </TableCell>
                                        <TableCell>
                                            {formatDateString(
                                                report?.from_date
                                            )}{" "}
                                            -{" "}
                                            {formatDateString(report?.to_date)}
                                        </TableCell>
                                        <TableCell>
                                            {report?.district || "-"}
                                        </TableCell>
                                        <TableCell>
                                            {report?.agent_id || "-"}
                                        </TableCell>
                                        <TableCell>
                                            {report?.product || "-"}
                                        </TableCell>
                                        <TableCell>
                                            {report?.farm_size || "-"}
                                        </TableCell>
                                        <TableCell>
                                            {report?.gender || "-"}
                                        </TableCell>
                                        <TableCell>
                                            {report?.report_status ===
                                            "pending" ? (
                                                <Badge className="capitalize" size="md" color="orange">
                                                    pending
                                                </Badge>
                                            ) : report?.report_status ===
                                              "completed" ? (
                                                <Badge className="capitalize" size="md" color="green">
                                                    completed
                                                </Badge>
                                            ) : (
                                                <Badge className="capitalize" size="md" color="red">
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
                                                {/* <span title="Delete">
                                            <Trash2 className="h-5 w-5 text-danger cursor-pointer" />
                                        </span> */}
                                            </div>
                                        </TableCell>
                                    </TableRow>
                                );
                            })}
                    </TableBody>
                </Table>

                <CreateReportModal
                    showModal={showCreateReportModal}
                    setShowModal={setShowCreateReportModal}
                />
            </Card>
        </div>
    );
}
