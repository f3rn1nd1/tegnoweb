<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header mx-0 px-0">
            <h3 class="text-center">CORE</h3>
            <strong class="ms-1 p-0 logo-container">
            </strong>
        </div>
        <ul class="list-unstyled components border-0 pt-0">
            <li class="active">
                <b class="ps-3">
                    Visualizar
                </b>
            <li>
                <a class="px-3" href="{{ route('calendario.index') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <b class="ms-2">Calendario</b>
                </a>
            </li>
            <li>
                <a class="px-3" href="{{ route('categorias.index') }}">
                    <i class="fas fa-road"></i>
                    <b class="ms-2">Categorias</b>
                </a>
            </li>

            <b class="ps-3">
                Administrar
            </b>
            <li>
                <a class="px-3" href="{{ route('clientes.index')}}">
                <i class="fas fa-users"></i>
                    <b class="ms-2">Ciudadanos</b>
                </a>
            </li>
          
            <li>
                <a class="px-3" href="{{ route('servicios.index') }}">
                    <i class="fas fa-th-list"></i>
                    <b class="ms-2">Servicios</b>
                </a>
            </li>
            <li>
                <a class="px-3" href="{{route('ofertas.index')}}">
                    <i class="fa-solid fa-address-card"></i>
                    <b class="ms-2">Puestos de trabajo</b>
                </a>
            </li>

            @can('user.index')
            <b class="ps-3">
                Administrar Usuarios
            </b>
            <li>
                <a class="px-3" href="{{url('/user')}}">
                    <i class="fas fa-users"></i>
                    <b class="ms-2">Usuarios</b>
                </a>
            </li>
            
            <b class="ps-3">
                Admin. Extras
            </b>
            <li>
                <a class="px-3" href="{{url('/plazo')}}">
                    <i class="fa-solid fa-hourglass-start"></i>
                    <b class="ms-2">Plazos</b>
                </a>
            </li>
            <li>
                <a class="px-3" href="{{url('/ambito')}}">
                    <i class="fa-solid fa-expand"></i>
                    <b class="ms-2">Ámbitos</b>
                </a>
            </li>
            <li>
                <a class="px-3" href="{{url('/financ')}}">
                    <i class="fa-solid fa-coins"></i>
                    <b class="ms-2">Financiamientos</b>
                </a>
            </li>
            <li>
                <a class="px-3" href="{{url('/capacidad')}}">
                    <i class="fa-solid fa-gears"></i>
                    <b class="ms-2">Capacidades</b>
                </a>
            </li>
            <li>
                <a class="px-3" href="{{url('/labnat')}}">
                    <i class="fa-solid fa-flask"></i>
                    <b class="ms-2">Laboratorios nat.</b>
                </a>
            </li>
            @endcan
            </li>
        </ul>

    </nav>


</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
</body>

</html>