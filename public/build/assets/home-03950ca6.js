import{r as c,R as s,P as a}from"./app-ffa37ed4.js";function l(){return l=Object.assign||function(e){for(var o=1;o<arguments.length;o++){var r=arguments[o];for(var t in r)Object.prototype.hasOwnProperty.call(r,t)&&(e[t]=r[t])}return e},l.apply(this,arguments)}function u(e,o){if(e==null)return{};var r=v(e,o),t,n;if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(e);for(n=0;n<i.length;n++)t=i[n],!(o.indexOf(t)>=0)&&Object.prototype.propertyIsEnumerable.call(e,t)&&(r[t]=e[t])}return r}function v(e,o){if(e==null)return{};var r={},t=Object.keys(e),n,i;for(i=0;i<t.length;i++)n=t[i],!(o.indexOf(n)>=0)&&(r[n]=e[n]);return r}var p=c.forwardRef(function(e,o){var r=e.color,t=r===void 0?"currentColor":r,n=e.size,i=n===void 0?24:n,f=u(e,["color","size"]);return s.createElement("svg",l({ref:o,xmlns:"http://www.w3.org/2000/svg",width:i,height:i,viewBox:"0 0 24 24",fill:"none",stroke:t,strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round"},f),s.createElement("path",{d:"M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"}),s.createElement("polyline",{points:"9 22 9 12 15 12 15 22"}))});p.propTypes={color:a.string,size:a.oneOfType([a.string,a.number])};p.displayName="Home";const m=p;export{m as H};
