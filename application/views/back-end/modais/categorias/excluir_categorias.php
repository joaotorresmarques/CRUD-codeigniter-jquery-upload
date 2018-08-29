<!-- EXCLUIR CATEGORIA -->
<div class="modal fade bd-example-modal-sm" id="excluirCategorias" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Excluir categoria</h4>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <input type="hidden" id="inpt_idCat"><!-- ESCONDER ID PARA EXCLUIR -->
            Tem certeza que deseja excluir?
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button"" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" id="btn_Deletar" class="btn btn-danger">Excluir</button>
      </div>
    </div>
  </div>
</div>

<!-- PASSA PARA A URL O ID PARA SER EXCLUIDO. -->
<script type="text/javascript">
  $('#btn_Deletar').click(function(){       
    var idCat = $("#inpt_idCat").val();
    $(location).attr('href','<?php echo base_url() ?>/dashboard/categorias/excluir/'+idCat);
  }); 
</script>