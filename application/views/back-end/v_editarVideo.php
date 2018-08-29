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
        <?php echo form_open_multipart('dashboard/videos/editar_salvar'); ?>
        <div class="row">
          <div class="col-md-6">
            <video width="100%" height="250px" controls>
              <source src="<?php echo base_url('upload/'.$sqlEditar[0]->vid_video.' ?>') ?>" type="video/mp4">
              </video>
            </div>
            <!-- GUARDA O ID -->
            <input type="hidden" name="vid_id" value="<?php echo $sqlEditar[0]->vid_id ?>">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label for="">Titulo</label>
                  <input type="text" name="vid_titulo" class="form-control" required value="<?php echo $sqlEditar[0]->vid_titulo ?>">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <label for="">Descrição</label>
                  <textarea rows="3" name="vid_descricao" class="form-control" required value=""><?php echo $sqlEditar[0]->vid_descricao ?></textarea>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <label for="">Autor</label>
                  <select class="form-control" name="vid_autor">
                    <option value="0"></option>
                    <?php foreach($getusu as $row): ?>
                      <!--VERIFICÃO DA SELEÇÃO DO AUTOR -->
                      <option value="<?php echo $row->usu_id ?>" <?php echo $row->usu_id==$sqlEditar[0]->vid_autor ? 'selected':'' ?>><?php echo $row->usu_nome ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div><!--FIM COLUNA INPUTS -->
          </div>

          <div class="row pull-right">
            <div class="col-md-5">
              <button type="submit" id="button" name="submit" value="Submit" class="btn btn-primary">Editar</button>
              <?php form_close(); ?>
            </div>
          </div>
          
        </div><!-- FIM CONTENT-ROW -->
      </div><!-- FIM CORPO -->
    </div><!-- FIM PANEL -->
  </div><!-- FIM COL-->
</div>

<!--footer-->
<?php $this->load->view('back-end/includes/footer.php') ?>
