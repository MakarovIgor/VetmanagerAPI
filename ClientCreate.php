<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

// get all clinics
$clinics = $vetmanager->request('clinics', '', '', 'GET');
$clinicsArray = $clinics['data']['clinics'];

// data for new client
$clientData = array(
    "type_id" => 3,
    "first_name" => "Testovich",
    "middle_name" => "Testovich",
    "last_name" => "Testovich",
    "status" => "ACTIVE",
    'email' => 'test@gmail.com',
    "city_id" => 251,
    "cell_phone" => '(232)131-23-11',
    "home_phone" => '332-21-22',
    "work_phone" => "223-43-54"
);


// create new client
$client = $vetmanager->request('client', '', $clientData, 'POST');
// get new client id
$clientId = $client['data']['client'][0]['id'];

// link client to all clinics by client id and clinic id
for($i =0; $i < count($clinicsArray); $i++){
    $params = array(
        'client_id' => $clientId,
        'clinic_id' => $clinicsArray[$i]['id']
    );

    $clientToClinic = $vetmanager->request('clinicsToClients', '', $params, 'POST');
}

echo '<pre>';
print_r($clinics);
print_r($client);