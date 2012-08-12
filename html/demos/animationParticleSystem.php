
<canvas id="canvasParticleSystem" width="600" height="400"></canvas>

i<script type="text/javascript">
$(document).ready(function() {

function Particle() {

particle position
this.x = 0;
this.y = 0;

//particle velocity
this.vx = 0;
this.vy = 0;

this.time = 0;
this.life = 0;
this.color = "#000000";

this.setValues = function(x, y, vx, vy) {
this.x = x; this.y = y;
this.vx = vx; this.vy = vy;
this.time = 0;
this.life = Math.floor(Math.random() * 50);
}

this.setColor = function(color) {
this.color = color;
}

this.render = function() {
ctx.save();
ctx.fillStyle = this.color;
ctx.translate(this.x, this.y);
ctx.beginPath();
ctx.arc(0, 0, 10, 0, Math.PI * 2, true);
ctx.fill();
ctx.restore();
}

}

function RainParticle() {

this.render = function() {
var m = 0.4;
ctx.save();
ctx.fillStyle = this.color;
ctx.translate(this.x, this.y);
ctx.beginPath();
ctx.moveTo(0, 0);
ctx.bezierCurveTo(0 * m, 5 * m, 0 * m, 10 * m, 5 * m, 15 * m);
ctx.bezierCurveTo(10 * m, 20 * m, 12 * m, 26 * m, 10 * m, 30 * m);
ctx.bezierCurveTo(6 * m, 40 * m, -6 * m, 40 * m, -10 * m, 30 * m);
ctx.bezierCurveTo(-12 * m, 26 * m, -10 * m, 20 * m, -5 * m, 15 * m);
ctx.bezierCurveTo(0 * m, 10 * m, 0 * m, 5 * m, 0 * m, 0 * m);
ctx.fill();
ctx.restore();
}

}
RainParticle.prototype = new Particle; //inherit from Particle

function ParticleSystem() {

//origin rectangle of the this.particles
this.x0;
this.y0;
this.x1;
this.y1;

this.n = 0;
this.particles = [];
this.gravity = 0.01;

this.init = function(n, x0, y0, x1, y1) {
this.n = n;
this.x1 = x1; this.y1 = y1;
this.gravity = 1;
for (var i = 0; i < n; i++) {
this.particles.push(new RainParticle());
this.particles[i].setValues(Math.floor(Math.random() * this.x1) + this.x0, Math.floor(Math.random() * this.y1) + this.y0, 0, 1);
}
}

this.setParticlesColor = function(color) {
for (var i = 0; i < this.particles.length; i++) this.particles[i].setColor(color);
}

this.update = function() {
for (var i = 0; i < this.particles.length; i++) {
if (this.particles[i].time < this.particles[i].life) {
this.particles[i].vy = this.particles[i].vy + this.gravity;
this.particles[i].x = this.particles[i].x + this.particles[i].vx;
this.particles[i].y = this.particles[i].y + this.particles[i].vy;
this.particles[i].time += 1;
}
else {
this.particles[i].setValues(Math.floor(Math.random() * this.x1) + this.x0, Math.floor(Math.random() * this.y1) + this.y0, 0, 1)
}
}
}

this.render = function() {
for (var i = 0; i < this.particles.length; i++) this.particles[i].render();
}

};

if (document.createElement("canvas").getContext == null)
$("#introText").html("Why in hell are you using this crappy browser?!<br/><br/> Try with a browser that support canvas.");

var ctx = document.getElementById("canvas").getContext("2d");

var ps = new ParticleSystem();
ps.init(50, 0, 0, 800, 50);
ps.setParticlesColor("#0099ff");
setInterval(draw, 100);


function draw() {

ctx.clearRect(0, 0, 800, 600);
ps.update();
ps.render();

}
SyntaxHighlighter.all();

});
</script>

