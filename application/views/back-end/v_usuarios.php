<?php 
//INCLUDES
$this->load->view('back-end/includes/header.php'); 
$this->load->view('back-end/includes/menu-top.php'); 
$this->load->view('back-end/includes/menu.php'); 
//MODAIS
$this->load->view('back-end/modais/usuarios/modal_cadastrar'); 
$this->load->view('back-end/modais/usuarios/modal_editar'); 
$this->load->view('back-end/modais/usuarios/modal_excluir'); 

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
    <?php if($this->session->flashdata("errorform")): ?>
      <p class="alert alert-danger" style="margin-top:10px; color: white"><?php echo $this->session->flashdata("errorform");  ?></p>
    <?php endif; ?>

    <div class="panel-body corpo" >
      <div class="content-row"  >
        <div class="row" style="font-size: 15px">
          <div class="pull-right" >
           <button type="button" data-toggle="modal" data-target="#modal_cadastrar"title="Inserir categoria" data-placement="left" data-balao="tooltip" class="btn btn-primary btn-circle btn-lg"><i class="glyphicon glyphicon-plus"></i>
           </button>
         </div>
         <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th style="width: 1px"></th>
              <th style="width: 1px"></th>
            </tr>
          </thead>
          <tbody>
           <?php
           foreach($resultUsuarios as $usuario): ?>
            <tr>
              <td><?php echo $usuario->usu_nome ?></td>
              <td><?php echo $usuario->usu_email ?></td>
              

              <td><a href="#" data-balao="tooltip" title="Editar"
               data-nome="<?php echo $usuario->usu_nome ?>" 
               data-id="<?php echo $usuario->usu_id ?>"
               data-email="<?php echo $usuario->usu_email ?>" 
               data-toggle="modal" data-target="#modal_editar" ><span class="glyphicon glyphicon-pencil edit" ></span></a></td>
               <td><a href="#" data-balao="tooltip" title="Excluir" data-id="<?php echo $usuario->usu_id ?>" data-toggle="modal" data-target="#modal_excluir"><span class="glyphicon glyphicon glyphicon-remove remov"></span></a></td>

             </tr>
           <?php endforeach; ?>
         </tbody>
       </table>

     </div><!-- FIM ROW -->
   </div><!-- FIM CONTENT-ROW -->
 </div><!-- FIM CORPO -->
</div><!-- FIM PANEL -->
</div><!-- FIM CONTENT-->
</div>

<!--footer-->
<?php $this->load->view('back-end/includes/footer.php') ?>
