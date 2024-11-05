<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark dark:text-white" href="adminuser.php">Admin</a></li>
            <li class="breadcrumb-item text-sm text-dark dark:text-white active" aria-current="page"><?php if($current_page == 'index'){echo 'Dashboard';}elseif($current_page == 'mapping'){echo 'Plot Management';}elseif($current_page == 'decease'){echo 'Deceased Records';}elseif($current_page == 'soa'){echo 'SOA';}elseif($current_page == 'payment'){echo 'Payment Management';}elseif($current_page == 'profile'){echo 'Profile';} ?></li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline dark:bg-gray-800">
              <label class="form-label dark:text-gray-300">Type here...</label>
              <input type="text" class="form-control dark:bg-gray-800 dark:text-white">
            </div>
          </div>
         
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="material-symbols-rounded fixed-plugin-button-nav">settings</i>
              </a>
            </li>
            <li class="nav-item dropdown pe-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="material-symbols-rounded">notifications</i>
              </a>
              
            </li>
            
            
          </ul>
        </div>
      </div>
    </nav>