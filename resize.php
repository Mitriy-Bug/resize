<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Создание превью Изображений</title>
</head>
<body>
<h1>Начало</h1>
<?php

define( '_JEXEC', 1 );
require_once(__DIR__ .'/api/index.php');

use Joomla\CMS\Image\Image;

//Функция создания превью изображений
function resizeImage($file, $width, $height) {

    $path = __DIR__ . "/images/car-dealership/".$file;
    $pathTmb = __DIR__ . "/images/car-dealership/tmb/".$file;
                    

    $image = new Image($path);

    $imageType = \IMAGETYPE_WEBP;

    $image->resize($width, $height, false, Image::SCALE_INSIDE);
    $image->toFile($pathTmb, $imageType);
}

$dir    = __DIR__ . "/images/car-dealership/";
//$dirTmb = __DIR__ . "/images/car-dealership/tmb/";


$files = scandir($dir);
array_splice($files, 0, 2);

// $filesTmb = scandir($dirTmb);
// array_splice($filesTmb, 0, 2);

// $files = array_diff($files, $filesTmb);
// $files = array_values($files);

    // echo "<pre>";
    // echo count($files);
    // print_r($files);
    // echo "</pre>";

for ($i = 0, $size = count($files); $i < $size; $i++) 
{
    if (is_file($dir.$files[$i])) {
        resizeImage($files[$i], 265, 198);
    }
  // делаем паузу, если текущий индекс делится на 100 без остатка
  // т.е. каждый 10 элемент будет пауза
  if (($i % 100) == 0)
  {
    echo $i."<br>";
    sleep(10);
  }
}
         
?>

</body>
</html>