<header class="main-header">
  <a href="index.php?action=inicio" class="logo" style="background-color: #2E3537">
    <!-- Logo mini -->
    <span class="logo-mini px-0">
      <img src="view/img/plantilla/truper-logo-sm.png" class="img-responsive">
    </span>
    <!-- Logo normal -->
    <span class="logo-lg">
      <img src="recursos/Truper.jpg" class="img-responsive">
    </span>
  </a>


  <!-- NAVBAR -->
  <nav class="navbar navbar-static-top navbar-dark" role="navigation" style="background-color: #f4753c">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only"> texto </span>
    </a>

    <!-- perfil de usuario -->
    <div class="navbar-custom-menu dropdown">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img id="user_img_nav" src="view/img/usuarios/default/anonymous.png" class="user-image" alt="user-image">
            <span id="user_name_nav" class="hidden-xs">Usuario Administrador</span>
          </a>

          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header" style="background-color: #f4753c">
              <img id="user_img" src="view/img/usuarios/default/anonymous.png" width="160" height="160" class="img-circle" alt="User Image">

              <p  id="user_name_dropdown">
                Usuario
                <small>Miembro</small>
              </p>
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn text-white btn-info btn-flat" id="btn-profile-view">Perfil</a>
              </div>
              <div class="pull-right">                
                <a href="#" class="btn text-white btn-success btn-flat" id="qsLoginBtn">Iniciar Sesión</a>
                <a href="#" class="btn text-white btn-danger btn-flat" id="qsLogoutBtn">Cerrar Sesión</a>
              </div>
            </li>
          </ul>
        </li>

        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>

      </ul>
    </div>
  </nav>
</header>