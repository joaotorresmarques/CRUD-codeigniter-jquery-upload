<?php 
//Includes
$this->load->view('back-end/includes/header.php'); 
$this->load->view('back-end/includes/menu-top.php'); 
$this->load->view('back-end/includes/menu.php'); 
//Modais bootstrap
$this->load->view('back-end/modais/categorias/modal_categorias'); 
$this->load->view('back-end/modais/categorias/editar_categorias'); 
$this->load->view('back-end/modais/categorias/excluir_categorias'); 

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
      <h3 class="panel-title"> Categorias</h3>
    </div>

    <!-- NOTIFICAÇÃO PARA O ERRO GERADO PELO SET_RULES() -->
    <?php if($this->session->flashdata("errorform")): ?>
      <p class="alert alert-danger" style="margin-top:10px; color: white"><?php echo $this->session->flashdata("errorform");  ?></p>
    <?php endif; ?>

    <div class="panel-body corpo" >
      <div class="content-row"  >
        <div class="row" style="font-size: 15px">
          <div class="pull-right" >
            <!-- BOTAO PARA ABRIR MODAL INSERIR CATEGORIA -->
            <button type="button" data-toggle="modal" data-target="#modalCategoria"title="Inserir categoria" data-placement="left" data-balao="tooltip" class="btn btn-primary btn-circle btn-lg"><i class="glyphicon glyphicon-plus"></i>
            </button>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th style="width: 1px"></th>
                <th style="width: 1px"></th>
              </tr>
            </thead>
            <tbody>
             <?php
             foreach($resultCategorias as $categorias): ?>
              <tr>
                <td><?php echo $categorias->cat_nome ?></td>
            <!--
              - PASSANDO OS VALORES VINDO DO FOREACH NO ATRIBUTO DATA-  
              - VERIFICAR O ARQUIVO assets/back/dist/js/proprio.js
            -->
            <td><a href="#" data-balao="tooltip" title="Editar"
             data-nome="<?php echo $categorias->cat_nome ?>" 
             data-id="<?php echo $categorias->cat_id ?>" 
             data-toggle="modal" data-target="#editarCategorias" ><span class="glyphicon glyphicon-pencil edit" ></span></a></td>

            <!--
              - PASSANDO OS VALORES VINDO DO FOREACH NO ATRIBUTO DATA-  
              - SERÁ INSERIDO EM UM INPUT HIDDEN NO MODAL.
            -->
            <td><a href="#" data-balao="tooltip" title="Excluir" data-id="<?php echo $categorias->cat_id ?>" data-toggle="modal" data-target="#excluirCategorias"><span class="glyphicon glyphicon glyphicon-remove remov"></span></a></td>

          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div><!-- FIM ROW -->
</div><!-- FIM CONTENT-ROW -->
</div><!-- FIM CORPO -->
</div><!-- FIM PANEL -->
</div><!-- FIM COL -->
</div>

<!--footer-->

<?php $this->load->view('back-end/includes/footer.php') ?>
