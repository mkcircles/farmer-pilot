import{r as a,R as N,T as b,j as o,u as C,A as M,b as v,B as E}from"./app-ffa37ed4.js";import{m as u}from"./mapbox-gl-bc2c9c8e.js";u.accessToken="pk.eyJ1Ijoia2FsdWpqYSIsImEiOiJjbGpyNGFhbzQwMGU2M2VvaDNubjFhNnppIn0.mpz17Jy5Eue59jCM-ReiZQ";const L=({onClick:r,children:s,fpo:e})=>o.jsx("button",{title:e==null?void 0:e.fpo_name,className:"text-secondary rounded-full bg-transparent p-1 text-center no-underline inline-block",children:s}),R=({fpoData:r})=>{const s=a.useRef(null),[e,m]=a.useState(32.5457),[d,c]=a.useState(1.3316),[t,x]=a.useState(6.2);a.useEffect(()=>{const n=new u.Map({container:s.current,style:"mapbox://styles/mapbox/streets-v11",center:[e,d],zoom:t});return r==null||r.forEach(l=>{var g,j;if(!(l!=null&&l.fpo_cordinates))return;let h=(j=(g=l.fpo_cordinates)==null?void 0:g.split(","))==null?void 0:j.map(w=>parseFloat(w)),f=h[0],k=h[1];if(isNaN(k)||isNaN(f))return;const p=N.createRef();p.current=document.createElement("div"),b.render(o.jsx(L,{onClick:i,fpo:l,children:o.jsxs("svg",{className:"w-4 h-4",fill:"none",stroke:"currentColor",strokeWidth:1.5,viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg","aria-hidden":"true",children:[o.jsx("path",{strokeLinecap:"round",strokeLinejoin:"round",d:"M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"}),o.jsx("path",{strokeLinecap:"round",strokeLinejoin:"round",d:"M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"})]})}),p.current),new u.Marker(p.current).setLngLat([k,f]).addTo(n)}),n.addControl(new u.NavigationControl,"top-right"),()=>n.remove()},[]);const i=n=>{window.alert(n)};return o.jsx("div",{className:" h-full w-full relative",ref:s})},F=()=>{const r=C(c=>c.auth.token),{updateAppContextState:s}=a.useContext(M),[e,m]=a.useState(null),d=(c=`${E}/fpos/coordinates`)=>{s("loading",!0),axios.get(c,{headers:{Authorization:`Bearer ${r}`}}).then(t=>{var i,n;console.log("FPO Data",(i=t==null?void 0:t.data)==null?void 0:i.data);let x=(n=t==null?void 0:t.data)==null?void 0:n.data;t!=null&&t.data&&m(x)}).catch(t=>{console.log(t)}).finally(()=>{s("loading",!1)})};return a.useEffect(()=>{d()},[]),o.jsx(v,{className:"my-4 h-full w-full absolute inset-0",children:e&&o.jsx(R,{fpoData:e})})};export{F as default};
