
<?php
	$server = "localhost";
	$user = "root";
	$pass = ' ';
	$db = "db-00-user-name-max";

	// Create connection
	$cnc = new mysqli($server, $user, $pass, $db);
?>




<link rel="icon" href="fav32.png">
<body style = "background: #222">
<pre  style = "color: #eee;">
<~><?php

/* 
req - request	- i , u , s
val - value		- TXT  	(feed for i)
id  - id		- int	(feed for u)
*/


$req = $_POST["req"];

if($req == "i")
{

	$name = $_POST["name"];
	$val = $_POST["val"];

	$str = <<<HerNow
	INSERT INTO `table_0`(`value` , `name`) 
	VALUES ("$val" , "$name")
	HerNow;

	$cnc->query($str);

	// echo $str; 
}
else if($req == "u")
{
	$id = $_POST["id"];
	$name = $_POST["name"];
	$val = $_POST["val"];

	$str = <<<HerNow
	UPDATE `table_0` SET `value`= "$val and `name` = "$name" 
	WHERE `id`= $id
	HerNow;

	$cnc->query($str);

	// echo $str; 
}
else if($req == "s")
{

	$str = <<<HerNow
	SELECT * 
	FROM `table_0`
	HerNow;

	$result = $cnc->query($str);

	while($row = $result->fetch_assoc()) 
	{
    	echo $row["name"] . "<~>" . $row["value"]. "<~>";
  	}
  	echo "end-of-select";

	// echo $str; 
}



$cnc->close();



