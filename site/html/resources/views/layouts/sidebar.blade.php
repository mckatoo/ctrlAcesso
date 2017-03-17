{{--         <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li id="menuPrincipal"><a href="/">Principal <span class="sr-only">(current)</span></a></li>
            <li id="menuSecretaria"><a href="{{ route('secretaria.index') }}">Secretaria</a></li>
            <li id="menuControle"><a href="#">Controle de Acesso</a></li>
            <li id="menuRelatorios"><a href="#">Relatórios</a></li>
          </ul>
        </div> --}}






	        <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li id="menuPrincipal"><a href="/"><i class="fa fa-home fa-fw"></i> Principal <span class="sr-only">(current)</span></a></li>
                        <li id="menuSecretaria"><a href="{{ route('secretaria.index') }}"><i class="fa fa-archive fa-fw"></i> Secretaria</a></li>
                        <li id="menuControle"><a href="#"><i class="fa fa-users fa-fw"></i> Controle de Acesso</a></li>
                        <li id="menuRelatorios"><a href="#"><i class="fa fa-file fa-fw"></i> Relatórios</a></li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->