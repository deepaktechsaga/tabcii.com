!function(){var e,t={frameRate:150,animationTime:500,stepSize:150,pulseAlgorithm:!0,pulseScale:6,pulseNormalize:1,accelerationDelta:20,accelerationMax:1,keyboardSupport:!0,arrowScroll:50,touchpadSupport:!0,fixedBackground:!0,excluded:""},a=t,r=!1,o=!1,n={x:0,y:0},i=!1,l=document.documentElement,c=[120,120,120],u={left:37,up:38,right:39,down:40,spacebar:32,pageup:33,pagedown:34,end:35,home:36};a=t;function s(){a.keyboardSupport&&x("keydown",w)}function d(){if(document.body){var t=document.body,n=document.documentElement,c=window.innerHeight,u=t.scrollHeight;if(l=document.compatMode.indexOf("CSS")>=0?n:t,e=t,s(),i=!0,top!=self)o=!0;else if(u>c&&(t.offsetHeight<=c||n.offsetHeight<=c)&&(n.style.height="auto",l.offsetHeight<=c)){var d=document.createElement("div");d.style.clear="both",t.appendChild(d)}a.fixedBackground||r||(t.style.backgroundAttachment="scroll",n.style.backgroundAttachment="scroll")}}var f=[],p=!1,h=+new Date;function m(e,t,r,o){var i,l;if(o||(o=1e3),l=r,i=(i=t)>0?1:-1,l=l>0?1:-1,(n.x!==i||n.y!==l)&&(n.x=i,n.y=l,f=[],h=0),1!=a.accelerationMax){var c=+new Date-h;if(c<a.accelerationDelta){var u=(1+30/c)/2;u>1&&(u=Math.min(u,a.accelerationMax),t*=u,r*=u)}h=+new Date}if(f.push({x:t,y:r,lastX:t<0?.99:-.99,lastY:r<0?.99:-.99,start:+new Date}),!p){var s=e===document.body,d=function(n){for(var i=+new Date,l=0,c=0,u=0;u<f.length;u++){var h=f[u],m=i-h.start,w=m>=a.animationTime,v=w?1:m/a.animationTime;a.pulseAlgorithm&&(v=T(v));var g=h.x*v-h.lastX>>0,b=h.y*v-h.lastY>>0;l+=g,c+=b,h.lastX+=g,h.lastY+=b,w&&(f.splice(u,1),u--)}s?window.scrollBy(l,c):(l&&(e.scrollLeft+=l),c&&(e.scrollTop+=c)),t||r||(f=[]),f.length?M(d,e,o/a.frameRate+1):p=!1};M(d,e,0),p=!0}}function w(t){var r=t.target,o=t.ctrlKey||t.altKey||t.metaKey||t.shiftKey&&t.keyCode!==u.spacebar;if(/input|textarea|select|embed/i.test(r.nodeName)||r.isContentEditable||t.defaultPrevented||o)return!0;if(D(r,"button")&&t.keyCode===u.spacebar)return!0;var n=0,i=0,l=S(e),c=l.clientHeight;switch(l==document.body&&(c=window.innerHeight),t.keyCode){case u.up:i=-a.arrowScroll;break;case u.down:i=a.arrowScroll;break;case u.spacebar:i=-(t.shiftKey?1:-1)*c*.9;break;case u.pageup:i=.9*-c;break;case u.pagedown:i=.9*c;break;case u.home:i=-l.scrollTop;break;case u.end:var s=l.scrollHeight-l.scrollTop-c;i=s>0?s+10:0;break;case u.left:n=-a.arrowScroll;break;case u.right:n=a.arrowScroll;break;default:return!0}m(l,n,i),t.preventDefault()}var v={};setInterval(function(){v={}},1e4);var g,b,y=(g=0,function(e){return e.uniqueID||(e.uniqueID=g++)});function k(e,t){for(var a=e.length;a--;)v[y(e[a])]=t;return t}function S(e){var t=[],a=l.scrollHeight;do{var r=v[y(e)];if(r)return k(t,r);if(t.push(e),a===e.scrollHeight){if(!o||l.clientHeight+10<a)return k(t,document.body)}else if(e.clientHeight+10<e.scrollHeight&&(overflow=getComputedStyle(e,"").getPropertyValue("overflow-y"),"scroll"===overflow||"auto"===overflow))return k(t,e)}while(e=e.parentNode)}function x(e,t,a){window.addEventListener(e,t,a||!1)}function D(e,t){return(e.nodeName||"").toLowerCase()===t.toLowerCase()}function H(e,t){return Math.floor(e/t)==e/t}var M=window.requestAnimationFrame||window.webkitRequestAnimationFrame||function(e,t,a){window.setTimeout(e,a||1e3/60)};function C(e){var t,r;return(e*=a.pulseScale)<1?t=e-(1-Math.exp(-e)):(e-=1,t=(r=Math.exp(-1))+(1-Math.exp(-e))*(1-r)),t*a.pulseNormalize}function T(e){return e>=1?1:e<=0?0:(1==a.pulseNormalize&&(a.pulseNormalize/=C(1)),C(e))}var z=/chrome/i.test(window.navigator.userAgent);"onmousewheel"in document&&z&&(x("mousedown",function(t){e=t.target}),x("mousewheel",function(t){i||d();var r=t.target,o=S(r);if(!o||t.defaultPrevented||D(e,"embed")||D(r,"embed")&&/\.pdf/i.test(r.src))return!0;var n=t.wheelDeltaX||0,l=t.wheelDeltaY||0;if(n||l||(l=t.wheelDelta||0),!a.touchpadSupport&&function(e){if(e){e=Math.abs(e),c.push(e),c.shift(),clearTimeout(b);var t=c[0]==c[1]&&c[1]==c[2],a=H(c[0],120)&&H(c[1],120)&&H(c[2],120);return!(t||a)}}(l))return!0;Math.abs(n)>1.2&&(n*=a.stepSize/120),Math.abs(l)>1.2&&(l*=a.stepSize/120),m(o,-n,-l),t.preventDefault()}),x("load",d))}();