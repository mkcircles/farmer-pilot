import { createSlice } from "@reduxjs/toolkit";
import { RootState } from "./store";
import { icons } from "../base-components/Lucide";
import { AGENTS_LIST, FARMERS_LIST, FPO_LIST, FPO_MAP, HOME, LOGOUT, REPORTS, USERS_LIST } from "../router/routes";

export interface Menu {
  icon: keyof typeof icons;
  title: string;
  pathname?: string;
  subMenu?: Menu[];
  ignore?: boolean;
}

export interface SideMenuState {
  menu: Array<Menu | string>;
}

const initialState: SideMenuState = {
  menu: [
    {
      icon: "Home",
      title: "Dashboard",
      pathname: HOME,
      
    },
    
    {
      icon: "LucideUserCog",
      pathname: USERS_LIST,
      title: "Users",
    },
    {
      icon: "Users",
      pathname: FARMERS_LIST,
      title: "Farmers",
    },
    {
      icon: "Users",
      pathname: FPO_LIST,
      title: "FPOs",
    },
    {
      icon: "MapPin",
      pathname: FPO_MAP,
      title: "FPOs Map",
    },
    {
      icon: "Users",
      pathname: AGENTS_LIST,
      title: "Agents",
    },
    
    {
      icon: "Activity",
      title: "Reports",
      pathname: REPORTS,
      
    },

    {
      icon: "ArrowLeft",
      title: "Logout",
      pathname: LOGOUT,
      
    },
    
    

  ],
};

export const sideMenuSlice = createSlice({
  name: "sideMenu",
  initialState,
  reducers: {},
});

export const selectSideMenu = (state: RootState) => state.sideMenu.menu;

export default sideMenuSlice.reducer;
