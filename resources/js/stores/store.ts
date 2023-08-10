import { configureStore, ThunkAction, Action } from "@reduxjs/toolkit";
import darkModeReducer from "./darkModeSlice";
import colorSchemeReducer from "./colorSchemeSlice";
import sideMenuReducer from "./sideMenuSlice";
import authReducer from "./authSlice";
import fpoReducer from "./fpoSlice";
import appErrorReducer from "./appErrorSlice";
import reportsReducer from "./reportsSlice";
import appSuccessAlertReducer from "./appSuccessAlert";
import refreshTokenAPI from "../services/RefreshTokenAPI";
import { setupListeners } from "@reduxjs/toolkit/dist/query";

export const store = configureStore({
  reducer: {
    darkMode: darkModeReducer,
    colorScheme: colorSchemeReducer,
    sideMenu: sideMenuReducer,
    auth: authReducer,
    fpos: fpoReducer,
    app_error: appErrorReducer,
    app_success_alerts: appSuccessAlertReducer,
    reports: reportsReducer,
    [refreshTokenAPI.reducerPath] : refreshTokenAPI.reducer,
  },

  middleware: (getDefaultMiddleware) => {
    return getDefaultMiddleware({
      serializableCheck: false,
    }).concat(
      refreshTokenAPI.middleware,
      );
  },

  devTools: process.env.NODE_ENV !== "production",
});

setupListeners(store.dispatch);

export type AppDispatch = typeof store.dispatch;
export type RootState = ReturnType<typeof store.getState>;
export type AppThunk<ReturnType = void> = ThunkAction<
  ReturnType,
  RootState,
  unknown,
  Action<string>
>;
