<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

//remove good by id (id = 9)
$good = $vetmanager->request('good', 9, '', 'DELETE');
echo '<pre>';
print_r($good);
