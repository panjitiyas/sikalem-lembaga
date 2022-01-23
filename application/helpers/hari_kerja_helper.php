<?php 

function lama_lpj($tgl_awal,$tgl_akhir)
    {
        setlocale(LC_TIME, 'id_ID.UTF8');
        // Ubah tgl ke format time
        $awal = date_create_from_format('d-m-Y', $tgl_awal);
        $awal = date_format(new DateTime($tgl_awal), 'Y-m-d');
        $awal = strtotime($tgl_awal);

        $akhir = date_create_from_format('d-m-Y', $tgl_akhir);
        $akhir = date_format(new DateTime($tgl_akhir), 'Y-m-d');
        $akhir = strtotime($tgl_akhir);

        //list libur nasional
        $libur_nasional = array(
            '2020-01-01', '2020-01-25', '2020-03-22', '2020-03-25',
            '2020-04-10', '2020-05-01', '2020-05-07', '2020-05-21',
            '2020-05-24', '2020-05-25', '2020-06-01', '2020-07-31',
            '2020-08-17', '2020-08-20', '2020-10-29', '2020-12-25',
            '2021-01-01','2021-02-12','2021-03-11','2021-03-12',
            '2021-03-14','2021-04-02','2021-05-01','2021-05-12',
            '2021-05-13','2021-05-13','2021-05-14','2021-05-17',
            '2021-05-18','2021-05-19','2021-05-26','2021-06-01',
            '2021-07-20','2021-08-10','2021-08-17','2021-10-19',
            '2021-12-24','2021-12-25','2021-12-27'
        );
        //set awal jumlah hari kerja                               );
        $hari_kerja = 0;
        //looping dari tgl awal sampai tgl akhir dengan increment 1 hari (60 * 60 * 24 second)
        for ($i = $awal; $i <= $akhir; $i += (60 * 60 * 24)) {
            //ubah format time ke date
            $i_date = date("Y-m-d", $i);
            //cek apakah hari sabtu, minggu atau hari libur nasional, Jika bukana maka tambahkan hari kerja
            if (date("w", $i) != "0" and date("w", $i) != "6" and !in_array($i_date, $libur_nasional)) {
                $hari_kerja++;
            }
        }
        echo $hari_kerja;
    }
?>