<?php
    function tanggal_indonesia($tanggal){
        if($tanggal==null){
            echo null;
        }else{
        $tgl = date_create_from_format('d-m-Y', $tanggal);
        $tgl = date_format(new DateTime($tanggal), 'Y-m-d');
        $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
        );
        
        $pecahkan = explode('-', $tgl);
        
        // variabel pecahkan 0 = tahun
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tanggal
 
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
}
?>