import{a as E,r as i,A as C,u as A,j as e,B as F,s as B,v as D,b as P,E as O,c as z,d as q,e as G}from"./app-65fbab72.js";import{e as U,b as k,a as j,A as H,m as d,t as R,v as T,w as L,x as p,y as V,z as f,d as Y,h as W,i as w,n as X,j as N,u as J,s as K,D as S,B as Q,C as v}from"./Tracker-33d5ea18.js";import{U as b}from"./UserGroupIcon-36891082.js";import{U as I,A as Z}from"./index-cfc1fbf0.js";import{L as u}from"./index-0438ef2a.js";import{B as M}from"./index-886d5e62.js";import ee from"./index-bef87add.js";import{n as g}from"./numberFormatter-373bc269.js";import{F as y}from"./index-c61fa346.js";import{F as _}from"./index-32124735.js";import"./Transition-da004935.js";import"./default-config-939e3be8.js";import"./tw-merge-fbb83fc6.js";import"./index-0cba895a.js";const se=({showModal:m,setShowModal:x,fpo:n,fetchFpoUsers:s})=>{const c=E(),{updateAppContextState:o}=i.useContext(C),t=A(r=>{var $;return($=r.auth)==null?void 0:$.token}),[l,h]=i.useState({name:"",email:"",phone_number:"",fpo_id:n==null?void 0:n.fpo_id}),a=()=>{o("loading",!0),axios.post(`${F}/fpo/${l==null?void 0:l.fpo_id}/user/add`,{...l,fpo_id:n==null?void 0:n.fpo_id},{headers:{Authorization:`Bearer ${t}`}}).then(r=>{x(!1),s(),c(B({id:D(),message:"FPO User account has been created successfully!"}))}).catch(r=>{console.log(r)}).finally(()=>{o("loading",!1)})};return e.jsxs("div",{className:`z-[1000] fixed bg-primary rounded-md shadow-md transition-all h-full top-32 bottom-0 right-0 w-full lg:w-1/2 duration-700  ${m?"  translate-x-0  ":"translate-x-full"}`,children:[e.jsxs("div",{className:"flex w-full space-x-8 p-4 ",children:[e.jsx("span",{className:"text-white",onClick:()=>x(!1),children:e.jsx(u,{icon:"XSquare"})}),e.jsx(U,{className:"text-white",children:"Create New FPO User Account"})]}),e.jsx("div",{className:"h-full flex flex-col bg-slate-50",children:e.jsxs("form",{className:"py-8 px-8",onSubmit:r=>{r.preventDefault(),a()},children:[e.jsxs("div",{className:"py-4",children:[e.jsx(_,{htmlFor:"name",children:"Name"}),e.jsx(y,{id:"name",required:!0,type:"text",placeholder:"Name",value:l.name,onChange:r=>h({...l,name:r.target.value})})]}),e.jsxs("div",{className:"py-4",children:[e.jsx(_,{htmlFor:"email",children:"Email"}),e.jsx(y,{id:"email",required:!0,type:"email",value:l.email,onChange:r=>h({...l,email:r.target.value})})]}),e.jsxs("div",{className:"py-4",children:[e.jsx(_,{htmlFor:"regular-form-1",children:"Phone Number"}),e.jsx(y,{id:"phone_number",required:!0,type:"text",value:l.phone_number,onChange:r=>h({...l,phone_number:r.target.value})})]}),e.jsx("div",{className:"flex py-4",children:e.jsx(M,{variant:"primary",className:"w-full",onClick:()=>{},children:"Save"})})]})})]})};function ae({fpo_id:m}){const x=P(),n=A(a=>a.auth.token),{updateAppContextState:s}=i.useContext(C);i.useState(1),i.useState(""),i.useState("");const[c,o]=i.useState([]),[t,l]=i.useState(!1),h=()=>{s("loading",!0),z.get(`${F}/fpo/${m}/users`,{headers:{Authorization:`Bearer ${n}`}}).then(({data:a})=>{console.log("FPO Users Data",a.data),a!=null&&a.data&&o(a==null?void 0:a.data)}).catch(a=>{console.log(a)}).finally(()=>{s("loading",!1)})};return i.useEffect(()=>{h()},[m,n]),e.jsxs("div",{className:"w-full h-full py-4",children:[e.jsxs(k,{className:"bg-white h-full w-full",children:[e.jsxs(j,{justifyContent:"start",className:"space-x-2",children:[e.jsx(U,{children:"FPO Admins"}),e.jsx(H,{color:"gray",children:g(parseInt(c==null?void 0:c.length))})]}),e.jsxs(j,{justifyContent:"between",children:[e.jsx(d,{className:"mt-2",children:"Overview of Admins"}),e.jsxs("span",{onClick:()=>{l(!0)},className:"inline-flex overflow-hidden rounded-md border bg-secondary shadow-sm",children:[e.jsx("button",{className:"inline-block border-e px-4 py-2 text-sm font-medium text-white hover:bg-orange-500 focus:relative",children:"Create New Admin"}),e.jsx("button",{className:"inline-block px-4 py-2 text-white hover:bg-orange-500 focus:relative",title:"Create FPO",children:e.jsx(I,{className:"h-4 w-4"})})]})]}),e.jsxs(R,{className:"mt-6",children:[e.jsx(T,{children:e.jsxs(L,{children:[e.jsx(p,{children:"User ID"}),e.jsx(p,{children:"Name"}),e.jsx(p,{children:"Phone"}),e.jsx(p,{children:"Email"}),e.jsx(p,{children:"Action"})]})}),e.jsx(V,{children:c==null?void 0:c.map(a=>e.jsxs(L,{children:[e.jsx(f,{children:a.id}),e.jsx(f,{children:a.name}),e.jsx(f,{children:a.phone_number}),e.jsx(f,{children:a.email}),e.jsx(f,{children:e.jsxs("span",{class:"inline-flex overflow-hidden rounded-md border bg-white shadow-sm",children:[e.jsx("button",{onClick:()=>{},className:"inline-block border-e p-3 text-gray-700 hover:bg-gray-50 focus:relative",title:"View",children:e.jsxs("svg",{className:"h-4 w-4",fill:"none",stroke:"currentColor",strokeWidth:1.5,viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg","aria-hidden":"true",children:[e.jsx("path",{strokeLinecap:"round",strokeLinejoin:"round",d:"M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"}),e.jsx("path",{strokeLinecap:"round",strokeLinejoin:"round",d:"M15 12a3 3 0 11-6 0 3 3 0 016 0z"})]})}),e.jsx("button",{onClick:()=>{x(O,{state:{agent}})},className:"inline-block border-e p-3 text-gray-700 hover:bg-gray-50 focus:relative",title:"Edit Agent",children:e.jsx("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"h-4 w-4",children:e.jsx("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"})})}),e.jsx("button",{class:"inline-block p-3 text-gray-700 hover:bg-gray-50 focus:relative",title:"Delete",children:e.jsx("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"h-4 w-4",children:e.jsx("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"})})})]})})]},a.id))})]})]}),e.jsx(se,{showModal:t,setShowModal:l,fpo:{fpo_id:m},fetchFpoUsers:h})]})}function fe(){const m=P(),x=A(t=>t.auth.token),{updateAppContextState:n}=i.useContext(C),[s,c]=i.useState(null);let{id:o}=q();return i.useEffect(()=>{n("loading",!0),axios.get(`${F}/fpo/${o}`,{headers:{Authorization:`Bearer ${x}`}}).then(({data:t})=>{console.log("FPO Data",t.data),t!=null&&t.data&&c(t==null?void 0:t.data)}).catch(t=>{console.log(t)}).finally(()=>{n("loading",!1)})},[o,x]),e.jsxs(e.Fragment,{children:[e.jsxs("div",{className:"flex flex-col items-center mt-8 intro-y sm:flex-row",children:[e.jsx("h2",{className:"flex items-center mr-auto text-lg font-medium",children:s==null?void 0:s.fpo_name}),e.jsx("div",{className:"flex w-full mt-4 sm:w-auto sm:mt-0",children:e.jsxs(M,{onClick:()=>{m(G,{state:{fpo:s}})},variant:"primary",className:"mr-2 shadow-md",children:[e.jsx(u,{icon:"Pencil",className:"w-4 h-4 mr-2"})," Update Profile"]})})]}),e.jsx("div",{className:"grid grid-cols-12 gap-5 mt-5",children:e.jsx("div",{className:"col-span-12",children:e.jsx("div",{className:"px-3 lg:pt-0 md:pt-3 box intro-y",children:e.jsxs("div",{className:"lg:flex sm:block flex-col items-center justify-center lg:items-start lg:justify-between text-center lg:flex-row lg:text-left py-4 lg:py-6",children:[e.jsxs("div",{className:"md:flex flex-col border-dashed px-2 space-y-2",children:[e.jsxs("div",{className:"w-fit sm:w-full  flex items-center mr-8",children:[e.jsx(u,{icon:"MapPin",className:"w-4 h-4 mr-2"})," ",s==null?void 0:s.district,", UG"]}),e.jsxs("div",{className:"w-fit sm:w-full flex items-center mr-8 opacity-70",children:[e.jsx("span",{className:"w-4 h-4 mr-2"}),s==null?void 0:s.county," - ",s==null?void 0:s.sub_county]}),e.jsxs("div",{className:"w-fit sm:w-full flex items-center mr-8 opacity-70",children:[e.jsx("span",{className:"w-4 h-4 mr-2"}),s==null?void 0:s.parish," - ",s==null?void 0:s.village]})]}),e.jsxs("div",{className:"md:flex flex-col border-dashed lg:border-l px-4 md:mt-0 mt-4 md:px-10 space-y-2",children:[e.jsxs("span",{className:"w-fit sm:w-full flex items-center mr-8",children:[e.jsx(u,{icon:"User",className:"w-4 h-4 mr-2"}),s==null?void 0:s.fpo_contact_name]}),e.jsxs("span",{className:"w-fit flex items-center mr-8",children:[e.jsx(u,{icon:"Phone",className:"w-4 h-4 mr-2"}),s==null?void 0:s.contact_phone_number]}),e.jsxs("span",{className:"w-fit flex items-center mr-8",children:[e.jsx(u,{icon:"Mail",className:"w-4 h-4 mr-2"}),s==null?void 0:s.contact_email]})]}),e.jsxs("div",{className:"md:flex flex-col border-dashed lg:border-l px-4 md:mt-0 mt-4 md:px-10 space-y-2",children:[e.jsxs("div",{className:"w-fit sm:w-full  flex items-center mr-8",children:[e.jsx("span",{className:"opacity-70",children:"Main crop : "}),e.jsx("span",{children:s==null?void 0:s.main_crop})]}),e.jsxs("div",{className:"w-fit sm:w-full  flex items-center mr-8",children:[e.jsx("span",{className:"opacity-70",children:"Core staff :  "}),e.jsx("span",{children:s==null?void 0:s.core_staff_count})]}),e.jsxs("div",{className:"w-fit sm:w-full  flex items-center mr-8",children:[e.jsx("span",{className:"opacity-70",children:"Registration status :  "}),e.jsx("span",{children:s==null?void 0:s.registration_status})]})]})]})})})}),e.jsx("div",{className:"w-full h-full mt-4",children:e.jsx(k,{children:e.jsxs(Y,{children:[e.jsxs(W,{className:"",children:[e.jsx(w,{icon:b,children:"Farmers"}),e.jsx(w,{icon:b,children:"Agents"}),e.jsx(w,{icon:I,children:"FPO Admins"}),e.jsx(w,{icon:b,children:"Members"})]}),e.jsxs(X,{children:[e.jsx(N,{children:e.jsx(ee,{fpo_id:o})}),e.jsx(N,{children:e.jsx(Z,{fpo_id:o,fpo_name:s==null?void 0:s.fpo_name})}),e.jsx(N,{children:e.jsx(ae,{fpo_id:o})}),e.jsx(N,{children:e.jsx(J,{numItemsSm:1,numItemsLg:2,className:"gap-6 my-4",children:e.jsxs(k,{children:[e.jsx(d,{children:"Members"}),e.jsx(K,{children:e.jsx("span",{className:"text-secondary",children:g(parseInt(s==null?void 0:s.fpo_membership_number))})}),e.jsxs(j,{className:"mt-6",children:[e.jsx(d,{children:e.jsx(S,{children:"Stats"})}),e.jsx(d,{children:e.jsx(S,{})})]}),e.jsxs(Q,{className:"mt-1",children:[e.jsxs(v,{children:[e.jsx(j,{justifyContent:"start",className:"truncate space-x-2.5",children:e.jsx(d,{className:"truncate",children:"Female"})}),e.jsx(d,{children:g(parseInt(s==null?void 0:s.fpo_female_membership))})]}),e.jsxs(v,{children:[e.jsx(j,{justifyContent:"start",className:"truncate space-x-2.5",children:e.jsx(d,{className:"truncate",children:"Female Youth"})}),e.jsx(d,{children:g(parseInt(s==null?void 0:s.fpo_female_youth))})]}),e.jsxs(v,{children:[e.jsx(j,{justifyContent:"start",className:"truncate space-x-2.5",children:e.jsx(d,{className:"truncate",children:"Male Youth"})}),e.jsx(d,{children:g(parseInt(s==null?void 0:s.fpo_male_youth))})]})]})]})})})]})]})})})]})}export{fe as default};
