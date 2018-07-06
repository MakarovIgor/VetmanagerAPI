<?php
require_once './Vetmanager.php';

$vetmanager = new Vetmanager('manager.ru', 'cdb887db034acedeb1d3b154d8ca9247');

$reportData = array(
    'report_id' => 8
);
$reportResult = $vetmanager->request('report', 'StartReport', $reportData, 'GET');
$reportResultId = $reportResult['data']['report']['report_file_id'];

$counter = 300;
for($i = 0; $i <= $counter; $i++){
    if($i == $counter){
        throw new Exception("Report not building");
    }

    sleep(1);
    $getReportData = array(
        'file_id' => $reportResultId
    );

    $reportFileData = $vetmanager->request('report', 'reportFile', $getReportData, 'GET');
    if(isset($reportFileData['data']['report']['csv_file'])){
        $data = readCSVFileToArray($reportFileData['data']['report']['csv_file']);
        print_r($data);
        break;
    }
}


function readCSVFileToArray($file){
    $dataCSV = array();
    $row = 1;
    if (($handle = fopen($file, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $num = count($data);
            $row++;
            for ($c=0; $c < $num; $c++) {
                $dataCSV[$row][] = $data[$c];
            }
        }
        fclose($handle);
    }
    return $dataCSV;
}
