<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

// get one client by id (id value = 1)
$client = $vetmanager->request(
    'client'
    , ''
    , array(
        'offset' => 0
        , 'limit' => 1
        , 'filter' => array(
                array(
                    'property' => 'id'
                    , 'value' => 1
                    , "operator" => "eq"
                )
            )
    )
);
// or
//$goods = $vetmanager->request('client', 1, '', 'GET');
echo '<pre>';
print_r($client);