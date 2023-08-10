import{b as N,p as _,r as m,A as F,u,R as h,d as x,B as p,j as e,g as y}from"./app-2d77318b.js";import{e as C}from"./Tracker-9e248fef.js";import{B as b}from"./index-ee870b4d.js";import{F as t}from"./index-752ec23e.js";import{F as l}from"./index-b9cddda1.js";import{F as f}from"./index-a3180016.js";import"./Transition-18176916.js";import"./default-config-939e3be8.js";import"./tw-merge-fbb83fc6.js";const O=()=>{const g=N(),{state:{agent:i}}=_(),{updateAppContextState:o}=m.useContext(F),c=u(r=>{var n;return(n=r.auth)==null?void 0:n.token});u(r=>{var n;return(n=r.auth)==null?void 0:n.user});const[a,s]=h.useState(i),[d,j]=h.useState([]),v=()=>{o("loading",!0),x.post(`${p}/agent/${i==null?void 0:i.id}/update`,a,{headers:{Authorization:`Bearer ${c}`}}).then(r=>{g(`${y}/${i==null?void 0:i.agent_code}`)}).catch(r=>{console.log(r)}).finally(()=>{o("loading",!1)})};return m.useEffect(()=>{o("loading",!0),x.get(`${p}/fpos/summary`,{headers:{Authorization:`Bearer ${c}`}}).then(r=>{var n;j((n=r==null?void 0:r.data)==null?void 0:n.data)}).catch(r=>{console.log(r)}).finally(()=>{o("loading",!1)})},[]),e.jsxs("form",{className:"py-8 px-8",onSubmit:r=>{r.preventDefault(),v()},children:[e.jsxs(C,{children:["Update ",a==null?void 0:a.first_name,"'s Profile"]}),e.jsxs("div",{className:"py-4",children:[e.jsx(l,{htmlFor:"regular-form-1",children:"Select FPO"}),e.jsxs(f,{id:"fpo_id",required:!0,placeholder:"Choose FPO",value:a.fpo_id,onChange:r=>s({...a,fpo_id:r.target.value}),children:[e.jsx("option",{selected:!0,value:"",children:"-- Select FPO --"}),d==null?void 0:d.map(r=>e.jsx("option",{value:r.id,children:r.fpo_name},r.id))]})]}),e.jsxs("div",{className:"flex space-x-4 items-center py-4",children:[e.jsxs("div",{className:"flex-1",children:[e.jsx(l,{htmlFor:"regular-form-1",children:"First Name"}),e.jsx(t,{id:"first_name",required:!0,type:"text",placeholder:"First Name",value:a.first_name,onChange:r=>s({...a,first_name:r.target.value})})]}),e.jsxs("div",{className:"flex-1",children:[e.jsx(l,{htmlFor:"regular-form-1",children:"Last Name"}),e.jsx(t,{id:"last_name",required:!0,type:"text",placeholder:"Last Name",value:a.last_name,onChange:r=>s({...a,last_name:r.target.value})})]})]}),e.jsxs("div",{className:"flex space-x-4 items-center py-4",children:[e.jsxs("div",{className:"flex-1",children:[e.jsx(l,{htmlFor:"regular-form-1",children:"Email"}),e.jsx(t,{id:"email",required:!0,type:"email",placeholder:"",value:a.email,onChange:r=>s({...a,email:r.target.value})})]}),e.jsxs("div",{className:"flex-1",children:[e.jsx(l,{htmlFor:"regular-form-1",children:"Phone Number"}),e.jsx(t,{id:"phone_number",required:!0,type:"text",placeholder:"",value:a.phone_number,onChange:r=>s({...a,phone_number:r.target.value})})]})]}),e.jsxs("div",{className:"flex space-x-4 items-center py-4",children:[e.jsxs("div",{className:"flex-1",children:[e.jsx(l,{htmlFor:"regular-form-1",children:"Age"}),e.jsx(t,{id:"age",required:!0,type:"number",placeholder:"",value:a.age,onChange:r=>s({...a,age:r.target.value})})]}),e.jsxs("div",{className:"flex-1",children:[e.jsx(l,{htmlFor:"regular-form-1",children:"Gender"}),e.jsxs(f,{id:"gender",required:!0,value:a.gender,onChange:r=>s({...a,gender:r.target.value}),children:[e.jsx("option",{selected:!0,value:"",children:"-- Choose gender --"}),e.jsx("option",{value:"Male",children:"Male"}),e.jsx("option",{value:"Female",children:"Female"})]})]})]}),e.jsxs("div",{className:"flex space-x-4 items-center py-4",children:[e.jsxs("div",{className:"flex-1",children:[e.jsx(l,{htmlFor:"regular-form-1",children:"Designation"}),e.jsx(t,{id:"designation",required:!0,type:"text",placeholder:"",value:a.designation,onChange:r=>s({...a,designation:r.target.value})})]}),e.jsxs("div",{className:"flex-1",children:[e.jsx(l,{htmlFor:"regular-form-1",children:"Residence"}),e.jsx(t,{id:"residence",required:!0,type:"text",placeholder:"",value:a.residence,onChange:r=>s({...a,residence:r.target.value})})]})]}),e.jsxs("div",{className:"flex space-x-4 items-center py-4",children:[e.jsxs("div",{className:"flex-1",children:[e.jsx(l,{htmlFor:"regular-form-1",children:"Referee Name"}),e.jsx(t,{id:"referee_name",required:!0,type:"text",placeholder:"",value:a.referee_name,onChange:r=>s({...a,referee_name:r.target.value})})]}),e.jsxs("div",{className:"flex-1",children:[e.jsx(l,{htmlFor:"regular-form-1",children:"Referee Phone number"}),e.jsx(t,{id:"referee_phone_number",type:"text",required:!0,placeholder:"",value:a.referee_phone_number,onChange:r=>s({...a,referee_phone_number:r.target.value})})]})]}),e.jsx("div",{className:"flex py-4",children:e.jsx(b,{variant:"primary",className:"w-full xl:mr-3",onClick:()=>{},children:"Save"})})]})};export{O as default};