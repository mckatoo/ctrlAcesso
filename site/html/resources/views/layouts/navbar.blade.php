    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><img src="{{ asset('images/navbar-brand.png') }}"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Principal</a></li>
            <li class="menuConfiguracoes"><a href="{{ route('secretaria.configuracoes') }}">Configurações</a></li>
            <li><a href="#">Perfil</a></li>
            <li><a href="#">Ajuda</a></li>
          </ul>
          <form action="{{ route('secretaria.pesquisar') }}" method="POST" enctype="multipart/form-data" class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Pesquisar...">
          </form>
        </div>
      </div>
    </nav>