<div class="sidepanel-inner d-flex flex-column">
    <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
    <div class="app-branding">
        <a class="app-logo" href="../home.php"><img class="logo-icon me-2" src="../../assets/images/logo-urse.png" alt="logo"><span class="logo-text">URSE</span></a>
    </div>

    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
        <ul class="app-menu list-unstyled accordion" id="menu-accordion">
            <li class="nav-item">
                <a class="nav-link active" href="../home.php">
                    <span class="nav-icon">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
                            <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                        </svg>
                    </span>
                    <span class="nav-link-text">DASHBOARD</span>
                </a>
            </li>

            <li class="nav-item has-submenu">
                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
                    <span class="nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                        </svg>
                    </span>
                    <span class="nav-link-text">Inventario</span>
                    <span class="submenu-arrow">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </span>
                </a>
                <div id="submenu-1" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                        <!-- <li class="submenu-item"><a class="submenu-link" onclick="loadFileInventarioArt('articulos','loadPage')">Artículos</a></li>
                        <li class="submenu-item"><a class="submenu-link" onclick="loadFileInventarioArt('categorias','loadPage')">Categorías</a></li>
                        <li class="submenu-item"><a class="submenu-link" onclick="loadFileInventarioArt('proveedores','loadPage')">Proveedores</a></li> -->
                        <li class="submenu-item"><a class="submenu-link" href="articulos.php">Artículos</a></li>
                        <li class="submenu-item"><a class="submenu-link" href="categorias.php">Categorías</a></li>
                        <li class="submenu-item"><a class="submenu-link" href="proveedores.php">Proveedores</a></li>
                    </ul>
                </div>
            </li>


            <li class="nav-item has-submenu">
                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-1">
                    <span class="nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pc-display" viewBox="0 0 16 16">
                            <path d="M8 1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V1Zm1 13.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Zm2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0ZM9.5 1a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5ZM9 3.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1h-5a.5.5 0 0 0-.5.5ZM1.5 2A1.5 1.5 0 0 0 0 3.5v7A1.5 1.5 0 0 0 1.5 12H6v2h-.5a.5.5 0 0 0 0 1H7v-4H1.5a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5H7V2H1.5Z" />
                        </svg>
                    </span>
                    <span class="nav-link-text">Equipo de cómputo</span>
                    <span class="submenu-arrow">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </span>
                </a>
                <div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                        <!-- <li class="submenu-item"><a class="submenu-link" onclick="loadFileInventario('equipoCompu','loadPage')">Equipo</a></li>
                        <li class="submenu-item"><a class="submenu-link" onclick="loadFileSoporteRedes('rutaRed','loadPage')">Ruta red</a></li> -->
                        <li class="submenu-item"><a class="submenu-link" href="equipoCompu.php">Equipo</a></li>
                        <li class="submenu-item"><a class="submenu-link" href="../Soporte/rutaRed.php">Ruta red</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item has-submenu">
                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-7" aria-expanded="false" aria-controls="submenu-2">
                    <span class="nav-icon">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                            <path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />
                            <circle cx="3.5" cy="5.5" r=".5" />
                            <circle cx="3.5" cy="8" r=".5" />
                            <circle cx="3.5" cy="10.5" r=".5" />
                        </svg>
                    </span>
                    <span class="nav-link-text">Préstamos</span>
                    <span class="submenu-arrow">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </span>
                </a>
                <div id="submenu-7" class="collapse submenu submenu-7" data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                        <li class="submenu-item"><a class="submenu-link" href="prestamos1.php">Realizar préstamo</a></li>
                        <li class="submenu-item"><a class="submenu-link" href="finalizarPrestamo.php">Finalizar préstamo</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item has-submenu">
                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="false" aria-controls="submenu-1">
                    <span class="nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
                            <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0Zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708ZM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11Z" />
                        </svg>
                    </span>
                    <span class="nav-link-text">Mantenimiento</span>
                    <span class="submenu-arrow">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </span>
                </a>
                <div id="submenu-3" class="collapse submenu submenu-3" data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                        <!--<li class="submenu-item"><a class="submenu-link" onclick="loadFileSoporteMantenimiento('solicitarMante','loadPage')">Solicitar</a></li>
                        <li class="submenu-item"><a class="submenu-link" onclick="loadFileSoporteMantenimiento('finalizarMante','loadPage')">Finalizar</a></li>-->
                        <li class="submenu-item"><a class="submenu-link" href="../Soporte/solicitarMante.php">Solicitar</a></li>
                        <li class="submenu-item"><a class="submenu-link" href="../Soporte/finalizarMante.php">Finalizar</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item has-submenu">
                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-4" aria-expanded="false" aria-controls="submenu-1">
                    <span class="nav-icon">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z" />
                            <path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z" />
                        </svg>
                    </span>
                    <span class="nav-link-text">Reportes</span>
                    <span class="submenu-arrow">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </span>
                </a>
                <div id="submenu-4" class="collapse submenu submenu-4" data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                        <!--<li class="submenu-item"><a class="submenu-link" onclick="loadFileInventarioReporte('reportePrestamo','loadPage')">Préstamo</a></li>
                        <li class="submenu-item"><a class="submenu-link" onclick="loadFileInventarioReporte('reporteAsignacion','loadPage')">Asignación</a></li>
                        <li class="submenu-item"><a class="submenu-link" onclick="loadFileSoporte('reporteMante','loadPage')">Mantenimiento</a></li>
                        <li class="submenu-item"><a class="submenu-link" onclick="loadFileSoporte('reporteRedes','loadPage')">Redes</a></li>-->
                        <li class="submenu-item"><a class="submenu-link" href="reportePrestamo.php">Préstamo</a></li>
                        <li class="submenu-item"><a class="submenu-link" href="reporteAsignacion.php">Asignación</a></li>
                        <li class="submenu-item"><a class="submenu-link" href="../Soporte/reporteMante.php">Mantenimiento</a></li>
                        <li class="submenu-item"><a class="submenu-link" href="../Soporte/reporteRedes.php">Redes</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item has-submenu">
                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-5" aria-expanded="false" aria-controls="submenu-2">
                    <span class="nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                        </svg>
                    </span>
                    <span class="nav-link-text">Usuarios</span>
                    <span class="submenu-arrow">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </span>
                </a>
                <div id="submenu-5" class="collapse submenu submenu-5" data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                        <!--<li class="submenu-item"><a class="submenu-link" onclick="loadFileUsuarios('agregarUsuario','loadPage')">Agregar usuario</a></li>
                        <li class="submenu-item"><a class="submenu-link" onclick="loadFileUsuarios('usuarios','loadPage')">Usuarios</a></li>
                        <li class="submenu-item"><a class="submenu-link" onclick="loadFileUsuarios('roles','loadPage')">Roles</a></li>-->
                        <!-- <li class="submenu-item"><a class="submenu-link" onclick="loadFileUsuarios('personal','loadPage')">Personal</a></li> -->
                        <!-- <li class="submenu-item"><a class="submenu-link" href="../usuarios/AgregarUsuario.php">Agregar usuario</a></li> -->
                        <li class="submenu-item"><a class="submenu-link" href="../usuarios/usuarios.php">Usuarios</a></li>
                        <li class="submenu-item"><a class="submenu-link" href="../usuarios/roles.php">Roles</a></li>
                        <!-- <li class="submenu-item"><a class="submenu-link" href="../usuarioso/personal.php">Personal</a></li> -->
                    </ul>
                </div>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-6" aria-expanded="false" aria-controls="submenu-2">
                    <span class="nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-qr-code-scan" viewBox="0 0 16 16">
                            <path d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0v-3Zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5ZM.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5Zm15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5ZM4 4h1v1H4V4Z" />
                            <path d="M7 2H2v5h5V2ZM3 3h3v3H3V3Zm2 8H4v1h1v-1Z" />
                            <path d="M7 9H2v5h5V9Zm-4 1h3v3H3v-3Zm8-6h1v1h-1V4Z" />
                            <path d="M9 2h5v5H9V2Zm1 1v3h3V3h-3ZM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8H8Zm2 2H9V9h1v1Zm4 2h-1v1h-2v1h3v-2Zm-4 2v-1H8v1h2Z" />
                            <path d="M12 9h2V8h-2v1Z" />
                        </svg>
                    </span>
                    <span class="nav-link-text">Escaneo</span>
                    <span class="submenu-arrow">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </span>
                </a>
                <div id="submenu-6" class="collapse submenu submenu-6" data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                        <li class="submenu-item"><a class="submenu-link" href="../Soporte/escaneoEquiposMantenimiento.php">Mantenimiento</a></li>
                        <li class="submenu-item"><a class="submenu-link" href="../Soporte/escaneoEquiposRed.php">Ruta de red</a></li>
                        <li class="submenu-item"><a class="submenu-link" href="../Soporte/escaneoEquipos.php">Traspasos</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</div>