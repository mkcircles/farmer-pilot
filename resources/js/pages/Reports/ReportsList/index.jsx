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
import { Download } from "lucide-react";

export default function ReportsList() {
    const dispatch = useAppDispatch();
    const navigate = useNavigate();
    const token = useSelector((state) => state.auth.token);
    const { updateAppContextState } = useContext(AppContext);
    const [reports, setReports] = useState([]);

    const [selectedNames, setSelectedNames] = useState([]);
    const isReportSelected = (data) => {
        if (selectedNames.length === 0) return true;
        let report_name = selectedNames?.find((report_name) =>
            isEqual(report_name, data?.name)
        );
        if (report_name) return true;
    };

    const fetchReports = (url = `${BASE_API_URL}/reports`) => {
        updateAppContextState("loading", true);
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

    return (
        <div className="w-full h-full">
            <Card className=" px-0">
                

                <div className="flex space-x-4 items-center w-full lg:justify-between justify-start py-5">
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

                </div>

                <Table className="">
                    <TableHead>
                        <TableRow className="uppercase">
                            <TableHeaderCell>Name</TableHeaderCell>
                            <TableHeaderCell>Type</TableHeaderCell>
                            <TableHeaderCell>From Date</TableHeaderCell>
                            <TableHeaderCell>To Date</TableHeaderCell>
                            <TableHeaderCell>District</TableHeaderCell>
                            <TableHeaderCell>Agent</TableHeaderCell>
                            <TableHeaderCell>Product</TableHeaderCell>
                            <TableHeaderCell>Farm Size</TableHeaderCell>
                            <TableHeaderCell>Gender</TableHeaderCell>
                            <TableHeaderCell>Status</TableHeaderCell>
                            <TableHeaderCell>Link</TableHeaderCell>
                        </TableRow>
                    </TableHead>

                    <TableBody>
                        {reports
                            ?.filter((report) => isReportSelected(report))
                            .map((report) => {
                                report = {
                                    ...report,...JSON.parse(report?.report_params),
                                };
                                return (
                                <TableRow key={report?.id} className="m-0">
                                    <TableCell>{report?.name}</TableCell>
                                    <TableCell>
                                        {report?.report_type}
                                    </TableCell>
                                    <TableCell>{report?.from_date}</TableCell>
                                    <TableCell>{report?.to_date}</TableCell>

                                    <TableCell>
                                        {report?.district}
                                    </TableCell>
                                    <TableCell>
                                        {report?.agent_id}
                                    </TableCell>
                                    <TableCell>
                                        {report?.product}
                                    </TableCell>
                                    <TableCell>
                                        {report?.farm_size}
                                    </TableCell>
                                    <TableCell>
                                        {report?.gender}
                                    </TableCell>
                                    <TableCell>
                                        {report?.status}
                                    </TableCell>
                                    <TableCell>
                                        <a title="Download" href={report?.report_url} className="text-secondary transition-all duration-700">
                                            <Download className="h-5 w-5 hover:scale-125" />
                                        </a>
                                    </TableCell>
                                    
                                </TableRow>
                            )})}
                    </TableBody>
                </Table>

                
            </Card>
        </div>
    );
}
