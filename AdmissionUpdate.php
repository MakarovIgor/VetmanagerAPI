<?php

require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');
//get admission by id (id = 3)
$admissionID = 3;

//data for update admission
$admissionData = array(
    "admission_date" => "2017-12-05 12:10:00",
    "admission_length" => "00:00:00",
    "client_id" => 14,
    "status" => "not_approved"
);
//get admission by id (id = 3)
$admission = $vetmanager->request('admission', $admissionID, $admissionData, 'PUT');
echo '<pre>';
print_r($admission);