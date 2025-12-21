<?php

$filename = 'trace';

$R = 6378137; // Rayon de la terre pour la projection (m)
$R_earth_km = 6378; // Rayon de la terre pour la projection (km)

$points = [];

if (file_exists($filename)) {
    if (($handle = fopen($filename, "r")) !== false) {
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            if (count($data) >= 3) {
                $points[] = [
                    'id' => (int)$data[0],
                    'x'  => (float)$data[1],
                    'y'  => (float)$data[2]
                ];
            }
        }
        fclose($handle);
    }
} else {
    die("Erreur : Le fichier '$filename' est introuvable.");
}

// Tri par ordre croissant d'identifiant
usort($points, function($a, $b) {
    return $a['id'] <=> $b['id'];
});

// Conversion de chaque paire en WGS84
function convertToWGS84($x, $y, $R) {
    $lon = ($x / $R) * (180 / M_PI);
    $lat = (2 * atan(exp($y / $R)) - (M_PI / 2)) * (180 / M_PI);
    return ['lat' => $lat, 'lon' => $lon];
}

// Fonction de distance Havensine
function haversineDistance($p1, $p2, $radius) {
    $lat1 = deg2rad($p1['lat']);
    $lon1 = deg2rad($p1['lon']);
    $lat2 = deg2rad($p2['lat']);
    $lon2 = deg2rad($p2['lon']);

    $dlat = $lat2 - $lat1;
    $dlon = $lon2 - $lon1;

    $a = sin($dlat / 2) ** 2 + cos($lat1) * cos($lat2) * sin($dlon / 2) ** 2;
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    
    return $radius * $c;
}

// Identification du premier et du dernier point
$firstPointRaw = $points[0];
$lastPointRaw = end($points);

// Conversion en WGS84
$start = convertToWGS84($firstPointRaw['x'], $firstPointRaw['y'], $R);
$end = convertToWGS84($lastPointRaw['x'], $lastPointRaw['y'], $R);

// Calcul de la distance
$distance = haversineDistance($start, $end, $R_earth_km);

echo "Analyse de l'itinéraire :\n";
echo "--------------------------\n";
echo "Point de départ (ID {$firstPointRaw['id']}) : Lat " . round($start['lat'], 5) . "°, Lon " . round($start['lon'], 5) . "°\n";
echo "Point d'arrivée (ID {$lastPointRaw['id']}) : Lat " . round($end['lat'], 5) . "°, Lon " . round($end['lon'], 5) . "°\n";
echo "--------------------------\n";
echo "Distance entre les deux points : " . round($distance, 3) . " km\n";
