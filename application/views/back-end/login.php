<?php $this->load->view('back-end/includes/header.php') ?>

<div class="container">
  <?php echo form_open('home/logar','class="form-signin1"') ?>
  <h3 class="form-signin-heading1">Bem vindo! :)</h3>
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">
        <i class="glyphicon glyphicon-user"></i>
      </div>
      <input type="text" class="form-control" name="usu_email" id="usu_email" placeholder="email@email.com"/>
    </div>
  </div>

  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">
        <i class=" glyphicon glyphicon-lock "></i>
      </div>
      <input type="password" class="form-control" name="usu_senha" id="usu_senha" placeholder="Digite sua senha" />
    </div>
  </div>
  <!--MENSAGEM DE ERRO CASO LOGIN/SENHA ESTIVEREM INCORRETOS -->
  <?php if($this->session->flashdata("danger")): ?>
    <p class="alert alert-danger" style="margin-top:10px; color: white"><?php echo $this->session->flashdata("danger");  ?></p>
  <?php endif; ?>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Logar</button>
  <?php echo form_close(); ?>
</div><!--FIM CONTAINER -->

<!-- TAGS FINAIS -->
</body>
</html>
