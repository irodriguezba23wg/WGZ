<?php

$autoak = [
    ["Marka" => "Toyota", "Modelo" => "Corolla", "Urtea" => 2020],
    ["Marka" => "Ford", "Modelo" => "Mustang", "Urtea" => 2021],
    ["Marka" => "Tesla", "Modelo" => "Model 3", "Urtea" => 2022]
];



$myJSON = json_encode($autoak,JSON_PRETTY_PRINT);
header('Content-Type: application/json');
echo $myJSON;
