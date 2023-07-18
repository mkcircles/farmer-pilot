import { createSlice, PayloadAction } from "@reduxjs/toolkit";
import { v4 as uuidv4 } from "uuid";

type AppSuccessAlert = {
    id: string,
    message: string,
    
}

interface AppSuccessAlertState {
  successMessages: AppSuccessAlert[],
}

const initialState: AppSuccessAlertState = {
    successMessages: [],
};

export const appSuccessAlertSlice = createSlice({
  name: "app_success_alerts",
  initialState,
  reducers: {
    setAppSuccessAlert: (state, action) => {
      state.successMessages = [...state?.successMessages, {id: uuidv4(), ...action.payload}];
    },
    removeAppSuccessAlert: (state, action) => {
      state.successMessages = [...state.successMessages.filter(msg => (msg.id !== action.payload?.id))];
    },
  },
});

export const { setAppSuccessAlert, removeAppSuccessAlert } = appSuccessAlertSlice.actions;



export default appSuccessAlertSlice.reducer;
