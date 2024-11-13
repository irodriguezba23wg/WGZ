<?php
// Autoen inguruko informazioa duten matrizea definitzen dugu
$autoak = [
    ["Marka" => "Toyota", "Modelo" => "Corolla", "Urtea" => 2020],
    ["Marka" => "Ford", "Modelo" => "Mustang", "Urtea" => 2021],
    ["Marka" => "Tesla", "Modelo" => "Model 3", "Urtea" => 2022]
];




// Taula sortzen hastea
echo '<h2>Autoen Taula</h2>';
echo '<table>';
echo '<tr><th>Marka</th><th>Modelo</th><th>Urtea</th></tr>';

// Matrizea iteratzea for erabiliz
$kopurua = count($autoak);
for ($i = 0; $i < $kopurua; $i++) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($autoak[$i]["Marka"]) . '</td>';
    echo '<td>' . htmlspecialchars($autoak[$i]["Modelo"]) . '</td>';
    echo '<td>' . htmlspecialchars($autoak[$i]["Urtea"]) . '</td>';
    echo '</tr>';
}

echo '</table>';
?>
