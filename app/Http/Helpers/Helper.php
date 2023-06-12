<?php

namespace App\Http\Helpers;
class Helper
{

    public static function convertDateFullIndo($date, $format = 'd/m/Y')
    {
        $arrDate = explode('/', $date);
        $tgl = $arrDate[0];
        $month = $arrDate[1];
        $year = $arrDate[2];

        $textMonth = '';
        switch ( (int)$month ) {
            case 1: $textMonth = 'Januari'; $break;
            case 2: $textMonth = 'Februari'; $break;
            case 3: $textMonth = 'Maret'; $break;
            case 4: $textMonth = 'April'; $break;
            case 5: $textMonth = 'Mei'; $break;
            case 6: $textMonth = 'Juni'; $break;
            case 7: $textMonth = 'Juli'; $break;
            case 8: $textMonth = 'Agustus'; $break;
            case 9: $textMonth = 'September'; $break;
            case 10: $textMonth = 'Oktober'; $break;
            case 11: $textMonth = 'November'; $break;
            case 12: $textMonth = 'Desember'; $break;
        }
        return $tgl . ' ' . $textMonth . ' ' . $year;
    }

}
