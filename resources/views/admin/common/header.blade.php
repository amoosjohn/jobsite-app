<div class="content-header white  box-shadow-1" id="content-header">
   <div class="navbar navbar-expand-lg">
      <!-- btn to toggle sidenav on small screen -->
      <a class="d-lg-none mx-2" data-toggle="modal" data-target="#aside">
         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512">
            <path d="M80 304h352v16H80zM80 248h352v16H80zM80 192h352v16H80z"/>
         </svg>
      </a>
      <!-- Page title -->
      <div class="navbar-text nav-title flex" id="pageTitle"></div>
      <ul class="nav flex-row order-lg-2">

         <li class="dropdown d-flex align-items-center show">

            <a data-toggle="dropdown" class="d-flex align-items-center" data-pjax-click-state="anchor-empty" aria-expanded="true">
               <span class=" w-32" >
                  <img src="{{ url('assets/images/logo.png') }}" style="width: 30px;" alt="...">
               </span>
            </a>

            <div class="dropdown-menu dropdown-menu-right w pt-0 mt-2 animate fadeIn">
               <div class="row no-gutters b-b mb-2">
               </div>

                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>


            </div>
         </li>

         <li class="d-lg-none d-flex align-items-center">
            <a   class="mx-2" data-toggle="collapse" data-target="#navbarToggler">
               <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 512 512">
               <path d="M64 144h384v32H64zM64 240h384v32H64zM64 336h384v32H64z"></path>
            </svg>
         </a>
      </li>
   </ul>

</div>
</div>

