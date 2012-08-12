<?php



// Query the database and return an array of the results
function dbQuery($dbQuery, $dbConfig) {

   // Init / declare our variables
   $arrResults = null;

   // Open the database connection
   if (!$dbLink = mysql_connect($dbConfig['server'], $dbConfig['username'], $dbConfig['username'])) {
      echo 'Error: Could not connect to mysql';
      exit;
   }

   // Attempt to select our specified database
   if (!mysql_select_db($dbConfig['database'], $dbLink)) {
      echo 'Error: Could not select database.';
      exit;
   }

   // Execute the specified query and obtain a result set
   $dbResult = mysql_query($dbQuery);

   if (!$dbResult) {
      echo "DB Error, could not query the database:<br/>\r\n";
      echo '* MySQL Error: ' . mysql_error() . '<br/>\r\n';
      mysql_close();
      exit;
   }

   while ($row = mysql_fetch_array($dbResult)) {
      $arrResults[] = $row;
   }

   // Close the connection
   mysql_close($dbLink);

   return $arrResults;
}

// Check to see if a number is odd or even, Returns true if even.
function checkEven($num) {
   if($num&1) { return false; }
   else { return true; }
}

// Output the contents of an array
function debugArr($arr) {
   $returnHtml.= "<pre>\r\n";
   $returnHtml.= print_r($arr, true);
   $returnHtml.= "</pre>\r\n";
   return $returnHtml;
}


?>
