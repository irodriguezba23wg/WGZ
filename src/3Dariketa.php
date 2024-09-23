<?php
// Configurazioak
header('Content-Type: image/png');

// Irudia sortu
$width = 400;
$height = 400;
$image = imagecreatetruecolor($width, $height);

// Koloreak definitu
$background_color = imagecolorallocate($image, 255, 255, 255);
$point_color = imagecolorallocate($image, 0, 0, 255);

// Atzeko kolorea bete
imagefill($image, 0, 0, $background_color);

// Puntuak definitu (x, y, z)
$points = [
    [50, 50, 0],
    [100, 150, 0],
    [200, 100, 0],
    [300, 300, 0],
    [350, 50, 0]
];

// Puntuak marraztu
foreach ($points as $point) {
    // Z koordina (depth) kontuan hartu
    $size = 10 - ($point[2] * 0.1); // Z koordina erabiliz tamaina txikiagoa
    imagefilledellipse($image, $point[0], $point[1], $size, $size, $point_color);
}

// Irudia erakutsi
imagepng($image);
imagedestroy($image);
?>
