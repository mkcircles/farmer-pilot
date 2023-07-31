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
import { FileBarChart, FilePlus2 } from "lucide-react";
import CreateReportModal from "./CreateReportModal";
import { useState } from "react";
import ReportsList from "./ReportsList";

const Reports = () => {

    return (
        
            <Card className="my-4 w-full h-full">
                <TabGroup>
                    <TabList className="">
                        <Tab icon={FileBarChart}>Reports</Tab>
                        <Tab icon={ActivityIcon}>Agent Performance</Tab>
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
                    </TabPanels>
                </TabGroup>
            </Card>
    );
};

export default Reports;
