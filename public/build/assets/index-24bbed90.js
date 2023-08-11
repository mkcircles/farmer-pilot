import{r,j as a}from"./app-a9cd996b.js";import{t as o}from"./tw-merge-fbb83fc6.js";const i=r.createContext(!1),l=r.createContext(!1),f=r.forwardRef((e,t)=>{const s=r.useContext(i),n=r.useContext(l),{formInputSize:u,rounded:m,...c}=e;return a.jsx("input",{...c,ref:t,className:o(["disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent","[&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent","transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80",e.formInputSize=="sm"&&"text-xs py-1.5 px-2",e.formInputSize=="lg"&&"text-lg py-1.5 px-4",e.rounded&&"rounded-full",s&&"flex-1",n&&"rounded-none [&:not(:first-child)]:border-l-transparent first:rounded-l last:rounded-r z-10",e.className])})});function d(e){return a.jsx("div",{...e,className:o(["flex items-center",e.className]),children:e.children})}d.Label=e=>a.jsx("label",{...e,className:o(["cursor-pointer ml-2",e.className]),children:e.children});d.Input=e=>a.jsx("input",{...e,className:o(["transition-all duration-100 ease-in-out",e.type=="radio"&&"shadow-sm border-slate-200 cursor-pointer focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50",e.type=="checkbox"&&"shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50","[&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10","[&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10","[&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50","[&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50",e.className])});export{f as F,d as a,i as f};