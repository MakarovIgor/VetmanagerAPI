<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

//get breed by title "Без породы" for update
$breedForUpdate = $vetmanager->request(
    'breed'
    , ''
    , array(
        'offset' => 0
        , 'limit' => 1
        , 'filter' => array(
            array(
                'property' => 'title'
                , 'value' => "Без породы"
                , "operator" => "eq"
            )
        )
    )
);

$breedId = $breedForUpdate['data']['breed'][0]['id'];

$dataNewBreed = array(
    'title' => 'Без породы Updated',
);

//udate breed by $breedId
$breed = $vetmanager->request('breed', $breedId, $dataNewBreed, 'PUT');

echo '<pre>';
print_r($breed);