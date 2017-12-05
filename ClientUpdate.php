<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

//get client by id (id = 14)
$client = $vetmanager->request('client', 14, '', 'GET');

//new data for client
$clientData = array(
    "first_name" => "Update",
    "middle_name" => "Testovich",
    "last_name" => "Testovich",
    'email' => '123@gmail.com',
);
//update client by id (id = 14)
$client = $vetmanager->request('client', 14, $clientData, 'PUT');



echo '<pre>';
print_r($client);
