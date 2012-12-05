<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Usuario extends MX_Controller{
  
  public function __construct(){
    parent::__construct();
      $this->load->database();
      $this->load->library(array('form_validation'));
      $this->load->helper('funcoes');
      $this->load->library(array('session'));
      $this->load->model(array('Mediatutorialauth'));
      $this->load->library('encrypt');
    }

  function index(){
        if($this->Mediatutorialauth->check_logged()=== FALSE)
            redirect(base_url().'member_area/');
    else{
        if($this->input->post('submit')) {
            $this->form_validation->set_rules('username', 'apelido', 'trim|required|alpha_dash|min_length[3]|max_length[20]|xss_clean');
            $this->form_validation->set_rules('usu_nome', 'nome', 'trim|required|alpha_dash|min_length[3]|max_length[20]|xss_clean');
            $this->form_validation->set_rules('password', 'senha', 'trim|required|min_length[3]|max_length[20]|xss_clean');
           // $this->form_validation->set_rules('email', 'Email',  'trim|required|min_length[3]|max_length[30]|valid_email');
            //$this->form_validation->set_rules('captcha', 'Captcha', 'required');
           $this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>');
            if ($this->form_validation->run() == FALSE){
                 $id = $this->uri->segment(3); 
                 $this->load->model('grupo_model');
                 $this->load->model('usuario_model');
                 $data['grupo'] = $this->grupo_model->get_all();
                 $data['usuario'] = $this->usuario_model->get_by_id_join($id);
                 $this->template->set_template('adm');
                 $this->template->write_view('conteudo','usuario', $data); //posso carregar o conteúdo de uma view aqui
                 $this->template->render();
            }
            else{
                    $usu_status = $this->input->post('usu_status');
                    $username = $this->input->post('username');
                    $usu_nome = $this->input->post('usu_nome');
                    $password = $this->input->post('password');
                    $email = $this->input->post('email');
                    $id_grupo = $this->input->post('group_id');
                    $check_query = "SELECT * FROM `usuario` WHERE `username`='$username'";
                    $query = $this->db->query($check_query);
                    if ($query->num_rows() > 0){
                             $this->template->set_template('adm');
                             $this->template->write_view('conteudo','usuario', $data); //posso carregar o conteúdo de uma view aqui
                             $this->template->render();
                    }
                    else{
                        $rand_salt = $this->Mediatutorialutils->genRndSalt();
                        $encrypt_pass = $this->Mediatutorialutils->encryptUserPwd( $this->input->post('password'),$rand_salt);
                        $id_adm = $this->session->userdata('user_id');
                        $input_data = array(
                            'username' => $username,
                            'usu_nome' => $usu_nome,
                            'password' => $encrypt_pass,
                            'group_id' => $id_grupo,
                            'codcli' => $id_adm,
                            'salt' => $rand_salt,
                            'usu_status' => $usu_status
                        );
                        if($this->db->insert('usuario', $input_data)){
              
                   echo "<script type='text/javascript'>alert('Enviado com Sucesso')</script>";
                          sleep(2);  
                          redirect('/register/', 'refresh');  
                          }
                          else 
                  echo " <script> history.go(-2); alert('Erro na Consulta');</script>";
              }
          }
        }
        else{
             $id = $this->uri->segment(3); 
             $this->load->model('grupo_model');
             $this->load->model('usuario_model');
             $data['grupo'] = $this->grupo_model->get_all();
             $data['usuario'] = $this->usuario_model->get_by_id_join($id);
             $this->template->set_template('adm');
             $this->template->write_view('conteudo','usuario', $data); //posso carregar o conteúdo de uma view aqui
             $this->template->render(); 
        }
    }   
  }

  public function selecionar_form_update()
  {
    //verifico se esta logado por questão de segurança 
      if($this->Mediatutorialauth->check_logged()===FALSE)
            redirect(base_url().'login/');
        else{

    $id = $this->input->get('ID'); //usado se nao usar URL Amigavel
    $id = $this->uri->segment(3); //usado com URL amigavel
    
    $this->load->model('usuario_model');
    $data['posts'] = $this->usuario_model->get_by_id($id);
    $this->header();
    $this->template_adm->load('template_adm', 'form_usuario_update',$data);
    $this->footer();

    }
  }

 //metodo para seleção
  public function listar_sel(){

    //verifico se esta logado por questão de segurança 
      if($this->Mediatutorialauth->check_logged()===FALSE)
            redirect(base_url().'login/');
        else{

         $id = $this->uri->segment(3); 
         $this->load->model('grupo_model');
         $this->load->model('usuario_model');
         $data['grupo'] = $this->grupo_model->get_all();
         $data['usuario'] = $this->usuario_model->get_by_id_join($id);
         $this->template->set_template('adm');
         $this->template->write_view('conteudo','usuario_listar', $data); //posso carregar o conteúdo de uma view aqui
         $this->template->render(); 
    }
  }

  //metodo para seleção
  public function sel(){

    //verifico se esta logado por questão de segurança 
      if($this->Mediatutorialauth->check_logged()===FALSE)
            redirect(base_url().'login/');
        else{

      $this->load->model('usuario_model');
      $this->load->model('grupo_model');

      $id = $this->uri->segment(3); //usado com URL amigavel
      $data['usuario'] = $this->usuario_model->get_by_id($id);
      $data['grup'] = $this->grupo_model->get_combo($id);
      $this->template_adm->load('template_adm', 'usuario_sel', $data);  
    }
  }

   //metodo para seleção
  public function vinculo(){

    //verifico se esta logado por questão de segurança 
      if($this->Mediatutorialauth->check_logged()===FALSE)
            redirect(base_url().'login/');
        else{

    $this->load->model('usuario_model');
    $this->load->model('grupo_model');

    $id = $this->uri->segment(3); //usado com URL amigavel
    $data['usuario'] = $this->usuario_model->get_by_id($id);
        $data['grup'] = $this->usuario_model->get_combo_consult($id);
        $this->header();
    $this->template_adm->load('template_adm', 'usuario_vinculo', $data);  
    $this->footer();

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
  
  //metodo para selecionar a busca
  public function selecionar_busca(){
    
    //verifico se esta logado por questão de segurança 
      if($this->Mediatutorialauth->check_logged()===FALSE)
            redirect(base_url().'login/');
            else{
        $this->load->model('usuario_model');
        $data['posts'] = $this->posts->get_all();
        $this->header();
        $this->template_adm->load('template_adm', 'form_simples',$data);
        $this->footer();
    }   
  }

  //metodo para apagar  
  public function apagar_post(){
    $id = $this->uri->segment(3); //usado com URL amigavel
    
    $this->load->model('usuario_model');
    if($this->usuario_model->delete_record($id)){
      
    echo "<script type='text/javascript'>alert('Deletado')</script>";
      //redirect('form_blog');
    } 
  }

  //metodo que mostra o form de alteração
    public function alt(){

      //verifico se esta logado por questão de segurança 
      if($this->Mediatutorialauth->check_logged()===FALSE)
            redirect(base_url().'login/');
        else{
          $this->load->model('usuario_model');
          $this->load->model('grupo_model');
          
          $id = $this->uri->segment(3); //usado com URL amigavel
          $data['usuario'] = $this->usuario_model->get_by_id_join2($id);
          $data['grup'] = $this->grupo_model->get_combo($id);
          $data['grupo'] =   $this->grupo_model->get_all();
          $this->template->set_template('adm');
          $this->template->write_view('conteudo','usuario_alt', $data); //posso carregar o conteúdo de uma view aqui
          $this->template->render();
      }
    }
  
  //metodo para editar
  public function editar(){
    $id = $this->uri->segment(3); //usado com URL amigavel
    $this->load->model('usuario_model');
    $data['posts'] = $this->usuario_model->get_by_id($id);
    $_POST['id_usuario'] = $id;
      if($this->usuario_model->update_record($_POST)){
        //redirect('maincontroller');
        echo "<script type='text/javascript'>alert('Update com Sucesso')</script>";
        sleep(2);  
            redirect('/usuario', 'refresh');  
      }
    //}
    $this->template->set_template('adm');
    $this->template->write_view('conteudo','usuario_alt', $data); //posso carregar o conteúdo de uma view aqui
    $this->template->render();
  }
}
