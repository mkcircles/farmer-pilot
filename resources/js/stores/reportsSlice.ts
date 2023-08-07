import { createSlice, PayloadAction } from "@reduxjs/toolkit";



interface Reports {
    farmersPerDistrict: any;
    stats: any;
    agentsPerformance: any;
}

const initialState: Reports = {
    farmersPerDistrict: localStorage.getItem("reports/farmersPerDistrict")
    ? JSON.parse(localStorage.getItem("reports/farmersPerDistrict"))
    : [],
    stats: localStorage.getItem("reports/stats")
    ? JSON.parse(localStorage.getItem("reports/stats"))
    : {},
    agentsPerformance: localStorage.getItem("reports/agentsPerformance")
    ? JSON.parse(localStorage.getItem("reports/agentsPerformance"))
    : [],
};

export const reportsSlice = createSlice({
    name: "reports",
    initialState,
    reducers: {
        saveReport: (state, action: {
            payload: {
                reportType: string;
                reportData: any;
            },
            type: string
        }) => {
            state[action.payload?.reportType] = action.payload?.reportData;
            localStorage.setItem("reports/" + action.payload?.reportType, JSON.stringify(action.payload?.reportData));
        },
    },
});

export const { saveReport } = reportsSlice.actions;

export default reportsSlice.reducer;
