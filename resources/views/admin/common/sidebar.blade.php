<div id="aside" class="app-aside fade box-shadow-x nav-expand" style="background: #1e2835;" aria-hidden="true">
  <div class="sidenav modal-dialog">
    <!-- sidenav top -->
    <div class="navbar lt" style="margin: 4px auto;background: transparent;">
      <!-- brand -->
      <a href="{{ url('admin/dashboard') }}" class="navbar-brand refreshLink">
        <img src="{{ url('assets/images/logo.png')}}" style="max-height: 4.5rem;">
      </a>
    </div>

    <div class="flex hide-scroll">
      <div class="scroll">
        <div class="nav-border b-primary" data-nav>
          <ul class="nav bg sidebar">

            <li class="active">
              <a class="refreshLink" href="{{ url('admin/dashboard') }}">
                <span class="nav-icon">
                  <i class="fa fa-dashboard"></i>
                </span>
                <span class="nav-text">Dashboard</span>
              </a>
            </li>

            <li>
              <a class="refreshLink" href="{{ route('jobs.index')}}">
                <span class="nav-icon">
                  <i class="fa fa-users"></i>
                </span>
                <span class="nav-text">Jobs</span>
              </a>
            </li>

            <li>
              <a class="" href="{{ route('jobs.applicant')}}">
                <span class="nav-icon">
                  <i class="fa fa-users"></i>
                </span>
                <span class="nav-text">Applicants</span>
              </a>
            </li>

            <li>
                  <a class="" href="{{ route('users.index')}}">
                <span class="nav-icon">
                  <i class="fa fa-users"></i>
                </span>
                      <span class="nav-text">Users</span>
                  </a>
            </li>

          </ul>
        </div>
      </div>
    </div>

  </div>
  <input type="hidden" class="server-url" value="{{ url('/') }}">
</div>

