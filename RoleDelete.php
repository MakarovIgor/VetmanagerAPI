<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

//get user role by name "Уборщик" for delete
$userRoleForDelete = $vetmanager->request(
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

$userRoleId = $userRoleForDelete['data']['role'][0]['id'];

//delete user role by $userRoleId
$role = $vetmanager->request('role', $userRoleId, '', 'DELETE');

echo '<pre>';
print_r($role);