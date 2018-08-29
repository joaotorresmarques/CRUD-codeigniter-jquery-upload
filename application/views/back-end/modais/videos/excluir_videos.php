<!-- EXCLUIR VIDEOS -->
<div class="modal fade bd-example-modal-sm" id="excluirVideos" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Excluir Video</h4>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <!--ESCONDENDO O INPUT COM O VALOR DO ID PARA SER EXCLUIDO -->
            <input type="hidden" id="idvideos">
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
    var idvideos = $("#idvideos").val();
    $(location).attr('href','<?php echo base_url() ?>/dashboard/videos/excluir/'+idvideos);
  }); 
</script>