<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

//get user position by name "Главный уборщик 1" for delete
$userPositionData = $vetmanager->request(
    'userPosition'
    , ''
    , array(
        'offset' => 0
    , 'limit' => 1
    , 'filter' => array(
            array(
                'property' => 'title'
                , 'value' => "Главный уборщик 1"
                , "operator" => "eq"
            )
        )
    )
);

$userPositionIdForUpdate = $userPositionData['data']['userPosition'][0]['id'];


//delete user position by id (id = $newUserPositionData)
$userPosition = $vetmanager->request('userPosition', $userPositionIdForUpdate, '', 'DELETE');

echo '<pre>';
print_r($userPosition);