<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

// data for new user role
$roleData = array(
    "name" => "Уборщик"
);

// create new user role
$role = $vetmanager->request('role', '', $roleData, 'POST');

echo '<pre>';
print_r($role);