import{a as E,b as M,r,A as _,u as z,j as e,B as b,c as P,v as C,l as O,d as q,P as ce,k as Y}from"./app-cf4561db.js";import{e as F,l as H,o as J,b as oe,a as de,A as B,m as he,q as me,r as xe,t as pe,v as ue,w as G,x as S,y as fe,z as k}from"./Tracker-81743c79.js";import{n as je}from"./numberFormatter-373bc269.js";import{P as ge}from"./index-f32d38b8.js";import{L as W,U as Q,j as we,M as Ne,k as ve,l as ye,g as be,f as Ce,K as Ue,m as Se,X as ke}from"./index-fa709353.js";import{F as U}from"./index-7563c26f.js";import{F as w}from"./index-5c500cc6.js";import{B as L}from"./index-233fac75.js";import{W as Pe}from"./WithConfirmAlert-88a81f95.js";import"./Transition-927311f7.js";import"./default-config-939e3be8.js";import"./square-stack-5a5f3bcf.js";import"./tw-merge-fbb83fc6.js";const $e=({showModal:a,setShowModal:d,onSuccessCallback:o})=>{const p=E();M();const{updateAppContextState:j}=r.useContext(_),h=z(i=>{var t;return(t=i.auth)==null?void 0:t.token}),[n,l]=r.useState({name:"",email:"",phone_number:"",role:""}),u=()=>{j("loading",!0),axios.post(`${b}/user/register`,{...n},{headers:{Authorization:`Bearer ${h}`}}).then(i=>{d(!1),o(),p(P({id:C(),message:"User created successfully"}))}).catch(i=>{}).finally(()=>{j("loading",!1)})};return e.jsxs("div",{className:`z-[1000] my-3 fixed bg-primary rounded-md shadow-md transition-all h-full top-20 bottom-0 right-0 w-full lg:w-1/2 duration-700  ${a?"translate-x-0  ":"translate-x-full"}`,children:[e.jsxs("div",{className:"flex w-full space-x-8 p-4 ",children:[e.jsx("span",{className:"text-white",onClick:()=>d(!1),children:e.jsx(W,{icon:"XSquare"})}),e.jsx(F,{className:"text-white",children:"Create New User"})]}),e.jsx("div",{className:"h-full flex flex-col flex-grow bg-slate-50",children:e.jsxs("form",{className:"py-4 px-8 bg-slate-50",onSubmit:i=>{i.preventDefault(),u()},children:[e.jsxs("div",{className:" grid grid-cols-1 gap-x-4 items-center",children:[e.jsxs("div",{className:"py-4",children:[e.jsx(w,{htmlFor:"name",children:"Name"}),e.jsx(U,{id:"name",required:!0,type:"text",placeholder:"",value:n==null?void 0:n.name,onChange:i=>l({...n,name:i.target.value})})]}),e.jsxs("div",{className:"py-4",children:[e.jsx(w,{htmlFor:"email",children:"Email"}),e.jsx(U,{id:"email",required:!0,type:"email",placeholder:"",value:n==null?void 0:n.email,onChange:i=>l({...n,email:i.target.value})})]}),e.jsxs("div",{className:"py-4",children:[e.jsx(w,{htmlFor:"phone",children:"Phone number"}),e.jsx(U,{id:"phone",required:!0,type:"tel",placeholder:"",value:n==null?void 0:n.phone_number,onChange:i=>l({...n,phone_number:i.target.value})})]}),e.jsxs("div",{className:"py-4",children:[e.jsx(w,{htmlFor:"role",children:"Role"}),e.jsx(H,{defaultValue:"user",value:n==null?void 0:n.role,onValueChange:i=>l({...n,role:i}),children:["user","admin"].map((i,t)=>e.jsx(J,{value:i,icon:Q,children:e.jsx("span",{className:"capitalize",children:i})},t))})]})]}),e.jsx("div",{className:"flex py-4",children:e.jsx(L,{variant:"primary",className:"w-full",onClick:()=>{},children:"Save"})})]})})]})},Ae=$e,Ee=({userInfo:a,showModal:d,setShowModal:o,onSuccessCallback:p})=>{const j=E();M();const{updateAppContextState:h}=r.useContext(_),n=z(t=>{var g;return(g=t.auth)==null?void 0:g.token}),[l,u]=r.useState({name:"",email:"",phone_number:"",role:""}),i=()=>{h("loading",!0),axios.post(`${b}/user/${a==null?void 0:a.id}/update`,{...l},{headers:{Authorization:`Bearer ${n}`}}).then(t=>{o(!1),p(),j(P({id:C(),message:"User updated successfully"}))}).catch(t=>{}).finally(()=>{h("loading",!1)})};return r.useEffect(()=>{u({...a})},[a]),e.jsxs("div",{className:`z-[1000] my-3 fixed bg-primary rounded-md shadow-md transition-all h-full top-20 bottom-0 right-0 w-full lg:w-1/2 duration-700  ${d?"translate-x-0  ":"translate-x-full"}`,children:[e.jsxs("div",{className:"flex w-full space-x-8 p-4 ",children:[e.jsx("span",{className:"text-white",onClick:()=>o(!1),children:e.jsx(W,{icon:"XSquare"})}),e.jsxs(F,{className:"text-white",children:["Edit ",l==null?void 0:l.name,"'s Info"]})]}),e.jsx("div",{className:"h-full flex flex-col flex-grow bg-slate-50",children:e.jsxs("form",{className:"py-4 px-8 bg-slate-50",onSubmit:t=>{t.preventDefault(),i()},children:[e.jsxs("div",{className:" grid grid-cols-1 gap-x-4 items-center",children:[e.jsxs("div",{className:"py-4",children:[e.jsx(w,{htmlFor:"name",children:"Name"}),e.jsx(U,{id:"name",required:!0,type:"text",placeholder:"",value:l==null?void 0:l.name,onChange:t=>u({...l,name:t.target.value})})]}),e.jsxs("div",{className:"py-4",children:[e.jsx(w,{htmlFor:"email",children:"Email"}),e.jsx(U,{id:"email",required:!0,type:"email",placeholder:"",value:l==null?void 0:l.email,onChange:t=>u({...l,email:t.target.value})})]}),e.jsxs("div",{className:"py-4",children:[e.jsx(w,{htmlFor:"phone",children:"Phone number"}),e.jsx(U,{id:"phone",required:!0,type:"tel",placeholder:"",value:l==null?void 0:l.phone_number,onChange:t=>u({...l,phone_number:t.target.value})})]}),e.jsxs("div",{className:"py-4",children:[e.jsx(w,{htmlFor:"role",children:"Role"}),e.jsx(H,{defaultValue:"user",value:l==null?void 0:l.role,onValueChange:t=>u({...l,role:t}),children:["user","admin"].map((t,g)=>e.jsx(J,{value:t,icon:Q,children:e.jsx("span",{className:"capitalize",children:t})},g))})]})]}),e.jsx("div",{className:"flex py-4",children:e.jsx(L,{variant:"primary",className:"w-full",onClick:()=>{},children:"Save"})})]})})]})},Me=Ee,_e=({user:a,showModal:d,setShowModal:o,onSuccessCallback:p})=>{const j=E();M();const{updateAppContextState:h}=r.useContext(_),n=z(t=>{var g;return(g=t.auth)==null?void 0:g.token}),[l,u]=r.useState(""),i=()=>{h("loading",!0),axios.post(`${b}/user/password/update`,{id:a==null?void 0:a.id,password:l},{headers:{Authorization:`Bearer ${n}`}}).then(t=>{o(!1),p(),j(P({id:C(),message:"User password updated successfully"}))}).catch(t=>{}).finally(()=>{h("loading",!1)})};return e.jsxs("div",{className:`z-[1000] my-3 fixed bg-primary rounded-md shadow-md transition-all h-full top-20 bottom-0 right-0 w-full lg:w-1/2 duration-700  ${d?"translate-x-0  ":"translate-x-full"}`,children:[e.jsxs("div",{className:"flex w-full space-x-8 p-4 ",children:[e.jsx("span",{className:"text-white",onClick:()=>o(!1),children:e.jsx(W,{icon:"XSquare"})}),e.jsxs(F,{className:"text-white",children:["Update ",a==null?void 0:a.name,"'s Password"]})]}),e.jsx("div",{className:"h-full flex flex-col flex-grow bg-slate-50",children:e.jsxs("form",{className:"py-4 px-8 bg-slate-50",onSubmit:t=>{t.preventDefault(),i()},children:[e.jsx("div",{className:" grid grid-cols-1 gap-x-4 items-center",children:e.jsxs("div",{className:"py-4",children:[e.jsx(w,{htmlFor:"name",children:"New Password"}),e.jsx(U,{id:"password",required:!0,type:"password",placeholder:"",value:l,onChange:t=>u(t.target.value)})]})}),e.jsx("div",{className:"flex py-4",children:e.jsx(L,{variant:"primary",className:"w-full",onClick:()=>{},children:"Save"})})]})})]})},ze=_e,Fe=({user:a,setSelectedUser:d,changeUserStatus:o,setShowEditUserModal:p,resetUserPassword:j,setShowUpdateUserPasswordModal:h,actionsRef:n})=>a?e.jsx("div",{ref:n,className:"left-0 right-0 flex justify-center items-center  h-28 fixed bottom-32 lg:bottom-8  bg-transparent z-50",children:e.jsxs("div",{className:"box mx-auto  h-full flex shadow-lg",children:[e.jsxs("div",{className:"h-full w-52 px-2 space-y-2 bg-primary rounded-l text-white text-2xl font-bold flex flex-col justify-center items-center",children:[e.jsx(ve,{className:"w-8 h-8"}),e.jsx("span",{className:"text-xs w-fit text-center overflow-ellipsis",children:a==null?void 0:a.name})]}),e.jsxs("div",{className:"flex w-full items-center justify-center space-x-10",children:[e.jsxs("div",{onClick:()=>{p(!0)},className:"flex flex-col px-2 items-center justify-center text-center font-thin cursor-pointer",children:[e.jsx("span",{className:"font-thin text-center p-2",children:e.jsx(ye,{strokeWidth:1,className:"w-8 h-8 text-secondary"})}),e.jsx("span",{className:"text-primary",children:"Edit Info"})]}),(a==null?void 0:a.status)!=="active"&&e.jsxs("div",{onClick:()=>{o("active",a),d(null)},className:"flex flex-col px-2 items-center justify-center text-center font-thin cursor-pointer",children:[e.jsx("span",{className:"font-thin text-center p-2",children:e.jsx(be,{strokeWidth:1,className:"w-8 h-8 text-secondary"})}),e.jsx("span",{className:"text-primary",children:"Activate"})]}),(a==null?void 0:a.status)!=="inactive"&&e.jsxs("div",{onClick:()=>{o("inactive",a),d(null)},className:" flex flex-col px-2 items-center justify-center text-center font-thin cursor-pointer",children:[e.jsx("span",{className:"font-thin text-center p-2",children:e.jsx(Ce,{strokeWidth:1,className:"w-8 h-8 text-secondary"})}),e.jsx("span",{className:"text-primary",children:"De-activate"})]}),e.jsxs("div",{onClick:()=>{Pe(()=>{j(a),d(null)})},className:" flex flex-col px-2 items-center justify-center text-center font-thin cursor-pointer",children:[e.jsx("span",{className:"font-thin text-center p-2",children:e.jsx(Ue,{strokeWidth:1,className:"w-8 h-8 text-secondary"})}),e.jsx("span",{className:"text-primary",children:"Reset Password"})]}),e.jsxs("div",{onClick:()=>h(!0),className:" flex flex-col px-2 items-center justify-center text-center font-thin cursor-pointer",children:[e.jsx("span",{className:"font-thin text-center p-2",children:e.jsx(Se,{strokeWidth:1,className:"w-8 h-8 text-secondary"})}),e.jsx("span",{className:"text-primary",children:"Update Password"})]})]}),e.jsx("div",{className:" w-32 h-full flex justify-center items-center border-l",children:e.jsx(ke,{onClick:()=>{d(null)},strokeWidth:1,className:"w-8 h-8 cursor-pointer"})})]})}):null;function He(){var I,K,T;M();const a=E(),d=z(s=>s.auth.token),{updateAppContextState:o}=r.useContext(_),[p,j]=r.useState(1),[h,n]=r.useState(1),[l,u]=r.useState(1),[i,t]=r.useState(""),[g,Z]=r.useState(""),[m,D]=r.useState({}),[f,v]=r.useState(null),[ee,R]=r.useState(!1),[se,V]=r.useState(!1),[ae,X]=r.useState(!1),$=r.useRef(null),y=(s=`${b}/users`)=>{o("loading",!0),console.log(s),q.get(s,{headers:{API_KEY:ce,Authorization:`Bearer ${d}`}}).then(x=>{var N;let c=(N=x==null?void 0:x.data)==null?void 0:N.data;console.log("Users Data",c),x!=null&&x.data&&(j(parseInt(c==null?void 0:c.current_page)),t(c==null?void 0:c.prev_page_url),Z(c==null?void 0:c.next_page_url),u(c==null?void 0:c.last_page),D(c))}).catch(x=>{console.log(x)}).finally(()=>{o("loading",!1)})},te=(s,x)=>{var c;o("loading",!0),q.put(`${b}/user/status/update`,{id:(c=x==null?void 0:x.id)==null?void 0:c.toString(),status:s},{headers:{Authorization:`Bearer ${d}`}}).then(N=>{y(),a(P({id:C(),message:"User status has been updated successfully!"})),v(null)}).catch(N=>{console.log(N),a(Y({id:C(),message:"Something went wrong! User status could not be updated!"}))}).finally(()=>{o("loading",!1)})},le=s=>(o("loading",!0),new Promise((x,c)=>{q.get(`${b}/user/${s==null?void 0:s.id}/password/reset`,{headers:{Authorization:`Bearer ${d}`}}).then(N=>{y(),a(P({id:C(),message:(s==null?void 0:s.name)+"'s password has been reset successfully!"})),x({message:(s==null?void 0:s.name)+"'s password has been reset successfully!",title:"success"})}).catch(N=>{console.log(N),a(Y({id:C(),message:"Something went wrong! User password could not be reset!"})),c({message:"Something went wrong! User password could not be reset!",title:"error"})}).finally(()=>{o("loading",!1)})})),ne=O.debounce(y,1e3);r.useEffect(()=>{y()},[d]),r.useEffect(()=>{h!=p&&n(p)},[p]),r.useEffect(()=>{h!=p&&ne(`${b}/users?page=${h}`)},[h]),r.useEffect(()=>{var s;f&&((s=$==null?void 0:$.current)==null||s.scrollIntoView({behavior:"smooth"}))},[f]);const[A,re]=r.useState([]),ie=s=>{if(A.length===0||(A==null?void 0:A.find(c=>O.isEqual(c,s==null?void 0:s.name))))return!0};return e.jsxs("div",{className:"w-full h-full relative py-4",children:[e.jsxs(oe,{className:"bg-white h-full w-full",children:[e.jsxs(de,{justifyContent:"start",className:"space-x-2",children:[e.jsx(F,{children:"Users"}),e.jsxs(B,{color:"gray",children:["Showing ",((I=m==null?void 0:m.data)==null?void 0:I.length)||0," of"," ",je(parseInt((m==null?void 0:m.total)||0))]})]}),e.jsx(he,{className:"mt-2",children:"Overview of Users"}),e.jsxs("div",{className:"flex space-x-4 items-center w-full lg:justify-between justify-start pt-4",children:[e.jsx("div",{className:"flex items-center w-52 lg:w-80",children:e.jsx(me,{onValueChange:re,placeholder:"Search users...",className:"max-w-md",children:(K=m==null?void 0:m.data)==null?void 0:K.map(s=>e.jsx(xe,{value:s==null?void 0:s.name,children:s==null?void 0:s.name},s.id))})}),e.jsx("div",{className:"flex items-center",children:e.jsxs("span",{role:"btn-create-user",onClick:()=>{R(!0)},className:"inline-flex overflow-hidden rounded-md border bg-secondary shadow-sm",children:[e.jsx("button",{className:"inline-block border-e px-4 py-2 text-sm font-medium text-white hover:bg-orange-500 focus:relative",children:"New User"}),e.jsx("button",{className:"inline-block px-4 py-2 text-white hover:bg-orange-500 focus:relative",title:"Create User",children:e.jsx("svg",{fill:"none",stroke:"currentColor",strokeWidth:"1.5",viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg","aria-hidden":"true",className:"h-4 w-4",children:e.jsx("path",{strokeLinecap:"round",strokeLinejoin:"round",d:"M12 4.5v15m7.5-7.5h-15"})})})]})})]}),e.jsxs(pe,{className:"mt-6",children:[e.jsx(ue,{children:e.jsxs(G,{children:[e.jsx(S,{children:"#"}),e.jsx(S,{children:"Name"}),e.jsx(S,{children:"Phone"}),e.jsx(S,{children:"Role"}),e.jsx(S,{className:"",children:"Status"}),e.jsx(S,{className:"",children:"Action"})]})}),e.jsx(fe,{className:"bg-slate-50",children:(T=m==null?void 0:m.data)==null?void 0:T.filter(s=>ie(s)).map(s=>e.jsxs(G,{children:[e.jsx(k,{children:e.jsx("div",{onClick:()=>{if((f==null?void 0:f.id)!==s.id)return v(s);v(null)},className:"flex justify-center items-center w-5 h-5 border border-primary rounded",children:(f==null?void 0:f.id)===s.id&&e.jsx("div",{className:"w-4 h-4 bg-primary border border-primary rounded flex justify-center items-center",children:e.jsx(we,{className:"w-4 h-4 text-white"})})})}),e.jsx(k,{children:s.name}),e.jsx(k,{children:s.phone_number}),e.jsx(k,{className:"capitalize",children:s.role}),e.jsx(k,{children:s.status==="active"?e.jsx(B,{className:"capitalize",size:"md",color:"green",children:s==null?void 0:s.status}):e.jsx(B,{className:"capitalize",size:"md",color:"red",children:s==null?void 0:s.status})}),e.jsx(k,{className:"text-right",children:e.jsx(Ne,{onClick:()=>v(s),className:" w-4 h-4 cursor-pointer"})})]},s.id))})]}),e.jsx(ge,{currentPage:p,moveToPage:h,fetchPage:y,setMoveToPage:n,nextPageUrl:g,prevPageUrl:i,lastPage:l,totalPages:m==null?void 0:m.last_page})]}),e.jsx(Fe,{user:f,setSelectedUser:v,changeUserStatus:te,setShowEditUserModal:V,resetUserPassword:le,setShowUpdateUserPasswordModal:X,actionsRef:$}),e.jsx(Ae,{onSuccessCallback:y,showModal:ee,setShowModal:R}),e.jsx(Me,{userInfo:f,onSuccessCallback:()=>{v(null),y()},showModal:se,setShowModal:V}),e.jsx(ze,{user:f,onSuccessCallback:()=>{v(null)},showModal:ae,setShowModal:X})]})}export{He as default};
