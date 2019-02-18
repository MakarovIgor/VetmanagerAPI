<?php
/*
 * Properties Model just for read(list or one)
 */

require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

// Get phone_mask and unisender_phone_pristavka by one request and for concrete clinic
$propertyPhoneMaskAndPhonePrefix = $vetmanager->request(
    'properties'
    , ''
    , array(
        'offset' => 0
    , 'limit' => 2
    , 'filter' => array(
            array(
                'property' => 'property_name'
            , 'value' => array("phone_mask", "unisender_phone_pristavka")
            , "operator" => "IN"
            ),
            array(
                'property' => 'clinic_id'
            , 'value' => 1
            , "operator" => "="
            ),
        )
    )
);

print_r($propertyPhoneMaskAndPhonePrefix);

// Get phone_mask for concrete clinic
$propertyPhoneMask = $vetmanager->request(
    'properties'
    , ''
    , array(
        'offset' => 0
    , 'limit' => 1
    , 'filter' => array(
            array(
                'property' => 'property_name'
            , 'value' => "phone_mask"
            , "operator" => "="
            ),
            array(
                'property' => 'clinic_id'
            , 'value' => 1
            , "operator" => "="
            ),
        )
    )
);


print_r($propertyPhoneMask);



// Get unisender_phone_pristavka for concrete clinic
$propertyPhonePrefix = $vetmanager->request(
    'properties'
    , ''
    , array(
        'offset' => 0
    , 'limit' => 1
    , 'filter' => array(
            array(
                'property' => 'property_name'
            , 'value' => "unisender_phone_pristavka"
            , "operator" => "eq"
            ),
            array(
                'property' => 'clinic_id'
            , 'value' => 1
            , "operator" => "eq"
            ),
        )
    )
);


print_r($propertyPhonePrefix);