<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

// data for new user position
$userPositionData = array(
    "title" => "Главный уборщик"
);

// create new user position
$userPosition = $vetmanager->request('userPosition', '', $userPositionData, 'POST');

echo '<pre>';
print_r($userPosition);