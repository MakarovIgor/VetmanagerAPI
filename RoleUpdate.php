<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

//get user role by name "Уборщик" for update
$userRoleData = $vetmanager->request(
    'role'
    , ''
    , array(
        'offset' => 0
    , 'limit' => 1
    , 'filter' => array(
            array(
                'property' => 'name'
                , 'value' => "Уборщик"
                , "operator" => "eq"
            )
        )
    )
);

$userRoleIdForUpdate = $userRoleData['data']['role'][0]['id'];

//new data for update user role
$newUserRoleData = array(
    "name" => "Уборщик 1"
);

//update user role by id (id = $userRoleIdForUpdate)
$role = $vetmanager->request('role', $userRoleIdForUpdate, $newUserRoleData, 'PUT');

echo '<pre>';
print_r($role);