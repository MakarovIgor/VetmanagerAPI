<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

//remove admission by id (id = 4)
$admission = $vetmanager->request('admission', 4, '', 'DELETE');

echo '<pre>';
print_r($admission);