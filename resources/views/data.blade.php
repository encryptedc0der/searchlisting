<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "property";
//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
//Select Database
mysql_select_db($dbname) or die(mysql_error());
// Retrieve data from Query String
$name = $_GET['name'];
$price = $_GET['price'];
$minprice = $_GET['minprice'];
$bedroom = $_GET['bedroom'];
$bathroom = $_GET['bathroom'];
$garage= $_GET['garage'];
$storey= $_GET['storey'];
$price = mysql_real_escape_string($price);
$minprice = mysql_real_escape_string($minprice);
$bedroom = mysql_real_escape_string($bedroom);
$bathroom = mysql_real_escape_string($bathroom);
$garage = mysql_real_escape_string($garage);
$storey = mysql_real_escape_string($storey);
$name = mysql_real_escape_string($name);
//build query
$query = "SELECT * FROM listing WHERE name like '%$name%'";
if(is_numeric($price))
    $query .= " and price > $minprice and price < $price";
if(is_numeric($bathroom))
    $query .= " and bathroom = $bathroom";
if(is_numeric($garage))
    $query .= " and garage = $garage";
if(is_numeric($storey))
    $query .= " and storey = $storey";
if(is_numeric($bedroom))
    $query .= " and bedroom= $bedroom";

//Execute query
$qry_result = mysql_query($query) or die(mysql_error());
//Build Result String
$display_string = "<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>";
$display_string .= "<div class ='container col-sm-12'>";
$display_string .= "<table class = 'table table-bordered'>";
$display_string .= "<tr>";
$display_string .= "<th>Name</th>";
$display_string .= "<th>Price</th>";
$display_string .= "<th>Bedroom</th>";
$display_string .= "<th>Bathroom</th>";
$display_string .= "<th>Garage</th>";
$display_string .= "<th>Storey</th>";
$display_string .= "</tr>";
// Insert a new row in the table for each person returned
while($row = mysql_fetch_array($qry_result)){
    $display_string .= "<tr>";
    $display_string .= "<td>$row[name]</td>";
    $display_string .= "<td>$$row[price]</td>";
    $display_string .= "<td>$row[bedroom]</td>";
    $display_string .= "<td>$row[bathroom]</td>";
    $display_string .= "<td>$row[garage]</td>";
    $display_string .= "<td>$row[storey]</td>";
    $display_string .= "</tr>";
    $display_string .= "</thead>";
}
//echo "Query: " . $query . "<br />";/*for debugging*/
$display_string .= "</table>";
$display_string .= "</div>";
if(mysql_num_rows($qry_result)>0){
	//call php to hide the loading
	echo $display_string ;
}
else echo "<b>No result found.</b> ";
?>
