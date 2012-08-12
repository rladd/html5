<canvas id="canvas_canvasTest" width="300" height="300" style="margin:50px 0 0 160px;"></canvas>
<script type="text/javascript">

function draw_canvasLine(canvasName){

   // get the canvas element using the DOM
   var canvas = document.getElementById(canvasName);

   // Make sure we don't execute when canvas isn't supported
   if (canvas.getContext){

      // use getContext to use the canvas for drawing
      var ctx = canvas.getContext('2d');

      for (i=0;i<10;i++){
       ctx.lineWidth = 1+i;
       ctx.beginPath();
       ctx.moveTo(5+i*14,5);
       ctx.lineTo(5+i*14,294);
       ctx.stroke();
    }
   }
   else {
      alert('You need Safari or Firefox 1.5+ to see this demo.');
   }
}

draw_canvasLine('canvas_canvasTest');

</script>
