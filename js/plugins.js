// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.
 jQuery(document).ready(function() {
           jQuery('.slideshow').cycle({ fx: 'fade' });
 });

var delayb4scroll=1000      // Specify initial delay before marquee starts to scroll on page (2000=2 seconds)
var marqueespeed=1          // Specify marquee scroll speed (larger is faster 1-10)
var pauseit=0               // Pause marquee onMousever (0=no. 1=yes)?

var copyspeed=marqueespeed
var pausespeed=(pauseit==0)? copyspeed: 0
var actualheight=''

function scrollmarquee(){
if (parseInt(cross_marquee.style.top)>(actualheight*(-1)+8))
    cross_marquee.style.top=parseInt(cross_marquee.style.top)-copyspeed+"px"
else
    cross_marquee.style.top=parseInt(marqueeheight)+8+"px"
}

function initializemarquee(){
    cross_marquee=document.getElementById("vmarquee")
    cross_marquee.style.top=0
    marqueeheight=document.getElementById("marqueecontainer").offsetHeight
    actualheight=cross_marquee.offsetHeight
    if (window.opera || navigator.userAgent.indexOf("Netscape/7")!=-1){ //if Opera or Netscape 7x, add scrollbars to scroll and exit
        cross_marquee.style.height=marqueeheight+"px"
        cross_marquee.style.overflow="scroll"
        return
    }
    setTimeout('lefttime=setInterval("scrollmarquee()",30)', delayb4scroll)
}

if (window.addEventListener)
    window.addEventListener("load", initializemarquee, false)
else if (window.attachEvent)
    window.attachEvent("onload", initializemarquee)
else if (document.getElementById)
    window.onload=initializemarquee
