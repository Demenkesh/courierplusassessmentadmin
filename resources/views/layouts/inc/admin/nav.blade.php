<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-5 text-white" href="javascript:;">Pages</a>
                </li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">
                    Dashboard
                </li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">
                Dashboard
            </h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                {{-- <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="Type here..." />
                </div> --}}
            </div>
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a href="{{ url('admin/logout') }}" class="nav-link text-white font-weight-bold px-0"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span class="d-sm-inline d-none">Sign out</span>
                    </a>
                    <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                {{--
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link text-white font-weight-bold px-0">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn  float-end btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop1">
                            Reset password
                        </button>
                </li> --}}



                <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">reset Password</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ url('admin/resetpass') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-floating">
                                        <input type='password' class="form-control" required placeholder="oldpassword"
                                            id="floatingTextarea2" style="height: 100px" name="oldpassword">
                                        <label for="floatingTextarea2">oldpassword</label>
                                    </div>
                                    <br />
                                    <div class="form-floating">
                                        <input type='password' class="form-control" required placeholder="newpassword"
                                            id="floatingTextarea2" style="height: 100px" name="newpassword">
                                        <label for="floatingTextarea2">newpassword</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary"
                                        id="sendFormButton">Reset_password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



                {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form> --}}
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="#" class="nav-link text-white p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
