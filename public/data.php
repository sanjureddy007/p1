<?php
function get_rate($name, $rating)
{     
  /* Database INFO */
	$servername = "wyvern.cs.newpaltz.edu";
	$username = "mudupus1";
	$password = "u9nd56";   
    $dbname = "mudupus1_db";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
       }

       $sql = "SELECT rating FROM movies WHERE title = '$name'";
       $result = $conn->query($sql);

        if ($result->num_rows > 0) {
             // output data of each row
             while($row = $result->fetch_assoc()) {
                      $p = $row["rating"];
      }
    } else {
                     $p = null;
        }
    $conn->close();
if ($p == $rating) 
  {
    return "true";
  }
else 
 {
  return "false";
 }
}

?>
