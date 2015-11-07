
var num;
var temp=0;
var speed=7000; /* this is set for 7 seconds, edit value to suit requirements */
var preloads=[];

/* add any number of images here */

preload(
'asset/login/image/1.jpg',
'asset/login/image/2.png'
);

function preload(){

for(var c=0;c<arguments.length;c++) {
preloads[preloads.length]=new Image();
preloads[preloads.length-1].src=arguments[c];
}
}

function rotateImages() {
num=Math.floor(Math.random()*preloads.length);
if(num==temp){
rotateImages();
}
else{
document.body.style.backgroundImage='url('+preloads[num].src+')';
temp=num;

setTimeout(function(){rotateImages()},speed);
}
}

if(window.addEventListener){
window.addEventListener('load',function(){setTimeout(function(){rotateImages()},0)},false);
}
else {
if(window.attachEvent){
window.attachEvent('onload',function(){setTimeout(function(){rotateImages()},speed)});
}
}
