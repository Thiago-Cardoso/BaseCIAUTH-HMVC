<?php

class Home_model extends CI_Model
{

    function  __construct()
    {
	parent::__construct();
        
        
    }  
    
    function get_last_ten_entries()
    {
        #Seto a minha configuração/banco de dados
        $this->load->database('test', TRUE);
        
        
        $q = $this->db
                ->select('p.nome as prod, c.nome as cat, p.preco')
                ->from('produtos p')
                ->join('categorias c', 'p.categoria = c.id')
                ->get();
        return $q->result_array();
    }


}

/* End of file welcome_model.php */