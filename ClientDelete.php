<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

//remove client by id (id = 13)
$client = $vetmanager->request('client', 13, '', 'DELETE');
echo '<pre>';
print_r($client);
