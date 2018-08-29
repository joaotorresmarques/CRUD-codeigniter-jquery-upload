<!-- EDITAR CATEGORIA -->
<div class="modal fade bd-example-modal-sm" id="editarCategorias" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Editar Categoria</h4>
      </div>

      <div class="modal-body">
        <?php echo form_open('dashboard/Categorias/editar'); ?>
        <div class="row">
          <div class="col-md-12">
            <label class="labelform">Categoria</label>
            <input type="hidden" name="cat_id" id="cat_id"> <!-- ESCONDER ID PARA ALTERAR -->
            <input class="form-control" type="text" name="cat_nome" id="cat_nome" required >
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-warning">Editar</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>