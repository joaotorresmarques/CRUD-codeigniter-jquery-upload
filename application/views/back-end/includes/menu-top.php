<!--nav-->
<nav role="navigation" class="navbar navbar-custom">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a href="<?php echo base_url() ?>" class="navbar-brand">Videos Legais - Dashboard</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $this->session->nome ?> <b class="caret"></b></a>
          <ul role="menu" class="dropdown-menu">
            <li class="disabled"><a href="#" data-toggle="modal" data-target="#modal_novasenha">Alterar senha</a></li>
            <li class="disabled"><a href="<?php echo base_url('home/logout') ?>">Logout</a></li>
          </ul>
        </li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<?php $this->load->view('back-end/modais/modal_novasenha'); ?>
