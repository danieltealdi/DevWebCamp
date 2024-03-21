<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/dashboard" class="dashboard__enlace <?php echo paginaActual('dashboard')?'dashboard__enlace--actual':''?>">
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu-text">
                Inicio
            </span>
        </a>
        <a href="/admin/ponentes" class="dashboard__enlace <?php echo paginaActual('ponentes')?'dashboard__enlace--actual':''?>">
            <i class="fa-solid fa-microphone dashboard__icono"></i>
            <span class="dashboard__menu-text">
                Ponentes
            </span>
        </a>
        <a href="/admin/eventos" class="dashboard__enlace <?php echo paginaActual('eventos')?'dashboard__enlace--actual':''?>">
            <i class="fa-solid fa-calendar dashboard__icono"></i>
            <span class="dashboard__menu-text">
                Eventos
            </span>
        </a>
        <a href="/admin/registrados" class="dashboard__enlace <?php echo paginaActual('registrados')?'dashboard__enlace--actual':''?>">
            <i class="fa-solid fa-users dashboard__icono"></i>
            <span class="dashboard__menu-text">
                Registrados
            </span>
        </a>
        <a href="/admin/regalos" class="dashboard__enlace <?php echo paginaActual('regalos')?'dashboard__enlace--actual':''?>">
            <i class="fa-solid fa-gift dashboard__icono"></i>
            <span class="dashboard__menu-text">
                Regalos
            </span>
        </a>
    </nav>
</aside>