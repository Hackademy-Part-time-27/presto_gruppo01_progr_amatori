<nav class="navbar navbar-expand-lg navbar-light mb-5" style="background-color:rgb(121,183,145); height: 70px;">
  <div class="container-fluid">
      <a class="navbar-brand ms-4" href="{{ route('announcements.index') }}">
          <img class="img-fluid" style="margin-left:10px; max-height: 50px;" src="{{ asset('img/logopresto.png') }}" alt="logo">
      </a>
      <button class="navbar-toggler border border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa-solid fa-bolt fa-xl"></span>
      </button>
      <div class="offcanvas offcanvas-end w-25" tabindex="-1" id="navbarNav" aria-labelledby="navbarNavLabel" style="background-color:rgb(230, 239, 230);">
          <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="navbarNavLabel">Presto</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
              <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                      <form action="{{ route('announcements.search') }}" method="GET" class="d-flex" role="search">
                          <input class="form-control form-control-sm me-2 mt-1" name="searched" type="search"
                              placeholder="{{ __('ui.search') }}" aria-label="Search" style="max-width: 150px; height: 40px;">
                          <button type="submit" class="btn btn-sm mt-1 me-2" style="height: 40px;">
                              <span class="fa-solid fa-magnifying-glass fa-xl"></span>
                          </button>
                      </form>
                  </li>
                  <li class="nav-item">
                      <a class="btn btn-outline-success text-decoration-none text-dark fw-bold mt-2 me-2 btn-sm"
                          style="background-color: rgb(230, 239, 230)"
                          href="{{ route('welcome') }}">{{ __('ui.lastAnnouncementsBtn') }}</a>
                  </li>
                  @auth
                      <li class="nav-item">
                          <a class="btn btn-outline-success text-decoration-none text-dark fw-bold mt-2 me-2 btn-sm"
                              style="background-color: rgb(230, 239, 230)"
                              href="{{ route('announcements.create') }}">{{ __('ui.newAnnouncement') }}</a>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle text-uppercase fw-bold mt-1" href="#" id="navbarDropdown"
                              role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              {{ auth()->user()->name }}
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              @if (Auth::user()->is_revisor)
                                  <li>
                                      <a class="dropdown-item"
                                          href="{{ route('revisor.index') }}">{{ __('ui.revisorArea') }}
                                          <span class="badge bg-danger">
                                              {{ App\Models\Announcement::toBeRevisionedCount() }}
                                          </span>
                                      </a>
                                  </li>
                              @endif
                              <li>
                                  <hr class="dropdown-divider">
                              </li>
                              <li>
                                  <form action="/logout" method="POST">
                                      @csrf
                                      <button type="submit"
                                          class="dropdown-item text-danger text-uppercase fw-bold">{{ __('ui.logout') }}</button>
                                  </form>
                              </li>
                          </ul>
                      </li>
                  @else
                      <li class="nav-item">
                          <a class="btn text-decoration-none btn-outline-success text-dark mt-2 me-2 btn-sm"
                              style="background-color: rgb(230, 239, 230); max-width: 100px"
                              href="/register">{{ __('ui.register') }}</a>
                      </li>
                      <li class="nav-item">
                          <a class="btn text-decoration-none btn-outline-success text-dark mt-2 btn-sm"
                              style="background-color: rgb(230, 239, 230); max-width: 100px"
                              href="/login">{{ __('ui.login') }}</a>
                      </li>
                  @endauth
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle ms-1 mt-1" href="#" id="languageDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          <span class="fa-solid fa-earth-americas fa-lg"></span>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
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
                  </li>
              </ul>
          </div>
      </div>
  </div>
</nav>
