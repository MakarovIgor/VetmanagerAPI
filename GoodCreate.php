<?php

require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');
// data for new good
$data = array(
    'group_id' => 45,
    'title' => 'Gds Test',
    'unit_storage_id' => 9,
    'is_warehouse_account' => 1,
    'is_active' => 1,
    'is_call' => 0,
    'is_for_sale' => 1
);
// data for goodSaleParams
$dataGoodSaleParams = array(
    'price' => 100.00,
    'coefficient' => 10,
    'unit_sale_id' => 5,
    'min_price' => 0.00,
    'max_price' => 0.00,
    'status' => 'active',
    'clinic_id' => 1,
    'markup' => 0.00,
    'price_formation' => 'fixed'
);

echo '<pre>';
// Create new good
$good = $vetmanager->request('good', '', $data, 'POST');
// get new good id
$params = array(
    'good_id' => $good['data']['good'][0]['id']
);

$dataGoodSaleParams = array_merge($dataGoodSaleParams, $params);
// Add sales params to created good
$paramsSales = $vetmanager->request('goodSaleParam', '', $dataGoodSaleParams, 'POST');
// get new created good
$goods = $vetmanager->request('good', $good['data']['good'][0]['id'], '', 'GET');

print_r($goods);


