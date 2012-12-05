<?php

class grupo_model extends CI_Model
{
    function __construct (){
        parent::__construct();
        $this->table_name = 'user_groups';
        $this->primary_key = 'id';
        $this->order_by = 'id DESC';
    }

	//metodo para selecao
	public function get_all(){
		$query = $this->db->get('user_groups');
		return $query->result();
	}

	//metodo para selecao retorno linha
	public function get_all_roww(){
		$query = $this->db->get('user_groups');
		return $query->row();
	}

	//metodo para seleção do combo de produtos
	public function get_join_combo($id){

		$id = $this->session->userdata('user_id');
		$query = $this->db->select('*');
		$this->db->from('user_groups');
		$this->db->where('codcli ',$id);
		$query = $this->db->get();
		return $query->result();
		//print_r($this->db->last_query());
		exit();
	}

	//metodo que retorna o grupo selecionado
	public function get_combo($id){

		$query = $this->db->select('*');
		$this->db->from('usuario');
		$this->db->join('user_groups', 'usuario.group_id = user_groups.id');
		$this->db->where('usuario.id_usuario ',$id);
		$query = $this->db->get();
		return $query->row();
		//print_r($this->db->last_query());
	}

	//metodo para insercao
	public function add_record($option = array())
	{
		$this->db->insert('user_groups',$option);
		return $this->db->affected_rows();
	}

	public function update_record($option = array())
	{
		//seto os parametros para o update
		if(isset($option['name']))
			$this->db->set('name',$option['name']);
			$this->db->where('id',$option['id']);
			$this->db->update('user_groups');
			return $this->db->affected_rows();
	}
	
	//metodo para deletar
	public function delete_record($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user_groups'); 
		return $this->db->affected_rows();
	}
	
	public function get_by_id($id){
		
		$query = $this->db->get_where('user_groups',
		array('id' => $id));
		return $query->row();
	}
	
	//metodo para busca com active record
	function get_search()
	{
		$match = $this->input->post("search");
		$this->db->like("post_title",$match);
		$qr = $this->db->get("user_groups");
			return $qr;
	}
} 