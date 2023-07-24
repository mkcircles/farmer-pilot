import { BASE_API_URL } from "../env";
import { createApi, fetchBaseQuery } from "@reduxjs/toolkit/query/react";

export const refreshTokenAPI = createApi({
  reducerPath: "refreshToken",
  refetchOnFocus: true,
  baseQuery: fetchBaseQuery({ 
    baseUrl: BASE_API_URL,
    prepareHeaders: (headers, { getState }: any) => {
      const token = getState()?.auth?.token;
      if (token) {
        // include token in req header
        headers.set("Authorization", `Bearer ${token}`);
        return headers;
      }
    },
   }),
  
  endpoints: (builder) => ({

    refreshToken: builder.mutation({
        query: () => ({
          url: `/refresh`,
          method: "POST",
        }),
      }),
    
  }),
  
});

export const { useRefreshTokenMutation } = refreshTokenAPI;
export default refreshTokenAPI;
