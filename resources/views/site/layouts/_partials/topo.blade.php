<style>

</style>

<nav class="navbar navbar-expand-lg bg-info">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse menu" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{Route('site.index')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{Route('site.contato') }}">Contatos</a>
          </li>
          @if(Auth::check() === false)
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <small class="badge text-wrap" style="width: 6 rem; fonty: 900; color: black;">Olá, faça seu Login<br>Ou se Cadastre</small>
              </a>
              <ul class="dropdown-menu" style="width: 6 rem; fonty: 900; color: black;">
                <li><a class="dropdown-item" href="{{Route('login')}}">Login</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{Route('register')}}">Cadastro</a></li>
              </ul>
            </li>
          @else
            <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Bem vindo {{Auth::user()->name }}
                  </a>
                  <ul class="dropdown-menu" style="width: 6 rem; fonty: 900; color: black;">
                    <li><a class="dropdown-item" href="{{ Route('logout')}}">Sair</a></li>
                  </ul>
            </li>

          @endif
        </ul>
      </div>
    </div>
  </nav>