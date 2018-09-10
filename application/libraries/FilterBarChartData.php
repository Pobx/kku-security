<?php
if (!defined('BASEPATH'))
{
    exit('No direct script access allowed');
}

class FilterBarChartData
{

    public function filter($data, $index = 'accident_date')
    {
      $results = array();
      for ($i=1; $i <=12 ; $i++) {
        $months = array_filter($data, function($value) use ($i, $index) {
          $month = date("m", strtotime($value[$index]));
          echo $month."<br>";
          if ($month == $i) {
            return $value['id'];
          }
        });

        array_push($results, (int)count($months));
      }

      return json_encode($results);
    }

}
