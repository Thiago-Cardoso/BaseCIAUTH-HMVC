<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller {

	/**
	 * Thiago Cardoso
	 */
     public function __construct() { 
         parent::__construct();
         
         $this->load->language('home'); //Carrega o arquivo de linguagem
         $this->load->library(array('session', 'form_validation'));
         $this->load->model(array('Mediatutorialauth','Mediatutorialutils'));
         $this->load->helper(array('html','form', 'url'));
     }

    	function index(){
        //geralmente no netbeans ja vem tudo pronto hehe
        if($this->Mediatutorialauth->check_logged()=== true)

           #Carrego o model e dou apelido BD a ele
           $this->load->model('Mediatutorialauth','bd');
            $this->template->set_template('login');
            $this->template->write_view('conteudo','login'); //posso carregar o conteúdo de uma view aqui
            $this->template->render();
          
          if($this->input->post('submit_login')) {
            $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[3]|max_length[20]|xss_clean');
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]|max_length[35]|xss_clean');
            $this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>');
            
            if ($this->form_validation->run() == FALSE){
            }
            else{
              $login_array = array($this->input->post('username'), $this->input->post('password'));
              if($this->Mediatutorialauth->process_login($login_array))
              {
                  //login successfull
                  redirect(base_url().'member/');
              }
              else{
                $sub_data['login_failed'] = "Invalido username ou Senha";
                //$data['body'] = $this->load->view('_login_form',$sub_data , true);
                //  $this->load->view('_output_html', $data);
              }
            }
           }
            else{
              //$this->load->view('_output_html', $data);
            }
      }

        function logout(){
              $this->session->sess_destroy();
        redirect(base_url().'login/');
        }
        
        public function configuracoes()
        {
            //$this->load->config('geral_config');
            $this->load->helper('html');
            
            echo $this->config->item('imagens'); //Como Chamar Item de configuração IMAGEM
            echo br();
            echo $this->config->item('css'); //Como Chamar Item de configuração CSS
            echo br();
            echo $this->config->item('js'); //Como Chamar Item de configuração JS
            echo br();
        }
        
        public function linguagem()
        {
            $this->load->helper('language');
            echo lang('teste');
        }
        
        public function template()
        {
            
            $this->template->write('titulo','login');
            $this->template->write('breadcrumb','Home > subpagina > <a href="#">link</a>');
            
            $this->template->write('conteudo', '<p>Aqui inserimos o conteúdo.</p>');
            
            $this->template->write_view('conteudo','minha_view'); //posso carregar o conteúdo de uma view aqui
            
            #Renderiza o tema
            $this->template->render();
        }
        
        public function modulos()
        {
           #Carrega a library de tabela;
           $this->load->library('table');

           #Carrego o model e dou apelido BD a ele
           $this->load->model('home_model','bd');
           
           #Título da tabela;
           $this->table->set_heading('Name', 'Categoria', 'Valor');
           
           #Chamo o função do model e carrego dentro do gerador de tabela retornando o conteúdo para o template
           $this->template->write('conteudo', $this->table->generate($this->bd->get_last_ten_entries()));
           
           
           
           #renderiza o tempalte
           $this->template->render();
           
        }
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
