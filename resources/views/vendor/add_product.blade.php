<x-layout>
    <x-slot name="title_slot">
        Vendor Dashboard
    </x-slot>   
    <x-slot name="body_slot">
        <div class="hold-transition sidebar-mini">
            <div class="wrapper">
            
              <!-- Navbar -->
              <nav class="main-header navbar navbar-expand navbar-dark bg-dark">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                  <li class="nav-item d-none d-sm-inline-block">
                      <a href="" class="nav-link">Home</a>
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
                      <a href="/profile" class="d-block">{{auth()->user()->name}}</a>
                    </div>
                  </div>
            
                  <!-- SidebarSearch Form -->
                  <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                      <div class="input-group-append">
                        <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                        </button>
                      </div>
                    </div>
                  </div>
            
                  <!-- Sidebar Menu -->
                  <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
                           with font-awesome or any other icon font library -->
                      <li class="nav-item menu-open">
                          <li class="nav-item">
                            <a href="{{route('vendor.products')}}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Registered Products</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{route('product.add')}}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Add Products</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Orders</p>
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
                      <div class="col-md-12">
                        <form action="{{ route('product.create') }}" method="post" enctype="multipart/form-data" id="image-upload" class="dropzone">
                            @csrf
                            @method('POST')
    
                            <ul class="list-group">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center">
                                    Add New Product
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center">
                                    <input type="text" name='name' class="form-control" value="{{old('name')}}"
                                        placeholder="Product Name">
                                </li>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ "Name is required." }}</span>
                                @endif
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center">
                                    <textarea type="text" name='description' class="form-control" placeholder="Description"></textarea>
                                </li>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ "Description is required." }}</span>
                                @endif
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center">
                                    <input type="text" name='price' class="form-control"  value="{{old('price')}}"
                                        placeholder="Price">
                                </li>
                                @if ($errors->has('price'))
                                    <span class="text-danger">{{ "Price is required and should be a number."}}</span>
                                @endif
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center">
                                    <input type="text" name='stock' class="form-control" value="{{old('stock')}}"
                                        placeholder="Stock">
                                </li>
                                @if ($errors->has('stock'))
                                    <span class="text-danger">{{ "Stock is required and should be a number." }}</span>
                                @endif
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center">
                                    <input type="text" name='brand' class="form-control"  value="{{old('brand')}}"
                                        placeholder="Brand">
                                </li>
                                @if ($errors->has('brand'))
                                        <span class="text-danger">{{"Brand is required."}}</span>
                                    @endif
                                    <button type="button" class="btn btn-primary">Submit</button>
                                </form>
                                
                    </div>
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
                <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
              </footer>
            </div>
            </div>
            
    </x-slot>
  </x-layout>
  
  
  