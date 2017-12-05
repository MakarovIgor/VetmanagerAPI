<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('petstorys.vetmanager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

//get all timesheets
$timesheet = $vetmanager->request('timesheet', '', '', 'GET');

//get timesheet by id (id = 2)
//$timesheet = $vetmanager->request('timesheet', 2, '', 'GET');
echo '<pre>';
print_r($timesheet);