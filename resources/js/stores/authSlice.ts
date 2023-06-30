import { createSlice, PayloadAction } from "@reduxjs/toolkit";

type User = {
    id: number;
    name: string;
    email: string;
    phone_number: string;
    email_verified_at: string | null;
    role: string;
    created_at: string;
    updated_at: string;
};

interface AuthState {
    user: User | null;
    token: string | null;
}

const initialState: AuthState = {
    user: localStorage.getItem("user")
        ? JSON.parse(localStorage.getItem("user"))
        : null,
    token: localStorage.getItem("token") || null,
};

export const authSlice = createSlice({
    name: "auth",
    initialState,
    reducers: {
        setToken: (state, action) => {
            state.token = action.payload;
            localStorage.setItem("token", action.payload);
        },
        setUser: (state, action) => {
            state.user = { ...action.payload };
            localStorage.setItem("user", JSON.stringify(action.payload));
        },
        logOut: (state, action: any) => {
            localStorage.setItem("token", null);
            localStorage.setItem("user", null);
            state.user = null;
            state.token = null;
        },
    },
});

export const { setToken, setUser, logOut } = authSlice.actions;

export default authSlice.reducer;
