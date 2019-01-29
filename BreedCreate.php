<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

//get pet type by title "New Pet Type" for new breed
$petTypeForBreed = $vetmanager->request(
    'petType'
    , ''
    , array(
        'offset' => 0
    , 'limit' => 1
    , 'filter' => array(
            array(
                'property' => 'title'
            , 'value' => "New Pet Type"
            , "operator" => "eq"
            )
        )
    )
);

$typeId = $petTypeForBreed['data']['petType'][0]['id'];

$dataNewBreed = array(
    'title' => 'Без породы',
    'pet_type_id' => $typeId
);

//create breed by $dataNewBreed
$breed = $vetmanager->request('breed', '', $dataNewBreed, 'POST');

echo '<pre>';
print_r($breed);