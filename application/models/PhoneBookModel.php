<?php

class PhoneBookModel extends CI_Model {

    const TABLE_NAME = 'phone_book';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('datatables');
        $this->datatables->from(self::TABLE_NAME);
    }

    public function getDatatable($userId)
    {
        $this->datatables->select('id AS DT_RowId, name, phone_number, date_created, notes')->where('user_id', $userId);
        return $this->datatables->generate('json', 'ISO-8859-1');
    }

    public function addRecord($data)
    {
        return $this->db->insert(self::TABLE_NAME, $data);
    }

    public function editRecord($id, $user_id, $data){
        $record = $this->db->select()->from(self::TABLE_NAME)->where('id', $id)->where('user_id', $user_id)->limit(1)->get()->result_array();
        if($record){
            $data['date_created'] = $record[0]['date_created'];
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->where('user_id', $user_id);
            $this->db->update(self::TABLE_NAME);
        }
    }

    public function removeRecord($id, $user_id){
        $record = $this->db->select()->from(self::TABLE_NAME)->where('id', $id)->where('user_id', $user_id)->limit(1)->get()->result_array();
        if($record){
            $this->db->delete(self::TABLE_NAME, array('id' => $id));
            return true;
        }

        return false;
    }

    public function lastRecord()
    {
        return $this->db->select('id AS DT_RowId, name, phone_number, date_created, notes')->from(self::TABLE_NAME)->order_by('id', 'desc')->limit(1)->get()->result_array();
    }

}