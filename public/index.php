<?php

use App\Jurgis;
require '../vendor/autoload.php';

$jurgis = new Jurgis();

echo $jurgis->responds("1, 2, 3 STARTAS!"); 