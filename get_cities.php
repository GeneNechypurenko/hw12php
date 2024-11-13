<?php
$dsn = 'mysql:host=localhost;dbname=CountiesCitiesApiDb';
$username = 'root';
$password = '';

$pdo = new PDO($dsn, $username, $password);
$countryId = (int)$_POST['countryid'];

$statement = $pdo->prepare("SELECT * FROM Cities WHERE countryid = :countryid");
$statement->execute(['countryid' => $countryId]);
$cities = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($cities as $city) {
    echo $city['city'] . '</br>';
}
?>
