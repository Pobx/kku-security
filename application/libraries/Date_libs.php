<?php
if (!defined('BASEPATH'))
{
    exit('No direct script access allowed');
}

class Date_libs
{

    private $list_short_th = array(
        '01' => 'มกราคม', '02' => 'กุมภาพันธ์', '03' => 'มีนาคม'
        , '04' => 'เมษายน', '05' => 'พฤษภาคม', '06' => 'มิถุนายน'
        , '07' => 'กรกฎาคม', '08' => 'สิงหาคม', '09' => 'กันยายน'
        , '10' => 'ตุลาคม', '11' => 'พฤศจิกายน', '12' => 'ธันวาคม',
    );

    public function set_date_th($val = '')
    {
        if (!isset($val) || $val == '' || $val == '0000-00-00')
        {
            // $val_date = '0000-00-00';
            $val_date = date('Y-m-d');
        }
        else
        {
            $val = str_replace('/', '-', $val);
            $date_explod = explode('-', $val);
            $dates_en = $date_explod[0] . '-' . $date_explod[1] . '-' . ($date_explod[2] - 543);
            $val_date = date('Y-m-d', strtotime($dates_en));
        }
        return $val_date;
    }

    public function set_date_en($val = '')
    {
        if (!isset($val) || $val == '' || $val == '0000-00-00')
        {
            $val_date = '0000-00-00';
        }
        else
        {
            $val = str_replace('/', '-', $val);
            $date_explod = explode('-', $val);
            $dates_en = $date_explod[0] . '-' . $date_explod[1] . '-' . ($date_explod[2]);
            $val_date = date('Y-m-d', strtotime($dates_en));
        }
        return $val_date;
    }

    public function set_time_en($val = '')
    {
        if (!isset($val) || $val == '' || $val == '0')
        {
            $rs = date('H:i:00');
        }
        else
        {
            $val = explode(' ', $val);
            $rs = $val[0] . ':00';
        }
        return $rs;
    }

    public function set_convert_time($val = '')
    {
        if (!isset($val) || $val == '' || $val == '0')
        {
            $rs = date('H:i:00');
        }
        else
        {
            $rs = date('H:i:00', strtotime($val));
        }
        return $rs;
    }

    public function get_convert_time($val = '')
    {
        if (!isset($val) || $val == '' || $val == '0')
        {
            $rs = date('H:i:00');
        }
        else
        {
            $rs = date('h:i A', strtotime($val));
        }
        return $rs;
    }

    public function get_date_th($val = '0000-00-00')
    {
        if (!isset($val) || $val == '0000-00-00')
        {
            $val_date = '';
        }
        else
        {
            $date_explod = explode('-', $val);
            $val_date = $date_explod[2] . '/' . $date_explod[1] . '/' . ($date_explod[0] + 543);
        }
        return $val_date;
    }

    public function get_date_th_full_text($val = '0000-00-00')
    {
        $val_date = '';
        if ($val != '0000-00-00')
        {
            $date_explod = explode('-', $val);
            $val_date = $date_explod[2] . '&nbsp;' . $this->list_short_th[$date_explod[1]] . '&nbsp;' . ($date_explod[0] + 543);
        }
        return $val_date;
    }

    public function get_month_th_full_text($val = '0000-00-00')
    {
        $val_date = '';
        if ($val != '0000-00-00')
        {
            $date_explod = explode('-', $val);
            $val_date = $this->list_short_th[$date_explod[1]] . '&nbsp;' . ($date_explod[0] + 543);
        }
        return $val_date;
    }

    public function get_date_en($val = '0000-00-00')
    {
        if (!isset($val) || $val == '0000-00-00')
        {
            $val_date = '';
        }
        else
        {
            $date_explod = explode('-', $val);
            $val_date = $date_explod[2] . '/' . $date_explod[1] . '/' . ($date_explod[0]);
        }
        return $val_date;
    }
} //end class
