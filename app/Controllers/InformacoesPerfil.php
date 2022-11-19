<?php
namespace App\Controllers;

use App\Models\InformacoesModel;
use Exception;

class InformacoesPerfil extends BaseController{
    //Todos os Inputs podem ser renomeados!!
    public function index()
    {
        try {
            //aqui eu estava tentando salvar a imagem, pode mudar e tirar isso aqui 
            /*$config["upload_path"] = 'public/imagens';

            $this->load->library('upload', $config);
            if($this->upload->do_upload('fotoPerfil')){
                $msg = $this->upload->display_errors();
                $this->session->set_flashdata('msg',$msg);
            } else{
                $msg="Upload realizado com sucesso!";
                $this->session->set_flashdata('msg', $msg);
            }*/

            /*var_dump($this->request->getFile(0));
            exit();
            $destino1 = 'public/imagens' . $_FILES['fotoPerfil']['name'];
            $arquivo_tmp = $_FILES['fotoPerfil']['tmp_name'];
            move_uploaded_file( $arquivo_tmp, $destino1  );

            $destino2 = 'public/imagens' . $_FILES['fotoTrabalho1']['name'];
            $arquivo_tmp = $_FILES['fotoTrabalho1']['tmp_name'];
            move_uploaded_file( $arquivo_tmp, $destino2  );

            $destino3 = 'public/imagens' . $_FILES['fotoTrabalho2']['name'];
            $arquivo_tmp = $_FILES['fotoTrabalho2']['tmp_name'];
            move_uploaded_file( $arquivo_tmp, $destino3  );

            $destino4 = 'public/imagens' . $_FILES['fotoTrabalho3']['name'];
            $arquivo_tmp = $_FILES['fotoTrabalho3']['tmp_name'];
            move_uploaded_file( $arquivo_tmp, $destino4  );*/

            //isso aqui eu acho q tá certo:

            $informacoesModel = new InformacoesModel();
        
            $informacoesModel->insert([
                'id_usuario' => $this->request->getPost('id_usuario'),
                'foto_perfil' => $destino1, 
                'descricao' => $this->request->getPost('descricao'),
                'foto_trabalho1' => $destino2,
                'foto_trabalho2' => $destino3,
                'foto_trabalho3' => $destino4,
                'portifolio' => $this->request->getPost('portifolio'),
                'linkedin' => $this->request->getPost('fnomeLinkedin'),
                'instagram' => $this->request->getPost('nomeInstagram'),
            ]);
        }catch (\Exception $e) {
            echo $e->getMessage();
            exit();
        }
        
    }

}