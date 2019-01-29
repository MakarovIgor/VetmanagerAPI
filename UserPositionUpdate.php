<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

//get user position by name "Главный уборщик" for update
$userPositionData = $vetmanager->request(
    'userPosition'
    , ''
    , array(
        'offset' => 0
    , 'limit' => 1
    , 'filter' => array(
            array(
                'property' => 'title'
                , 'value' => "Главный уборщик"
                , "operator" => "eq"
            )
        )
    )
);

$userPositionIdForUpdate = $userPositionData['data']['userPosition'][0]['id'];

//new data for update user position
$newUserPositionData = array(
    "title" => "Главный уборщик 1"
);

//update user position by id (id = $newUserPositionData)
$userPosition = $vetmanager->request('userPosition', $userPositionIdForUpdate, $newUserPositionData, 'PUT');

echo '<pre>';
print_r($userPosition);