<canvas id="canvas_SquareDemo" width="480" height="400" style="margin-top:80px;"></canvas>

<script type="text/javascript">

function draw_canvasSquare(canvasName) {

   var canvas = document.getElementById(canvasName);

   if (canvas.getContext) {
      var ctx = canvas.getContext("2d");

      //define the colour of the square
      ctx.strokeStyle = "#fa4f00";
      ctx.fillStyle = "#fa4f00";

      // Draw the outline of a square
      ctx.strokeRect(50,50,100,100);

      // Draw a square using the fillRect() method and fill it with the colour specified by the fillStyle attribute
      ctx.fillRect(200,50,100,100);

      // Draw a square using the rect() method
      ctx.rect(350,50,100,100);
      ctx.stroke();

   }
}

draw_canvasSquare('canvas_SquareDemo');

</script>
