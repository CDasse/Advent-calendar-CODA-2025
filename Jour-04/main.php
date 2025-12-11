<?php

$fileName = 'data';
$fullContent = file_get_contents($fileName);

// break the file when two \R are consecutive
$elfBLock = preg_split("/\R{2,}/", $fullContent);

$elfTotalCalories = [];
$elfNameCounter = [];

foreach ($elfBLock as $block) {
    $lines = preg_split("/\R/", $block);

    $calculCalories = 0;
    $elfName = $lines[0];

    $elfNameCounter[$elfName] = ($elfNameCounter[$elfName] ?? 0) + 1;
    $uniqueKey = $elfName . '-' . $elfNameCounter[$elfName];

    for ($i = 1; $i < count($lines); $i++) {
        $calculCalories += $lines[$i];
    }

    $elfTotalCalories[$uniqueKey] = $calculCalories;
}

arsort($elfTotalCalories);

$top3 = array_slice($elfTotalCalories, 0, 3);

$range = 1;

echo "🏆 Top 3 des Livraisons les plus Caloriques";

foreach ($top3 as $elfNameWithCount => $value) {
    $elfName = substr($elfNameWithCount, 0, strpos($elfNameWithCount, '-'));

    echo '#' . $range . ' : ' . $elfName . ' avec ' . $value . ' calories';
    echo "<br>";
    $range++;
}
