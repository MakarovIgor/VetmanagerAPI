<?php

require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');
// params for new admission
$admissionData = array(
        "admission_date" => "2017-12-05 12:12:12",
        "admission_length" => "00:00:00",
        "status" => "not_approved",
        "client_id" => 14,
        "status" => "save"
);
// create admission with params
$admission = $vetmanager->request('admission', '', $admissionData, 'POST');

echo '<pre>';
print_r($admission);