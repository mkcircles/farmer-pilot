import{r as a,b as E,u as k,A as R,B as m,j as e,S,f as $,E as B,d as M}from"./app-677ae2df.js";import{b as U,a as A,e as O,A as p,m as I,t as T,v as F,w as C,x as o,y as H,z as c}from"./Tracker-cb69a612.js";import{n as G}from"./numberFormatter-373bc269.js";function V(r,d){return a.createElement("svg",Object.assign({xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor","aria-hidden":"true",ref:d},r),a.createElement("path",{fillRule:"evenodd",d:"M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z",clipRule:"evenodd"}))}const W=a.forwardRef(V),q=W;function J({fpo_id:r,fpo_name:d}){var b;const h=E(),j=k(s=>s.auth.token),i=k(s=>{var t;return(t=s.auth)==null?void 0:t.user}),{updateAppContextState:w}=a.useContext(R),[f,_]=a.useState(1),[g,P]=a.useState(""),[v,L]=a.useState(""),[l,z]=a.useState(null);let x=`${m}/agents`;(i==null?void 0:i.role)!=="admin"&&(x=`${m}/fpo/${i==null?void 0:i.entity_id}/agents`),r&&(x=`${m}/fpo/${r}/agents`);const u=(s=x)=>{w("loading",!0),M.get(s,{headers:{Authorization:`Bearer ${j}`}}).then(t=>{var N,y;console.log("Agent Data",(N=t==null?void 0:t.data)==null?void 0:N.data);let n=(y=t==null?void 0:t.data)==null?void 0:y.data;t!=null&&t.data&&(_(n==null?void 0:n.current_page),P(n==null?void 0:n.prev_page_url),L(n==null?void 0:n.next_page_url),z(n))}).catch(t=>{console.log(t)}).finally(()=>{w("loading",!1)})};return a.useEffect(()=>{u()},[j,r]),e.jsx("div",{className:"w-full h-full py-4",children:e.jsxs(U,{className:"bg-white h-full w-full",children:[e.jsxs(A,{justifyContent:"start",className:"space-x-2",children:[e.jsx(O,{children:"Agents"}),e.jsx(p,{color:"gray",children:G(parseInt((l==null?void 0:l.total)||0))})]}),e.jsxs(A,{justifyContent:"between",children:[e.jsx(I,{className:"mt-2",children:"Overview of Agents"}),e.jsxs("span",{role:"btn-create-agent",onClick:()=>{h(S,{state:{fpo:{fpo_id:r,fpo_name:d}}})},className:"inline-flex overflow-hidden rounded-md border bg-secondary shadow-sm",children:[e.jsx("button",{className:"inline-block border-e px-4 py-2 text-sm font-medium text-white hover:bg-orange-500 focus:relative",children:"Create New Agent"}),e.jsx("button",{className:"inline-block px-4 py-2 text-white hover:bg-orange-500 focus:relative",title:"Create FPO",children:e.jsx(q,{className:"h-4 w-4"})})]})]}),e.jsxs(T,{className:"mt-6",children:[e.jsx(F,{children:e.jsxs(C,{children:[e.jsx(o,{children:"Agent Code"}),e.jsx(o,{children:"Name"}),e.jsx(o,{children:"Phone"}),e.jsx(o,{className:"",children:"Registered On"}),e.jsx(o,{children:"Status"}),e.jsx(o,{children:"Action"})]})}),e.jsx(H,{children:(b=l==null?void 0:l.data)==null?void 0:b.map(s=>{var t;return e.jsxs(C,{children:[e.jsx(c,{children:s.agent_code}),e.jsx(c,{children:s.first_name+" "+s.last_name}),e.jsx(c,{children:s.phone_number}),e.jsx(c,{children:(t=new Date(s==null?void 0:s.created_at))==null?void 0:t.toLocaleDateString("en-US",{year:"numeric",month:"short",day:"numeric"})}),e.jsx(c,{children:s.status==="active"?e.jsx(p,{className:"capitalize font-bold",size:"md",color:"green",children:"active"}):e.jsx(p,{className:"capitalize font-bold",size:"md",color:"red",children:s==null?void 0:s.status})}),e.jsx(c,{children:e.jsxs("span",{class:"inline-flex overflow-hidden rounded-md border bg-white shadow-sm",children:[e.jsx("button",{onClick:()=>h(`${$}/${s.agent_code}`),className:"inline-block border-e p-3 text-gray-700 hover:bg-gray-50 focus:relative",title:"View Profile",children:e.jsxs("svg",{className:"h-4 w-4",fill:"none",stroke:"currentColor",strokeWidth:1.5,viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg","aria-hidden":"true",children:[e.jsx("path",{strokeLinecap:"round",strokeLinejoin:"round",d:"M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"}),e.jsx("path",{strokeLinecap:"round",strokeLinejoin:"round",d:"M15 12a3 3 0 11-6 0 3 3 0 016 0z"})]})}),e.jsx("button",{onClick:()=>{h(B,{state:{agent:s}})},className:"inline-block border-e p-3 text-gray-700 hover:bg-gray-50 focus:relative",title:"Edit Agent",children:e.jsx("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"h-4 w-4",children:e.jsx("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"})})}),e.jsx("button",{class:"inline-block p-3 text-gray-700 hover:bg-gray-50 focus:relative",title:"Delete",children:e.jsx("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"h-4 w-4",children:e.jsx("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"})})})]})})]},s.id)})})]}),e.jsxs("div",{className:"w-full py-1 text-xs opacity-60",children:["showing ",f," of ",l==null?void 0:l.last_page," pages"]}),e.jsx("div",{className:"flex justify-start py-2 items-center",children:e.jsxs("div",{className:"inline-flex items-center justify-center rounded bg-primary py-1 text-white",children:[e.jsxs("a",{href:"#",className:"inline-flex h-8 w-8 items-center justify-center rtl:rotate-180",onClick:()=>{g&&u(g)},children:[e.jsx("span",{className:"sr-only",children:"Prev Page"}),e.jsx("svg",{xmlns:"http://www.w3.org/2000/svg",className:"h-3 w-3",viewBox:"0 0 20 20",fill:"currentColor",children:e.jsx("path",{fillRule:"evenodd",d:"M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z",clipRule:"evenodd"})})]}),e.jsx("span",{className:"h-4 w-px bg-white/25","aria-hidden":"true"}),e.jsxs("div",{children:[e.jsx("label",{htmlFor:"PaginationPage",className:"sr-only",children:"Page"}),e.jsx("input",{type:"number",className:"h-8 w-12 rounded border-none bg-transparent p-0 text-center text-xs font-medium [-moz-appearance:_textfield] focus:outline-none focus:ring-inset focus:ring-white [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none",min:"1",value:f,id:"PaginationPage"})]}),e.jsx("span",{className:"h-4 w-px bg-white/25"}),e.jsxs("a",{href:"#",className:"inline-flex h-8 w-8 items-center justify-center rtl:rotate-180",onClick:()=>{v&&u(v)},children:[e.jsx("span",{className:"sr-only",children:"Next Page"}),e.jsx("svg",{xmlns:"http://www.w3.org/2000/svg",className:"h-3 w-3",viewBox:"0 0 20 20",fill:"currentColor",children:e.jsx("path",{fillRule:"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z",clipRule:"evenodd"})})]})]})})]})})}const Y=Object.freeze(Object.defineProperty({__proto__:null,default:J},Symbol.toStringTag,{value:"Module"}));export{J as A,q as U,Y as i};
