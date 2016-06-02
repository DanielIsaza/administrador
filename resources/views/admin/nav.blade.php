<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <a class="navbar-brand" rel="home" href="{{ asset('img/logouq.jpg') }}" title="Buy Sell Rent Everyting">
        <img style="width: 40px; height: 40px; margin-top: -7px;"
             src="{{ asset('img/logo.jpg') }}" >
    </a>
      <ul class="nav navbar-nav">
        <li ><a href="{{ route('planEstudios.index') }}"> Plan de estudios</a> </li>
        <li ><a href="{{ route('periodoAcademico.index') }}"> Periodo Academico</a> </li>      
        <li ><a href="{{ route('espaciosAcademicos.index') }}"> Espacios Academicos</a> </li>
        <li ><a href="{{ route('docente.index') }}"> Docentes</a> </li>
        <li ><a href="{{ route('grupos.index') }}"> Grupos</a> </li>      
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reportes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('reporteCompleto.index') }}">Reporte Completo</a></li>
            <li><a href="{{ route('reporteEspacio.index') }}">Reporte por espacio acad&eacute;mico</a></li>
            <li><a href="{{ route('reporteGrupo.index') }}">Reporte por grupo</a></li>
            <li><a href="{{ route('reporteProfesor.index') }}">Reporte por profesor</a></li>
            <li><a href="{{ route('reportePeriodo.index') }}">Reporte por periodo acad&eacute;mico</a></li>
            <li><a href="{{ route('reporteEvaluacion.index') }}">Reporte de evaluaci&oacute;n de desempeño</a></li>
          </ul>
        </li>
        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actas<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li ><a href="{{ route('actaSocializacion.index') }}">Acta Socialización</a></li> 
          <li ><a href="{{ route('actaConcertacion.index') }}">Acta Concertación</a> </li> 
          <li> <a href="{{ route('activar.index') }}">Activar acta</a>
          </ul>
        </li>
    </ul>
      </ul>
      <ul class="nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>