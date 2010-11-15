<?php

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

try {
         $connection = new Mongo('localhost'); // connects to localhost
	 $collection = $connection->msdb->state;

	 $doc = array( "rows" =>  $_POST["rows"],
		"cols" => $_POST["cols"],
		"mines" => $_POST["mines"],
		"time" => $_POST["time"],
		"mapArr" => $_POST["mapArr"],
		"exploredArr" => $_POST["exploredArr"],
		);

	 $collection->remove();
	 $collection->save( $doc );

	 echo "Your data has been saved";
	  // disconnect from server
	 $connection->close();
} 
catch (MongoConnectionException $e) {
  echo "Something is wrong";
  die('Error connecting to MongoDB server');
      }
catch (MongoException $e) {
  echo "Something is wrong";
  die('Error: ' . $e->getMessage());
}


?>