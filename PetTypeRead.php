<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

//get all pet types
$petTypes = $vetmanager->request('PetType', '', '', 'GET');

//get pet type by id (id = 2)
//$petTypes = $vetmanager->request('PetType', 2, '', 'GET');


//get pet type by filter
//$petTypes = $vetmanager->request(
//    'petType'
//    , ''
//    , array(
//        'offset' => 0
//    , 'limit' => 1
//    , 'filter' => array(
//            array(
//                'property' => 'title'
//            , 'value' => "Кошки"
//            , "operator" => "eq"
//            )
//        )
//    )
//);


echo '<pre>';
print_r($petTypes);