<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

//get breed by title "Без породы Updated" for delete
$breedForDelete = $vetmanager->request(
    'breed'
    , ''
    , array(
        'offset' => 0
        , 'limit' => 1
        , 'filter' => array(
            array(
                'property' => 'title'
                , 'value' => "Без породы Updated"
                , "operator" => "eq"
            )
        )
    )
);

$breedId = $breedForDelete['data']['breed'][0]['id'];

//delete breed by $breedId
$breed = $vetmanager->request('breed', $breedId, '', 'DELETE');

echo '<pre>';
print_r($breed);