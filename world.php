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

$table = "<tr><th>Country Name</th><th>Continent</th><th>Independence Year</th><th>Head of state</th></tr>";
foreach ($results as $row) {
    $table.= "<tr><td>".$row['name']."</td><td>".$row['continent']."</td>";
    $table.= "<td>".$row['independence_year']."</td><td>".$row['head_of_state']."</td><tr>";
}

var_dump($table);

?>
<ul>
    <?php foreach ($results as $row): ?>
    <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
    <?php endforeach; ?>
</ul>