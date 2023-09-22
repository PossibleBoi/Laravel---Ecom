<x-layout>
    <x-slot name="title_slot">
        Registered Users Dashboard
    </x-slot>
    <x-slot name="body_slot">
        <div class="hold-transition sidebar-mini">
            <div class="wrapper">

                <!-- Navbar -->
                <nav class="main-header navbar navbar-expand navbar-dark bg-dark">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="" class="nav-link">Contact</a>
                        </li>
                    </ul>

                    <!-- Right navbar links -->
                </nav>
                <!-- /.navbar -->

                <!-- Main Sidebar Container -->
                <aside class="main-sidebar sidebar-dark-primary elevation-4">
                    <!-- Brand Logo -->

                    <!-- Sidebar -->
                    <div class="sidebar">
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                            </div>
                            <div class="info">
                                <a href="/profile" class="d-block">{{ auth()->user()->name }}</a>
                            </div>
                        </div>

                        <!-- SidebarSearch Form -->
                        <div class="form-inline">
                            <div class="input-group" data-widget="sidebar-search">
                                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-sidebar">
                                        <i class="fas fa-search fa-fw"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Sidebar Menu -->
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                data-accordion="false">
                                <!-- Add icons to the links using the .nav-icon class
                                   with font-awesome or any other icon font library -->
                                <li class="nav-item menu-open">
                                <li class="nav-item">
                                    <a href="/admin/users" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Registered Users </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/vendors" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Registered Vendors</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.products') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Registered Products</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/profile" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Profile Settings
                                        </p>
                                    </a>
                                </li>
                                </li>
                            </ul>
                        </nav>
                        <!-- /.sidebar-menu -->
                    </div>
                    <!-- /.sidebar -->
                </aside>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container-fluid">

                            <div class="row mb-2">
                                <form action="{{route('edit.img_delete')}}" method="POST">
                                    @csrf
                                    @method('DELETE')   
                                    @foreach ($images as $image)
                                    <div class="col-md-4">
                                        <div class="input-group mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input image-checkbox"
                                                name="selected_images[{{$image->id}}]" id="image{{ $image->id }}" value="{{$image->id}}" >
                                                <label class="custom-control-label" for="image{{ $image->id }}">
                                                    <img src="{{ asset($image->image) }}" alt="No" width="125px"
                                                        height="125px">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- Add a button to trigger image removal -->
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                            
                                        <button id="removeImageButton" class="btn btn-danger">Remove Image</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                             
                            <form action="{{ route('a_product.update', ['product' => $products->first()->id]) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div>
                                    <label> &nbsp;Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $products->first()->name }}" autocomplete="off">

                                    <label> &nbsp;Description</label>
                                    <input type="text" class="form-control" name="description"
                                        value="{{ $products->first()->description }}" autocomplete="off">

                                    <label> &nbsp;Brand</label>
                                    <input type="text" class="form-control" name="brand"
                                        value="{{ $products->first()->brand }}" autocomplete="off">

                                    <label> &nbsp;Stock</label>
                                    <input type="text" class="form-control" name="stock"
                                        value="{{ $products->first()->stock }}" autocomplete="off">

                                    <label> &nbsp;Price</label>
                                    <input type="text" class="form-control" name="price"
                                        value="{{ $products->first()->price }}" autocomplete="off">



                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile"
                                                name="image">
                                            <label class="custom-file-label">Choose File</label>
                                        </div>
                                    </div>
                                    <h2><button class="btn btn-success"><b>Submit</b></button></h2>
                                    <h3>
                                        <a href="{{ route('admin.products') }}" class="badge badge-danger">Cancel</a>
                                    </h3>
                            </form>

                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->

            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    Anything you want
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All
                rights reserved.
            </footer>
        </div>
        </div>
    </x-slot>

</x-layout>
