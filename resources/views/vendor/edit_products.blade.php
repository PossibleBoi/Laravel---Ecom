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
                            <a href="{{ route('vendor.dashboard') }}" class="nav-link">Home</a>
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
                                <form action="{{ route('edit.img_delete') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    @foreach ($images as $image)
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input image-checkbox"
                                                        name="selected_images[{{ $image->id }}]"
                                                        id="image{{ $image->id }}" value="{{ $image->id }}">
                                                    <label class="custom-control-label" for="image{{ $image->id }}">
                                                        <img src="{{ asset($image->image) }}" alt="No"
                                                            width="125px" height="125px">
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
                    <div>
                        <form action="{{ route('product.update', ['product' => $products->first()->id]) }}"
                            id="image-update" method="POST" class="dropzone" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

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

                            <button type="submit" class="btn btn-primary">Submit</button>
                            </ul>
                        </form>


                        <h3>
                            <a href="{{ route('vendor.products') }}" class="badge badge-danger">Cancel</a>
                        </h3>

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
        @push('script')
        @endpush
        <script>
            var dropzone = new Dropzone('#image-update', {
                autoProcessQueue: false,
                uploadMultiple: true,
                parallelUploads: 100,
                maxFiles: 5,
                maxFilesize: 1,
                thumbnailWidth: 200,
                acceptedFiles: ".jpeg,.jpg,.png,",
                addRemoveLinks: true,
                success: function(file, response) {
                    console.log(response);
                    showMessage("Upload Successful");
                    file.previewElement.querySelector(".dz-remove").remove();
                    setTimeout(function() {
                        window.location.href = "{{ route('vendor.products') }}";
                    }, 500);
                },
        
                error: function(file, response) {
                    return false;
                }
            });
        
            // Find the form element and store it in a variable
            var formElement = document.querySelector("#image-update");
        
            // Find the submit button within the form
            var submitButton = formElement.querySelector("button[type=submit]");
        
            submitButton.addEventListener("click", function(e) {
                // Make sure that the form isn't actually being sent.
                e.preventDefault();
                e.stopPropagation();
        
                // Check if there are queued files in Dropzone
                if (dropzone.getQueuedFiles().length > 0) {
                    dropzone.processQueue();
                } else {
                    // If no files are queued, submit the form without Dropzone
                    formElement.submit();
                }
            });
        
            function showMessage(message) {
                // Create and display a pop-up message
                var popup = document.createElement("div");
                popup.innerHTML = message;
                popup.className = "popup";
                document.body.appendChild(popup);
        
                // Remove the pop-up message after 3 seconds
                setTimeout(function() {
                    popup.parentNode.removeChild(popup);
                }, 500);
            }
        </script>   
    </x-slot>
</x-layout>
