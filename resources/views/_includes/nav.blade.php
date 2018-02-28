<nav class="navbar is-primary is-fixed-top" role="navigation" aria-label="main navigation">
  {{-- <div class="container"> --}}
    <div class="navbar-brand">
      <a class="navbar-item" href="https://bulma.io">
        SYSTEM NAME
      </a>

      <div class="navbar-burger" data-target="navMenu">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="navbar-menu" id="navMenu">
      <div class="navbar-start">
        <!-- navbar items -->
      </div>

      <div class="navbar-end">
        @guest

        @else
          <div class="navbar-item has-dropdown is-hoverable">
            <a href="" class="navbar-link">
              {{ Auth::user()->name }}
            </a>
            <div class="navbar-dropdown is-right">
              <a href="{{ route('logout') }}" class="navbar-item" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                Log out
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </div>
        @endguest
      </div>
    </div>
  {{-- </div> --}}
</nav>
