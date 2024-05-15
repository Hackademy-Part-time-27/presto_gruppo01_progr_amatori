<div>
  <nav class="navbar navbar-expand-lg" style="background-color:rgb(121,183,145)" >
    <img style="margin-left:10px" src="" alt="logo">
    <div class="display-flex" style="text-align:center">
      <h1 class="navbar-brand" style="color:rgb(230,239,230)" href="#">Presto</h1>
    </div>
    <div class="collapse navbar-collapse display-flex " style="justify-content:flex-end">
      @auth
      <button class="btn btn-outline-success" type="submit" style="background-color:rgb(230,239,230)">
        <a href="{{ route('announcements.create') }}">Inserisci annuncio</a>
      </button>
        <button class="btn btn-outline-success nav-item dropdown" type="submit" style="background-color:rgb(230,239,230)">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="">{{ auth()->user()->name }}</a></li>
              <li>
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item">Esci</button>
                </form>
              </li>
            </ul>
        </button>
      @else  
      <button class="btn btn-outline-success" style="background-color:rgb(230,239,230)">
        <a href="/register">Registrati</a>
      </button>
      <button class="btn btn-outline-success" style="background-color:rgb(230,239,230)">
        <a href="/login">Accedi</a>
      </button>
      @endauth  
    </div>  
  </nav>
</div>