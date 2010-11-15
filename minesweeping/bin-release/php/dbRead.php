<?php

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

try {
         $connection = new Mongo('localhost'); // connects to localhost
	 $collection = $connection->msdb->state;

	 $obj = $collection->findOne();
     
    
     

     
     if($obj)
     {
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        $result = "<state>"
	         . "<rows>" . $obj['rows'] . "</rows>"
	         . "<cols>" . $obj['cols'] . "</cols>"
	         . "<mines>" . $obj['mines'] . "</mines>"
	         . "<time>" . $obj['time'] . "</time>"
    	         . "<mapArr>" . $obj['mapArr'] . "</mapArr>"
	         . "<exploredArr>" . $obj['exploredArr'] . "</exploredArr>"
	         . "</state>";
     
        echo $result;
     }
	  // disconnect from server
	 $connection->close();
} 
catch (MongoConnectionException $e) {
  die('Error connecting to MongoDB server');
      }
catch (MongoException $e) {
  die('Error: ' . $e->getMessage());
}


?>