<?php $this->load->view('back-end/includes/header.php') ?>
<?php $this->load->view('back-end/includes/menu-top.php') ?>
<?php $this->load->view('back-end/includes/menu.php') ?>

<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Dashboard</h3>
    </div>

    <div class="panel-body corpo" >
     <div class="content-row">
      <h2 class="content-row-title">Bem vindo! :)</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="color-swatchesp">
            <div class="swatchesp" >
              <div class="lightp">
                <span class="titlep" ><h4>Videos</h4></span>
              </div>
              <div class="infosp">
                <p><?php echo $numVideos ?> Videos Inseridos</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="color-swatchesp">
            <div class="swatchesp" >
              <div class="lightp">
                <span class="titlep" ><h4>Categorias</h4></span>
              </div>
              <div class="infosp">
                <p><?php echo $numCategorias ?> Categorias Cadastradas</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="color-swatchesp">
            <div class="swatchesp" >
              <div class="lightp">
                <span class="titlep" ><h4>Usuarios</h4></span>
              </div>
              <div class="infosp">
                <p><?php echo $numUsuarios ?> Usuarios Cadastrados</p>
              </div>
            </div>
          </div>
        </div>

      </div><!--FIM ROW -->
    </div><!--FIM CONTENT-ROW -->
  </div><!-- FIM CORPO -->
</div><!-- FIM PANEL -->
</div><!-- FIM COL -->
</div>
<!--footer-->
<?php $this->load->view('back-end/includes/footer.php') ?>
