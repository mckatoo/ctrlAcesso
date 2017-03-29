          <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="{{ asset('images/navbar-brand.png') }}"></a>
            </div>
            

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="/">
                        <i class="fa fa-home fa-fw"></i> Principal
                    </a>
                </li>
                
                @if (Auth::user()->tipo->tipo != 'Controlador de Acesso')
                    <li class="dropdown">
                        <a href="{{ route('secretaria.configuracoes') }}">
                            <i class="fa fa-gears fa-fw"></i> Configurações
                        </a>
                    </li>
                @endif
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>{{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ route('register') }}"><i class="fa fa-list-alt fa-fw"></i> Perfil</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="logout" onclick="$('#logout').submit()"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                        {!! Form::open(['route'=>'logout', 'method'=>'POST', 'class'=>'hidden', 'id'=>'logout']) !!}
                        {!! Form::close() !!}
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
        </nav>