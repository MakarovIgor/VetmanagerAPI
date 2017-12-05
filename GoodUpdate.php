<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');
//get good by id
$good = $vetmanager->request('good', 13, '', 'GET');

$goodId =  $good['data']['good']['id'];
$salesParamsId = $good['data']['good']['goodSaleParams'][0]['id'];

//data for update good
$data = array(
    'title' => 'New Gds Test',
);
//data for update good sale params
$dataGoodSaleParams = array(
    'price' => 150.00,
);

// Update good
$good = $vetmanager->request('good', $goodId, $data, 'PUT');
// Update good sale params
$goodSaleParams = $vetmanager->request('goodSaleParam', $salesParamsId, $dataGoodSaleParams, 'PUT');

$goods = $vetmanager->request('good', $goodId, '', 'GET');

echo '<pre>';
print_r($goods);

