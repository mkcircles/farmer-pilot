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
    const [showCreateReportModal, setShowCreateReportModal] = useState(false);

    return (
        
            <Card className="my-4 w-full h-full">
                <TabGroup>
                    <TabList className="">
                        <Tab icon={FileBarChart}>Reports</Tab>
                        <Tab icon={ActivityIcon}>Agent Performance</Tab>
                    </TabList>
                    <TabPanels>
                        <TabPanel >
                            <div className="w-full h-screen overflow-y-auto py-4 relative">
                                <div className="flex">
                                    <button
                                        onClick={() =>
                                            setShowCreateReportModal(true)
                                        }
                                        className="group flex space-x-2 px-4 py-3 border border-secondary rounded text-secondary"
                                    >
                                        <FilePlus2 className="w-5 h-5 group-hover:scale-125 " />
                                        <span className="group-hover:scale-95">
                                            New Report
                                        </span>
                                    </button>
                                </div>
                                <CreateReportModal
                                    showModal={showCreateReportModal}
                                    setShowModal={setShowCreateReportModal}
                                />
                                {/* <ReportsList /> */}
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
