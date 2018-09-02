<?php $this->load->view('back-end/includes/header.php') ?>
<?php $this->load->view('back-end/includes/menu-top.php') ?>
<?php $this->load->view('back-end/includes/menu.php') ?>

<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"> <?php echo $titulo ?></h3>
    </div>

    <div class="panel-body corpo" >
      <div class="content-row"  >
        <?php echo form_open_multipart('dashboard/videos/add_video'); ?>
        <div class="row">
          <div class="col-md-12">
            <label for="">Titulo</label>
            <input type="text" name="vid_titulo" class="form-control" required >
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <label for="">Descrição</label>
            <textarea rows="3" name="vid_descricao" class="form-control" required></textarea>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <label for="">Autor</label>
            <select class="form-control" name="vid_autor">
              <option value="0"></option>
              <?php foreach($usuarios as $usuario): ?>
                <option value="<?php echo $usuario->usu_id ?>"><?php echo $usuario->usu_nome ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <label for="">Video</label>
            <input type="file" id="video" name="vid_video" class="form-control" required >
          </div>
        </div>

        <div class="row">
          <div class="col-md-5">
            <button type="submit" id="button" name="submit" value="Submit" class="btn btn-primary">Cadastrar</button>
          </div>
        </div>
        <?php form_close(); ?>
      </div><!-- FIM CONTENT-ROW -->
    </div><!-- FIM CORPO -->
  </div><!-- FIM PANEL -->
</div><!-- FIM CONTENT -->
</div>

<!--footer-->
<?php $this->load->view('back-end/includes/footer.php') ?>
