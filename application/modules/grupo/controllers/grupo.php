<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grupo extends MX_Controller{
  
  public function __construct(){

     parent::__construct();

        $this->load->database();
        $this->load->library(array('session'));
        $this->load->model(array('Mediatutorialauth','mediatutorialutils'));
        $this->load->library('encrypt');
        $this->load->helper('date','html');
    }
    

    public function index()
    { 
      if($this->Mediatutorialauth->check_logged()===FALSE)
              redirect(base_url().'login/');
          else{
              $this->selecionar();
          }
    }

  public function cadastrar(){
    
      $this->load->helper('funcoes_helper');
      $this->load->model('grupo_model');

      //chamo a lib
      $this->load->library('form_validation');
      //valido os dados com o form_validation
      $this->form_validation->set_rules('name', 'grupo', 'required|trim|xss_clean');
      $this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>');

      //trato a data para pegar data e hora
      $datestring = "%Y-%m-%d %h:%i:%s";
      $time = time();
      $dataa = mdate($datestring, $time);

      //passo o array com os dados
          $data = array(
          'name' => $this->input->post('name'),
          'date_modified' => $dataa,
          'date_created' =>  $dataa);
          //debug de insert
       //  $str = $this->db->insert_string('grupo', $data);
        // echo $str;

      //faço a verificacao
      if ($this->form_validation->run() == FALSE){
        //metodo para mostrar
        $this->selecionar();  
      }else{
          //busco do model de produto 
         if($this->grupo_model->add_record($data)){
          echo "<script type='text/javascript'>alert('Enviado com Sucesso')</script>";
          sleep(2);  
              redirect('/grupo/cadastrar', 'refresh');  
            }
        }
     }

     public function alt(){
      
     //verifico se esta logado por questão de segurança 
      if($this->Mediatutorialauth->check_logged()===FALSE)
            redirect(base_url().'login/');
        else{
        $this->load->helper('funcoes_helper');
        $this->load->model('grupo_model');

        $id = $this->uri->segment(3); //usado com URL amigavel
        $data['grupo'] = $this->grupo_model->get_by_id($id); 
        $this->template->set_template('adm');
        $this->template->write_view('conteudo','grupo_alt', $data); //posso carregar o conteúdo de uma view aqui
        $this->template->render();
    }
  }

  public function sel(){

    //verifico se esta logado por questão de segurança 
      if($this->Mediatutorialauth->check_logged()===FALSE)
            redirect(base_url().'login/');
        else{

      $this->load->model('grupo_model');
      $id = $this->uri->segment(3); 
      $data['grupo'] = $this->grupo_model->get_by_id($id);
      $this->template->set_template('adm');
      $this->template->write_view('conteudo','grupo_sel', $data); //posso carregar o conteúdo de uma view aqui
      $this->template->render();
    } 
  }

  public function selecionar_form_update()
  {
     //verifico se esta logado por questão de segurança 
      if($this->Mediatutorialauth->check_logged()===FALSE)
            redirect(base_url().'login/');
        else{
      $id = $this->input->get('id'); //usado se nao usar URL Amigavel
      $id = $this->uri->segment(3); //usado com URL amigavel
      
      $this->load->model('grupo_model');
      $data['posts'] = $this->grupo_model->get_by_id($id);
      $this->header();
      $this->template_adm->load('template_adm', 'form_grupo_update',$data);
      $this->footer();
    }
  }

  public function selecionar(){

    //verifico se esta logado por questão de segurança 
      if($this->Mediatutorialauth->check_logged()===FALSE)
            redirect(base_url().'login/');
        else{
        $this->load->model('grupo_model');

        $config['base_url'] = base_url().'grupo/selecionar'; //precisa da url amigavel pra funcionar
        $config['total_rows'] = $this->grupo_model->conta_registro('user_groups');
        $config['per_page'] = 10;
        $config['num_links'] = 1;
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';

        $this->pagination->initialize($config);

        $data['posts'] = $this->grupo_model->get_busca($config['per_page'],(int)$this->uri->segment(3));
        $this->template->set_template('adm');
        $this->template->write_view('conteudo','lista_grupo', $data); //posso carregar o conteúdo de uma view aqui
        $this->template->render();
    }
  }
  
  public function selecionar_list()
  {
    //verifico se esta logado por questão de segurança 
      if($this->Mediatutorialauth->check_logged()===FALSE)
            redirect(base_url().'login/');
        else{
      $id = $this->uri->segment(3); //usado com URL amigavel
      
      $this->load->model('grupo_model');
      $data['posts'] = $this->grupo_model->get_by_id($id);
      $this->template_adm->load('template_adm', 'form_grupo_list',$data);
    } 
  }
  
  public function listar_sel()
  {
    //verifico se esta logado por questão de segurança 
      if($this->Mediatutorialauth->check_logged()===FALSE)
            redirect(base_url().'login/');
        else{
        $this->load->model('grupo_model');
        $data['posts'] = $this->grupo_model->get_all();
        //$this->load->view('lista_grupo',$data); 
        $this->template->set_template('adm');
        $this->template->write_view('conteudo','grupo_listar', $data); //posso carregar o conteúdo de uma view aqui
        $this->template->render();
    }
  }
  
  public function busca_simples(){
    
    //verifico se esta logado por questão de segurança 
      if($this->Mediatutorialauth->check_logged()===FALSE)
            redirect(base_url().'login/');
        else{
    $this->selecionar_busca();
    }
  }
  
  public function selecionar_busca(){
    
    //verifico se esta logado por questão de segurança 
      if($this->Mediatutorialauth->check_logged()===FALSE)
            redirect(base_url().'login/');
        else{
        $this->load->model('grupo_model');
        $data['posts'] = $this->posts->get_all();
        $this->header();
        $this->template_adm->load('template_adm', 'form_simples',$data);
        $this->footer();
    }   
  }
  
  public function apagar_post(){
    $id = $this->uri->segment(3); //usado com URL amigavel
    
    $this->load->model('grupo_model');
    if($this->grupo_model->delete_record($id)){
      
    echo "<script type='text/javascript'>alert('Deletado')</script>";
      //redirect('form_blog');
    } 
  }
  
  public function editar(){
    //$id = $this->input->get('post_id');
    $id = $this->uri->segment(3); //usado com URL amigavel
    $this->load->model('grupo_model');
    $data['grupo'] = $this->grupo_model->get_by_id($id);
    //$this->form_validation->set_rules('nome','nome','trim|required');
    //if($this->form_validation->run())
    //{
      $_POST['id'] = $id;
      if($this->grupo_model->update_record($_POST)){
        //redirect('maincontroller');
        echo "<script type='text/javascript'>alert('Update com Sucesso')</script>";
      }
    //}
    $this->template_adm->load('template_adm', 'grupo_alt',$data);
  }
}
