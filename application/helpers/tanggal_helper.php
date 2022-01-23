<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('format_indo')) {
  function format_indo($date){
    // array hari dan bulan
    $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $Bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
    // pemisahan tahun, bulan, hari, dan waktu
    $tahun = substr($date,0,4);
    $bulan = substr($date,5,2);
    $tgl = substr($date,8,2);
    $waktu = substr($date,11,5);
    $hari = date("w",strtotime($date));
    $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun."".$waktu;

    return $result;
  }
}

if (!function_exists('tgbulan')) {
      function tgbulan($tanggal){
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

          return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] ;
        }
      }
}

if (!function_exists('tanggal')) {
  function tanggal($tanggal){
      if($tanggal==null){
          echo null;
      }else{
      $tgl = date_create_from_format('d-m-Y', $tanggal);
      $tgl = date_format(new DateTime($tanggal), 'Y-m-d');
      
      $pecahkan = explode('-', $tgl);
      
      // variabel pecahkan 0 = tahun
      // variabel pecahkan 1 = bulan
      // variabel pecahkan 2 = tanggal

      return $pecahkan[2]  ;
    }
  }
}