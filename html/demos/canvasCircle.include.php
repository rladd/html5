<canvas id="canvas_circleDemo" width="380" height="200" style="margin:80px 0 60px 0;"></canvas>
<script type="text/javascript">

function draw_canvasCircle(canvas) {

   var canvas = document.getElementById(canvas);

   if (canvas.getContext) {

      var context = canvas.getContext("2d");
      var centerX = canvas.width / 2;
      var centerY = canvas.height / 2;
      var radius = 70;

      context.beginPath();
      context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
      context.fillStyle = "#8ED6FF";
      context.fill();
      context.lineWidth = 5;
      context.strokeStyle = "#8ED6FF";
      context.stroke();

   }
}

draw_canvasCircle('canvas_circleDemo');

</script>
