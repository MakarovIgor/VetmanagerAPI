<?php

require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

//get all admissions
$admission = $vetmanager->request('admission', '', '', 'GET');


$params = array(
    'offset' => 0
    , 'limit' => 10
    , 'filter' => array(
        array(
            'property' => 'id'
            , 'value' => 3
            , "operator" => ">"
        )
    )
);

//get admission by id (id = 2)
//$admission = $vetmanager->request('admission', 2, '', 'GET');

//get admission by params
$admissionWithParams = $vetmanager->request('admission', '', $params, 'GET');

echo '<pre>';
print_r($admission);
print_r($admissionWithParams);




