<?php

$db = new PDO('mysql:host=localhost;dbname=table_tennis', 'root', '');

$sql = 'SELECT * FROM matches';

$stmt = $db->prepare($sql);

$stmt->execute();

$matches = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Add a worksheet to the Excel file

$worksheet = $excel->setActiveSheetIndex(0);

// Set the worksheet header

$worksheet->setCellValue('A1', 'Match Date');
$worksheet->setCellValue('B1', 'Match Time');
$worksheet->setCellValue('C1', 'Referee Name');
$worksheet->setCellValue('D1', 'Player 1 Name');
$worksheet->setCellValue('E1', 'Player 2 Name');

// Write the match schedule to the Excel file

foreach ($matches as $match) {

    $worksheet->setCellValue('A' . ($match['match_id'] + 1), $match['match_date']);
    $worksheet->setCellValue('B' . ($match['match_id'] + 1), $match['match_time']);
    $worksheet->setCellValue('C' . ($match['match_id'] + 1), $match['referee_name']);
    $worksheet->setCellValue('D' . ($match['match_id'] + 1), $match['player_1_name']);
    $worksheet->setCellValue('E' . ($match['match_id'] + 1), $match['player_2_name']);

}

// Save the Excel file

$excel->save('match_schedule.xlsx');

?>
