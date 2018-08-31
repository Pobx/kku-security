<?php
if (!defined('BASEPATH'))
{
    exit('No direct script access allowed');
}

class FilterVehicles
{

    public function filter($results, $condition ='', $index = 'car_type')
    {
      $arr = array_filter($results, function($value) use ($condition, $index) {
        if ($value[$index] == $condition) {
          return $value;
        }
      });

      return count($arr);
    }

}
