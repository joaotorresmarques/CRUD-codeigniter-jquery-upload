<div class="modal fade bd-example-modal-sm" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Editar Usuario</h4>
      </div>

      <div class="modal-body">
        <?php echo form_open('dashboard/usuarios/editar'); ?>
        <input type="hidden" name="usu_id" id="usu_id"> <!-- ESCONDER O ID PARA REALIZAR O UPDATE -->
          <div class="row">
            <div class="col-md-12">
              <label class="labelform">Email</label>
              <input class="form-control" placeholder="Digite seu email..." type="text" name="usu_email" id="usu_email"  required >
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label class="labelform">Nome</label>
              <input class="form-control" placeholder="Digite seu nome..." type="text" name="usu_nome" id="usu_nome"  required >
            </div>
          </div>
          
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Editar</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>