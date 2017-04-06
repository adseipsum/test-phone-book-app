<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PhoneBook extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PhoneBookModel');
    }

    public function index()
	{
		if(!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }

		$this->load->view('phone_book', array('identity' => $this->ion_auth->logged_in()));
	}

    public function getPhoneBookDatatable()
    {
        return $this->output
            ->set_content_type('application/json')
            ->set_output(
                $this->PhoneBookModel->getDatatable($this->session->userdata('user_id'))
            );
    }

    public function actionPhoneBookDatatable()
    {
        $data = $this->input->post('data');

        if(!$data){
            return false;
        }

        switch($this->input->post('action')){
            case 'create':
                $data = $data[0];
                $data['user_id'] = $this->session->userdata('user_id');
                    $this->PhoneBookModel->addRecord($data);
                break;

            case 'edit':
                if($data) foreach($data as $id => $row){
                    $this->PhoneBookModel->editRecord($id, $this->session->userdata('user_id'), $row);
                }
                break;

            case 'remove':
                if($data) foreach($data as $id => $row){
                    $this->PhoneBookModel->removeRecord($id, $this->session->userdata('user_id'));
                }
                break;
            default:
                return false;
        }

        $this->output->set_content_type('application/json')->set_output(json_encode(array('data' => $this->PhoneBookModel->lastRecord()[0])));

    }
}
