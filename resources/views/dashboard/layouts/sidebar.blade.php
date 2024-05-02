<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : " "}}" aria-current="page" href="/dashboard">
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/blogs') ? 'active' : " "}}" href="/dashboard/blogs">
            My Blogs
          </a>
        </li>
      </ul>

      @can('admin')
      <h6>Administrator</h6>
      <ul>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/categories">
            Blogs Category
          </a>
        </li>
      </ul>
      @endcan
    </div>
  </nav>