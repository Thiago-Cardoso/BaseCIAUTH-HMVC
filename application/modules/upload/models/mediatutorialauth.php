<?php
/***************************************************************************
* Mediatutorial.web.id
*
* di sini untuk passwordnya tidak kita encrypsi
***************************************************************************/

class Mediatutorialauth extends CI_Model {

    function __construct()
    {
        parent::__construct();
            $this->load->library('session'); 
            $this->load->database();
            $this->load->helper('url');
	    $this->load->model(array('Mediatutorialutils'));
    }

	/***************
	* fungsi untuk process dari form login
	* 
	***************/
    
	function process_login($login_array_input = NULL){
            if(!isset($login_array_input) OR count($login_array_input) != 2)
                return false;
            //set variable nya
            $username = $login_array_input[0];
            $password = $login_array_input[1];
            //ambil dari database percobaan
            $query = $this->db->query("SELECT * FROM `usuario` INNER JOIN 
                 user_groups ON usuario.group_id = user_groups.id  WHERE `username`= '".$username."' LIMIT 1");
            if ($query->num_rows() > 0)
            {
                $row = $query->row();
                $user_id = $row->id_usuario;
                $group_id = $row->group_id;
                $codcli = $row->codcli;
                $id_vinculo = $row->id_vinculo;
                $user_pass = $row->password;
		        $user_salt = $row->salt;
                $username = $row->username;
                $usu_nome = $row->usu_nome;
                $group_name = $row->name;
                if($this->Mediatutorialutils->encryptUserPwd( $password,$user_salt) === $user_pass){ 
                    $this->session->set_userdata('user_id', $user_id);
                    $this->session->set_userdata('codcli', $codcli);
                    $this->session->set_userdata('group_id', $group_id);
                    $this->session->set_userdata('id_vinculo', $id_vinculo);
                    $this->session->set_userdata('username', $username);
                    $this->session->set_userdata('usu_nome', $usu_nome);
                    $this->session->set_userdata('name', $group_name);
                   //  $this->session->set_userdata('logged_adm', $codcli);
                    return true;
                }
                return false;
            }
            return false;
	}
	/***************
	* fungsi untuk apakah user telah logged atau belum
	* 
	***************/
	function check_logged(){
		return ($this->session->userdata('user_id'))?TRUE:FALSE;
	}
	/***************
	* fungsi untuk mereturn id user yang sedang login
	* 
	***************/
	function logged_id(){
		return ($this->check_logged())?$this->session->userdata('user_id'):'';
	}
}