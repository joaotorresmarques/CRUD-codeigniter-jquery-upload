<div class="modal fade bd-example-modal-sm" id="modal_cadastrar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cadastrar Usuario</h4>
      </div>

      <div class="modal-body">
        <?php echo form_open('dashboard/usuarios/cadastro'); ?>
          <div class="row">
            <div class="col-md-12">
              <label class="labelform">Email</label>
              <input class="form-control" placeholder="Digite seu email..." type="text" name="usu_email">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label class="labelform">Nome</label>
              <input class="form-control" placeholder="Digite seu nome..." type="text" name="usu_nome" >
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <label class="labelform">Senha Provisoria</label>
              <?php $senhaprovisoria = rand() ?>
              <input class="form-control" placeholder="" type="text" name="usu_senha" readonly value="<?php echo $senhaprovisoria?>">
            </div>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Cadastrar</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>