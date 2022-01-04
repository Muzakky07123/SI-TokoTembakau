<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Role_model extends CI_Model
{
    // public function getSubMenu()
    // {
    //     $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
    //             FROM `user_sub_menu` JOIN `user_menu`
    //             ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";
    //     return $this->db->query($query)->result_array();
    // }

    public function deleterole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
    }

    public function updaterole($id)
    {
        $data = [
            "role" => $this->input->post('role',true)
        ];

        $this->db->where('id', $id);
        $this->db->update('user_role', $data);
    }
}