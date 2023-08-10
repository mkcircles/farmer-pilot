import{r as e,_ as C,u as $,A,j as s,L as d,B as l}from"./app-2d77318b.js";import{u as F,b as o,m,s as u,d as L,h as k,i as x,n as E,j as n}from"./Tracker-9e248fef.js";import{n as h}from"./numberFormatter-373bc269.js";import{S as P,C as y,a as D}from"./square-stack-f282611d.js";import"./Transition-18176916.js";import"./default-config-939e3be8.js";const p=e.lazy(()=>C(()=>import("./index-d7cebc30.js"),["assets/index-d7cebc30.js","assets/app-2d77318b.js","assets/app-be85fb0a.css","assets/Tracker-9e248fef.js","assets/Transition-18176916.js","assets/default-config-939e3be8.js","assets/numberFormatter-373bc269.js","assets/index-b6ea816c.js"])),J=()=>{const j=$(i=>i.auth.token),{updateAppContextState:c}=e.useContext(A),[a,S]=e.useState({}),[I,g]=e.useState({}),b=(i=`${l}/summary`)=>{c("loading",!0),axios.get(i,{headers:{Authorization:`Bearer ${j}`}}).then(t=>{console.log("Stats Data",t==null?void 0:t.data);let r=t==null?void 0:t.data;t!=null&&t.data&&g(r)}).catch(t=>{console.log(t)}).finally(()=>{c("loading",!1)})},B=(i=`${l}/bio/summary`)=>{c("loading",!0),axios.get(i,{headers:{Authorization:`Bearer ${j}`}}).then(t=>{var f,_;console.log("Bio Summary Data",(f=t==null?void 0:t.data)==null?void 0:f.data);let r=(_=t==null?void 0:t.data)==null?void 0:_.data;t!=null&&t.data&&S(JSON.parse(r))}).catch(t=>{console.log(t)}).finally(()=>{c("loading",!1)})};return e.useEffect(()=>{b(),B()},[]),s.jsxs(s.Fragment,{children:[s.jsxs(F,{numItemsSm:2,numItemsLg:3,className:"gap-6 mt-4",children:[s.jsxs(o,{children:[s.jsx(m,{children:"Biometrics Captured"}),s.jsx(u,{children:h(a==null?void 0:a.bio_summary)})]}),s.jsxs(o,{children:[s.jsx(m,{children:"Failed Captures"}),s.jsx(u,{children:h(a==null?void 0:a.denied_captures)})]}),s.jsxs(o,{children:[s.jsx(m,{children:"Possibe Duplicates"}),s.jsx(u,{children:h(a==null?void 0:a.possible_duplicates)})]})]}),s.jsx(o,{className:"mt-4",children:s.jsxs(L,{children:[s.jsxs(k,{className:"",children:[s.jsx(x,{icon:P,children:"Biometrics Captured"}),s.jsx(x,{icon:y,children:"Failed Captures"}),s.jsx(x,{icon:D,children:"Possible Duplicates"})]}),s.jsxs(E,{children:[s.jsx(n,{children:s.jsx(e.Suspense,{fallback:s.jsx(d,{}),children:s.jsx(p,{title:"All Biometrics Captures",biometrics_api_url:`${l}/farmers/bio`})})}),s.jsx(n,{children:s.jsx(e.Suspense,{fallback:s.jsx(d,{}),children:s.jsx(p,{title:"Failed Captures",biometrics_api_url:`${l}/farmers/bio/failed`})})}),s.jsx(n,{children:s.jsx(e.Suspense,{fallback:s.jsx(d,{}),children:s.jsx(p,{title:"Possible Duplicates",biometrics_api_url:`${l}/farmers/bio/duplicates`})})}),s.jsx(n,{})]})]})})]})};export{J as default};