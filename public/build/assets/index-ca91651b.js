import{r,a as Z,b as D,u as W,A as ss,e as es,j as s,L as cs,F as X,c as ls,f as as,d as q,B as H}from"./app-f8605b1f.js";import{A as ns,M as ts,F as is,P as rs,a as ds,U as xs,b as os,c as ps,d as m,L as hs}from"./index-56c9f67f.js";import{e as js,A as K,b as C,d as ms,h as us,i as A,n as Ns,j as k,B as u,C as l,a,m as c,D as n}from"./Tracker-d1c86d93.js";import{n as _}from"./numberFormatter-373bc269.js";import{B as ys}from"./index-da258023.js";import{L as _s,C as bs,B as gs,d as vs,e as ws,f as Cs,g as As}from"./index-4711abef.js";import{W as j}from"./WithConfirmAlert-3a9951e0.js";import{F as ks}from"./home-307fb522.js";import{T as fs}from"./tablet-b62db686.js";import{C as Is}from"./copy-5a65164c.js";import"./mapbox-gl-b45e5884.js";import"./Transition-ec4945ec.js";import"./default-config-939e3be8.js";import"./tw-merge-fbb83fc6.js";import"./createLucideIcon-4a41c09c.js";import"./square-stack-d7bbd778.js";import"./x-circle-7a8c38a5.js";function Fs(b,o){return r.createElement("svg",Object.assign({xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24",strokeWidth:2,stroke:"currentColor","aria-hidden":"true",ref:o},b),r.createElement("path",{strokeLinecap:"round",strokeLinejoin:"round",d:"M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"}))}const Ps=r.forwardRef(Fs),Ss=Ps,Ks=()=>{var P,S,z,M,B,E,L,$,O,R,U,T,V,G,J;const b=Z(),o=D(),g=W(t=>t.auth.token),v=W(t=>{var i;return(i=t.fpos)==null?void 0:i.fpos}),{updateAppContextState:N}=r.useContext(ss),[e,Q]=r.useState(null),[f,x]=r.useState(!1),[I,Y]=r.useState(""),y=r.useRef(null);let{id:w}=es();const p=t=>new Promise((i,d)=>{N("loading",!0),q.put(`${H}/farmer/update/status`,{id:w,status:t},{headers:{Authorization:`Bearer ${g}`}}).then(({data:h})=>{if(console.log("Agent Data",h.data),h!=null&&h.data)return F(),i({message:"Farmer profile status updated successfully",title:"success"});d({message:"Something went wrong",title:"error"})}).catch(h=>{console.log(h),d({message:"Something went wrong",title:"error"})}).finally(()=>{N("loading",!1)})}),F=()=>{N("loading",!0),q.get(`${H}/farmer/${w}`,{headers:{Authorization:`Bearer ${g}`}}).then(t=>{var i,d;console.log("Farmer Data",(i=t.data)==null?void 0:i.data),t!=null&&t.data&&Q((d=t==null?void 0:t.data)==null?void 0:d.data)}).catch(t=>{console.log(t)}).finally(()=>{N("loading",!1)})};return r.useEffect(()=>{var t;(t=y==null?void 0:y.current)==null||t.scrollIntoView({behavior:"smooth"})},[]),r.useEffect(()=>{F()},[w,g]),r.useEffect(()=>{var t;e!=null&&e.fpo_id&&Y((t=v==null?void 0:v.find(i=>(i==null?void 0:i.id)==(e==null?void 0:e.fpo_id)))==null?void 0:t.fpo_name)},[e]),e?s.jsxs("div",{ref:y,className:"w-full h-full mt-6",children:[s.jsxs("div",{className:"flex justify-between items-center px-10 mx-auto",children:[s.jsxs("div",{className:"flex items-center space-x-4",children:[s.jsx(ns,{onClick:()=>o(-1)}),s.jsxs(js,{children:[e==null?void 0:e.first_name," ",e==null?void 0:e.last_name]}),s.jsx("div",{className:"flex items-center justify-between text-center py-2",children:(e==null?void 0:e.status)==="complete"?s.jsx(K,{className:"capitalize shadow-md bg-green-300",size:"sm",color:"green",children:e==null?void 0:e.status}):s.jsx(K,{className:"shadow-md capitalize",size:"sm",color:"red",children:(e==null?void 0:e.status)||"Not Verified"})})]}),s.jsx("div",{className:"flex mt-4 sm:w-auto sm:mt-0",children:s.jsxs(ys,{onClick:()=>{x(!f)},variant:"primary",className:"mr-2 shadow-md space-x-2",children:[s.jsx(_s,{icon:"Settings",className:"w-4 h-4"})," ",s.jsx("span",{className:"hidden md:block",children:"Manage Farmer Profile"})]})})]}),s.jsxs("div",{className:"w-full h-fit relative py-4 grid grid-cols-12 px-10 gap-8 mx-auto",children:[s.jsx("div",{className:"flex flex-col justify-center items-center w-full col-span-12 lg:col-span-4 rounded-md bg-white",children:(e==null?void 0:e.gender)==="male"?s.jsx("img",{className:"h-40 w-auto",alt:"Profile Picture",src:ts}):s.jsx("img",{className:"h-40 w-auto",alt:"Profile Picture",src:is})}),s.jsxs("div",{className:"border border-primary w-full flex space-x-4 col-span-12 lg:col-span-8 bg-white justify-center rounded-md",children:[s.jsxs("div",{className:"h-full w-full flex flex-col space-y-5 justify-center bg-primary text-white border  lg:px-8 px-4 py-4 rounded-l-md shadow-sm",children:[s.jsxs("div",{title:"FPO",className:"w-full flex items-center lg:space-x-8 space-x-4 py-1 lg:px-4 px-2",children:[s.jsx("span",{className:"text-slate-500 ",children:s.jsx(ks,{className:"h-5 w-5"})}),I?s.jsx("span",{children:I}):s.jsx("span",{className:"opacity-70",children:"FPO Not set"})]}),s.jsxs("div",{className:"w-full flex items-center space-x-8 py-1 px-4",children:[s.jsx("span",{className:"text-slate-500 ",children:s.jsx(rs,{className:"h-5 w-5"})}),e!=null&&e.phone_number?s.jsx("span",{children:e==null?void 0:e.phone_number}):s.jsx("span",{className:"opacity-70",children:"Phone Not set"})]}),s.jsxs("div",{className:"w-full flex items-center space-x-8 py-1 px-4",children:[s.jsx("span",{className:"text-slate-500 ",children:s.jsx(ds,{className:"h-5 w-5"})}),e!=null&&e.email?s.jsx("span",{children:e==null?void 0:e.email}):s.jsx("span",{className:"opacity-70",children:"Email Not set"})]}),s.jsxs("div",{title:"ID Number",className:"w-full flex items-center space-x-8 py-1 px-4",children:[s.jsx("span",{className:"text-slate-500 ",children:s.jsx(xs,{className:"h-5 w-5"})}),e!=null&&e.id_number?s.jsx("span",{children:e==null?void 0:e.id_number}):s.jsx("span",{className:"opacity-70",children:"ID No. Not set"})]})]}),s.jsxs("div",{className:"h-full w-full flex flex-col space-y-5 justify-center pr-8",children:[s.jsxs("div",{className:"w-full flex items-center justify-between space-x-8 py-1 px-4 border-b border-dotted",children:[s.jsx("span",{className:"text-slate-500 uppercase",children:"Marital Status"}),e!=null&&e.marital_status?s.jsx("span",{className:"flex items-center capitalize",children:e==null?void 0:e.marital_status}):s.jsx("span",{className:"opacity-70",children:"Not set"})]}),s.jsxs("div",{className:"w-full flex items-center justify-between  space-x-8 py-1 px-4 border-b border-dotted",children:[s.jsx("span",{className:"text-slate-500 uppercase",children:"Education Level"}),e!=null&&e.education_level?s.jsx("span",{className:"flex items-center capitalize",children:e==null?void 0:e.education_level}):s.jsx("span",{className:"opacity-70",children:"Not set"})]}),s.jsxs("div",{className:"w-full flex items-center justify-between  space-x-8 py-1 px-4 border-b border-dotted",children:[s.jsx("span",{className:"text-slate-500 uppercase",children:"Next of kin"}),e!=null&&e.education_level?s.jsx("span",{className:"flex items-center capitalize",children:e==null?void 0:e.next_of_kin}):s.jsx("span",{className:"opacity-70",children:"Not set"})]}),s.jsxs("div",{className:"w-full flex items-center justify-between  space-x-8 py-1 px-4 border-b border-dotted",children:[s.jsx("span",{className:"text-slate-500 uppercase",children:"Next of kin contact"}),e!=null&&e.next_of_kin_contact?s.jsx("span",{className:"flex items-center",children:e==null?void 0:e.next_of_kin_contact}):s.jsx("span",{className:"opacity-70",children:"Not set"})]})]})]}),s.jsxs("div",{className:`flex flex-col absolute transition-all duration-700 sm:end-0 end-auto w-48 mr-1 !right-8 ${f?"top-2  z-50 h-fit box":"top-8 z-50 h-0 overflow-hidden"}`,children:[(e==null?void 0:e.status)!=="complete"&&s.jsxs("div",{onClick:()=>{j(()=>p("complete")),x(!1)},className:"flex border-b space-x-2 p-4 items-center cursor-pointer",children:[s.jsx(bs,{className:"w-5 h-5 text-secondary "}),s.jsx("span",{className:"text-primary",children:"Mark as Complete"})]}),(e==null?void 0:e.status)!=="pending"&&s.jsxs("div",{onClick:()=>{j(()=>p("pending")),x(!1)},className:"flex border-b space-x-2 p-4 items-center cursor-pointer",children:[s.jsx(gs,{className:"w-5 h-5 text-secondary "}),s.jsx("span",{className:"text-primary",children:"Mark as Pending"})]}),(e==null?void 0:e.status)!=="valid"&&s.jsxs("div",{onClick:()=>{j(()=>p("valid")),x(!1)},className:"flex border-b space-x-2 p-4 items-center cursor-pointer",children:[s.jsx(Ss,{className:"w-5 h-5 text-secondary "}),s.jsx("span",{className:"text-primary",children:"Mark as Valid"})]}),(e==null?void 0:e.status)!=="invalid"&&s.jsxs("div",{onClick:()=>{j(()=>p("invalid")),x(!1)},className:"flex border-b space-x-2 p-4 items-center cursor-pointer",children:[s.jsx(vs,{className:"w-5 h-5 text-secondary "}),s.jsx("span",{className:"text-primary",children:"Mark as Invalid"})]}),(e==null?void 0:e.status)!=="invalid"&&s.jsxs("div",{onClick:()=>{j(()=>p("blacklisted")),x(!1)},className:"flex border-b space-x-2 p-4 items-center cursor-pointer",children:[s.jsx(ws,{className:"w-5 h-5 text-secondary "}),s.jsx("span",{className:"text-primary",children:"Blacklist"})]}),(e==null?void 0:e.deceased)!=="invalid"&&s.jsxs("div",{onClick:()=>{j(()=>p("deceased")),x(!1)},className:"flex border-b space-x-2 p-4 items-center cursor-pointer",children:[s.jsx(Cs,{className:"w-5 h-5 text-secondary "}),s.jsx("span",{className:"text-primary",children:"Mark as Deceased"})]})]})]}),(e==null?void 0:e.validation_reason)&&((P=JSON==null?void 0:JSON.parse(e==null?void 0:e.validation_reason))==null?void 0:P.status)!=="valid"&&s.jsx("div",{className:"w-full px-10 pb-4 ",children:s.jsxs(C,{className:"h-full border-l-4 bg-orange-100 border-secondary shadow-md",children:[s.jsxs("div",{className:"flex justify-between px-4",children:[s.jsx("div",{className:"text-lg text-primary",children:"Data validation error"}),s.jsx("div",{children:s.jsx(As,{className:"w-8 h-8 text-primary"})})]}),s.jsx("div",{className:"flex flex-col p-4 ",children:(S=Object.keys(JSON.parse(e==null?void 0:e.validation_reason)||{}))==null?void 0:S.map((t,i)=>{let d=JSON.parse(e==null?void 0:e.validation_reason)[t];if(t!=="status")return s.jsxs("div",{className:"flex space-x-2 items-center",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsxs("span",{className:"capitalize",children:[t.split("_").join(" ")," :"," "]}),s.jsx("span",{title:"Duplicate farmer profile",onClick:()=>{o(`${X}/${d}`)},className:"text-secondary cursor-pointer",children:d})]},i)})})]})}),s.jsx("div",{className:"w-full h-full px-10",children:s.jsx(C,{children:s.jsxs(ms,{children:[s.jsxs(us,{className:"",children:[s.jsx(A,{icon:os,children:"Bio Data"}),s.jsx(A,{icon:ps,children:"Farm"}),s.jsx(A,{icon:fs,children:"Community Pass"})]}),s.jsxs(Ns,{children:[s.jsx(k,{children:s.jsxs("div",{className:"grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8",children:[s.jsx(m,{title:"Personal Information",subtitle:"Farmer Personal Info",className:"col-1",children:s.jsxs(u,{className:"mt-4 space-y-2",children:[s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Name"})})})]}),s.jsxs(c,{className:"text-secondary",children:[e==null?void 0:e.first_name," ",e==null?void 0:e.last_name]})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"ID Number"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.id_number?s.jsx("span",{children:e==null?void 0:e.id_number}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Date of Birth"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.dob?s.jsx("span",{children:e==null?void 0:e.dob}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Sex"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.gender?s.jsx("span",{className:"capitalize",children:e==null?void 0:e.gender}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Marital Status"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.marital_status?s.jsx("span",{className:"capitalize",children:e==null?void 0:e.marital_status}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Education Level"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.education_level?s.jsx("span",{children:e==null?void 0:e.education_level}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Phone Number"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.phone_number?s.jsx("span",{children:e==null?void 0:e.phone_number}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Next of kin"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.next_of_kin?s.jsx("span",{children:e==null?void 0:e.next_of_kin}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Next of kin contact"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.next_of_kin_contact?s.jsx("span",{children:e==null?void 0:e.next_of_kin_contact}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Next of kin relationship"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.next_of_kin_relationship?s.jsx("span",{children:e==null?void 0:e.next_of_kin_relationship}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Account with FI"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.do_you_have_an_account_with_an_FI?s.jsx("span",{children:e==null?void 0:e.do_you_have_an_account_with_an_FI}):s.jsx("span",{className:"text-primary",children:"N/A"})})]})]})}),s.jsx("div",{className:"flex flex-col space-y-8",children:s.jsx(m,{title:"Family Information",subtitle:"Family Info",className:"col-1",children:s.jsxs(u,{className:"mt-4 space-y-2",children:[s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Head of family"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.head_of_family?s.jsx("span",{children:e==null?void 0:e.head_of_family}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Male members"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.male_members_in_household?s.jsx("span",{children:e==null?void 0:e.male_members_in_household}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsxs(n,{className:"uppercase text-primary",children:["Female members in household"," "]})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.female_members_in_household?s.jsx("span",{children:e==null?void 0:e.female_members_in_household}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Members above 18"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.members_above_18?s.jsx("span",{children:e==null?void 0:e.members_above_18}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Children below 5"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.children_below_5?s.jsx("span",{children:e==null?void 0:e.children_below_5}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"School going children"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.school_going_children?s.jsx("span",{children:e==null?void 0:e.school_going_children}):s.jsx("span",{className:"text-primary",children:"N/A"})})]})]})})})]})}),s.jsx(k,{children:s.jsxs("div",{className:"grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8",children:[s.jsx(m,{title:"Farm Information",subtitle:"Farm Info",className:"col-1",children:s.jsxs(u,{className:"mt-4 space-y-2",children:[s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Type"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.type_of_farming?s.jsx("span",{className:"capitalize",children:e==null?void 0:e.type_of_farming}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Crops"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.crops_grown?s.jsx("span",{children:e==null?void 0:e.crops_grown}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Farm Size (Acres)"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.farm_size?s.jsx("span",{children:e==null?void 0:e.farm_size}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Farm Size under Agric (Acres)"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.farm_size_under_agriculture?s.jsx("span",{children:e==null?void 0:e.farm_size_under_agriculture}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Land Ownership"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.land_ownership?s.jsx("span",{className:"capitalize",children:e==null?void 0:e.land_ownership}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Animals Kept"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.animals_kept?s.jsx("span",{children:e==null?void 0:e.animals_kept}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Agricultural Activities Earnings"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.how_much_do_you_earn_from_agricultural_activities?s.jsx("span",{children:_(parseFloat(e==null?void 0:e.how_much_do_you_earn_from_agricultural_activities))}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Non Agricultural Activities Earnings"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.how_much_do_you_earn_from_non_agricultural_activities?s.jsx("span",{children:_(parseFloat(e==null?void 0:e.how_much_do_you_earn_from_non_agricultural_activities))}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Eastimated Produce last season"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.estimated_produce_value_last_season?s.jsx("span",{children:_(parseFloat(e==null?void 0:e.estimated_produce_value_last_season))}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Eastimated produce value this season"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.estimated_produce_value_this_season?s.jsx("span",{children:_(parseFloat(e==null?void 0:e.estimated_produce_value_this_season))}):s.jsx("span",{className:"text-primary",children:"N/A"})})]})]})}),s.jsxs("div",{className:"flex flex-col space-y-4 relative",children:[s.jsx(m,{title:"Location Information",subtitle:"Location Info",className:"col-1",children:s.jsxs(u,{className:"mt-4 space-y-2",children:[s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"District"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.district?s.jsx("span",{children:e==null?void 0:e.district}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"County"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.county?s.jsx("span",{children:e==null?void 0:e.county}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Sub County"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.sub_county?s.jsx("span",{children:e==null?void 0:e.sub_county}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Parish"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.parish?s.jsx("span",{children:e==null?void 0:e.parish}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Village"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.village?s.jsx("span",{children:e==null?void 0:e.village}):s.jsx("span",{className:"text-primary",children:"N/A"})})]})]})}),s.jsx(C,{className:"h-52 bottom-0  right-0 items-center justify-center bg-slate-50",children:s.jsx(hs,{data:{latitude:parseFloat((M=(z=e==null?void 0:e.farmer_cordinates)==null?void 0:z.split(",")[0])==null?void 0:M.trim()),longitude:parseFloat((E=(B=e==null?void 0:e.farmer_cordinates)==null?void 0:B.split(",")[1])==null?void 0:E.trim()),title:"Farm Location"}})})]})]})}),s.jsx(k,{children:s.jsx(m,{title:"Community Pass Information",subtitle:"CP Info",className:"col-1",children:s.jsxs(u,{className:"mt-4 space-y-2",children:[s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Bio Token"})})})]}),s.jsx(c,{className:"text-secondary",children:parseInt((L=e==null?void 0:e.biometrics)==null?void 0:L.hasBiometricToken)?s.jsx("span",{children:"Present"}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Enrollment Status"})})})]}),s.jsx(c,{className:"text-secondary",children:($=e==null?void 0:e.biometrics)!=null&&$.enrollmentStatus?s.jsx("span",{children:(O=e==null?void 0:e.biometrics)==null?void 0:O.enrollmentStatus}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Subject ID"})})})]}),s.jsx(c,{className:"text-secondary",children:(R=e==null?void 0:e.biometrics)!=null&&R.subjectID?s.jsxs("div",{className:"flex items-center",children:[s.jsx("span",{title:"Copy",className:"px-2",children:s.jsx(Is,{onClick:()=>{var t;navigator.clipboard.writeText((t=e==null?void 0:e.biometrics)==null?void 0:t.subjectID),b(ls({message:"Subject ID Copied to Clipboard"}))},className:"w-4 h-4 text-primary cursor-pointer hover:scale-125 "})}),s.jsx("span",{children:"Present"})]}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Consent-ID"})})})]}),s.jsx(c,{className:"text-secondary",children:(U=e==null?void 0:e.biometrics)!=null&&U.consentGUID?s.jsx("span",{children:"Present"}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"R-ID"})})})]}),s.jsx(c,{className:"text-secondary",children:(T=e==null?void 0:e.biometrics)!=null&&T.rID?s.jsx("span",{children:"Present"}):s.jsx("span",{className:"text-primary",children:"N/A"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Possible Duplicate"})})})]}),s.jsx(c,{className:"text-secondary",children:(V=e==null?void 0:e.biometrics)!=null&&V.possible_duplicate?s.jsx("span",{onClick:()=>{var t;o(`${X}/${(t=e==null?void 0:e.biometrics)==null?void 0:t.possible_duplicate}`)},className:"text-secondary cursor-pointer border border-secondary rounded px-2 py-1",children:"Go to duplicate profile"}):s.jsx("span",{children:"No"})})]}),s.jsxs(l,{className:"",children:[s.jsxs(a,{justifyContent:"start",className:"truncate space-x-4 px-2",children:[s.jsx("span",{className:"w-1 h-1 bg-secondary rounded-full"}),s.jsx("div",{className:"truncate",children:s.jsx(c,{className:"truncate",children:s.jsx(n,{className:"uppercase text-primary",children:"Data Captured By"})})})]}),s.jsx(c,{className:"text-secondary",children:e!=null&&e.data_captured_by?s.jsx("span",{onClick:()=>{var t;o(`${as}/${(t=e==null?void 0:e.agent)==null?void 0:t.agent_code}`)},className:"cursor-pointer hover:text-primary",children:((G=e==null?void 0:e.agent)==null?void 0:G.first_name)+" "+((J=e==null?void 0:e.agent)==null?void 0:J.last_name)}):s.jsx("span",{className:"text-primary",children:"N/A"})})]})]})})})]})]})})}),s.jsx("div",{className:"w-full grid grid-cols-2 py-6 px-10 gap-8"})]}):s.jsx(cs,{})};export{Ks as default};