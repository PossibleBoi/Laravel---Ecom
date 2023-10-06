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
                                    <a href="{{ route('vendor.products') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Registered Products</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('product.add') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Products</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('vendor.orders') }}" class="nav-link">
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
                                <table class="table table-striped table-dark">
                                    @foreach ($customers as $customer)
                                        <thead>
                                            <tr>
                                                <th scope="col"> {{ $customer->name }}
                                                </th>
                                            <tr>
                                            <tr>
                                                <th scope="col">Product Image</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Product Quantity</th>
                                                <th scope="col">Product Total</th>
                                                <th scope="col">Product Status</th>
                                                <th scope="col">Product Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                @foreach ($order as $item)
                                                    @if ($item->user_id == $customer->id)
                                                        <tr>
                                                            @foreach ($images as $image)
                                                                @if ($item->product_id == $image->imageable_id)
                                                                    <td><img src="{{ asset($image->image) }}"
                                                                            width=90px</td>
                                                                @endif
                                                            @endforeach
                                                            <td>{{ $item->product_name }}</td>
                                                            <td>{{ $item->quantity }}</td>
                                                            <td>{{ $item->price * $item->quantity }}</td>
                                                            <td>
                                                                <h5><span class="badge badge-secondary">Delivery:
                                                                        {{ $item->delivery_status }}</span></h5>
                                                                <h5><span class="badge badge-secondary">Payment:
                                                                        {{ $item->payment_method }}</span></h5>
                                                                <h5><span class="badge badge-secondary">Payment Status:
                                                                        {{ $item->payment_status }}</span></h5>
                                                            </td>
                                                            <td>

                                                                @if ($item->delivery_status == 'Pending')
                                                                    <form method="POST"
                                                                        action="{{ route('order.delivery') }}">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <button type="submit" name="initiate_btn"
                                                                            value="{{ $item->id }}"
                                                                            class="btn btn-success">Initiate
                                                                            Delivery</button>
                                                                    </form>
                                                                @else
                                                                    <button disabled class="btn btn-success">Initiate
                                                                        Delivery</button>
                                                                @endif
                                                                @if ($item->delivery_status == 'Pending')
                                                                    <form method="POST"
                                                                        action="{{ route('order.cancel') }}">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <button type="submit" name="cancel_btn"
                                                                            value="{{ $item->id }}"
                                                                            class="btn btn-danger">Cancel</button>
                                                                    </form>
                                                                @else
                                                                    <button disabled
                                                                        class="btn btn-danger">Cancel</button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                    @endforeach

                                    </tbody>
                                </table>
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
