<?php
if (!defined('BASEPATH'))
{
    exit('No direct script access allowed');
}

class FilterPeoples
{

    public function filter($results, $condition = '', $index = 'injury_type')
    {
        $arr = array_filter($results, function ($value) use ($condition, $index)
        {
            if ($value[$index] == $condition)
            {
                return $value;
            }
        });

        return count($arr);
    }

}
