<?php
if (!defined('BASEPATH'))
{
    exit('No direct script access allowed');
}

class FilterPeriodTimes
{

    public function filter($results, $condition ='', $index = 'period_time')
    {
      $arr = array_filter($results, function($value) use ($condition, $index) {
        if ($value[$index] == $condition) {
          return $value;
        }
      });

      return count($arr);
    }

}
