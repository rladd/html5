<?php
   // Load required libraries / functions / etc
   require_once('config/config.php');
   require_once('include/functions.php');

   // Populate our array of Boxes and their items
   $queryBoxes = "SELECT * FROM tblBoxes WHERE fynVisible = 1 ORDER BY fidOrder ASC";
   $arrResults = dbQuery($queryBoxes, $config['mysql']);

   // Loop through the list of boxes / categories.
   for($i=0; $i < count($arrResults); $i++) {

      // Query the list of items for each box
      $queryItems = "SELECT * FROM tblItems WHERE fidBox = '" . $arrResults[$i]['fidBox'] . "' AND fynVisible = 1 ORDER BY fidOrder ASC";
      $arrItems = dbQuery($queryItems, $config['mysql']);

      // Populate the results array with the items for each box.
      $arrResults[$i]['items'] = $arrItems;

   }

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" version="XHTML+RDFa  on1.0" dir="ltr"
  xmlns:content="http://purl.org/rss/1.0/modules/content/"
  xmlns:dc="http://purl.org/dc/terms/"
  xmlns:foaf="http://xmlns.com/foaf/0.1/"
  xmlns:og="http://ogp.me/ns#"
  xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#"
  xmlns:sioc="http://rdfs.org/sioc/ns#"
  xmlns:sioct="http://rdfs.org/sioc/types#"
  xmlns:skos="http://www.w3.org/2004/02/skos/core#"
  xmlns:xsd="http://www.w3.org/2001/XMLSchema#">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css" media="all">@import url("css/style.css");</style>
<head>
<title>Element63 - HTML5 Demos and Tutorials</title>
<script src="javascript/functions.js" type="text/javascript"></script>
<script src="javascript/particle.class.js" type="text/javascript"></script>
<script src="javascript/canvasLine.js" type="text/javascript"></script>
<script src="javascript/jquery/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="javascript/cufon/cufon-yui.js" type="text/javascript"></script>
<script src="javascript/cufon/fonts/Bloc_Bold_700.font.js" type="text/javascript"></script>
<script src="javascript/cufon/fonts/Bloc_Kursiv_400.font.js" type="text/javascript"></script>
<script src="javascript/cufon/fonts/Jenna_Sue_400.font.js" type="text/javascript"></script>
<script src="javascript/cufon/fonts/Devanagari_Sangam_MN_400.font.js" type="text/javascript"></script>
<script src="javascript/cufon/fonts/Didot_400.font.js" type="text/javascript"></script>
<script type="text/javascript" src="/javascript/jplayer/jquery.jplayer.min.js"></script>
<script type="text/javascript">
   Cufon.replace('.contentTitle', { fontFamily: 'Bloc Bold' });
   Cufon.replace('.contentBody', { fontFamily: 'Jenna Sue'});
   Cufon.replace('#signature', { fontFamily: 'Jenna Sue'});
   Cufon.replace('.fancyText h2', { fontFamily: 'Bloc Kursiv'});
   Cufon.replace('.fancyText h3', { fontFamily: 'Didot'});
</script>
<script type="text/javascript">
<?php
   $strOutput = null;

   // Create the jQuery hooks for each display.
   for ($i = 0; $i < count($arrResults); $i++) {
      for ($item = 0; $item < count($arrResults[$i]['items']); $item++) {
         $thisClass = $arrResults[$i]['ftxClass'] . $arrResults[$i]['items'][$item]['ftxId'];
         $strOutput.= "$(document).ready(function(){\r\n";
         $strOutput.= "\t$(\"#shadow_" . $thisClass . "\").css(\"height\", $(document).height());\r\n";
         $strOutput.= "\t$(\".displayWindow_" . $thisClass . "\").click(function(){\$(\"#shadow_" . $thisClass . "\").fadeIn();return false;});\r\n";
         $strOutput.= "\t$(\".closeCanvas_" . $thisClass . "\").click(function(){\$(\"#shadow_" . $thisClass . "\").fadeOut();return false;});\r\n";
         $strOutput.= "});\r\n";
         $strOutput.= "$(window).bind(\"resize\", function(){\$(\"#shadow_" . $thisClass . "\").css(\"height\", $(window).height());});\r\n\r\n";
      }
   }
   echo $strOutput;
?>
</script>


<!-- CSS GOES HERE -->
<style type="text/css">
<?php
   for ($i = 0; $i < count($arrResults); $i++) {
      for ($item = 0; $item < count($arrResults[$i]['items']); $item++) {
         $strOutput = null;
         $thisItem = $arrResults[$i]['ftxClass'] . $arrResults[$i]['items'][$item]['ftxId'];
         $strOutput.= "#shadow_" . $thisItem . "{ position:absolute; top:0; left:0; width:100%; z-index:100; background: url('images/dim.png'); display:none; text-align:left; }\r\n";
         $strOutput.=".canvas_" . $thisItem . "{ position:absolute; width:600px; height:400px; z-index:200; border:5px solid #222; background: #FFF; top: 30%; left: 35%; margin-top: -100px; margin-left: -150px; }\r\n";
         $strOutput.=".canvas_" . $thisItem . " img {border:none; margin:5px;}\r\n";
         $strOutput.=".closeCanvas_" . $thisItem . "{ top:0px; float:right; }\r\n";
         echo $strOutput;
      }
   }
?>
</style>





</head>
<body>
<div id="bodyWrapper">

   <div id="logoWrapper"><img class="headerLogo" src="images/logo_html5_large.png" /></div>
   <div id="contentWrapper">

<?php

   $strOutput = null;
   $cellCount = 1;

   for ($i = 0; $i < count($arrResults); $i++) {

      if ($cellCount == 1) {
         $strOutput.= "<div class=\"contentRow\">\r\n\r\n";
      }
      if ($cellCount == 2) {
         $strOutput.= "<div class=\"contentBox contentBoxMiddle shadow\">\r\n";
      }
      else {
         $strOutput.= "<div class=\"contentBox shadow\">\r\n";
      }

      $strOutput.= "<div class=\"contentTitle\">" . $arrResults[$i]['ftxTitle'] . "</div>\r\n";

      for ($item = 0; $item < count($arrResults[$i]['items']); $item++) {

         if (checkEven($item) == true) { $rowClass = "rowEven"; }
         else { $rowClass = "rowOdd"; }

         $thisClass  = $arrResults[$i]['ftxClass'] . $arrResults[$i]['items'][$item]['ftxId'];
         $thisLink   = $arrResults[$i]['items'][$item]['ftxLink'];

         $strOutput.= "<div class=\"contentBody " . $rowClass . "\">\r\n";

         // Build the appropriate link.
         $strOutput.= "<div class=\"contentLink\">";
         if ($arrResults[$i]['items'][$item]['ftxExternalFile'] != '') {
            $strOutput.= "<a href=\"" . $config['path']['files'] . "/" . $arrResults[$i]['items'][$item]['ftxExternalFile'] . "\" target=\"_new\">" . $arrResults[$i]['items'][$item]['ftxLink'] . "</a>\r\n";
         }
         elseif ($arrResults[$i]['items'][$item]['ftxExternalUrl'] != '') {
            $strOutput.= "<a href=\"" . $arrResults[$i]['items'][$item]['ftxExternalUrl'] . "\" target=\"_new\">" . $arrResults[$i]['items'][$item]['ftxLink'] . "</a>\r\n";
         }
         elseif ($arrResults[$i]['items'][$item]['ftxFilename']) {
            $strOutput.= "<a class=\"displayWindow_" . $thisClass. "\" href=\"#\">" . $thisLink . "</a>\r\n";
         }
         $strOutput.= "</div>\r\n";

         $strOutput.= "</div>\r\n\r\n";

         $strOutput.= "<div id=\"shadow_" . $thisClass . "\">\r\n";
         $strOutput.= "<div class=\"canvas_" . $thisClass . "\">\r\n";
         $strOutput.= "<a class=\"closeCanvas_" . $thisClass . "\" href=\"#\"><img src=\"images/close.png\"/></a>\r\n";

         $fileName = $config['path']['demos'] . "/" . $arrResults[$i]['items'][$item]['ftxFilename'];
         if (($arrResults[$i]['items'][$item]['ftxFilename'] != '') && (file_exists($fileName))) {
            $strOutput.= "<div id=\"canvasWrapper\">\r\n";
            $strOutput.= file_get_contents($fileName) . "\r\n";
            $strOutput.= "</div>\r\n";
         }

         $strOutput.= "</div>\r\n";
         $strOutput.= "</div>\r\n\r\n";
      }
      $strOutput.= "</div>\r\n";

      if ($cellCount == 3) {
         $strOutput.= "</div>\r\n\r\n"; // End the row.
         $cellCount = 1; // Reset the counter.
      }
      else { $cellCount++; }

   }

   echo $strOutput;

?>
   </div>

   <!--
   <div id="signatureWrapper">
   Hello World!
   </div>
   <p class="clr">
   -->

   <div id="footerWrapper">

      <!--
      <div id="signature">Ross Ladd</div>
      -->

      <div id="footerLeft">
         <a href="http://www.element63.com" target="_new"><img class="footerLogo" src="images/pixel_clear.png" height="30" width="103" /></a>
      </div>
      <!--
      <div id="footerMiddle">
         &copy; <?php echo date('Y'); ?> <a href="http://www.element63.com" target="_new">Element63 Media &amp; Design</a>
      </div>
      -->
      <div id="footerRight">
      <a href="#" onClick="startTheShow('Boink');"><img src="images/icon_drupal.png" height="34px" width="34px"></a>
      <a href="http://www.w3.org/html/wg/" target="_new"><img class="footerBadge" src="images/logo_html5.png" /></a>
      <a href="http://www.w3.org/Style/CSS/Overview.en.html" target="_new"><img class="footerBadge" src="images/logo_css3.png" /></a>
      </div>

   </div>

</div>
</body>
</html>
