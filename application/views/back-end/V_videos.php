<?php 
//INCLUDES
$this->load->view('back-end/includes/header.php'); 
$this->load->view('back-end/includes/menu-top.php'); 
$this->load->view('back-end/includes/menu.php');
//MODAIS
$this->load->view('back-end/modais/videos/visualizar_videos.php'); 
$this->load->view('back-end/modais/videos/excluir_videos.php'); 

?>
<?php 
//Notificação recebida pela session
if(isset($_SESSION['success'])):
  echo "<script>$(function(){
    $.notify('".$this->session->flashdata('success')."', 'success'); 
  });</script>";
elseif(isset($_SESSION['danger'])):
 echo "<script>$(function(){
  $.notify('".$this->session->flashdata('danger')."', 'danger'); 
});</script>";
endif;
?>

<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"> <?php echo $titulo ?></h3>
    </div>

    <div class="panel-body corpo" >
      <div class="content-row"  >
        <div class="row" style="font-size: 15px; position: relative;" >
          <div class="pull-right" >
           <a href="<?php echo base_url('dashboard/videos/upload') ?>"><button type="button" class="btn btn-primary">Enviar Video</button></a>
         </div>
         <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Video</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($resultVideos as $videos): ?>
              <tr>
                <td>
                  <div class="media">
                    <a href="#" class="pull-left">
                      <img src="<?php echo base_url('assets/back/dist/img/bg-vid.jpg') ?>" class="media-photo">
                    </a>
                    <div class="media-body">
                      <h4 ><?php echo $videos->vid_titulo ?></h4>
                      <!-- LIMITANDO A QUANTIDADE DE CARACTERES DA DESCRICAO E ADICIONAR '...' NO FINAL -->
                      <p class="summary" ><?php echo mb_strimwidth($videos->vid_descricao,0,80,'...'); ?></p>
                      <p class="summary" ><b>Autor:</b> <?php echo $videos->usu_nome ?></p>
                      <!-- HELPER dataExtenso converter do BD para extenso. -->
                      <p class="summary last" ><?php echo dataExtenso($videos->vid_data) ?></p> 
                    </div>
                  </div>
                </td>
                <td> 
                  <!-- INICIO MENU DROPDOWN -->
                  <div class="btn-group opcao">
                    <span  class="glyphicon glyphicon-option-vertical dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer">
                    </span>
                    <ul class="dropdown-menu">
                      <li><a href="#" data-video="<?php echo $videos->vid_video ?>" data-toggle="modal" data-target="#visualizarVideo" >Visualizar</a></li>
                      <!-- CHAMA O METODO EDITAR PASSANDO O PARAMETRO O ID INDICADO NO FOREACH -->
                      <li><a href="<?php echo base_url('dashboard/videos/editar/'.$videos->idvideos) ?>">Editar</a></li>
                      <!--ATRIBUINDO O ID DO VIDEO CADASTRADO NO DATA-IDVIDEOS PARA MANDAR PARA O MODAL  -->
                      <li><a href="#" data-idvideos="<?php echo $videos->idvideos ?>" data-toggle="modal" data-target="#excluirVideos">Excluir</a></li>
                    </ul>
                  </div>
                </td>
                
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div><!-- FIM ROW -->
    </div><!-- FIM CONTENT-ROW -->
  </div><!-- FIM CORPO -->
</div><!-- FIM PANEL -->
</div><!-- FIM CONTENT -->
</div>

<!--footer-->
<?php $this->load->view('back-end/includes/footer.php') ?>
