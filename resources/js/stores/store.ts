import { configureStore, ThunkAction, Action } from "@reduxjs/toolkit";
import darkModeReducer from "./darkModeSlice";
import colorSchemeReducer from "./colorSchemeSlice";
import sideMenuReducer from "./sideMenuSlice";
import authReducer from "./authSlice";
import fpoReducer from "./fpoSlice";
import appErrorReducer from "./appErrorSlice";
import appSuccessAlertReducer from "./appSuccessAlert";

export const store = configureStore({
  reducer: {
    darkMode: darkModeReducer,
    colorScheme: colorSchemeReducer,
    sideMenu: sideMenuReducer,
    auth: authReducer,
    fpos: fpoReducer,
    app_error: appErrorReducer,
    app_success_alerts: appSuccessAlertReducer,
  },
});

export type AppDispatch = typeof store.dispatch;
export type RootState = ReturnType<typeof store.getState>;
export type AppThunk<ReturnType = void> = ThunkAction<
  ReturnType,
  RootState,
  unknown,
  Action<string>
>;
