<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country= filter_input(INPUT_GET,'country');
$lookup=$_GET['lookup'] ?? 'countries';
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
?>

<?php if($lookup==='cities'):?>

<?php

$stmt = $conn->query("SELECT cities.name AS city, cities.district,cities.population, countries.name AS country FROM cities JOIN countries ON cities.country_code=countries.code
  WHERE countries.name LIKE '%$country%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<table border="2" cellpadding="9" >
  <thead>
  <tr>
    <th>Name</th>
    <th>District</th> 
    <th>Population</th>
    
  </tr>
  </thead>
  <tbody>
    <?php foreach($results as $row): ?>
      <tr>
        <td><?=$row['city']?></td>
        <td><?=$row['district']?></td>
        <td><?=$row['population']?></td>
      </tr>
      <?php endforeach; ?>
  </tbody>
</table>

<?php else:?>

<?php

$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<table border="2" cellpadding="9" >
  <thead>
  <tr>
    <th>Country Name</th>
    <th>Continent</th> 
    <th>Independence Year</th>
    <th>Head of State</th>
  </tr>
  </thead>
  <tbody>
    <?php foreach($results as $row): ?>
      <tr>
        <td><?=$row['name']?></td>
        <td><?=$row['continent']?></td>
        <td><?=$row['independence_year']?></td>
        <td><?=$row['head_of_state']?></td>
      </tr>
      <?php endforeach; ?>
  </tbody>
</table>

<?php ;endif ?>
