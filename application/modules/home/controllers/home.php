<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

     public function __construct() {
         parent::__construct();
         $this->load->language('home'); //Carrega o arquivo de linguagem
         $this->load->helper('url');   

     }
    
	public function index()
	{
		echo '<!DOCTYPE HTML>
		<html lang="pt-br">
			<head>
				<meta charset="UTF-8">
			<title>'. lang('home_titulo') .'</title>
		</head><body>';
    // poi seh eu cheguei a fazer a tela certinho inseri no bd, mais ae pega a linha e remove não consegui na unha é complicado
                
                
		echo lang('conteudo_simples');
                echo heading(lang('titulo_h1'), 1);
                echo anchor($this->uri->segment(1).'/olamundo/10','Acesse aqui para ver o que acontece');
		echo br();
                echo anchor($this->uri->segment(1).'/olamundo/olamundo/10','Você pode fazer dessa forma também; Mas não é o correto');
		echo '</body></html>';
	}
	
	public function olamundo($id)
	{
		echo '<!DOCTYPE HTML>
		<html lang="pt-br">
			<head>
				<meta charset="UTF-8">
				<link rel="stylesheet" type="text/css" href="estilo.css">
			<title>HOME TESTE</title>
		</head><body>';
		echo 'Método Ola Mundo dentro do Controller Home';
		echo '<br />';
		echo 'ID passado por referência'.$id;
		echo '<br />';
		echo '<strong>Entendendo o funcionamento da Estrutura! Bora trabalha!!! ;)</strong>';
		echo '</body></html>';
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
            
            $this->template->write('titulo','Aqui é o título');
            
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
