<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

//get all breeds
$breeds = $vetmanager->request('breed', '', '', 'GET');

//get breed by id (id = 2)
//$breeds = $vetmanager->request('breed', 2, '', 'GET');

//get breed by filter
//$breeds = $vetmanager->request(
//    'breed'
//    , ''
//    , array(
//        'offset' => 0
//    , 'limit' => 1
//    , 'filter' => array(
//            array(
//                'property' => 'title'
//            , 'value' => "Без породы"
//            , "operator" => "eq"
//            )
//        )
//    )
//);

echo '<pre>';
print_r($breeds);