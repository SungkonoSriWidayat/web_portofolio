@extends('halaman_dashboard.index');
@if (Auth::user()->role === 'admin')
    @section('navItem')
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="/admin">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Admin</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Components</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components:</h6>
                    <a class="collapse-item" href="{{ asset('halaman_dashboard/buttons.html')}}">Buttons</a>
                    <a class="collapse-item" href="{{ asset('halaman_dashboard/cards.html')}}">Cards</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Utilities</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Utilities:</h6>
                    <a class="collapse-item" href="{{ route('UserControl')}}">User Control</a>
                    <a class="collapse-item" href="{{ asset('halaman_dashboard/utilities-color.html')}}">Colors</a>
                    <a class="collapse-item" href="{{ asset('halaman_dashboard/utilities-border.html')}}">Borders</a>
                    <a class="collapse-item" href="{{ asset('halaman_dashboard/utilities-animation.html')}}">Animations</a>
                    <a class="collapse-item" href="{{ asset('halaman_dashboard/utilities-other.html')}}">Other</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pages</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Login Screens:</h6>
                    <a class="collapse-item" href="{{ route('daftarkelas')}}">Daftar kelas</a>
                    <a class="collapse-item" href="{{ asset('halaman_dashboard/login.html')}}">Login</a>
                    <a class="collapse-item" href="{{ asset('halaman_dashboard/register.html')}}">Register</a>
                    <a class="collapse-item" href="{{ asset('halaman_dashboard/forgot-password.html')}}">Forgot Password</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Other Pages:</h6>
                    <a class="collapse-item" href="{{ asset('halaman_dashboard/404.html')}}">404 Page</a>
                    <a class="collapse-item" href="{{ asset('halaman_dashboard/blank.html')}}">Blank Page</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="{{ asset('halaman_dashboard/charts.html')}}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="{{ asset('halaman_dashboard/tables.html')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        <!-- Sidebar Message -->
        <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="{{ asset('halaman_dashboard/img/undraw_rocket.svg')}}" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
        </div>
    @endsection
    @section('main')
            <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Content Row -->
            <div class="row">
                
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        {{ Auth::user()->email}}</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Auth::user()->role}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        <a class="collapse-item" href="{{ route('daftarkelas')}}">Daftar Kelas</a></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><button></button></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Nilai
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar"
                                                    style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Pending Requests</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Daftar Kelas</h1>
            <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                For more information about DataTables, please visit the <a target="_blank"
                    href="https://datatables.net">official DataTables documentation</a>.</p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    {{-- new --}}
                    <a href="/tambahkelas" class="btn-sm btn-primary text-decoration-none mb-4">Buat kelas</a>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire(
                                    'Sukses',
                                    '{{ Session::get('success') }}',
                                    'success'
                                );
                            });
                        </script>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama kelas</th>
                                    <th>materi</th>
                                    <th>tugas</th>
                                    <th>ujian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nama kelas</th>
                                    <th>materi</th>
                                    <th>tugas</th>
                                    <th>ujian</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->namakelas }}</td>
                                        <td>{{ $item->materi }}<a class="text-decoration-none btn-sm btn-warning btn-align-left" href="/upload/{{ $item->id}}">Edit Materi</a></td>
                                        <td>{{ $item->tugas }}<a class="text-decoration-none btn-sm btn-warning btn-align-left" href="/uploadtugas/{{ $item->id}}">Tambah tugas</a></td>
                                        <td>{{ $item->ujian }}<a class="text-decoration-none btn-sm btn-warning btn-align-left" href="/uploadujian/{{ $item->id}}">Tambah ujian</a></td>
                                        <td><a href="/dataedit/{{ $item->id}}" class="btn-sm btn-warning text-decoration-none">edit</a>
                                            <form onsubmit="return confirmHapus(event)" action="/datahapus/{{ $item->id}}" method="post" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn-sm btn-danger">Hapus</button>
                                            </form></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    @endsection
@endif
    @section('navItem')
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
    
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/user">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Mahasiswa</span></a>
            </li>
    
            <!-- Divider -->
            <hr class="sidebar-divider">
    
            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
    
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="{{ asset('halaman_dashboard/buttons.html')}}">Buttons</a>
                        <a class="collapse-item" href="{{ asset('halaman_dashboard/cards.html')}}">Cards</a>
                    </div>
                </div>
            </li>
    
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="{{ asset('halaman_dashboard/utilities-color.html')}}">Colors</a>
                        <a class="collapse-item" href="{{ asset('halaman_dashboard/utilities-border.html')}}">Borders</a>
                        <a class="collapse-item" href="{{ asset('halaman_dashboard/utilities-animation.html')}}">Animations</a>
                        <a class="collapse-item" href="{{ asset('halaman_dashboard/utilities-other.html')}}">Other</a>
                    </div>
                </div>
            </li>
    
            <!-- Divider -->
            <hr class="sidebar-divider">
    
            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>
    
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="{{ route('datamahasiswa')}}">Data Mahasiswa</a>
                        <a class="collapse-item" href="{{ asset('halaman_dashboard/login.html')}}">Login</a>
                        <a class="collapse-item" href="{{ asset('halaman_dashboard/register.html')}}">Register</a>
                        <a class="collapse-item" href="{{ asset('halaman_dashboard/forgot-password.html')}}">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="{{ asset('halaman_dashboard/404.html')}}">404 Page</a>
                        <a class="collapse-item" href="{{ asset('halaman_dashboard/blank.html')}}">Blank Page</a>
                    </div>
                </div>
            </li>
    
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ asset('halaman_dashboard/charts.html')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>
    
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{ asset('halaman_dashboard/tables.html')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>
    
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
    
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            
            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="{{ asset('halaman_dashboard/img/undraw_rocket.svg')}}" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>
    @endsection
    @section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">
           <!-- Content Row -->
           <div class="row">
       
               <!-- Earnings (Monthly) Card Example -->
               <div class="col-xl-3 col-md-6 mb-4">
                   <div class="card border-left-primary shadow h-100 py-2">
                       <div class="card-body">
                           <div class="row no-gutters align-items-center">
                               <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                       {{ Auth::user()->email}}</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Auth::user()->role}}</div>
                               </div>
                               <div class="col-auto">
                                   <i class="fas fa-calendar fa-2x text-gray-300"></i>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
       
               <!-- Earnings (Monthly) Card Example -->
               <div class="col-xl-3 col-md-6 mb-4">
                   <div class="card border-left-success shadow h-100 py-2">
                       <div class="card-body">
                           <div class="row no-gutters align-items-center">
                               <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                       <a class="collapse-item" href="{{ route('daftarkelas')}}">Daftar Kelas</a></div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800"><button></button></div>
                               </div>
                               <div class="col-auto">
                                   <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
       
               <!-- Earnings (Monthly) Card Example -->
               <div class="col-xl-3 col-md-6 mb-4">
                   <div class="card border-left-info shadow h-100 py-2">
                       <div class="card-body">
                           <div class="row no-gutters align-items-center">
                               <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Nilai
                                   </div>
                                   <div class="row no-gutters align-items-center">
                                       <div class="col-auto">
                                           <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                       </div>
                                       <div class="col">
                                           <div class="progress progress-sm mr-2">
                                               <div class="progress-bar bg-info" role="progressbar"
                                                   style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                   aria-valuemax="100"></div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-auto">
                                   <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
       
               <!-- Pending Requests Card Example -->
               <div class="col-xl-3 col-md-6 mb-4">
                   <div class="card border-left-warning shadow h-100 py-2">
                       <div class="card-body">
                           <div class="row no-gutters align-items-center">
                               <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                       Pending Requests</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                               </div>
                               <div class="col-auto">
                                   <i class="fas fa-comments fa-2x text-gray-300"></i>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       
           <!-- Content Row -->
           
   
           <!-- Page Heading -->
           <h1 class="h3 mb-2 text-gray-800">Daftar Kelas</h1>
           <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
               For more information about DataTables, please visit the <a target="_blank"
                   href="https://datatables.net">official DataTables documentation</a>.</p>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                {{-- new --}}
                {{-- <a href="/tambahkelas" class="btn-sm btn-primary text-decoration-none mb-4">Buat kelas</a> --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('success'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire(
                                'Sukses',
                                '{{ Session::get('success') }}',
                                'success'
                            );
                        });
                    </script>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama kelas</th>
                                <th>materi</th>
                                <th>tugas</th>
                                <th>ujian</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama kelas</th>
                                <th>materi</th>
                                <th>tugas</th>
                                <th>ujian</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $item )
                                <tr>
                                    <td>{{ $item->namakelas }}</td>
                                    <td>{{$item->materi}}<a href="{{ url('kelas/materi',$item->materi)}}"><button type="button">Download</button></a></td>
                                    <td>{{ $item->tugas }}<a href="{{ url('kelas/tugas',$item->tugas)}}"><button type="button">Download</button></a></td>
                                    <td>{{ $item->ujian }}<a href="{{ url('kelas/ujian',$item->ujian)}}"><button type="button">Download</button></a></td>
                                    {{-- <td><a href="/dataedit/{{ $item->id}}" class="btn-sm btn-warning text-decoration-none">edit</a>
                                        <form onsubmit="return confirmHapus(event)" action="/datahapus/{{ $item->id}}" method="post" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn-sm btn-danger">Hapus</button>
                                        </form></td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    @endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmHapus(event) {
        event.preventDefault(); // Menghentikan form dari pengiriman langsung

        Swal.fire({
            title: 'Yakin Hapus Data?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((willDelete) => {
            if (willDelete.isConfirmed) {
                event.target.submit(); // Melanjutkan pengiriman form
            } else {
                swal('Your imaginary file is safe!');
            }
        });
    }
</script>