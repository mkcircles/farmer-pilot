import{r as e,_ as C,u as $,A,j as s,L as d,B as l}from"./app-f8605b1f.js";import{u as F,b as c,m,s as u,d as L,h as k,i as x,n as E,j as n}from"./Tracker-d1c86d93.js";import{n as p}from"./numberFormatter-373bc269.js";import{S as P,C as y,a as D}from"./square-stack-d7bbd778.js";import"./Transition-ec4945ec.js";import"./default-config-939e3be8.js";import"./createLucideIcon-4a41c09c.js";const h=e.lazy(()=>C(()=>import("./index-5a687aa4.js"),["assets/index-5a687aa4.js","assets/app-f8605b1f.js","assets/app-be85fb0a.css","assets/Tracker-d1c86d93.js","assets/Transition-ec4945ec.js","assets/default-config-939e3be8.js","assets/numberFormatter-373bc269.js","assets/index-25a8bf3b.js","assets/copy-5a65164c.js","assets/createLucideIcon-4a41c09c.js"])),T=()=>{const j=$(i=>i.auth.token),{updateAppContextState:o}=e.useContext(A),[a,S]=e.useState({}),[I,g]=e.useState({}),b=(i=`${l}/summary`)=>{o("loading",!0),axios.get(i,{headers:{Authorization:`Bearer ${j}`}}).then(t=>{console.log("Stats Data",t==null?void 0:t.data);let r=t==null?void 0:t.data;t!=null&&t.data&&g(r)}).catch(t=>{console.log(t)}).finally(()=>{o("loading",!1)})},B=(i=`${l}/bio/summary`)=>{o("loading",!0),axios.get(i,{headers:{Authorization:`Bearer ${j}`}}).then(t=>{var f,_;console.log("Bio Summary Data",(f=t==null?void 0:t.data)==null?void 0:f.data);let r=(_=t==null?void 0:t.data)==null?void 0:_.data;t!=null&&t.data&&S(JSON.parse(r))}).catch(t=>{console.log(t)}).finally(()=>{o("loading",!1)})};return e.useEffect(()=>{b(),B()},[]),s.jsxs(s.Fragment,{children:[s.jsxs(F,{numItemsSm:2,numItemsLg:3,className:"gap-6 mt-4",children:[s.jsxs(c,{children:[s.jsx(m,{children:"Biometrics Captured"}),s.jsx(u,{children:p(a==null?void 0:a.bio_summary)})]}),s.jsxs(c,{children:[s.jsx(m,{children:"Failed Captures"}),s.jsx(u,{children:p(a==null?void 0:a.denied_captures)})]}),s.jsxs(c,{children:[s.jsx(m,{children:"Possibe Duplicates"}),s.jsx(u,{children:p(a==null?void 0:a.possible_duplicates)})]})]}),s.jsx(c,{className:"mt-4",children:s.jsxs(L,{children:[s.jsxs(k,{className:"",children:[s.jsx(x,{icon:P,children:"Biometrics Captured"}),s.jsx(x,{icon:y,children:"Failed Captures"}),s.jsx(x,{icon:D,children:"Possible Duplicates"})]}),s.jsxs(E,{children:[s.jsx(n,{children:s.jsx(e.Suspense,{fallback:s.jsx(d,{}),children:s.jsx(h,{title:"All Biometrics Captures",biometrics_api_url:`${l}/farmers/bio`})})}),s.jsx(n,{children:s.jsx(e.Suspense,{fallback:s.jsx(d,{}),children:s.jsx(h,{title:"Failed Captures",biometrics_api_url:`${l}/farmers/bio/failed`})})}),s.jsx(n,{children:s.jsx(e.Suspense,{fallback:s.jsx(d,{}),children:s.jsx(h,{title:"Possible Duplicates",biometrics_api_url:`${l}/farmers/bio/duplicates`})})}),s.jsx(n,{})]})]})})]})};export{T as default};