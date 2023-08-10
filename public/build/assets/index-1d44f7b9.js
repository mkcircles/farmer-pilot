import{a as I,u as b,r as h,A as z,j as e,s as V,B as p,R as ae,b as oe,c as he,v as ue,l as te,d as se}from"./app-f8751d23.js";import{b as D,d as T,e as q,m as G,h as X,i as P,n as H,j as $,k as M,P as E,l as L,o as R,p as le,q as xe,r as fe,t as ge,v as je,w as ne,x as _,y as ve,z as N,A as U,s as pe,E as ye}from"./Tracker-361e94fb.js";import{F as O}from"./index-ab64e8f1.js";import{B as _e}from"./index-f335fb72.js";import{L as Ne,F as Fe,H as ie,U as we,a as Ae,D as ce,T as be,b as Pe,c as $e,A as Se}from"./index-4a8b2ba2.js";import{F}from"./index-8b5d8db2.js";import{U as Re}from"./UserGroupIcon-407608c2.js";import{P as Ce}from"./index-5b2e8740.js";import{W as ze}from"./WithConfirmAlert-400fc6a7.js";import{n as re}from"./numberFormatter-373bc269.js";import"./Transition-3d8a7619.js";import"./default-config-939e3be8.js";import"./tw-merge-fbb83fc6.js";import"./square-stack-eb340e42.js";const De=n=>`${Intl.NumberFormat("us").format(n).toString()}%`,ke=n=>Intl.NumberFormat("us").format(n).toString();function Be(){const n=I(),m=b(i=>i.auth.token),d=b(i=>i.reports.agentsPerformance),r=b(i=>i.reports.stats),{updateAppContextState:c}=h.useContext(z),s={relative:d==null?void 0:d.map(i=>{var l;return{agent_name:i.name,"Farmers Profiled":(i.farmers_count/((l=r==null?void 0:r.system_stats)==null?void 0:l.total_farmers)*100).toFixed(2)}}),absolute:d==null?void 0:d.map(i=>({agent_name:i.name,"Farmers Profiled":i.farmers_count}))},u=(i=`${p}/summary`)=>{c("loading",!0),axios.get(i,{headers:{Authorization:`Bearer ${m}`}}).then(l=>{console.log("Stats Data",l==null?void 0:l.data);let x=l==null?void 0:l.data;l!=null&&l.data&&n(V({reportType:"stats",reportData:x}))}).catch(l=>{console.log(l)}).finally(()=>{c("loading",!1)})},w=(i=`${p}/agents/graph`)=>{c("loading",!0),axios.get(i,{headers:{Authorization:`Bearer ${m}`}}).then(l=>{var o,v;console.log("Agent Graph Data",(o=l==null?void 0:l.data)==null?void 0:o.data);let x=(v=l==null?void 0:l.data)==null?void 0:v.data;l!=null&&l.data&&n(V({reportType:"agentsPerformance",reportData:x}))}).catch(l=>{console.log(l)}).finally(()=>{c("loading",!1)})};return h.useEffect(()=>{w(),u()},[]),e.jsx(D,{className:"my-4",children:e.jsxs(T,{children:[e.jsxs("div",{className:"block sm:flex sm:justify-between",children:[e.jsxs("div",{children:[e.jsx(q,{children:"Agent Performance"}),e.jsx(G,{children:"Farmers Profiled"})]}),e.jsx("div",{className:"mt-4 sm:mt-0",children:e.jsxs(X,{variant:"solid",children:[e.jsx(P,{children:"relative"}),e.jsx(P,{children:"absolute"})]})})]}),e.jsxs(H,{children:[e.jsx($,{children:e.jsx(M,{className:"mt-8 h-80",data:s.relative,index:"agent_name",categories:["Farmers Profiled"],colors:["orange"],showLegend:!0,valueFormatter:De,yAxisWidth:40})}),e.jsx($,{children:e.jsx(M,{className:"mt-8 h-80",data:s.absolute,index:"agent_name",categories:["Farmers Profiled"],colors:["orange"],showLegend:!0,valueFormatter:ke,yAxisWidth:40,showXAxis:!0})})]})]})})}function W(){return W=Object.assign||function(n){for(var m=1;m<arguments.length;m++){var d=arguments[m];for(var r in d)Object.prototype.hasOwnProperty.call(d,r)&&(n[r]=d[r])}return n},W.apply(this,arguments)}function Ee(n,m){if(n==null)return{};var d=Le(n,m),r,c;if(Object.getOwnPropertySymbols){var s=Object.getOwnPropertySymbols(n);for(c=0;c<s.length;c++)r=s[c],!(m.indexOf(r)>=0)&&Object.prototype.propertyIsEnumerable.call(n,r)&&(d[r]=n[r])}return d}function Le(n,m){if(n==null)return{};var d={},r=Object.keys(n),c,s;for(s=0;s<r.length;s++)c=r[s],!(m.indexOf(c)>=0)&&(d[c]=n[c]);return d}var Y=h.forwardRef(function(n,m){var d=n.color,r=d===void 0?"currentColor":d,c=n.size,s=c===void 0?24:c,u=Ee(n,["color","size"]);return ae.createElement("svg",W({ref:m,xmlns:"http://www.w3.org/2000/svg",width:s,height:s,viewBox:"0 0 24 24",fill:"none",stroke:r,strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round"},u),ae.createElement("polyline",{points:"22 12 18 12 15 21 9 3 6 12 2 12"}))});Y.propTypes={color:E.string,size:E.oneOfType([E.string,E.number])};Y.displayName="Activity";const Oe=Y,Ve=({showModal:n,setShowModal:m})=>{const d=I();oe();const{updateAppContextState:r}=h.useContext(z),c=b(a=>{var f;return(f=a.auth)==null?void 0:f.token}),[s,u]=h.useState({name:"",report_type:"farmer-report",from_date:"2023-07-01",to_date:"2023-07-01",district:"",agent_id:"",crops_grown:"",farm_size:"",gender:"",fpo_id:""}),[w,i]=h.useState([]),[l,x]=h.useState([]),o=[{name:"Farmers Report",value:"farmer-report"},{name:"Crops Report",value:"crop-report"},{name:"Agent Summary Report",value:"agent-summary-report"},{name:"Custom Report",value:"custom-report"}],v=()=>{r("loading",!0),axios.post(`${p}/report/register`,{...s},{headers:{Authorization:`Bearer ${c}`}}).then(a=>{m(!1),d(he({id:ue(),message:"Report has been created successfully and queued for processing!"}))}).catch(a=>{}).finally(()=>{r("loading",!1)})},A=()=>{r("loading",!0),axios.get(`${p}/agents/all`,{headers:{Authorization:`Bearer ${c}`}}).then(a=>{var S,y;console.log("Agent Data",(S=a==null?void 0:a.data)==null?void 0:S.data);let f=(y=a==null?void 0:a.data)==null?void 0:y.data;a!=null&&a.data&&i(f)}).catch(a=>{console.log(a)}).finally(()=>{r("loading",!1)})},C=()=>{r("loading",!0),axios.get(`${p}/fpos/summary`,{headers:{Authorization:`Bearer ${c}`}}).then(a=>{var S,y;console.log("FPO Data",(S=a==null?void 0:a.data)==null?void 0:S.data);let f=(y=a==null?void 0:a.data)==null?void 0:y.data;a!=null&&a.data&&x(f)}).catch(a=>{console.log(a)}).finally(()=>{r("loading",!1)})},k=a=>`${a==null?void 0:a.getFullYear()}-${(a==null?void 0:a.getMonth())+1<10?`0${(a==null?void 0:a.getMonth())+1}`:(a==null?void 0:a.getMonth())+1}-${(a==null?void 0:a.getDate())<10?`0${a==null?void 0:a.getDate()}`:a==null?void 0:a.getDate()}`;return h.useEffect(()=>{A(),C()},[]),e.jsxs("div",{className:`z-[1000] my-3 fixed bg-primary rounded-md shadow-md transition-all h-full top-20 bottom-0 right-0 w-full lg:w-1/2 duration-700  ${n?"translate-x-0  ":"translate-x-full"}`,children:[e.jsxs("div",{className:"flex w-full space-x-8 p-4 ",children:[e.jsx("span",{className:"text-white",onClick:()=>m(!1),children:e.jsx(Ne,{icon:"XSquare"})}),e.jsx(q,{className:"text-white",children:"Create New Report"})]}),e.jsx("div",{className:"h-full flex flex-col flex-grow bg-slate-50",children:e.jsxs("form",{className:"py-4 px-8 bg-slate-50",onSubmit:a=>{a.preventDefault(),v()},children:[e.jsxs("div",{className:" grid grid-cols-1 md:grid-cols-2 gap-x-4 items-center",children:[e.jsxs("div",{className:"py-4",children:[e.jsx(F,{htmlFor:"name",children:"Report Name"}),e.jsx(O,{id:"name",required:!0,type:"text",placeholder:"",value:s==null?void 0:s.name,onChange:a=>u({...s,name:a.target.value})})]}),e.jsxs("div",{className:"py-4",children:[e.jsx(F,{htmlFor:"report_type",children:"Report Type"}),e.jsx(L,{defaultValue:"farmer-report",value:s==null?void 0:s.report_type,onValueChange:a=>u({...s,report_type:a}),children:o==null?void 0:o.map((a,f)=>e.jsx(R,{value:a==null?void 0:a.value,icon:Fe,children:a==null?void 0:a.name},f))})]})]}),e.jsxs("div",{className:" grid grid-cols-1 md:grid-cols-2 gap-x-4 items-center",children:[e.jsxs("div",{className:"py-4 w-full",children:[e.jsx(F,{htmlFor:"from_date",children:"From"}),e.jsx(le,{defaultValue:new Date(s==null?void 0:s.from_date),onValueChange:a=>{u({...s,from_date:k(a)})},className:""})]}),e.jsxs("div",{className:"py-4 w-full",children:[e.jsx(F,{htmlFor:"to_date",children:"To"}),e.jsx(le,{defaultValue:new Date(s==null?void 0:s.to_date),onValueChange:a=>{u({...s,to_date:k(a)})},className:""})]})]}),e.jsxs("div",{className:" grid grid-cols-1 md:grid-cols-2 gap-x-4 items-center",children:[e.jsxs("div",{className:"py-4",children:[e.jsx(F,{htmlFor:"fpo_id",children:"FPO"}),e.jsx(L,{defaultValue:"",value:s==null?void 0:s.fpo_id,onValueChange:a=>u({...s,fpo_id:a}),children:["All",...l].map((a,f)=>a==="All"?e.jsx(R,{value:"",icon:ie,children:"All FPOs"},f):e.jsx(R,{value:a==null?void 0:a.id,icon:ie,children:a==null?void 0:a.fpo_name},f))})]}),e.jsxs("div",{className:"py-4",children:[e.jsx(F,{htmlFor:"agent_id",children:"Agent"}),e.jsx(L,{defaultValue:"",value:s==null?void 0:s.agent_id,onValueChange:a=>u({...s,agent_id:a}),children:["All",...w].map((a,f)=>a==="All"?e.jsx(R,{value:"",icon:Re,children:"All agents"},f):e.jsx(R,{value:a==null?void 0:a.id,icon:we,children:(a==null?void 0:a.first_name)+" "+(a==null?void 0:a.last_name)},f))})]})]}),e.jsxs("div",{className:" grid grid-cols-1 md:grid-cols-2 gap-x-4 items-center",children:[e.jsxs("div",{className:"py-4",children:[e.jsx(F,{htmlFor:"district",children:"District"}),e.jsx(O,{id:"district",type:"text",placeholder:"District",value:s==null?void 0:s.district,onChange:a=>u({...s,district:a.target.value})})]}),e.jsxs("div",{className:"py-4",children:[e.jsx(F,{htmlFor:"gender",children:"Gender"}),e.jsx(L,{value:s==null?void 0:s.gender,onValueChange:a=>u({...s,gender:a}),children:["All","Male","Female"].map((a,f)=>a==="All"?e.jsx(R,{value:"",children:a},f):e.jsx(R,{value:a,children:a},f))})]})]}),e.jsxs("div",{className:" grid grid-cols-1 md:grid-cols-2 gap-x-4 items-center",children:[e.jsxs("div",{className:"py-4",children:[e.jsx(F,{htmlFor:"product",children:"Product"}),e.jsx(O,{id:"product",type:"text",placeholder:"E.g Maize",value:s==null?void 0:s.product,onChange:a=>u({...s,product:a.target.value})})]}),e.jsxs("div",{className:"py-4",children:[e.jsx(F,{htmlFor:"farm_size",children:"Farm Size (Acres)"}),e.jsx(O,{id:"farm_size",type:"number",placeholder:"",value:s==null?void 0:s.farm_size,onChange:a=>u({...s,farm_size:a.target.value})})]})]}),e.jsx("div",{className:"flex py-4",children:e.jsx(_e,{variant:"primary",className:"w-full",onClick:()=>{},children:"Save"})})]})})]})};function Me(){var K,Q;I(),oe();const n=b(t=>t.auth.token),{updateAppContextState:m}=h.useContext(z),[d,r]=h.useState(!1),[c,s]=h.useState([]),[u,w]=h.useState(1),[i,l]=h.useState(1),[x,o]=h.useState(1),[v,A]=h.useState(""),[C,k]=h.useState(""),[a,f]=h.useState([]),S=t=>{if(a.length===0||(a==null?void 0:a.find(g=>te.isEqual(g,t==null?void 0:t.name))))return!0},y=({showLoading:t}={showLoading:!0})=>{let B=`${p}/reports`;m("loading",t),se.get(B,{headers:{Authorization:`Bearer ${n}`}}).then(g=>{var Z,ee;console.log("Reports Data",(Z=g==null?void 0:g.data)==null?void 0:Z.data);let j=(ee=g==null?void 0:g.data)==null?void 0:ee.data;g!=null&&g.data&&(w(j==null?void 0:j.current_page),A(j==null?void 0:j.prev_page_url),k(j==null?void 0:j.next_page_url),o(j==null?void 0:j.last_page),s(j))}).catch(g=>{console.log(g)}).finally(()=>{m("loading",!1)})};h.useEffect(()=>{y()},[n]),h.useEffect(()=>{i!=u&&l(u)},[u]),h.useEffect(()=>{i!=u&&te.debounce(y,1e3)(`${p}/reports?page=${i||1}`)},[i]),h.useEffect(()=>{d||y({showLoading:!1})},[d]);const J=t=>new Date(t).toLocaleDateString("en-us",{day:"numeric",year:"numeric",month:"short"}),de=t=>(m("loading",!0),new Promise((B,g)=>{se.delete(`${p}/report/${t}`,{headers:{Authorization:`Bearer ${n}`}}).then(()=>{y(),B({title:"success",message:"Report deleted successfully"})}).catch(j=>{console.log(j),g({message:"Something went wrong. Report could not be deleted",title:"error"})}).finally(()=>{m("loading",!1)})})),me=t=>{switch(t){case"crop-report":return"Crops Report";case"farmer-report":return"Farmers Report";case"custom-report":return"Custom Report";default:return t}};return e.jsx("div",{className:"w-full h-full",children:e.jsxs(D,{className:" px-0",children:[e.jsxs("div",{className:"flex border-b space-x-4 items-center w-full lg:justify-between justify-start pb-4",children:[e.jsx("div",{className:"flex items-center w-52 lg:w-80",children:e.jsx(xe,{onValueChange:f,placeholder:"Search Reports...",className:"max-w-md",children:(K=c==null?void 0:c.data)==null?void 0:K.map(t=>e.jsx(fe,{value:t==null?void 0:t.name,children:t==null?void 0:t.name},t==null?void 0:t.id))})}),e.jsx("div",{className:"flex",children:e.jsxs("button",{onClick:()=>r(!0),className:"group flex space-x-2 px-4 py-3 border border-secondary rounded text-secondary",children:[e.jsx(Ae,{className:"w-5 h-5 group-hover:scale-125 "}),e.jsx("span",{className:"group-hover:scale-95",children:"New Report"})]})})]}),e.jsxs(ge,{className:"",children:[e.jsx(je,{children:e.jsxs(ne,{className:"",children:[e.jsx(_,{children:"Name"}),e.jsx(_,{children:"Type"}),e.jsx(_,{children:"Date"}),e.jsx(_,{children:"District"}),e.jsx(_,{children:"Agent"}),e.jsx(_,{children:"Product"}),e.jsx(_,{children:"Farm Size (Acres)"}),e.jsx(_,{children:"Gender"}),e.jsx(_,{children:"Status"}),e.jsx(_,{children:"Action"})]})}),e.jsx(ve,{children:(Q=c==null?void 0:c.data)==null?void 0:Q.filter(t=>S(t)).map(t=>(t={...t,...JSON.parse(t==null?void 0:t.report_params)},e.jsxs(ne,{className:"m-0",children:[e.jsx(N,{children:t==null?void 0:t.name}),e.jsx(N,{children:me(t==null?void 0:t.report_type)}),e.jsxs(N,{children:[J(t==null?void 0:t.from_date)," ","-"," ",J(t==null?void 0:t.to_date)]}),e.jsx(N,{children:(t==null?void 0:t.district)||"-"}),e.jsx(N,{children:(t==null?void 0:t.agent_id)||"-"}),e.jsx(N,{children:(t==null?void 0:t.product)||"-"}),e.jsx(N,{children:(t==null?void 0:t.farm_size)||"-"}),e.jsx(N,{children:(t==null?void 0:t.gender)||"-"}),e.jsx(N,{children:(t==null?void 0:t.report_status)==="pending"?e.jsx(U,{className:"capitalize",size:"md",color:"orange",children:"pending"}):(t==null?void 0:t.report_status)==="completed"?e.jsx(U,{className:"capitalize",size:"md",color:"green",children:"completed"}):e.jsx(U,{className:"capitalize",size:"md",color:"red",children:"failed"})}),e.jsx(N,{children:e.jsxs("div",{className:"flex items-center space-x-4",children:[(t==null?void 0:t.report_status)==="completed"?e.jsx("a",{target:"_blank",title:"Download",href:`/reports/${t==null?void 0:t.report_url}`,className:"text-secondary transition-all duration-700",children:e.jsx(ce,{className:"h-5 w-5 hover:scale-125"})}):e.jsx(ce,{className:"h-5 w-5 text-tremor-brand-muted cursor-not-allowed"}),e.jsx("span",{onClick:()=>{ze(()=>de(t==null?void 0:t.id))},title:"Delete",children:e.jsx(be,{className:"h-5 w-5 text-danger cursor-pointer"})})]})})]},t==null?void 0:t.id)))})]}),e.jsx(Ce,{currentPage:u,moveToPage:i,fetchPage:y,setMoveToPage:l,nextPageUrl:C,prevPageUrl:v,lastPage:x,totalPages:c==null?void 0:c.last_page}),e.jsx(Ve,{showModal:d,setShowModal:r})]})})}const Ie=n=>`${Intl.NumberFormat("us").format(n).toString()}%`,Ue=n=>Intl.NumberFormat("us").format(n).toString();function We(){const n=I(),m=b(i=>i.auth.token),d=b(i=>i.reports.farmersPerDistrict),r=b(i=>i.reports.stats),{updateAppContextState:c}=h.useContext(z),s={relative:d.map(i=>{var l;return{district_name:i.name,"Farmers Profiled":(i.farmers_count/((l=r==null?void 0:r.system_stats)==null?void 0:l.total_farmers)*100).toFixed(2)}}),absolute:d.map(i=>({district_name:i.name,"Farmers Profiled":i.farmers_count}))},u=(i=`${p}/summary`)=>{c("loading",!0),axios.get(i,{headers:{Authorization:`Bearer ${m}`}}).then(l=>{console.log("Stats Data",l==null?void 0:l.data);let x=l==null?void 0:l.data;l!=null&&l.data&&n(V({reportType:"stats",reportData:x}))}).catch(l=>{console.log(l)}).finally(()=>{c("loading",!1)})},w=(i=`${p}/districts`)=>{c("loading",!0),axios.get(i,{headers:{Authorization:`Bearer ${m}`}}).then(l=>{var o,v;console.log("District Data",(o=l==null?void 0:l.data)==null?void 0:o.data);let x=(v=l==null?void 0:l.data)==null?void 0:v.data;l!=null&&l.data&&n(V({reportType:"farmersPerDistrict",reportData:Object.keys(x).map(A=>({name:A,farmers_count:x[A]}))}))}).catch(l=>{console.log(l)}).finally(()=>{c("loading",!1)})};return h.useEffect(()=>{u(),w()},[m]),e.jsx(D,{className:"my-4",children:e.jsxs(T,{children:[e.jsxs("div",{className:"block sm:flex sm:justify-between",children:[e.jsxs("div",{children:[e.jsx(q,{children:"District Performance"}),e.jsx(G,{children:"Farmers Profiled"})]}),e.jsx("div",{className:"mt-4 sm:mt-0",children:e.jsxs(X,{variant:"solid",children:[e.jsx(P,{children:"relative"}),e.jsx(P,{children:"absolute"})]})})]}),e.jsxs(H,{children:[e.jsx($,{children:e.jsx(M,{className:"mt-8 h-80",data:s.relative,index:"district_name",categories:["Farmers Profiled"],colors:["orange"],showLegend:!0,valueFormatter:Ie,yAxisWidth:40})}),e.jsx($,{children:e.jsx(M,{className:"mt-8 h-80",data:s.absolute,index:"district_name",categories:["Farmers Profiled"],colors:["orange"],showLegend:!0,valueFormatter:Ue,yAxisWidth:40,showXAxis:!0})})]})]})})}const Te=n=>`${re(n)}`;function qe(){var l;const n=b(x=>x.auth.token),{updateAppContextState:m}=h.useContext(z),[d,r]=h.useState([]),[c,s]=h.useState({}),u=Object.keys(d).map(x=>({date:x,"Farmers Registered":d[x]})),w=(x=`${p}/summary`)=>{m("loading",!0),axios.get(x,{headers:{Authorization:`Bearer ${n}`}}).then(o=>{console.log("Stats Data",o==null?void 0:o.data);let v=o==null?void 0:o.data;o!=null&&o.data&&s(v)}).catch(o=>{console.log(o)}).finally(()=>{m("loading",!1)})},i=(x=`${p}/farmer/date/summary`)=>{m("loading",!0),axios.get(x,{headers:{Authorization:`Bearer ${n}`}}).then(o=>{var A,C;console.log("Registration Data",(A=o==null?void 0:o.data)==null?void 0:A.data);let v=(C=o==null?void 0:o.data)==null?void 0:C.data;o!=null&&o.data&&r(v)}).catch(o=>{console.log(o)}).finally(()=>{m("loading",!1)})};return h.useEffect(()=>{w(),i()},[n]),e.jsxs(D,{className:"mx-auto",children:[e.jsx(G,{children:"Total Farmers"}),e.jsx(pe,{children:re((l=c==null?void 0:c.system_stats)==null?void 0:l.total_farmers)}),e.jsx(ye,{className:"mt-8 h-44",data:u,categories:["Farmers Registered"],index:"date",colors:["orange"],valueFormatter:Te,showYAxis:!1,showLegend:!1})]})}const ia=()=>e.jsx(D,{className:"my-4 w-full h-full",children:e.jsxs(T,{children:[e.jsxs(X,{className:"",children:[e.jsx(P,{icon:Pe,children:"Reports"}),e.jsx(P,{icon:Oe,children:"Agent Performance"}),e.jsx(P,{icon:$e,children:"Farmers Per District"}),e.jsx(P,{icon:Se,children:"Farmer Registration By Date"})]}),e.jsxs(H,{children:[e.jsx($,{children:e.jsx("div",{className:"w-full h-full",children:e.jsx(Me,{})})}),e.jsx($,{children:e.jsx(Be,{})}),e.jsx($,{children:e.jsx(We,{})}),e.jsx($,{children:e.jsx(qe,{})})]})]})});export{ia as default};
