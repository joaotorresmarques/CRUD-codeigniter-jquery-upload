<div class="modal fade bd-example-modal-sm" id="modal_novasenha" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Alterar senha</h4>
      </div>

      <div class="modal-body">
        <?php echo form_open('dashboard/usuarios/senha'); ?>
        <div class="row">
          <div class="col-md-12">
            <label class="labelform">Senha Atual</label>
            <input class="form-control" placeholder="Digite sua senha atual..." type="text" name="senhaatual"  required >
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 toprow">
            <label class="labelform">Nova Senha</label>
            <input class="form-control" placeholder="Digite a nova senha..." onkeyup="checarSenha()" type="text" name="novasenha" id="novasenha"  required >
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 toprow">
            <label class="labelform">Confirmar Senha</label>
            <input class="form-control" placeholder="Confirme a senha" onkeyup="checarSenha()" type="text" name="novasenha_confirmar" id="novasenha_confirmar" required >
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 toprow">
            <div id="divcheck">

            </div>
          </div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="enviarsenha" disabled>Cadastrar</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>

<!-- VERIFICAR INPUT NOVASENHA/CONFIRMAR NOVA SENHA -->
<script>
  $(document).ready(function(){
    $("#novasenha").keyup(checkPasswordMatch);
    $("#novasenha_confirmar").keyup(checkPasswordMatch);
  });

  function checarSenha(){
    var password = $("#novasenha").val();
    var confirmPassword = $("#novasenha_confirmar").val();

    if(password != confirmPassword || password == '' || confirmPassword == ''){
      $("#divcheck").html("<span style='color:red'>Senhas não conferem!</span>");
      document.getElementById("enviarsenha").disabled = true;
    }else{
      $("#divcheck").html("<span style='color:green'>Senhas iguais! :)</span>");
      document.getElementById("enviarsenha").disabled = false;
    }
  }
</script>