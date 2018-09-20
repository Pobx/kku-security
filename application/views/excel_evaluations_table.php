<?php
// header('Content-type: application/vnd.ms-excel');
// header('Content-Disposition: attachment; filename=excel.xls');
// header('Pragma: public');
// header('Cache-Control: max-age=0');
// set_time_limit(0);
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php 
$this->load->view('excel_evaluations_between_ages_table');
echo "<br>";
echo "<br>";
echo "<br>";
$this->load->view('excel_evaluations_status_table');
echo "<br>";
echo "<br>";
echo "<br>";
$this->load->view('excel_evaluations_performance_table');
echo "<br>";
echo "<br>";
echo "<br>";
$this->load->view('excel_evaluations_success_table');
echo "<br>";
echo "<br>";
echo "<br>";
$this->load->view('excel_evaluations_timeline_table');
echo "<br>";
echo "<br>";
echo "<br>";
$this->load->view('excel_evaluations_service_clear_table');

?>
