import{r as c,R as s}from"./app-33482b9b.js";import{P as a}from"./Tracker-0f9363de.js";function p(){return p=Object.assign||function(e){for(var n=1;n<arguments.length;n++){var r=arguments[n];for(var t in r)Object.prototype.hasOwnProperty.call(r,t)&&(e[t]=r[t])}return e},p.apply(this,arguments)}function u(e,n){if(e==null)return{};var r=m(e,n),t,o;if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(e);for(o=0;o<i.length;o++)t=i[o],!(n.indexOf(t)>=0)&&Object.prototype.propertyIsEnumerable.call(e,t)&&(r[t]=e[t])}return r}function m(e,n){if(e==null)return{};var r={},t=Object.keys(e),o,i;for(i=0;i<t.length;i++)o=t[i],!(n.indexOf(o)>=0)&&(r[o]=e[o]);return r}var l=c.forwardRef(function(e,n){var r=e.color,t=r===void 0?"currentColor":r,o=e.size,i=o===void 0?24:o,f=u(e,["color","size"]);return s.createElement("svg",p({ref:n,xmlns:"http://www.w3.org/2000/svg",width:i,height:i,viewBox:"0 0 24 24",fill:"none",stroke:t,strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round"},f),s.createElement("path",{d:"M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"}),s.createElement("polyline",{points:"9 22 9 12 15 12 15 22"}))});l.propTypes={color:a.string,size:a.oneOfType([a.string,a.number])};l.displayName="Home";const y=l;export{y as F};