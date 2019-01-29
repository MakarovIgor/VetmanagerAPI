<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

//get pet type by title "New Pet Type" for update
$petTypeForUpdate = $vetmanager->request(
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

$typeIdForUpdate = $petTypeForUpdate['data']['petType'][0]['id'];

//new data for pet type
$newPetTypeData = array(
    "title" => "Updated Pet Type",
    "type" => "undefined"
);

//update pet type by id (id = $typeIdForUpdate)
$petType = $vetmanager->request('petType', $typeIdForUpdate, $newPetTypeData, 'PUT');

echo '<pre>';
print_r($petType);