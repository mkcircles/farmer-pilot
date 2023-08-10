import{b as k,u as m,r as l,A as O,B as g,l as B,j as t,F as T,d as M,T as K}from"./app-8dcde265.js";import{b as Y,a as q,e as G,A as j,m as H,t as J,v as Q,w as y,x as c,y as V,z as i,F as W}from"./Tracker-83ecadc0.js";import{n as X}from"./numberFormatter-373bc269.js";import{P as Z}from"./index-fd3fa01b.js";import"./Transition-65f6b026.js";import"./default-config-939e3be8.js";function ls({fpo_id:P,agent_id:_,...A}){var S;const E=k(),r=m(s=>s.auth.token),o=m(s=>s.auth.user),{updateAppContextState:N}=l.useContext(O),[d,F]=l.useState(1),[h,$]=l.useState(1),[z,b]=l.useState(1),[w,C]=l.useState(""),[I,L]=l.useState(""),[a,R]=l.useState({});let x=`${g}/farmers`;(o==null?void 0:o.role)!=="admin"&&(x=`${g}/fpo/${o==null?void 0:o.entity_id}/farmers`),P&&(x=`${g}/fpo/${P}/farmers`),_&&(x=`${g}/agent/${_}/farmers`);const p=(s=x)=>{N("loading",!0),M.get(s,{headers:{API_KEY:K,Authorization:`Bearer ${r}`}}).then(n=>{var u;let e=(u=n==null?void 0:n.data)==null?void 0:u.data;console.log("Profiles",e),n!=null&&n.data&&(F(parseInt(e==null?void 0:e.current_page)),C(e==null?void 0:e.prev_page_url),L(e==null?void 0:e.next_page_url),b(e==null?void 0:e.last_page),R(e))}).catch(n=>{console.log(n)}).finally(()=>{N("loading",!1)})},U=B.debounce(p,1e3);return l.useEffect(()=>{p()},[r]),l.useEffect(()=>{h!=d&&$(d)},[d]),l.useEffect(()=>{h!=d&&U(`${x}?page=${h}`)},[h]),t.jsx("div",{className:"w-full h-full py-4",...A,children:t.jsxs(Y,{className:"bg-white h-full w-full",children:[t.jsxs(q,{justifyContent:"start",className:"space-x-2",children:[t.jsx(G,{children:"Farmers"}),t.jsx(j,{color:"gray",children:X(parseInt((a==null?void 0:a.total)||0))})]}),t.jsx(H,{className:"mt-2",children:"Overview of farmers profiled"}),t.jsxs(J,{className:"mt-6",children:[t.jsx(Q,{children:t.jsxs(y,{children:[t.jsx(c,{children:"Farmer ID"}),t.jsx(c,{children:"Name"}),t.jsx(c,{children:"Phone"}),t.jsx(c,{children:"FPO"}),t.jsx(c,{className:"",children:"District"}),t.jsx(c,{className:"",children:"Registered On"}),t.jsx(c,{className:"",children:"Status"}),t.jsx(c,{children:"Link"})]})}),t.jsx(V,{children:(S=a==null?void 0:a.data)==null?void 0:S.map(s=>{var n,e,u,v;return t.jsxs(y,{children:[t.jsx(i,{children:s.farmer_id}),t.jsx(i,{children:s.first_name+" "+s.last_name}),t.jsx(i,{children:s.phone_number||"N/A"}),t.jsx(i,{children:s.fpo_name||((n=s==null?void 0:s.fpo)==null?void 0:n.fpo_name)||((u=(e=s==null?void 0:s.agent)==null?void 0:e.fpo)==null?void 0:u.fpo_name)}),t.jsx(i,{className:"",children:s.district}),t.jsx(i,{children:(v=new Date(s==null?void 0:s.created_at))==null?void 0:v.toLocaleDateString("en-US",{year:"numeric",month:"short",day:"numeric"})}),t.jsx(i,{children:s.status==="complete"?t.jsx(j,{className:"capitalize",size:"md",color:"green",children:s==null?void 0:s.status}):(s==null?void 0:s.status)==="pending"?t.jsx(j,{className:"capitalize",size:"md",color:"gray",children:s==null?void 0:s.status}):t.jsx(j,{className:"capitalize",size:"md",color:"red",children:s==null?void 0:s.status})}),t.jsx(i,{children:t.jsx(W,{size:"xs",variant:"secondary",color:"orange",onClick:()=>{E(`${T}/${s==null?void 0:s.farmer_id}`)},children:"See details"})})]},s.id)})})]}),t.jsx(Z,{currentPage:d,moveToPage:h,fetchPage:p,setMoveToPage:$,nextPageUrl:I,prevPageUrl:w,lastPage:z,totalPages:a==null?void 0:a.last_page})]})})}export{ls as default};
