<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends MX_Controller {

	/**
	 * Thiago Cardoso
	 */
    
     function __construct()
    {
        parent::__construct();  
        $this->load->library(array('session'));
        $this->load->model(array('Mediatutorialauth'));
        $this->load->helper(array('html','url'));
    }
    
    function index(){
        if($this->Mediatutorialauth->check_logged()===FALSE)
            redirect(base_url().'login/');
        else{
          $this->lista_template();
        }
    }

    public function lista_template(){

      $this->template->set_template('adm');
      $this->template->write_view('conteudo','home_vadm'); //posso carregar o conteúdo de uma view aqui
      $this->template->render();

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
