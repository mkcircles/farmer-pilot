import{r as a,a as O,b as T,u as A,A as H,l as P,j as e,V,B as E,d as U}from"./app-f8605b1f.js";import{b as G,a as X,e as q,A as K,G as J,t as Q,v as Y,w as F,x as d,y as Z,z as h}from"./Tracker-d1c86d93.js";import{n as D}from"./numberFormatter-373bc269.js";import{P as ee}from"./index-25a8bf3b.js";import{X as te}from"./x-circle-7a8c38a5.js";import"./Transition-ec4945ec.js";import"./default-config-939e3be8.js";import"./createLucideIcon-4a41c09c.js";function se(g,o){return a.createElement("svg",Object.assign({xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor","aria-hidden":"true",ref:o},g),a.createElement("path",{fillRule:"evenodd",d:"M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z",clipRule:"evenodd"}))}const ne=a.forwardRef(se),ae=ne;function pe(){var C,L;O();const g=T(),o=A(t=>t.auth.token);A(t=>t.auth.user);const{updateAppContextState:u}=a.useContext(H),[l,f]=a.useState(1),[i,j]=a.useState(1),[M,w]=a.useState(1),[z,v]=a.useState(""),[R,k]=a.useState(""),[r,b]=a.useState(null),[m,N]=a.useState(""),[$,_]=a.useState(!1),[x,re]=a.useState([]),B=t=>{if(x.length===0||(x==null?void 0:x.find(n=>P.isEqual(n,(t==null?void 0:t.first_name)+" "+(t==null?void 0:t.last_name)))))return!0};let y=`${E}/unffe/outreach`;const W=()=>{N(""),_(!1),p()},p=(t=y)=>{u("loading",!0),U.get(t,{headers:{Authorization:`Bearer ${o}`}}).then(s=>{var c,S;console.log("Unfee Data",(c=s==null?void 0:s.data)==null?void 0:c.data);let n=(S=s==null?void 0:s.data)==null?void 0:S.data;s!=null&&s.data&&(f(n==null?void 0:n.current_page),v(n==null?void 0:n.prev_page_url),k(n==null?void 0:n.next_page_url),w(n==null?void 0:n.last_page),b(n))}).catch(s=>{console.log(s)}).finally(()=>{u("loading",!1)})},I=()=>{u("loading",!0),U.post(`${E}/unffe/outreach/search`,{search:m},{headers:{Authorization:`Bearer ${o}`}}).then(t=>{var n,c;console.log("Unfee Data",(n=t==null?void 0:t.data)==null?void 0:n.data);let s=(c=t==null?void 0:t.data)==null?void 0:c.data;t!=null&&t.data&&(f(s==null?void 0:s.current_page),v(s==null?void 0:s.prev_page_url),k(s==null?void 0:s.next_page_url),w(s==null?void 0:s.last_page),b(s),_(!0))}).catch(t=>{console.log(t)}).finally(()=>{u("loading",!1)})};return a.useEffect(()=>{p()},[o]),a.useEffect(()=>{i!=l&&j(l)},[l]),a.useEffect(()=>{i!=l&&P.debounce(p,1e3)(`${y}?page=${i||1}`)},[i]),e.jsx("div",{className:"w-full h-full py-4",children:e.jsxs(G,{className:"bg-white h-full w-full",children:[e.jsxs(X,{justifyContent:"start",className:"space-x-2",children:[e.jsx(q,{children:`Unfee Farmers ${$?"| search results":""}`}),e.jsxs(K,{color:"gray",children:["Showing ",((C=r==null?void 0:r.data)==null?void 0:C.length)||0," of"," ",D(parseInt((r==null?void 0:r.total)||0))]})]}),e.jsxs("div",{className:"flex space-x-4 items-center w-full lg:justify-between justify-start py-5",children:[e.jsxs("div",{className:"flex items-center relative w-52 lg:w-80  space-x-4",children:[e.jsx(J,{onKeyUp:t=>{t.key==="Enter"&&I()},value:m,onChange:t=>N(t.target.value),icon:ae,placeholder:"Search farmers..."}),m&&e.jsx("span",{className:"absolute right-0 inset-y-0 flex items-center px-4",children:e.jsx(te,{onClick:()=>W(),strokeWidth:1,className:"h-5 w-5 text-primary"})})]}),e.jsx("div",{className:"flex items-center",children:e.jsxs("span",{role:"btn-create-unfee-farmer",onClick:()=>{},className:"inline-flex overflow-hidden rounded-md border bg-secondary shadow-sm",children:[e.jsx("button",{className:"inline-block border-e px-4 py-2 text-sm font-medium text-white hover:bg-orange-500 focus:relative",children:"Create Unfee Farmer"}),e.jsx("button",{className:"inline-block px-4 py-2 text-white hover:bg-orange-500 focus:relative",title:"Create Unfee Farmer",children:e.jsx("svg",{fill:"none",stroke:"currentColor",strokeWidth:"1.5",viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg","aria-hidden":"true",className:"h-4 w-4",children:e.jsx("path",{strokeLinecap:"round",strokeLinejoin:"round",d:"M12 4.5v15m7.5-7.5h-15"})})})]})})]}),e.jsxs(Q,{className:"",children:[e.jsx(Y,{children:e.jsxs(F,{children:[e.jsx(d,{children:"Name"}),e.jsx(d,{children:"FPO"}),e.jsx(d,{children:"Crops Grown"}),e.jsx(d,{children:"District"}),e.jsx(d,{children:"Action"})]})}),e.jsx(Z,{children:(L=r==null?void 0:r.data)==null?void 0:L.filter(t=>B(t)).map(t=>e.jsxs(F,{className:"m-0",children:[e.jsx(h,{children:t.first_name+" "+t.last_name}),e.jsx(h,{children:t.fpo_name||"N/A"}),e.jsx(h,{children:t.crops_grown||"N/A"}),e.jsx(h,{children:t.district||"N/A"}),e.jsx(h,{children:e.jsxs("span",{className:"group relative flex items-center justify-end transition-all duration-700",children:[e.jsxs("span",{className:"hidden absolute z-10  group-hover:inline-flex overflow-hidden rounded-md border bg-white shadow-sm",children:[e.jsx("button",{onClick:()=>{g(`${V}/${t.id}`,{state:{farmer:t}})},className:"inline-block border-e px-3 py-3 text-gray-700 hover:bg-gray-50 focus:relative",title:"View Unfee Farmer Profile",children:e.jsxs("svg",{className:"h-4 w-4",fill:"none",stroke:"currentColor",strokeWidth:1.5,viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg","aria-hidden":"true",children:[e.jsx("path",{strokeLinecap:"round",strokeLinejoin:"round",d:"M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"}),e.jsx("path",{strokeLinecap:"round",strokeLinejoin:"round",d:"M15 12a3 3 0 11-6 0 3 3 0 016 0z"})]})}),e.jsx("button",{onClick:()=>{},className:"inline-block border-e px-3 py-3 text-gray-700 hover:bg-gray-50 focus:relative",title:"Edit Farmer",children:e.jsx("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24",strokeWidth:"1.5",stroke:"currentColor",className:"h-4 w-4",children:e.jsx("path",{strokeLinecap:"round",strokeLinejoin:"round",d:"M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"})})}),e.jsx("button",{className:"inline-block px-3 py-3 text-gray-700 hover:bg-gray-50 focus:relative",title:"Delete",children:e.jsx("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24",strokeWidth:"1.5",stroke:"currentColor",className:"h-4 w-4",children:e.jsx("path",{strokeLinecap:"round",strokeLinejoin:"round",d:"M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"})})})]}),e.jsx("svg",{className:"h-4 w-4",fill:"none",stroke:"currentColor",strokeWidth:1.5,viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg","aria-hidden":"true",children:e.jsx("path",{strokeLinecap:"round",strokeLinejoin:"round",d:"M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z"})})]})})]},t.id))})]}),e.jsx(ee,{currentPage:l,moveToPage:i,fetchPage:p,setMoveToPage:j,nextPageUrl:R,prevPageUrl:z,lastPage:M,totalPages:r==null?void 0:r.last_page})]})})}export{pe as default};
