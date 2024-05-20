

<div class="mb-5">
  <nav class="navbar navbar-expand-lg" style="background-color:rgb(121,183,145)" >
    
    <div class="display-flex" style="text-align:center">
      <h1 class="navbar-brand" style="color:rgb(230,239,230)">
      <a href="{{route('welcome')}}">
        <img class="img-fluid ms-4"  style="margin-left:10px; width: 130px" src="{{ asset('img/logopresto.png') }}" alt="logo">
      </a>
      </h1>
    </div>
    <div class="collapse navbar-collapse display-flex " style="justify-content:flex-end">
      @auth
      <button class="btn btn-outline-success me-3" type="submit" style="background-color:rgb(230,239,230)">
        <a class="text-decoration-none text-dark" href="{{ route('announcements.create') }}">Inserisci annuncio</a>
      </button>
      <div class="dropdown me-3">
        <button class="btn btn-secondary dropdown-toggle text-uppercase fw-bold" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ auth()->user()->name }}
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><form action="/logout" method="POST">
            @csrf
            <button type="submit" class="dropdown-item text-danger text-uppercase fw-bold">Esci</button>
          </form></li>
        </ul>
      </div>
      
      @else  
      <button class="btn me-3" style="background-color:rgb(230,239,230); width: 100px">
        <a class="text-decoration-none text-dark" href="/register">Registrati</a>
      </button>
      <button class="btn me-3" style="background-color:rgb(230,239,230); width: 100px">
        <a class="text-decoration-none text-dark" href="/login">Accedi</a>
      </button>
      @endauth  
    </div>  
  </nav>
</div>