<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

//get all roles
$userRoles = $vetmanager->request('role', '', '', 'GET');


//Another examples:

    //get role by id (id = 2)
    //$userRoles = $vetmanager->request('role', 2, '', 'GET');

    //get role by filter
    /*$userRoles = $vetmanager->request(
        'role'
        , ''
        , array(
            'offset' => 0
        , 'limit' => 1
        , 'filter' => array(
                array(
                    'property' => 'name'
                , 'value' => "Врач"
                , "operator" => "eq"
                )
            )
        )
    );*/

echo '<pre>';
print_r($userRoles);