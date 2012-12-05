<?php

class usuario_model extends CI_Model
{
    function __construct (){
        parent::__construct();
        $this->table_name = ' usuario';
        $this->primary_key = 'id_usuario';
        $this->order_by = 'id_usuario DESC';
    }

	//metodo para selecao
	public function get_all(){
		$query = $this->db->get('usuario');
		return $query->result();
	}

	//metodo para seleção do combo de usuarios
	public function get_join_combo($id){

		$id = $this->session->userdata('user_id');
		$query = $this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('codcli ',$id);
		$this->db->where('group_id', 3);
		$query = $this->db->get();
		return $query->result();
		print_r($this->db->last_query());
		exit();
	}

	//metodo para seleção do combo de consultores
	public function get_combo_consult($id){

		$id = $this->session->userdata('user_id');
		$query = $this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('codcli ',$id);
		$this->db->where('group_id', 2);
		$query = $this->db->get();
		return $query->result();
		//print_r($this->db->last_query());
		//exit();
	}


	//metodo para retorno de usuarios e grupos
	public function get_by_id_join2($id){
		
		$query = $this->db->select('*');
		$this->db->from('usuario');
		$this->db->join('user_groups', 'usuario.group_id = user_groups.id');
		$this->db->where('usuario.id_usuario', $id);
		$query = $this->db->get();
		return $query->row();
		//print_r($this->db->last_query());
		//exit(); 
	}

	//metodo para retorno de usuarios e grupos
	public function get_by_id_join($id){
		
		$id = $this->session->userdata('user_id');

		$query = $this->db->select('*');
		$this->db->from('usuario');
		$this->db->join('user_groups', 'usuario.group_id = user_groups.id');
		$this->db->where('usuario.codcli', $id);
		$query = $this->db->get();
		return $query->result();
		//print_r($this->db->last_query());
		//exit();
	}

	//metodo para retorno de usuarios e grupos
	public function get_by_id_join_controle($id){
		
		$id = $this->session->userdata('user_id');
		$this->db->from('usuario');
		$this->db->where('usuario.codcli', $id);
		$this->db->where('usuario.group_id', 3);
		$query = $this->db->get();
		return $query->result();
		//print_r($this->db->last_query());
		//exit();
	}


	//metodo para retorno de usuarios/promotor
	public function get_by_id_join_controle_marc($id){
		
		$id = $this->session->userdata('user_id');
		$this->db->from('usuario');
		$this->db->where('usuario.codcli', $id);
		$this->db->where('usuario.group_id', 4);
		$query = $this->db->get();
		return $query->result();
		//print_r($this->db->last_query());
		//exit();
	}

	//metodo para contatos fechados pelo consultor
	public function get_by_id_join_controle_consult($id){
		
		$id = $this->session->userdata('user_id');
		$this->db->from('usuario');
		$this->db->where('usuario.codcli', $id);
		$this->db->where('usuario.group_id', 2);
		$query = $this->db->get();
		return $query->result();
		//print_r($this->db->last_query());
		//exit();
	}

	//conta o total de contatos feito pelo usuario
	function busca_count_rows($id_import, $tabela, $id_user )
       {
       		  
               $this->db->where('contatos.id_usuario', $id_user );
				$this->db->where('contatos.group_id', 3);
               $this->db->where('codcli', $id_import );
               //$this->db->get();
               //$this->db->like($campos,$valores );
             return $this->db->count_all_results($tabela);
               print_r($this->db->last_query());
       }

       //conta o total de contatos feito pelo usuario
	function busca_count_rows_lig($id_import, $tabela, $id_user )
       {
       		   //$this->db->join('contatos_ligacao', 'contatos.id_usuario = contatos_ligacao.id_usuario');
               $this->db->where('id_usuario', $id_user );
             //  $this->db->where('contatos.codcli', $id_import );
               //$this->db->get();
               //$this->db->like($campos,$valores );
             return $this->db->count_all_results($tabela);
               print_r($this->db->last_query());
       }

       //conta o total de contato feito pelo promotor
       function busca_count_rows_promo($id_import, $tabela, $id_user )
       {
       		  $this->db->join('contatos_promo', 'contatos.idContato = contatos_promo.id_contato');
               $this->db->where('contatos_promo.id_usuario', $id_user );
				$this->db->where('contatos_promo.group_id', 4);
               $this->db->where('contatos_promo.codcli', $id_import );
               //$this->db->get();
               //$this->db->like($campos,$valores );
             return $this->db->count_all_results($tabela);
               print_r($this->db->last_query());
       }

       //conta o total de contatos fechado pelo consultor
        function busca_count_rows_consult($id_import, $tabela, $id_user )
       {
       		  $this->db->join('contatos_consult', 'contatos.idContato = contatos_consult.id_contato');
       		  $this->db->join('contatos_promo', 'contatos.idContato = contatos_promo.id_contato');
              $this->db->where('contatos_consult.id_usuario', $id_user );
			  $this->db->where('contatos_consult.group_id', 2);
              $this->db->where('contatos_consult.codcli', $id_import );
              $this->db->where('contatos_promo.status',3);
               //$this->db->get();
               //$this->db->like($campos,$valores );
             return $this->db->count_all_results($tabela);
               print_r($this->db->last_query());
       }


	//metodo para retorno de usuarios e grupos
	public function get_by_id($id){
		
		$query = $this->db->get_where('usuario',
		array('id_usuario' => $id));
		return $query->row();
	}

	//metodo para insercao
	public function add_record($option = array())
	{
		$this->db->insert('usuario',$option);
		return $this->db->affected_rows();
	}

	public function update_record($option = array())
	{	

		$rand_salt = $this->Mediatutorialutils->genRndSalt();
     
		//seto os parametros para o update
		if(isset($option['usu_nome']))
			$this->db->set('usu_nome',$option['usu_nome']);
		if(isset($option['username']))
			$this->db->set('username',$option['username']);
		if(isset($option['password']))
		    $encrypt_pass = $this->Mediatutorialutils->encryptUserPwd( $this->input->post('password'),$rand_salt);
			$this->db->set('password', $encrypt_pass);
		 	$this->db->set('salt', $rand_salt);	
		if(isset($option['group_id']))
			$this->db->set('group_id',$option['group_id']);	
			$this->db->where('id_usuario',$option['id_usuario']);
			$this->db->update('usuario');
			return $this->db->affected_rows();
	}

	public function update_recordv($option = array())
	{	
     
		//seto os parametros para o update
		if(isset($option['id_vinculo']))
			$this->db->set('id_vinculo',$option['id_vinculo']);
			$this->db->where('id_usuario',$option['id_usuario']);
			$this->db->update('usuario');
			return $this->db->affected_rows();
	}
	
	//metodo para deletar
	public function delete_record($id)
	{
		$this->db->where('id_usuario', $id);
		$this->db->delete('usuario'); 
		return $this->db->affected_rows();
	}
	
	//metodo para busca com active record
	function get_search()
	{
		$match = $this->input->post("search");
		$this->db->like("post_title",$match);
		$qr = $this->db->get("usuario");
			return $qr;
	}
} 