import { createSlice, PayloadAction } from "@reduxjs/toolkit";

type Fpo = {
    "fpo_name": string,
    "district": string,
    "county": string,
    "sub_county": string,
    "parish":string,
    "village": string,
    "main_crop": string,
    "fpo_member_count": number,
    "fpo_contact_name": string,
    "contact_phone_number": string,
    "address": string,
    "created_by": number
}

interface FpoState {
  fpos: Fpo[],
}

const initialState: FpoState = {
  fpos: [],
};

export const fpoSlice = createSlice({
  name: "fpo",
  initialState,
  reducers: {
    setFpos: (state, action) => {
      state.fpos = action.payload;
    },
    
  },
});

export const { setFpos } = fpoSlice.actions;



export default fpoSlice.reducer;
