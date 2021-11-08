<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if(isset($_GET['country'])) {
    $country = $_GET["country"]; 
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $stmt = $conn->query("SELECT * FROM countries");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// do this if context is not set - ie only searching for countries
if(!isset($_GET['context'])) {
    $table = "<table><tr><th>Country Name</th><th>Continent</th><th>Independence Year</th><th>Head of state</th></tr>";
    foreach ($results as $row) {
        $table.= "<tr><td>".$row['name']."</td><td>".$row['continent']."</td>";
        $table.= "<td>".$row['independence_year']."</td><td>".$row['head_of_state']."</td><tr>";
    }
    $table.= "</table>";
}


if( isset($_GET['context'])  && $_GET["context"] == "cities" && isset($_GET['country']) ) { 
    $country = $_GET["country"];
    $stmt = $conn->query("SELECT * FROM countries JOIN cities on countries.code = cities.country_code WHERE countries.name LIKE '%$country%'" );
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $table = "<table><tr><th>City Name</th><th>District</th><th>Population</th></tr>";
    foreach ($results as $row) {
        $table.= "<tr><td>".$row['name']."</td><td>".$row['district']."</td>";
        $table.= "<td>".$row['population']."</td><tr>";
    }
    $table.= "</table>";
} 

echo $table;

?>
<ul>
    <?php foreach ($results as $row): ?>
    <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
    <?php endforeach; ?>
</ul>