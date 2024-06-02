

<div class="mb-5">
  <nav class="navbar navbar-expand-lg" style="background-color:rgb(121,183,145)" >
    
    <div class="display-flex" style="text-align:center">
      <h1 class="navbar-brand" style="color:rgb(230,239,230)">
      <a href="{{route('announcements.index')}}">
        <img class="img-fluid ms-4"  style="margin-left:10px; width: 130px" src="{{ asset('img/logopresto.png') }}" alt="logo">
      </a>
      </h1>
    </div>
    <div class="collapse navbar-collapse display-flex " style="justify-content:flex-end">
      <form action="{{ route('announcements.search') }}" method="GET" class="d-flex" role="search" style="justify-content:flex-end; width:230px">
        <input class="form-control " name="searched" type="search" placeholder="Cerca" aria-label="Search">
        <button type="submit" style="background-color:rgb(121,183,145); border:none; width:110px">
          <img class="img-fluid" src="{{ asset('img/lente2.png') }}" alt="">
        </button>
      </form>
      <button type="button" class="btn btn-outline-success me-3" style="background-color:rgb(230,239,230)">
        <a class="text-decoration-none text-dark fw-bold" href="{{ route('welcome') }}">ULTIMI ANNUNCI</a>
      </button>

      @auth
      <button class="btn btn-outline-success me-3" type="submit" style="background-color:rgb(230,239,230)">
        <a class="text-decoration-none text-dark fw-bold" href="{{ route('announcements.create') }}">INSERISCI ANNUNCIO</a>
      </button>
      <div class="dropdown me-1">
        <button class="btn btn-secondary dropdown-toggle text-uppercase fw-bold" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ auth()->user()->name }}
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
          @if (Auth::user()->is_revisor)
            <li class="nav-item">
              <a class="nav-link btn btn-sm position-relative text-uppercase fw-bold"
                  aria-current="page" href="{{ route('revisor.index') }}">Zona revisore
                <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-danger">
                {{ App\Models\Announcement::toBeRevisionedCount() }}
                <span class="visually-hidden">Messaggi non letti</span>
              </a>
            </li>
          @endif
          <li><hr class="dropdown-divider"></li>
          <li>
            <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="dropdown-item text-danger text-uppercase fw-bold">Esci</button>
            </form>
          </li>
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
    <div class="dropdown">
      <button class="btn dropdown-toggle" style="border:none;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img class="img-fluid" src="{{ asset('img/mondo.png') }}" width="32" height="32" alt="">
      </button>
        <ul class="dropdown-menu dropdown-menu-end">
          <li class="dropdown-item"> 
            <x-_locale lang='it' />
          </li>
          <li class="dropdown-item"> 
            <x-_locale lang='en' />
          </li>
          <li class="dropdown-item"> 
            <x-_locale lang='es' />
          </li>
      </ul>
  </div>    
  </nav>
</div>