<!-- CADASTRAR CATEGORIA -->
<div class="modal fade bd-example-modal-sm" id="modalCategoria" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cadastrar Categoria</h4>
      </div>

      <div class="modal-body">
        <?php echo form_open('dashboard/Categorias/cadastro'); ?>
        <div class="row">
          <div class="col-md-12">
            <label class="labelform">Categoria</label>
            <input class="form-control" placeholder="Ex: Acidentes,Engraçados..." type="text" name="cat_nome">
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