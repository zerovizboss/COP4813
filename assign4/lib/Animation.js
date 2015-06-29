/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
var canvas = document.getElementById("davinciCanvas");
var ctx = canvas.getContext("2d");
var gradient = ctx.createLinearGradient(0,0,200,0);

//var img = new Image();
// Red rectangle
ctx.beginPath();
ctx.lineWidth="6";
ctx.strokeStyle="red";
ctx.rect(5,5,290,140); 
ctx.stroke();

// Green rectangle
ctx.beginPath();
ctx.lineWidth="4";
ctx.strokeStyle="green";
ctx.rect(30,30,50,50);
ctx.stroke();

// Blue rectangle
ctx.beginPath();
ctx.lineWidth="10";
ctx.strokeStyle="blue";
ctx.rect(50,50,150,80);
ctx.stroke();

/* do cool things with the context
ctx.rect(0,0,150,100);
ctx.stroke();
ctx.font = "40pt Calibri";
ctx.fillStyle = "navy";
ctx.fillText('Hello World!', 10, 50);
ctx.fillRect(0,0,150,100);
ctx.fill();*/

//draw a diagonal line across the canvas
ctx.moveTo(0,250);
ctx.lineTo(1000,250);
ctx.lineCap = 'round';
ctx.lineWidth = 1;
ctx.strokeStyle = 'dashed';
ctx.stroke();

//draw a circle
ctx.beginPath();
ctx.arc(95,50,40,0,2*Math.PI);
ctx.strokeStyle='black';
ctx.lineWidth='1';
ctx.stroke();
/*
setTimeout(drawFrame, 20);

function drawFrame(){
    var xPosition = 10;
    var yPosition = 0;
    ctx.clearRect(0,0,canvas.width, canvas.height);
    ctx.beginPath();
    ctx.rect(xPosition,yPosition,10,10);
    ctx.lineStyle = "black";
    ctx.lineWidth = 1;
    ctx.stroke();
    
    yPosition += 1;
    setTimeout(drawFrame,20);
}
*/
});