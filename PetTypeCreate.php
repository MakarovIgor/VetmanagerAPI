<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

// data for new petType
$petTypeData = array(
    "title" => "New Pet Type"
);

// create new petType
$petType = $vetmanager->request('petType', '', $petTypeData, 'POST');

echo '<pre>';
print_r($petType);