
<script>
   window.requestAnimFrame = (function(callback) {
   return window.requestAnimationFrame ||
   window.webkitRequestAnimationFrame ||
   window.mozRequestAnimationFrame ||
   window.oRequestAnimationFrame ||
   window.msRequestAnimationFrame ||

      function(callback) {
         window.setTimeout(callback, 1000 / 60);
      };

   })();

   function animate() {
      var canvas = document.getElementById("myCanvas");
      var context = canvas.getContext("2d");

// update stage

// clear stage
context.clearRect(0, 0, canvas.width, canvas.height);

// render stage

// request new frame
requestAnimFrame(function() {
animate();
});
}

window.onload = function() {
animate();
};

</script>

