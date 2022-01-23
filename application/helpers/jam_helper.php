<?php


function hitung_jam($waktu)
    {
        date_default_timezone_set("Asia/Jakarta");
        $waktu_awal = strtotime($waktu);
        $waktu_akhir=strtotime(date('Y-m-d h:i:s'));
        $diff    = $waktu_akhir - $waktu_awal;
        $jam    = floor($diff / (60 * 60));
        $menit    = $diff - $jam * (60 * 60);
        echo $jam ." jam " .floor($menit/60). " menit";
    }
?>