<?php

namespace App\Helpers;

class Helper {

    public static function convertDate($date) {
        \Carbon\Carbon::setLocale('id');
       return \Carbon\Carbon::now()->format('l, d F Y H:i');
// Sabtu, 04 Maret 2017 07:38
    }
    
    public static function getDay($tanggal){
        $day = date('D', strtotime($tanggal));
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        $d = date('d', strtotime($tanggal));
        $m = date('m', strtotime($tanggal));
        $y = date('Y', strtotime($tanggal));
        $j = date('H:i', strtotime($tanggal));
        $mList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        $date=$dayList[$day].', '.$d.' '. $mList[$m].' '.$y;
        return $date;
    }
}