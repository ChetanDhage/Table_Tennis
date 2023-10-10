<?php

$db = new PDO('mysql:host=localhost;dbname=tabletennis', 'root', '');

$csv_file = 'players.csv';

$fp = fopen($csv_file, 'r');

while (($row = fgetcsv($fp)) !== false) {

    $name = $row[0];
    $gender = $row[1];
    $age = $row[2];
    $country = $row[3];

    $sql = 'INSERT INTO players (name, gender, age, country) VALUES (:name, :gender, :age, :country)';

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':country', $country);

    $stmt->execute();

}

fclose($fp);

?>
