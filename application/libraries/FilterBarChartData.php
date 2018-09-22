<?php
if (!defined('BASEPATH'))
{
    exit('No direct script access allowed');
}

class FilterBarChartData
{
    private $months = array('มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');

    public function filter($data, $index = 'accident_date')
    {
      $results = array(
        'data'            => array(),
        'labels'          => $this->months,
        'type'            => 'bar',
        'dataset_label'   => $this->months,
        'backgroundColor' => '#0073b7',
      );
      
      for ($i=1; $i <=12 ; $i++) {
        $months = array_filter($data, function($value) use ($i, $index) {
          $month = date("m", strtotime($value[$index]));
          if ($month == $i) {
            return $value['id'];
          }
        });

        array_push($results['data'], (int)count($months));
      }

      return json_encode($results);
    }

}
