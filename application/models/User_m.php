<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {
    public function login($post){
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('username',$post['username']);
        $this->db->where('password',sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }
    public function user_online($post) {
        // bingungggg.......
    }
    public function get($id=null)
    {
        $this->db->from ('tb_user');
        if($id != null) {
            $this->db->where('user_id',$id);
        }
        $query= $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['nama']=$post['nama'];
        $params['username']=$post['username'];
        $params['password']=sha1($post['password']);
        $params['subs']=$post['subs'];
        $params['bpp']=$post['bpp'];
        $params['level']=$post['level'];
        $this->db->insert('tb_user',$params);
    }
    public function edit($post)
    {
        $params['nama']=$post['nama'];
        $params['username']=$post['username'];
        if(!empty($post['password'])){
            $params['password']=sha1($post['password']);
        }
        $params['subs']=$post['subs'];
        $params['bpp']=$post['bpp'];
        $params['level']=$post['level'];
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('tb_user',$params);
    }
    public function editpass($post)
    {
        $params['password']=sha1($post['passwordbaru']);
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('tb_user',$params);
    }

    public function del($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('tb_user');
    }


}
