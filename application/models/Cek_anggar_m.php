<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_anggar_m extends CI_Model {

    public function get_anggaran($key=null)
    {
        
        $this->db->from ('tb_anggar');
        if($key != null) {
            $this->db->where('cek_kd',$key);
        }
        
        $query= $this->db->get()->result();
        return $query;
    }

    public function get_sisa($key)
    {
        
        $this->db->from ('tb_anggar');
        $this->db->where('cek_kd2',$key);
        
        $query= $this->db->get();
        return $query;
    }
    
    public function get_kd1($id=null)
    {
        $this->db->from ('tb_kd1');
        if($id != null) {
            $this->db->where('id_kd1',$id);
        }
        $query= $this->db->get();
        return $query;
    }
    public function get_kd2($id)
    {
        
        $this->db->from ('tb_kd2');
        $this->db->where('idkd_1',$id);
        $query= $this->db->get()->result ();
        return $query;
    }
    public function get_kd3($id)
    {
        $this->db->from ('tb_kd3');
        $this->db->where('idkd_2',$id);
        $query= $this->db->get()->result();
        return $query;
    }
    public function tambah_realisasi($data)
    {
        if ($this->fungsi->user_login()->nama=='Putri Nailatul Himma'){
            $nilai =$data['nak'];
            $akun=$data['ak'];
            $akom="UPDATE tb_anggar SET realisasi = realisasi+'$nilai' WHERE cek_kd2 = '$akun' ";
            $this->db->query($akom);
        } else {
            $nilai_pd1=$data['npd1'];
            $akun_pd1=$data['pd1'];
            $nilai_pd1db=$data['npd1db'];
            $nilai_pd2=$data['npd2'];
            $akun_pd2=$data['pd2'];
            $nilai_pd2db=$data['npd2db'];
            $nilai_pd3=$data['npd3'];
            $akun_pd3=$data['pd3'];
            $nilai_pd3db=$data['npd3db'];
            $nilai_hr=$data['nhr'];
            $nilai_hrdb=$data['nhrdb'];
            $akun_hr=$data['hr'];

            if( $nilai_pd1!=null || !empty($nilai_pd1) && empty($nilai_pd1db)||$nilai_pd1db==0){
                $perjadin1="UPDATE tb_anggar SET realisasi = realisasi+'$nilai_pd1' WHERE cek_kd2 = '$akun_pd1' ";
                $this->db->query($perjadin1);
            } elseif( $nilai_pd1!=null || !empty($nilai_pd1) && !empty($nilai_pd1db)||$nilai_pd2db!=0) {
                $this->update_realisasi($data);
            };
            if( $nilai_pd2!=null || !empty($nilai_pd2)&& empty($nilai_pd2db)||$nilai_pd2db==0){
                $perjadin2="UPDATE tb_anggar SET realisasi = realisasi+'$nilai_pd2' WHERE cek_kd2 = '$akun_pd2' ";
                $this->db->query($perjadin2);
            } elseif( $nilai_pd2!=null || !empty($nilai_pd2)&& !empty($nilai_pd2db)||$nilai_pd2db!=0) {
                $this->update_realisasi($data);
            };
            if( $nilai_pd3!=null || !empty($nilai_pd3)&& empty($nilai_pd3db)||$nilai_pd3db==0){
                $perjadin3="UPDATE tb_anggar SET realisasi = realisasi+'$nilai_pd3' WHERE cek_kd2 = '$akun_pd3' ";
                $this->db->query($perjadin3);
            } else if( $nilai_pd3!=null || !empty($nilai_pd3)&& !empty($nilai_pd3db)||$nilai_pd3db!=0){
                $this->update_realisasi($data);
            };
            if( $nilai_hr!=null || !empty($nilai_hr)){
                if(empty($nilai_hrdb) && $nilai_hrdb==null && $nilai_hrdb==0){
                    $honorarium="UPDATE tb_anggar SET realisasi = realisasi+'$nilai_hr' WHERE cek_kd2 = '$akun_hr' ";
                    $this->db->query($honorarium);
                } else {
                    $this->update_realisasi($data);
                }
            } 
        };
    }
    public function update_realisasi($data)
    {
        if ($this->fungsi->user_login()->nama=='Putri Nailatul Himma'){
            $nilai        = $data['nak'];
            $akun       = $data['ak'];
            $nilaidb    = $data['nilai_db'];
            $akundb   = $data['akun_db'];
            $hapus="UPDATE tb_anggar SET realisasi = realisasi-$nilaidb WHERE cek_kd2 = '$akundb' ";
            $update="UPDATE tb_anggar SET realisasi = realisasi+'$nilai' WHERE cek_kd2 = '$akun' ";
            $this->db->query($hapus);
            $this->db->query($update);
        } else {
            $nilai_pd1=$data['npd1'];
            $akun_pd1=$data['pd1'];
            $nilai_pd1db=$data['npd1db'];
            $akun_pd1db=$data['pd1db'];
            $nilai_pd2=$data['npd2'];
            $akun_pd2=$data['pd2'];
            $nilai_pd2db=$data['npd2db'];
            $akun_pd2db=$data['pd2db'];
            $nilai_pd3=$data['npd3'];
            $akun_pd3=$data['pd3'];
            $nilai_pd3db=$data['npd3db'];
            $akun_pd3db=$data['pd3db'];
            $nilai_hr=$data['nhr'];
            $nilai_hrdb=$data['nhrdb'];
            $akun_hr=$data['hr'];

            if( $nilai_pd1!=null || empty($nilai_pd1)){
                $hapuspd1="UPDATE tb_anggar SET realisasi = realisasi-'$nilai_pd1db' WHERE cek_kd2 = '$akun_pd1db' ";
                $updatepd1="UPDATE tb_anggar SET realisasi = realisasi+'$nilai_pd1' WHERE cek_kd2 = '$akun_pd1' ";
                $this->db->query($hapuspd1);
                $this->db->query($updatepd1);
            }
            if( $nilai_pd2!=null || empty($nilai_pd2)){
                $hapuspd2="UPDATE tb_anggar SET realisasi = realisasi-'$nilai_pd2db' WHERE cek_kd2 = '$akun_pd2db' ";
                $updatepd2="UPDATE tb_anggar SET realisasi = realisasi+'$nilai_pd2' WHERE cek_kd2 = '$akun_pd2' ";
                $this->db->query($hapuspd2);
                $this->db->query($updatepd2);
            }
            if( $nilai_pd3!=null || empty($nilai_pd3)){
                $hapuspd3="UPDATE tb_anggar SET realisasi = realisasi-'$nilai_pd3db' WHERE cek_kd2 = '$akun_pd3db' ";
                $updatepd3="UPDATE tb_anggar SET realisasi = realisasi+'$nilai_pd3' WHERE cek_kd2 = '$akun_pd3' ";
                $this->db->query($hapuspd3);
                $this->db->query($updatepd3);
            }
            // if( $nilai_hr=null || empty($nilai_hr)){
                $hapushr="UPDATE tb_anggar SET realisasi = realisasi-'$nilai_hrdb' WHERE cek_kd2 = '$akun_hr' ";
                $updatehr="UPDATE tb_anggar SET realisasi = realisasi+'$nilai_hr' WHERE cek_kd2 = '$akun_hr' ";
                $this->db->query($hapushr);
                $this->db->query($updatehr);
            // }
        };
    }
}
