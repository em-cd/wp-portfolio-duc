/*! conditionizr v4.5.1 | (c) 2015 @toddmotto, @markgdyr | https://github.com/conditionizr */
!function(e,t){"function"==typeof define&&define.amd?define(t):"object"==typeof exports?module.exports=t:e.conditionizr=t()}(this,function(){"use strict";function e(e,n,s){function c(n){var c,o=s?e:t+e+("style"===n?".css":".js");switch(n){case"script":c=document.createElement("script"),c.src=o;break;case"style":c=document.createElement("link"),c.href=o,c.rel="stylesheet";break;case"class":document.documentElement.className+=" "+e}!!c&&(document.head||document.getElementsByTagName("head")[0]).appendChild(c)}for(var o=n.length;o--;)c(n[o])}var t,n={};return n.config=function(s){t=s.assets||"";for(var c in s.tests)n[c]&&e(c,s.tests[c])},n.add=function(e,t){n[e]="function"==typeof t?t():t},n.on=function(e,t){(n[e]||/^!/.test(e)&&!n[e.slice(1)])&&t()},n.load=n.polyfill=function(t,s){for(var c=s.length;c--;)n[s[c]]&&e(t,[/\.js$/.test(t)?"script":"style"],!0)},n});

conditionizr.add("ie",function(){var r=navigator.userAgent;return r.match(/MSIE/)||r.match(/Trident/)?!0:!1});

conditionizr.add("mobile",function(){return/iP(ad|hone|od)|Android|BlackBerry|PlayBook|bb\d+|Kindle|Silk.*Accelerated|Phone|Opera M|IEMobile|nokia|Series40|Series60/i.test(navigator.userAgent)});

conditionizr.config({
  tests: {
    'ie': ['class'],
    'mobile': ['class']
  }
});