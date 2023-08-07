import {
    ProgressBar,
    Card,
    Flex,
    Text,
    Metric,
    TabList,
    Tab,
    TabGroup,
    TabPanels,
    TabPanel,
    List,
    ListItem,
    BadgeDelta,
    Bold,
    Grid,
} from "@tremor/react";
import AgentPerformance from "./AgentPerformance";
import { Activity as ActivityIcon } from "react-feather";
import { AreaChart, CalendarDays, FileBarChart, FilePlus2, LineChart } from "lucide-react";
import CreateReportModal from "./CreateReportModal";
import { useState } from "react";
import ReportsList from "./ReportsList";
import FarmersPerDistrict from "./FarmersPerDistrict";
import FarmerRegistrationByDate from "./FarmerRegistrationByDate";

const Reports = () => {

    return (
        
            <Card className="my-4 w-full h-full">
                <TabGroup>
                    <TabList className="">
                        <Tab icon={FileBarChart}>Reports</Tab>
                        <Tab icon={ActivityIcon}>Agent Performance</Tab>
                        <Tab icon={LineChart}>Farmers Per District</Tab>
                        <Tab icon={AreaChart}>Farmer Registration By Date</Tab>
                    </TabList>
                    <TabPanels>
                        <TabPanel >
                            <div className="w-full h-full">
                                <ReportsList /> 
                            </div>
                            
                        </TabPanel>
                        <TabPanel>
                            <AgentPerformance />
                        </TabPanel>
                        <TabPanel>
                            <FarmersPerDistrict />
                        </TabPanel>
                        <TabPanel>
                            <FarmerRegistrationByDate />
                        </TabPanel>
                    </TabPanels>
                </TabGroup>
            </Card>
    );
};

export default Reports;
