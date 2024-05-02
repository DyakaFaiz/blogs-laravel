<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : ''}}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('about') ? 'active' : ''}}" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('blogs') ? 'active' : ''}}" href="/blogs">Blog</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link" href="/dashboard">Dashboard</a>
          </li>
          @endauth

        </ul>
          
          
          @auth
          <ul class="ms-auto navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome, {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <form action="/logout" method="POST">
                  @csrf
                  
                  <button type="submit" class="dropdown-item">logout</button>
                </form>
              </ul>
            </li>
          </ul>
            
        @else
        <ul class="ms-auto navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
          </li>
        </ul>
        @endauth

      </div>
    </div>
  </nav>