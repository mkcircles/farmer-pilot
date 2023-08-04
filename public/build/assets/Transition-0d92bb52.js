import{r as i,R as E,Q as et,N as fe}from"./app-2af70224.js";function tt(e,t){if(e==null)return{};var n={},r=Object.keys(e),l,u;for(u=0;u<r.length;u++)l=r[u],!(t.indexOf(l)>=0)&&(n[l]=e[l]);return n}var nt=Object.defineProperty,rt=(e,t,n)=>t in e?nt(e,t,{enumerable:!0,configurable:!0,writable:!0,value:n}):e[t]=n,Ee=(e,t,n)=>(rt(e,typeof t!="symbol"?t+"":t,n),n);let ot=class{constructor(){Ee(this,"current",this.detect()),Ee(this,"handoffState","pending"),Ee(this,"currentId",0)}set(t){this.current!==t&&(this.handoffState="pending",this.currentId=0,this.current=t)}reset(){this.set(this.detect())}nextId(){return++this.currentId}get isServer(){return this.current==="server"}get isClient(){return this.current==="client"}detect(){return typeof window>"u"||typeof document>"u"?"server":"client"}handoff(){this.handoffState==="pending"&&(this.handoffState="complete")}get isHandoffComplete(){return this.handoffState==="complete"}},L=new ot,U=(e,t)=>{L.isServer?i.useEffect(e,t):i.useLayoutEffect(e,t)};function Z(e){let t=i.useRef(e);return U(()=>{t.current=e},[e]),t}function Be(e){typeof queueMicrotask=="function"?queueMicrotask(e):Promise.resolve().then(e).catch(t=>setTimeout(()=>{throw t}))}function Pe(){let e=[],t={addEventListener(n,r,l,u){return n.addEventListener(r,l,u),t.add(()=>n.removeEventListener(r,l,u))},requestAnimationFrame(...n){let r=requestAnimationFrame(...n);return t.add(()=>cancelAnimationFrame(r))},nextFrame(...n){return t.requestAnimationFrame(()=>t.requestAnimationFrame(...n))},setTimeout(...n){let r=setTimeout(...n);return t.add(()=>clearTimeout(r))},microTask(...n){let r={current:!0};return Be(()=>{r.current&&n[0]()}),t.add(()=>{r.current=!1})},style(n,r,l){let u=n.style.getPropertyValue(r);return Object.assign(n.style,{[r]:l}),this.add(()=>{Object.assign(n.style,{[r]:u})})},group(n){let r=Pe();return n(r),this.add(()=>r.dispose())},add(n){return e.push(n),()=>{let r=e.indexOf(n);if(r>=0)for(let l of e.splice(r,1))l()}},dispose(){for(let n of e.splice(0))n()}};return t}function sn(){let[e]=i.useState(Pe);return i.useEffect(()=>()=>e.dispose(),[e]),e}let g=function(e){let t=Z(e);return E.useCallback((...n)=>t.current(...n),[t])};function He(){let[e,t]=i.useState(L.isHandoffComplete);return e&&L.isHandoffComplete===!1&&t(!1),i.useEffect(()=>{e!==!0&&t(!0)},[e]),i.useEffect(()=>L.handoff(),[]),e}var Ce;let J=(Ce=E.useId)!=null?Ce:function(){let e=He(),[t,n]=E.useState(e?()=>L.nextId():null);return U(()=>{t===null&&n(L.nextId())},[t]),t!=null?""+t:void 0};function C(e,t,...n){if(e in t){let l=t[e];return typeof l=="function"?l(...n):l}let r=new Error(`Tried to handle "${e}" but there is no handler defined. Only defined handlers are: ${Object.keys(t).map(l=>`"${l}"`).join(", ")}.`);throw Error.captureStackTrace&&Error.captureStackTrace(r,C),r}function ue(e){return L.isServer?null:e instanceof Node?e.ownerDocument:e!=null&&e.hasOwnProperty("current")&&e.current instanceof Node?e.current.ownerDocument:document}let ge=["[contentEditable=true]","[tabindex]","a[href]","area[href]","button:not([disabled])","iframe","input:not([disabled])","select:not([disabled])","textarea:not([disabled])"].map(e=>`${e}:not([tabindex='-1'])`).join(",");var M=(e=>(e[e.First=1]="First",e[e.Previous=2]="Previous",e[e.Next=4]="Next",e[e.Last=8]="Last",e[e.WrapAround=16]="WrapAround",e[e.NoScroll=32]="NoScroll",e))(M||{}),pe=(e=>(e[e.Error=0]="Error",e[e.Overflow=1]="Overflow",e[e.Success=2]="Success",e[e.Underflow=3]="Underflow",e))(pe||{}),ut=(e=>(e[e.Previous=-1]="Previous",e[e.Next=1]="Next",e))(ut||{});function le(e=document.body){return e==null?[]:Array.from(e.querySelectorAll(ge)).sort((t,n)=>Math.sign((t.tabIndex||Number.MAX_SAFE_INTEGER)-(n.tabIndex||Number.MAX_SAFE_INTEGER)))}var we=(e=>(e[e.Strict=0]="Strict",e[e.Loose=1]="Loose",e))(we||{});function Te(e,t=0){var n;return e===((n=ue(e))==null?void 0:n.body)?!1:C(t,{[0](){return e.matches(ge)},[1](){let r=e;for(;r!==null;){if(r.matches(ge))return!0;r=r.parentElement}return!1}})}function cn(e){let t=ue(e);Pe().nextFrame(()=>{t&&!Te(t.activeElement,0)&&at(e)})}var lt=(e=>(e[e.Keyboard=0]="Keyboard",e[e.Mouse=1]="Mouse",e))(lt||{});typeof window<"u"&&typeof document<"u"&&(document.addEventListener("keydown",e=>{e.metaKey||e.altKey||e.ctrlKey||(document.documentElement.dataset.headlessuiFocusVisible="")},!0),document.addEventListener("click",e=>{e.detail===1?delete document.documentElement.dataset.headlessuiFocusVisible:e.detail===0&&(document.documentElement.dataset.headlessuiFocusVisible="")},!0));function at(e){e==null||e.focus({preventScroll:!0})}let it=["textarea","input"].join(",");function st(e){var t,n;return(n=(t=e==null?void 0:e.matches)==null?void 0:t.call(e,it))!=null?n:!1}function ct(e,t=n=>n){return e.slice().sort((n,r)=>{let l=t(n),u=t(r);if(l===null||u===null)return 0;let o=l.compareDocumentPosition(u);return o&Node.DOCUMENT_POSITION_FOLLOWING?-1:o&Node.DOCUMENT_POSITION_PRECEDING?1:0})}function fn(e,t){return H(le(),t,{relativeTo:e})}function H(e,t,{sorted:n=!0,relativeTo:r=null,skipElements:l=[]}={}){let u=Array.isArray(e)?e.length>0?e[0].ownerDocument:document:e.ownerDocument,o=Array.isArray(e)?n?ct(e):e:le(e);l.length>0&&o.length>1&&(o=o.filter(y=>!l.includes(y))),r=r??u.activeElement;let a=(()=>{if(t&5)return 1;if(t&10)return-1;throw new Error("Missing Focus.First, Focus.Previous, Focus.Next or Focus.Last")})(),s=(()=>{if(t&1)return 0;if(t&2)return Math.max(0,o.indexOf(r))-1;if(t&4)return Math.max(0,o.indexOf(r))+1;if(t&8)return o.length-1;throw new Error("Missing Focus.First, Focus.Previous, Focus.Next or Focus.Last")})(),p=t&32?{preventScroll:!0}:{},c=0,d=o.length,f;do{if(c>=d||c+d<=0)return 0;let y=s+c;if(t&16)y=(y+d)%d;else{if(y<0)return 3;if(y>=d)return 1}f=o[y],f==null||f.focus(p),c+=a}while(f!==u.activeElement);return t&6&&st(f)&&f.select(),2}function De(e,t,n){let r=Z(t);i.useEffect(()=>{function l(u){r.current(u)}return document.addEventListener(e,l,n),()=>document.removeEventListener(e,l,n)},[e,n])}function Ue(e,t,n){let r=Z(t);i.useEffect(()=>{function l(u){r.current(u)}return window.addEventListener(e,l,n),()=>window.removeEventListener(e,l,n)},[e,n])}function ft(e,t,n=!0){let r=i.useRef(!1);i.useEffect(()=>{requestAnimationFrame(()=>{r.current=n})},[n]);function l(o,a){if(!r.current||o.defaultPrevented)return;let s=a(o);if(s===null||!s.getRootNode().contains(s))return;let p=function c(d){return typeof d=="function"?c(d()):Array.isArray(d)||d instanceof Set?d:[d]}(e);for(let c of p){if(c===null)continue;let d=c instanceof HTMLElement?c:c.current;if(d!=null&&d.contains(s)||o.composed&&o.composedPath().includes(d))return}return!Te(s,we.Loose)&&s.tabIndex!==-1&&o.preventDefault(),t(o,s)}let u=i.useRef(null);De("mousedown",o=>{var a,s;r.current&&(u.current=((s=(a=o.composedPath)==null?void 0:a.call(o))==null?void 0:s[0])||o.target)},!0),De("click",o=>{u.current&&(l(o,()=>u.current),u.current=null)},!0),Ue("blur",o=>l(o,()=>window.document.activeElement instanceof HTMLIFrameElement?window.document.activeElement:null),!0)}function Me(e){var t;if(e.type)return e.type;let n=(t=e.as)!=null?t:"button";if(typeof n=="string"&&n.toLowerCase()==="button")return"button"}function dt(e,t){let[n,r]=i.useState(()=>Me(e));return U(()=>{r(Me(e))},[e.type,e.as]),U(()=>{n||t.current&&t.current instanceof HTMLButtonElement&&!t.current.hasAttribute("type")&&r("button")},[n,t]),n}let Ge=Symbol();function We(e,t=!0){return Object.assign(e,{[Ge]:t})}function G(...e){let t=i.useRef(e);i.useEffect(()=>{t.current=e},[e]);let n=g(r=>{for(let l of t.current)l!=null&&(typeof l=="function"?l(r):l.current=r)});return e.every(r=>r==null||(r==null?void 0:r[Ge]))?void 0:n}function dn({container:e,accept:t,walk:n,enabled:r=!0}){let l=i.useRef(t),u=i.useRef(n);i.useEffect(()=>{l.current=t,u.current=n},[t,n]),U(()=>{if(!e||!r)return;let o=ue(e);if(!o)return;let a=l.current,s=u.current,p=Object.assign(d=>a(d),{acceptNode:a}),c=o.createTreeWalker(e,NodeFilter.SHOW_ELEMENT,p,!1);for(;c.nextNode();)s(c.currentNode)},[e,r,l,u])}function pt(e){throw new Error("Unexpected object: "+e)}var vt=(e=>(e[e.First=0]="First",e[e.Previous=1]="Previous",e[e.Next=2]="Next",e[e.Last=3]="Last",e[e.Specific=4]="Specific",e[e.Nothing=5]="Nothing",e))(vt||{});function pn(e,t){let n=t.resolveItems();if(n.length<=0)return null;let r=t.resolveActiveIndex(),l=r??-1,u=(()=>{switch(e.focus){case 0:return n.findIndex(o=>!t.resolveDisabled(o));case 1:{let o=n.slice().reverse().findIndex((a,s,p)=>l!==-1&&p.length-s-1>=l?!1:!t.resolveDisabled(a));return o===-1?o:n.length-1-o}case 2:return n.findIndex((o,a)=>a<=l?!1:!t.resolveDisabled(o));case 3:{let o=n.slice().reverse().findIndex(a=>!t.resolveDisabled(a));return o===-1?o:n.length-1-o}case 4:return n.findIndex(o=>t.resolveId(o)===e.id);case 5:return null;default:pt(e)}})();return u===-1?r:u}function ke(...e){return e.filter(Boolean).join(" ")}var re=(e=>(e[e.None=0]="None",e[e.RenderStrategy=1]="RenderStrategy",e[e.Static=2]="Static",e))(re||{}),mt=(e=>(e[e.Unmount=0]="Unmount",e[e.Hidden=1]="Hidden",e))(mt||{});function W({ourProps:e,theirProps:t,slot:n,defaultTag:r,features:l,visible:u=!0,name:o}){let a=qe(t,e);if(u)return de(a,n,r,o);let s=l??0;if(s&2){let{static:p=!1,...c}=a;if(p)return de(c,n,r,o)}if(s&1){let{unmount:p=!0,...c}=a;return C(p?0:1,{[0](){return null},[1](){return de({...c,hidden:!0,style:{display:"none"}},n,r,o)}})}return de(a,n,r,o)}function de(e,t={},n,r){let{as:l=n,children:u,refName:o="ref",...a}=be(e,["unmount","static"]),s=e.ref!==void 0?{[o]:e.ref}:{},p=typeof u=="function"?u(t):u;"className"in a&&a.className&&typeof a.className=="function"&&(a.className=a.className(t));let c={};if(t){let d=!1,f=[];for(let[y,m]of Object.entries(t))typeof m=="boolean"&&(d=!0),m===!0&&f.push(y);d&&(c["data-headlessui-state"]=f.join(" "))}if(l===i.Fragment&&Object.keys(Le(a)).length>0){if(!i.isValidElement(p)||Array.isArray(p)&&p.length>1)throw new Error(['Passing props on "Fragment"!',"",`The current component <${r} /> is rendering a "Fragment".`,"However we need to passthrough the following props:",Object.keys(a).map(m=>`  - ${m}`).join(`
`),"","You can apply a few solutions:",['Add an `as="..."` prop, to ensure that we render an actual element instead of a "Fragment".',"Render a single element as the child so that we can forward the props onto that element."].map(m=>`  - ${m}`).join(`
`)].join(`
`));let d=p.props,f=typeof(d==null?void 0:d.className)=="function"?(...m)=>ke(d==null?void 0:d.className(...m),a.className):ke(d==null?void 0:d.className,a.className),y=f?{className:f}:{};return i.cloneElement(p,Object.assign({},qe(p.props,Le(be(a,["ref"]))),c,s,ht(p.ref,s.ref),y))}return i.createElement(l,Object.assign({},be(a,["ref"]),l!==i.Fragment&&s,l!==i.Fragment&&c),p)}function ht(...e){return{ref:e.every(t=>t==null)?void 0:t=>{for(let n of e)n!=null&&(typeof n=="function"?n(t):n.current=t)}}}function qe(...e){if(e.length===0)return{};if(e.length===1)return e[0];let t={},n={};for(let r of e)for(let l in r)l.startsWith("on")&&typeof r[l]=="function"?(n[l]!=null||(n[l]=[]),n[l].push(r[l])):t[l]=r[l];if(t.disabled||t["aria-disabled"])return Object.assign(t,Object.fromEntries(Object.keys(n).map(r=>[r,void 0])));for(let r in n)Object.assign(t,{[r](l,...u){let o=n[r];for(let a of o){if((l instanceof Event||(l==null?void 0:l.nativeEvent)instanceof Event)&&l.defaultPrevented)return;a(l,...u)}}});return t}function q(e){var t;return Object.assign(i.forwardRef(e),{displayName:(t=e.displayName)!=null?t:e.name})}function Le(e){let t=Object.assign({},e);for(let n in t)t[n]===void 0&&delete t[n];return t}function be(e,t=[]){let n=Object.assign({},e);for(let r of t)r in n&&delete n[r];return n}function Ke(e){let t=e.parentElement,n=null;for(;t&&!(t instanceof HTMLFieldSetElement);)t instanceof HTMLLegendElement&&(n=t),t=t.parentElement;let r=(t==null?void 0:t.getAttribute("disabled"))==="";return r&&Et(n)?!1:r}function Et(e){if(!e)return!1;let t=e.previousElementSibling;for(;t!==null;){if(t instanceof HTMLLegendElement)return!1;t=t.previousElementSibling}return!0}let bt="div";var oe=(e=>(e[e.None=1]="None",e[e.Focusable=2]="Focusable",e[e.Hidden=4]="Hidden",e))(oe||{});function gt(e,t){let{features:n=1,...r}=e,l={ref:t,"aria-hidden":(n&2)===2?!0:void 0,style:{position:"fixed",top:1,left:1,width:1,height:0,padding:0,margin:-1,overflow:"hidden",clip:"rect(0, 0, 0, 0)",whiteSpace:"nowrap",borderWidth:"0",...(n&4)===4&&(n&2)!==2&&{display:"none"}}};return W({ourProps:l,theirProps:r,slot:{},defaultTag:bt,name:"Hidden"})}let ve=q(gt),Ne=i.createContext(null);Ne.displayName="OpenClosedContext";var Y=(e=>(e[e.Open=1]="Open",e[e.Closed=2]="Closed",e[e.Closing=4]="Closing",e[e.Opening=8]="Opening",e))(Y||{});function Xe(){return i.useContext(Ne)}function yt({value:e,children:t}){return E.createElement(Ne.Provider,{value:e},t)}var B=(e=>(e.Space=" ",e.Enter="Enter",e.Escape="Escape",e.Backspace="Backspace",e.Delete="Delete",e.ArrowLeft="ArrowLeft",e.ArrowUp="ArrowUp",e.ArrowRight="ArrowRight",e.ArrowDown="ArrowDown",e.Home="Home",e.End="End",e.PageUp="PageUp",e.PageDown="PageDown",e.Tab="Tab",e))(B||{});function vn(e,t){let n=i.useRef([]),r=g(e);i.useEffect(()=>{let l=[...n.current];for(let[u,o]of t.entries())if(n.current[u]!==o){let a=r(t,l);return n.current=t,a}},[r,...t])}function Re(e){return[e.screenX,e.screenY]}function mn(){let e=i.useRef([-1,-1]);return{wasMoved(t){let n=Re(t);return e.current[0]===n[0]&&e.current[1]===n[1]?!1:(e.current=n,!0)},update(t){e.current=Re(t)}}}function xt(){return/iPhone/gi.test(window.navigator.platform)||/Mac/gi.test(window.navigator.platform)&&window.navigator.maxTouchPoints>0}function St(){return/Android/gi.test(window.navigator.userAgent)}function hn(){return xt()||St()}var k=(e=>(e[e.Forwards=0]="Forwards",e[e.Backwards=1]="Backwards",e))(k||{});function Ve(){let e=i.useRef(0);return Ue("keydown",t=>{t.key==="Tab"&&(e.current=t.shiftKey?1:0)},!0),e}function ee(...e){return i.useMemo(()=>ue(...e),[...e])}function Pt(e,t,n,r){let l=Z(n);i.useEffect(()=>{e=e??window;function u(o){l.current(o)}return e.addEventListener(t,u,r),()=>e.removeEventListener(t,u,r)},[e,t,r])}function wt(e){let t=g(e),n=i.useRef(!1);i.useEffect(()=>(n.current=!1,()=>{n.current=!0,Be(()=>{n.current&&t()})}),[t])}let Ye=i.createContext(!1);function Tt(){return i.useContext(Ye)}function En(e){return E.createElement(Ye.Provider,{value:e.force},e.children)}function Nt(e){let t=Tt(),n=i.useContext(ze),r=ee(e),[l,u]=i.useState(()=>{if(!t&&n!==null||L.isServer)return null;let o=r==null?void 0:r.getElementById("headlessui-portal-root");if(o)return o;if(r===null)return null;let a=r.createElement("div");return a.setAttribute("id","headlessui-portal-root"),r.body.appendChild(a)});return i.useEffect(()=>{l!==null&&(r!=null&&r.body.contains(l)||r==null||r.body.appendChild(l))},[l,r]),i.useEffect(()=>{t||n!==null&&u(n.current)},[n,u,t]),l}let Ot=i.Fragment;function $t(e,t){let n=e,r=i.useRef(null),l=G(We(c=>{r.current=c}),t),u=ee(r),o=Nt(r),[a]=i.useState(()=>{var c;return L.isServer?null:(c=u==null?void 0:u.createElement("div"))!=null?c:null}),s=i.useContext(ye),p=He();return U(()=>{!o||!a||o.contains(a)||(a.setAttribute("data-headlessui-portal",""),o.appendChild(a))},[o,a]),U(()=>{if(a&&s)return s.register(a)},[s,a]),wt(()=>{var c;!o||!a||(a instanceof Node&&o.contains(a)&&o.removeChild(a),o.childNodes.length<=0&&((c=o.parentElement)==null||c.removeChild(o)))}),p?!o||!a?null:et.createPortal(W({ourProps:{ref:l},theirProps:n,defaultTag:Ot,name:"Portal"}),a):null}let Ft=i.Fragment,ze=i.createContext(null);function It(e,t){let{target:n,...r}=e,l={ref:G(t)};return E.createElement(ze.Provider,{value:n},W({ourProps:l,theirProps:r,defaultTag:Ft,name:"Popover.Group"}))}let ye=i.createContext(null);function Ct(){let e=i.useContext(ye),t=i.useRef([]),n=g(u=>(t.current.push(u),e&&e.register(u),()=>r(u))),r=g(u=>{let o=t.current.indexOf(u);o!==-1&&t.current.splice(o,1),e&&e.unregister(u)}),l=i.useMemo(()=>({register:n,unregister:r,portals:t}),[n,r,t]);return[t,i.useMemo(()=>function({children:u}){return E.createElement(ye.Provider,{value:l},u)},[l])]}let Dt=q($t),Mt=q(It),bn=Object.assign(Dt,{Group:Mt});function kt({defaultContainers:e=[],portals:t}={}){let n=i.useRef(null),r=ee(n),l=g(()=>{var u;let o=[];for(let a of e)a!==null&&(a instanceof HTMLElement?o.push(a):"current"in a&&a.current instanceof HTMLElement&&o.push(a.current));if(t!=null&&t.current)for(let a of t.current)o.push(a);for(let a of(u=r==null?void 0:r.querySelectorAll("html > *, body > *"))!=null?u:[])a!==document.body&&a!==document.head&&a instanceof HTMLElement&&a.id!=="headlessui-portal-root"&&(a.contains(n.current)||o.some(s=>a.contains(s))||o.push(a));return o});return{resolveContainers:l,contains:g(u=>l().some(o=>o.contains(u))),mainTreeNodeRef:n,MainTreeNode:i.useMemo(()=>function(){return E.createElement(ve,{features:oe.Hidden,ref:n})},[n])}}let Ae=/([\u2700-\u27BF]|[\uE000-\uF8FF]|\uD83C[\uDC00-\uDFFF]|\uD83D[\uDC00-\uDFFF]|[\u2011-\u26FF]|\uD83E[\uDD10-\uDDFF])/g;function je(e){var t,n;let r=(t=e.innerText)!=null?t:"",l=e.cloneNode(!0);if(!(l instanceof HTMLElement))return r;let u=!1;for(let a of l.querySelectorAll('[hidden],[aria-hidden],[role="img"]'))a.remove(),u=!0;let o=u?(n=l.innerText)!=null?n:"":r;return Ae.test(o)&&(o=o.replace(Ae,"")),o}function Lt(e){let t=e.getAttribute("aria-label");if(typeof t=="string")return t.trim();let n=e.getAttribute("aria-labelledby");if(n){let r=n.split(" ").map(l=>{let u=document.getElementById(l);if(u){let o=u.getAttribute("aria-label");return typeof o=="string"?o.trim():je(u).trim()}return null}).filter(Boolean);if(r.length>0)return r.join(", ")}return je(e).trim()}function gn(e){let t=i.useRef(""),n=i.useRef("");return g(()=>{let r=e.current;if(!r)return"";let l=r.innerText;if(t.current===l)return n.current;let u=Lt(r).trim().toLowerCase();return t.current=l,n.current=u,u})}var Rt=(e=>(e[e.Open=0]="Open",e[e.Closed=1]="Closed",e))(Rt||{}),At=(e=>(e[e.TogglePopover=0]="TogglePopover",e[e.ClosePopover=1]="ClosePopover",e[e.SetButton=2]="SetButton",e[e.SetButtonId=3]="SetButtonId",e[e.SetPanel=4]="SetPanel",e[e.SetPanelId=5]="SetPanelId",e))(At||{});let jt={[0]:e=>{let t={...e,popoverState:C(e.popoverState,{[0]:1,[1]:0})};return t.popoverState===0&&(t.__demoMode=!1),t},[1](e){return e.popoverState===1?e:{...e,popoverState:1}},[2](e,t){return e.button===t.button?e:{...e,button:t.button}},[3](e,t){return e.buttonId===t.buttonId?e:{...e,buttonId:t.buttonId}},[4](e,t){return e.panel===t.panel?e:{...e,panel:t.panel}},[5](e,t){return e.panelId===t.panelId?e:{...e,panelId:t.panelId}}},Oe=i.createContext(null);Oe.displayName="PopoverContext";function me(e){let t=i.useContext(Oe);if(t===null){let n=new Error(`<${e} /> is missing a parent <Popover /> component.`);throw Error.captureStackTrace&&Error.captureStackTrace(n,me),n}return t}let $e=i.createContext(null);$e.displayName="PopoverAPIContext";function Fe(e){let t=i.useContext($e);if(t===null){let n=new Error(`<${e} /> is missing a parent <Popover /> component.`);throw Error.captureStackTrace&&Error.captureStackTrace(n,Fe),n}return t}let Ie=i.createContext(null);Ie.displayName="PopoverGroupContext";function Qe(){return i.useContext(Ie)}let he=i.createContext(null);he.displayName="PopoverPanelContext";function _t(){return i.useContext(he)}function Bt(e,t){return C(t.type,jt,e,t)}let Ht="div";function Ut(e,t){var n;let{__demoMode:r=!1,...l}=e,u=i.useRef(null),o=G(t,We(h=>{u.current=h})),a=i.useRef([]),s=i.useReducer(Bt,{__demoMode:r,popoverState:r?0:1,buttons:a,button:null,buttonId:null,panel:null,panelId:null,beforePanelSentinel:i.createRef(),afterPanelSentinel:i.createRef()}),[{popoverState:p,button:c,buttonId:d,panel:f,panelId:y,beforePanelSentinel:m,afterPanelSentinel:x},S]=s,N=ee((n=u.current)!=null?n:c),D=i.useMemo(()=>{if(!c||!f)return!1;for(let ce of document.querySelectorAll("body > *"))if(Number(ce==null?void 0:ce.contains(c))^Number(ce==null?void 0:ce.contains(f)))return!0;let h=le(),$=h.indexOf(c),ie=($+h.length-1)%h.length,te=($+1)%h.length,se=h[ie],Ze=h[te];return!f.contains(se)&&!f.contains(Ze)},[c,f]),F=Z(d),K=Z(y),A=i.useMemo(()=>({buttonId:F,panelId:K,close:()=>S({type:1})}),[F,K,S]),j=Qe(),b=j==null?void 0:j.registerPopover,O=g(()=>{var h;return(h=j==null?void 0:j.isFocusWithinPopoverGroup())!=null?h:(N==null?void 0:N.activeElement)&&((c==null?void 0:c.contains(N.activeElement))||(f==null?void 0:f.contains(N.activeElement)))});i.useEffect(()=>b==null?void 0:b(A),[b,A]);let[P,I]=Ct(),v=kt({portals:P,defaultContainers:[c,f]});Pt(N==null?void 0:N.defaultView,"focus",h=>{var $,ie,te,se;h.target!==window&&h.target instanceof HTMLElement&&p===0&&(O()||c&&f&&(v.contains(h.target)||(ie=($=m.current)==null?void 0:$.contains)!=null&&ie.call($,h.target)||(se=(te=x.current)==null?void 0:te.contains)!=null&&se.call(te,h.target)||S({type:1})))},!0),ft(v.resolveContainers,(h,$)=>{S({type:1}),Te($,we.Loose)||(h.preventDefault(),c==null||c.focus())},p===0);let w=g(h=>{S({type:1});let $=(()=>h?h instanceof HTMLElement?h:"current"in h&&h.current instanceof HTMLElement?h.current:c:c)();$==null||$.focus()}),T=i.useMemo(()=>({close:w,isPortalled:D}),[w,D]),_=i.useMemo(()=>({open:p===0,close:w}),[p,w]),ae={ref:o};return E.createElement(he.Provider,{value:null},E.createElement(Oe.Provider,{value:s},E.createElement($e.Provider,{value:T},E.createElement(yt,{value:C(p,{[0]:Y.Open,[1]:Y.Closed})},E.createElement(I,null,W({ourProps:ae,theirProps:l,slot:_,defaultTag:Ht,name:"Popover"}),E.createElement(v.MainTreeNode,null))))))}let Gt="button";function Wt(e,t){let n=J(),{id:r=`headlessui-popover-button-${n}`,...l}=e,[u,o]=me("Popover.Button"),{isPortalled:a}=Fe("Popover.Button"),s=i.useRef(null),p=`headlessui-focus-sentinel-${J()}`,c=Qe(),d=c==null?void 0:c.closeOthers,f=_t()!==null;i.useEffect(()=>{if(!f)return o({type:3,buttonId:r}),()=>{o({type:3,buttonId:null})}},[f,r,o]);let[y]=i.useState(()=>Symbol()),m=G(s,t,f?null:v=>{if(v)u.buttons.current.push(y);else{let w=u.buttons.current.indexOf(y);w!==-1&&u.buttons.current.splice(w,1)}u.buttons.current.length>1&&console.warn("You are already using a <Popover.Button /> but only 1 <Popover.Button /> is supported."),v&&o({type:2,button:v})}),x=G(s,t),S=ee(s),N=g(v=>{var w,T,_;if(f){if(u.popoverState===1)return;switch(v.key){case B.Space:case B.Enter:v.preventDefault(),(T=(w=v.target).click)==null||T.call(w),o({type:1}),(_=u.button)==null||_.focus();break}}else switch(v.key){case B.Space:case B.Enter:v.preventDefault(),v.stopPropagation(),u.popoverState===1&&(d==null||d(u.buttonId)),o({type:0});break;case B.Escape:if(u.popoverState!==0)return d==null?void 0:d(u.buttonId);if(!s.current||S!=null&&S.activeElement&&!s.current.contains(S.activeElement))return;v.preventDefault(),v.stopPropagation(),o({type:1});break}}),D=g(v=>{f||v.key===B.Space&&v.preventDefault()}),F=g(v=>{var w,T;Ke(v.currentTarget)||e.disabled||(f?(o({type:1}),(w=u.button)==null||w.focus()):(v.preventDefault(),v.stopPropagation(),u.popoverState===1&&(d==null||d(u.buttonId)),o({type:0}),(T=u.button)==null||T.focus()))}),K=g(v=>{v.preventDefault(),v.stopPropagation()}),A=u.popoverState===0,j=i.useMemo(()=>({open:A}),[A]),b=dt(e,s),O=f?{ref:x,type:b,onKeyDown:N,onClick:F}:{ref:m,id:u.buttonId,type:b,"aria-expanded":e.disabled?void 0:u.popoverState===0,"aria-controls":u.panel?u.panelId:void 0,onKeyDown:N,onKeyUp:D,onClick:F,onMouseDown:K},P=Ve(),I=g(()=>{let v=u.panel;if(!v)return;function w(){C(P.current,{[k.Forwards]:()=>H(v,M.First),[k.Backwards]:()=>H(v,M.Last)})===pe.Error&&H(le().filter(T=>T.dataset.headlessuiFocusGuard!=="true"),C(P.current,{[k.Forwards]:M.Next,[k.Backwards]:M.Previous}),{relativeTo:u.button})}w()});return E.createElement(E.Fragment,null,W({ourProps:O,theirProps:l,slot:j,defaultTag:Gt,name:"Popover.Button"}),A&&!f&&a&&E.createElement(ve,{id:p,features:oe.Focusable,"data-headlessui-focus-guard":!0,as:"button",type:"button",onFocus:I}))}let qt="div",Kt=re.RenderStrategy|re.Static;function Xt(e,t){let n=J(),{id:r=`headlessui-popover-overlay-${n}`,...l}=e,[{popoverState:u},o]=me("Popover.Overlay"),a=G(t),s=Xe(),p=(()=>s!==null?(s&Y.Open)===Y.Open:u===0)(),c=g(f=>{if(Ke(f.currentTarget))return f.preventDefault();o({type:1})}),d=i.useMemo(()=>({open:u===0}),[u]);return W({ourProps:{ref:a,id:r,"aria-hidden":!0,onClick:c},theirProps:l,slot:d,defaultTag:qt,features:Kt,visible:p,name:"Popover.Overlay"})}let Vt="div",Yt=re.RenderStrategy|re.Static;function zt(e,t){let n=J(),{id:r=`headlessui-popover-panel-${n}`,focus:l=!1,...u}=e,[o,a]=me("Popover.Panel"),{close:s,isPortalled:p}=Fe("Popover.Panel"),c=`headlessui-focus-sentinel-before-${J()}`,d=`headlessui-focus-sentinel-after-${J()}`,f=i.useRef(null),y=G(f,t,b=>{a({type:4,panel:b})}),m=ee(f);U(()=>(a({type:5,panelId:r}),()=>{a({type:5,panelId:null})}),[r,a]);let x=Xe(),S=(()=>x!==null?(x&Y.Open)===Y.Open:o.popoverState===0)(),N=g(b=>{var O;switch(b.key){case B.Escape:if(o.popoverState!==0||!f.current||m!=null&&m.activeElement&&!f.current.contains(m.activeElement))return;b.preventDefault(),b.stopPropagation(),a({type:1}),(O=o.button)==null||O.focus();break}});i.useEffect(()=>{var b;e.static||o.popoverState===1&&((b=e.unmount)==null||b)&&a({type:4,panel:null})},[o.popoverState,e.unmount,e.static,a]),i.useEffect(()=>{if(o.__demoMode||!l||o.popoverState!==0||!f.current)return;let b=m==null?void 0:m.activeElement;f.current.contains(b)||H(f.current,M.First)},[o.__demoMode,l,f,o.popoverState]);let D=i.useMemo(()=>({open:o.popoverState===0,close:s}),[o,s]),F={ref:y,id:r,onKeyDown:N,onBlur:l&&o.popoverState===0?b=>{var O,P,I,v,w;let T=b.relatedTarget;T&&f.current&&((O=f.current)!=null&&O.contains(T)||(a({type:1}),((I=(P=o.beforePanelSentinel.current)==null?void 0:P.contains)!=null&&I.call(P,T)||(w=(v=o.afterPanelSentinel.current)==null?void 0:v.contains)!=null&&w.call(v,T))&&T.focus({preventScroll:!0})))}:void 0,tabIndex:-1},K=Ve(),A=g(()=>{let b=f.current;if(!b)return;function O(){C(K.current,{[k.Forwards]:()=>{var P;H(b,M.First)===pe.Error&&((P=o.afterPanelSentinel.current)==null||P.focus())},[k.Backwards]:()=>{var P;(P=o.button)==null||P.focus({preventScroll:!0})}})}O()}),j=g(()=>{let b=f.current;if(!b)return;function O(){C(K.current,{[k.Forwards]:()=>{var P;if(!o.button)return;let I=le(),v=I.indexOf(o.button),w=I.slice(0,v+1),T=[...I.slice(v+1),...w];for(let _ of T.slice())if(_.dataset.headlessuiFocusGuard==="true"||(P=o.panel)!=null&&P.contains(_)){let ae=T.indexOf(_);ae!==-1&&T.splice(ae,1)}H(T,M.First,{sorted:!1})},[k.Backwards]:()=>{var P;H(b,M.Previous)===pe.Error&&((P=o.button)==null||P.focus())}})}O()});return E.createElement(he.Provider,{value:r},S&&p&&E.createElement(ve,{id:c,ref:o.beforePanelSentinel,features:oe.Focusable,"data-headlessui-focus-guard":!0,as:"button",type:"button",onFocus:A}),W({ourProps:F,theirProps:u,slot:D,defaultTag:Vt,features:Yt,visible:S,name:"Popover.Panel"}),S&&p&&E.createElement(ve,{id:d,ref:o.afterPanelSentinel,features:oe.Focusable,"data-headlessui-focus-guard":!0,as:"button",type:"button",onFocus:j}))}let Qt="div";function Jt(e,t){let n=i.useRef(null),r=G(n,t),[l,u]=i.useState([]),o=g(m=>{u(x=>{let S=x.indexOf(m);if(S!==-1){let N=x.slice();return N.splice(S,1),N}return x})}),a=g(m=>(u(x=>[...x,m]),()=>o(m))),s=g(()=>{var m;let x=ue(n);if(!x)return!1;let S=x.activeElement;return(m=n.current)!=null&&m.contains(S)?!0:l.some(N=>{var D,F;return((D=x.getElementById(N.buttonId.current))==null?void 0:D.contains(S))||((F=x.getElementById(N.panelId.current))==null?void 0:F.contains(S))})}),p=g(m=>{for(let x of l)x.buttonId.current!==m&&x.close()}),c=i.useMemo(()=>({registerPopover:a,unregisterPopover:o,isFocusWithinPopoverGroup:s,closeOthers:p}),[a,o,s,p]),d=i.useMemo(()=>({}),[]),f=e,y={ref:r};return E.createElement(Ie.Provider,{value:c},W({ourProps:y,theirProps:f,slot:d,defaultTag:Qt,name:"Popover.Group"}))}let Zt=q(Ut),en=q(Wt),tn=q(Xt),nn=q(zt),rn=q(Jt),yn=Object.assign(Zt,{Button:en,Overlay:tn,Panel:nn,Group:rn});function xe(e,t){return xe=Object.setPrototypeOf?Object.setPrototypeOf.bind():function(r,l){return r.__proto__=l,r},xe(e,t)}function on(e,t){e.prototype=Object.create(t.prototype),e.prototype.constructor=e,xe(e,t)}const _e={disabled:!1},Je=E.createContext(null);var un=function(t){return t.scrollTop},ne="unmounted",X="exited",V="entering",Q="entered",Se="exiting",R=function(e){on(t,e);function t(r,l){var u;u=e.call(this,r,l)||this;var o=l,a=o&&!o.isMounting?r.enter:r.appear,s;return u.appearStatus=null,r.in?a?(s=X,u.appearStatus=V):s=Q:r.unmountOnExit||r.mountOnEnter?s=ne:s=X,u.state={status:s},u.nextCallback=null,u}t.getDerivedStateFromProps=function(l,u){var o=l.in;return o&&u.status===ne?{status:X}:null};var n=t.prototype;return n.componentDidMount=function(){this.updateStatus(!0,this.appearStatus)},n.componentDidUpdate=function(l){var u=null;if(l!==this.props){var o=this.state.status;this.props.in?o!==V&&o!==Q&&(u=V):(o===V||o===Q)&&(u=Se)}this.updateStatus(!1,u)},n.componentWillUnmount=function(){this.cancelNextCallback()},n.getTimeouts=function(){var l=this.props.timeout,u,o,a;return u=o=a=l,l!=null&&typeof l!="number"&&(u=l.exit,o=l.enter,a=l.appear!==void 0?l.appear:o),{exit:u,enter:o,appear:a}},n.updateStatus=function(l,u){if(l===void 0&&(l=!1),u!==null)if(this.cancelNextCallback(),u===V){if(this.props.unmountOnExit||this.props.mountOnEnter){var o=this.props.nodeRef?this.props.nodeRef.current:fe.findDOMNode(this);o&&un(o)}this.performEnter(l)}else this.performExit();else this.props.unmountOnExit&&this.state.status===X&&this.setState({status:ne})},n.performEnter=function(l){var u=this,o=this.props.enter,a=this.context?this.context.isMounting:l,s=this.props.nodeRef?[a]:[fe.findDOMNode(this),a],p=s[0],c=s[1],d=this.getTimeouts(),f=a?d.appear:d.enter;if(!l&&!o||_e.disabled){this.safeSetState({status:Q},function(){u.props.onEntered(p)});return}this.props.onEnter(p,c),this.safeSetState({status:V},function(){u.props.onEntering(p,c),u.onTransitionEnd(f,function(){u.safeSetState({status:Q},function(){u.props.onEntered(p,c)})})})},n.performExit=function(){var l=this,u=this.props.exit,o=this.getTimeouts(),a=this.props.nodeRef?void 0:fe.findDOMNode(this);if(!u||_e.disabled){this.safeSetState({status:X},function(){l.props.onExited(a)});return}this.props.onExit(a),this.safeSetState({status:Se},function(){l.props.onExiting(a),l.onTransitionEnd(o.exit,function(){l.safeSetState({status:X},function(){l.props.onExited(a)})})})},n.cancelNextCallback=function(){this.nextCallback!==null&&(this.nextCallback.cancel(),this.nextCallback=null)},n.safeSetState=function(l,u){u=this.setNextCallback(u),this.setState(l,u)},n.setNextCallback=function(l){var u=this,o=!0;return this.nextCallback=function(a){o&&(o=!1,u.nextCallback=null,l(a))},this.nextCallback.cancel=function(){o=!1},this.nextCallback},n.onTransitionEnd=function(l,u){this.setNextCallback(u);var o=this.props.nodeRef?this.props.nodeRef.current:fe.findDOMNode(this),a=l==null&&!this.props.addEndListener;if(!o||a){setTimeout(this.nextCallback,0);return}if(this.props.addEndListener){var s=this.props.nodeRef?[this.nextCallback]:[o,this.nextCallback],p=s[0],c=s[1];this.props.addEndListener(p,c)}l!=null&&setTimeout(this.nextCallback,l)},n.render=function(){var l=this.state.status;if(l===ne)return null;var u=this.props,o=u.children;u.in,u.mountOnEnter,u.unmountOnExit,u.appear,u.enter,u.exit,u.timeout,u.addEndListener,u.onEnter,u.onEntering,u.onEntered,u.onExit,u.onExiting,u.onExited,u.nodeRef;var a=tt(u,["children","in","mountOnEnter","unmountOnExit","appear","enter","exit","timeout","addEndListener","onEnter","onEntering","onEntered","onExit","onExiting","onExited","nodeRef"]);return E.createElement(Je.Provider,{value:null},typeof o=="function"?o(l,a):E.cloneElement(E.Children.only(o),a))},t}(E.Component);R.contextType=Je;R.propTypes={};function z(){}R.defaultProps={in:!1,mountOnEnter:!1,unmountOnExit:!1,appear:!1,enter:!0,exit:!0,onEnter:z,onEntering:z,onEntered:z,onExit:z,onExiting:z,onExited:z};R.UNMOUNTED=ne;R.EXITED=X;R.ENTERING=V;R.ENTERED=Q;R.EXITING=Se;const xn=R;export{We as $,dt as A,cn as B,Xe as C,q as D,Pt as E,dn as F,gn as G,ft as H,J as I,mn as J,pn as K,ct as L,M,pe as N,H as O,En as P,Z as Q,mt as R,re as S,we as T,ke as U,yn as V,xn as W,W as X,Le as Y,hn as Z,fn as _,He as a,ue as a0,Ve as b,ve as c,oe as d,at as e,wt as f,xt as g,Pe as h,Y as i,Ct as j,kt as k,U as l,vn as m,ee as n,g as o,sn as p,B as q,bn as r,k as s,Be as t,C as u,Ke as v,Te as w,yt as x,G as y,vt as z};
