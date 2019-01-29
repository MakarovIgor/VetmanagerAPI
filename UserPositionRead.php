<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

//get all users positions
$userRoles = $vetmanager->request('userPosition', '', '', 'GET');


//Another examples:

//get user position by id (id = 14)
//$userRoles = $vetmanager->request('userPosition', 14, '', 'GET');

//get user position by filter
/*$userRoles = $vetmanager->request(
    'userPosition'
    , ''
    , array(
        'offset' => 0
    , 'limit' => 1
    , 'filter' => array(
            array(
                'property' => 'title'
                , 'value' => "Врач"
                , "operator" => "eq"
            )
        )
    )
);*/

echo '<pre>';
print_r($userRoles);