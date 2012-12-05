<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends MX_Controller {
    
     private $data = array(
        'dir' => array(
            'original' => 'asset/images/uploaded/',
            'thumb' => 'asset/images/uploaded/'
        ),
          'total' => 0,
          'images' => array(),
          'error' => ''
      );

    function Upload()
    {
        parent::__construct();
        
        $this->load->helper(array('form', 'url','html'));
        $this->load->model(array('Mediatutorialauth'));
    }

    function index()
    {    
          if($this->Mediatutorialauth->check_logged()=== FALSE)
            redirect(base_url().'member_area/');
            else{

                $this->template->set_template('adm');
                $this->template->write_view('conteudo','upload_form'); //posso carregar o conteúdo de uma view aqui
                $this->template->render();
         }
    }

    public function upload_n(){
            if($this->Mediatutorialauth->check_logged()=== FALSE)
            redirect(base_url().'member_area/');
            else{

                $this->template->set_template('adm');
                $this->template->write_view('conteudo','upload'); //posso carregar o conteúdo de uma view aqui
                $this->template->render();
         }
    }

    //metodo de upload
    public function do_upload(){
        
            //$data['title'] = 'Multiple Upload form';
            $subdata = array(
                'error' => '',
                'result' => ''
            );
        
            if($this->input->post('go_upload')) {
            $config['upload_path'] = $this->data['dir']['original'];//'./uploads/'; 
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '1000';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            $config['encrypt_name'] = TRUE;

            //crio os thumb
            $configThumb = array();
            $configThumb['image_library'] = 'gd2';
            $configThumb['source_image'] = '';
            $configThumb['create_thumb'] = TRUE;
            $configThumb['maintain_ratio'] = TRUE;
            $configThumb['width'] = 200;
            $configThumb['height'] = 200;
            /* Load the image library */
            $this->load->library('image_lib');

            $this->load->library('upload', $config);
            $sub_data['result'] = '';
            $result_array = array();
            //$this->create_post();
            //$this->create_post();
           //faço o loop para as fotos
            for ($i = 0; $i <=1; $i++){
                    $file_element_name = 'userfile'.$i;
                     if (!empty($_FILES['userfile'.$i]['name'])) {
                    if (!$this->upload->do_upload($file_element_name))
                        $sub_data['error'] = $this->upload->display_errors();
                    else
                  array_push($result_array,$this->upload->data());
             //pego o id inserido
             //$id = $this->db->insert_id();
             //crio um array
            
             //pego o id inserido
             //$id = $this->db->insert_id();
             //crio um array
             $data = $this->upload->data();

             $uploadedFiles[$i] = $data;
            /* If the file is an image - create a thumbnail */
              $configThumb['source_image'] = $data['full_path'];
              $this->image_lib->initialize($configThumb);
              $this->image_lib->resize();
         
             $data = array(
               'cd_produto' => $this->input->post('cd_produto'),
                'id_categoria' => $this->input->post('id_categoria'),
                'id_subcategoria' => $this->input->post('id_subcategoria'),
                 'foto' => $data['file_name']
            );
              //$this->db->insert('produto_foto',$data); 
              }
            }
            $sub_data['result'] = $result_array;
             @unlink($_FILES[$file_element_name]);
         }
        echo " <script> history.go(-1); alert('Upload foto com sucesso');</script>";
    }

    public function upload_go()
    {
        error_reporting(E_ALL | E_STRICT);

        $this->load->helper("upload.class");
        $upload_handler = new UploadHandler();

        header('Pragma: no-cache');
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Content-Disposition: inline; filename="files.json"');
        header('X-Content-Type-Options: nosniff');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: OPTIONS, HEAD, GET, POST, PUT, DELETE');
        header('Access-Control-Allow-Headers: X-File-Name, X-File-Type, X-File-Size');

        switch ($_SERVER['REQUEST_METHOD']) {
            case 'OPTIONS':
                break;
            case 'HEAD':
            case 'GET':
                $upload_handler->get();
                break;
            case 'POST':
                if (isset($_REQUEST['_method']) && $_REQUEST['_method'] === 'DELETE') {
                    $upload_handler->delete();
                } else {
                    $upload_handler->post();
                }
                break;
            case 'DELETE':
                $upload_handler->delete();
                break;
            default:
                header('HTTP/1.1 405 Method Not Allowed');
        }
    }
}
?>