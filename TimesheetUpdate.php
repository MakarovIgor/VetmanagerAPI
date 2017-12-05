<?php

require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

// params for update timesheet
$paramsTimesheet = array(
    "begin_datetime" => '2017-12-04 08:00:00',
    "end_datetime" => '2017-12-04 16:00:00',
    "title" => "Update Test timesheet",
);
// update timesheet by id (id = 1)
$timesheet = $vetmanager->request('timesheet', 1, $paramsTimesheet, 'PUT');
echo '<pre>';
print_r($timesheet);