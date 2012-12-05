<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MX_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library(array('session'));
    $this->load->model(array('Mediatutorialauth','mediatutorialutils'));
    $this->load->library('encrypt');
    $this->load->helper('date','html');
    $id_user = $this->session->userdata('user_id');

    $this->session->set_userdata('user_id', $id_user);
    $this->perm->setup_user_privileges();
  }

  public function index()
  {

    if($this->Mediatutorialauth->check_logged()===FALSE)
            redirect(base_url().'login/');
        else{
                 echo '<pre>';
             print_r($this->session->all_userdata());
               $this->load->view('tests');
        }


  }
}