<?php

require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');
// get types of timesheet
$timesheetTypes = $vetmanager->request('timesheetTypes', '', '', 'GET');
// get id with type "Рабочее время"
$timesheetTypesId = $timesheetTypes['data']['timesheetTypes'][0]['id'];

// get users
$doctor = $vetmanager->request('user', '', '', 'GET');
// get first user as doctor
$doctorId = $doctor['data']['user'][0]['id'];
// params for new timesheet
$paramsTimesheet = array(
    "doctor_id" => $doctorId,
    "shedule_id" => 0,
    "begin_datetime" => '2017-12-05 08:00:00',
    "end_datetime" => '2017-12-05 22:00:00',
    "type" => $timesheetTypesId,
    "title" => "Test timesheet",
    "all_day" => 0,
    "night" => 0,
    "clinic_id" => 1
);
// create new timesheet
$timesheet = $vetmanager->request('timesheet', '', $paramsTimesheet, 'POST');
echo '<pre>';
print_r($timesheet);


