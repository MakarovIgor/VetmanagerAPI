<?php

require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');


$client = $vetmanager->request(
    'good'
    , ''
    , array(
        'offset' => 0
        , 'limit' => 1
        , 'filter' => array(
            array(
                'property' => 'id'
                , 'value' => 13
                , "operator" => "eq"
            )
        )
    )
);
// or
//$goods = $vetmanager->request('good', 13, '', 'GET');
echo '<pre>';
print_r($client);
