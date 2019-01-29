<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

//get pet type by title "Updated Pet Type" for delete
$petTypeForUpdate = $vetmanager->request(
    'petType'
    , ''
    , array(
        'offset' => 0
    , 'limit' => 1
    , 'filter' => array(
            array(
                'property' => 'title'
                , 'value' => "Updated Pet Type"
                , "operator" => "eq"
            )
        )
    )
);

$typeIdForUpdate = $petTypeForUpdate['data']['petType'][0]['id'];

//delete pet type by id (id = $typeIdForUpdate)
$petType = $vetmanager->request('petType', $typeIdForUpdate, '', 'DELETE');

echo '<pre>';
print_r($petType);