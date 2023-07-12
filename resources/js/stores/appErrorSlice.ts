import { createSlice, PayloadAction } from "@reduxjs/toolkit";

type AppError = {
    id: string,
    message: string,
    
}

interface AppErrorState {
  errorMessages: AppError[],
}

const initialState: AppErrorState = {
  errorMessages: [],
};

export const appErrorSlice = createSlice({
  name: "app_error",
  initialState,
  reducers: {
    setAppError: (state, action) => {
      state.errorMessages = [...state?.errorMessages, action.payload];
    },
    removeAppError: (state, action) => {
      state.errorMessages = [...state.errorMessages.filter(msg => (msg.id !== action.payload?.id))];
    },
  },
});

export const { setAppError, removeAppError } = appErrorSlice.actions;



export default appErrorSlice.reducer;
