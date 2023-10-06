<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ $product->first()->name }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <!-- Bootstrap icons-->
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css') }}"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <style>
        body {
            background-color: #fff
        }

        .card {
            border: none
        }

        .product {
            background-color: #eee
        }

        .brand {
            font-size: 14px
        }

        .act-price {
            color: red;
            font-weight: 800
        }

        .dis-price {
            text-decoration: line-through
        }

        .about {
            font-size: 14px
        }

        .color {
            margin-bottom: 10px
        }

        label.radio {
            cursor: pointer
        }

        label.radio input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none
        }

        label.radio span {
            padding: 2px 9px;
            border: 2px solid #ff0000;
            display: inline-block;
            color: #ff0000;
            border-radius: 3px;
            text-transform: uppercase
        }

        label.radio input:checked+span {
            border-color: #ff0000;
            background-color: #ff0000;
            color: #fff
        }

        .btn-danger {
            background-color: #ff0000 !important;
            border-color: #ff0000 !important
        }

        .btn-danger:hover {
            background-color: #da0606 !important;
            border-color: #da0606 !important
        }

        .btn-danger:focus {
            box-shadow: none
        }

        .cart i {
            margin-right: 10px
        }

        /* counter */
        .quantity-counter {
            display: flex;
            flex-direction: column;
            width: 40px;

            .value {
                border: 1px solid #adadad;
                border-radius: 3px;
                margin: 2px 0;
                padding: 4px;
                text-align: center;
                -moz-appearance: textfield;

                &::-webkit-outer-spin-button,
                &::-webkit-inner-spin-button {
                    -webkit-appearance: none;
                    margin: 0;
                }
            }

            .increment,
            .decrement {
                border: 0;
                background: transparent;
                cursor: pointer;
                border-radius: 3px;
                background: rgba(teal, 0.7);
                color: #ff0000;
                height: 30px;
            }
        }
    </style>
</head>


<body>

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
             <a class="navbar-brand" href="{{route('home')}}">Fast E-Commerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page"
                            href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('all_products') }}">All Products</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                            <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        @if (!empty($user))
                            @if ($user->first()->role_name == 'User')
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">{{ $user->first()->name }}</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                                </ul>
                            @elseif ($user->first()->role_name == 'Vendor')
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">{{ $user->first()->name }}</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/vendor/dashboard">Dashboard</a></li>
                                </ul>
                            @elseif ($user->first()->role_name == 'Admin')
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">{{ $user->first()->name }}</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/admin/dashboard">Dashboard</a></li>
                                </ul>
                            @endif
                        @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">{{ 'GUEST' }}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/login">Dashboard</a></li>
                        </ul>
                    </li>
                    @endif

                    </li>
                </ul>
                <form action="{{route('cart')}}" class="d-flex">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">{{$cart}}</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <section class="py-5">
        <header>
            &nbsp;
        </header>
        <div class="container mt-5 mb-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="images p-3">
                                    <div class="text-center p-4"> <img id="main-image"
                                            src="{{ asset($product->first()->images->first()->image) }} "
                                            width="350"> </div>
                                    <div class="container">
                                        <div class="row">
                                            @foreach ($product->first()->images as $image)
                                                <div class="thumbnail text-center col-sm"> <img
                                                        onclick="change_image(this)" src="{{ asset($image->image) }}"
                                                        width="100"></div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="product p-4">
                                    <form action="{{ route('cart.add',['id'=>$product->first()->id]) }}" method="GET">
                                        @csrf
                                        @method('get')
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center"> <i
                                                    class="fa fa-long-arrow-left"></i>
                                                <span class="ml-1">
                                                    <h3>
                                                        <a href="{{ route('all_products') }}"
                                                            class="btn btn-danger">Back</a>
                                                    </h3>
                                                </span>
                                            </div> <i class="fa fa-shopping-cart text-muted"></i>
                                        </div>
                                        <div class="mt-4 mb-3"> <span
                                                class="text-uppercase text-muted brand">{{ $product->first()->brand }}</span>
                                            <h5 class="text-uppercase">{{ $product->first()->name }}</h5>
                                            <div class="price d-flex flex-row align-items-center"> <span
                                                    class="act-price">Rs.{{ $product->first()->price }}</span>
                                            </div>
                                        </div>
                                        <p class="about">{{ $product->first()->description }}</p>
                                        <h6 class="text-uppercase">Quantity
                                            <div class="quantity-counter">
                                                <button id="counter-increment" type="button" class="increment">+</button>
                                                <input id="counter-value" class="value" type="number" name="quantity"
                                                    value="1">
                                                <button id="counter-decrement" type="button" class="decrement">-</button>
                                            </div>
                                        </h6>
                                        {{-- <div class="sizes mt-5">
                                            <h6 class="text-uppercase">Size</h6>
                                            <label class="radio">
                                                <input type="radio" name="size" value="S" checked>
                                                <span>S</span> </label>
                                            <label class="radio"> <input type="radio" name="size"
                                                    value="M">
                                                <span>M</span> </label>
                                            <label class="radio"> <input type="radio" name="size"
                                                    value="L">
                                                <span>L</span> </label>
                                            <label class="radio"> <input type="radio" name="size"
                                                    value="XL">
                                                <span>XL</span> </label>
                                            <label class="radio"> <input type="radio" name="size"
                                                    value="XXL">
                                                <span>XXL</span> </label>
                                        </div> --}}
                                        <div class="cart mt-4 align-items-center"> <button
                                                class="btn btn-danger text-uppercase mr-2 px-4">Add to cart</button> <i
                                                class="fa fa-heart text-muted"></i> <i
                                                class="fa fa-share-alt text-muted"></i>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script>
        function change_image(image) {
            document.getElementById('main-image').src = image.src;
        }
    </script>
    <script>
        var counterValue = document.querySelector("#counter-value");
        var counterIncrement = document.querySelector("#counter-increment");
        var counterDecrement = document.querySelector("#counter-decrement");

        var count = 0;

        this.counterIncrement.addEventListener('click', () => {
            count++;
            updateCounterValue(count);
        });

        this.counterDecrement.addEventListener('click', () => {
            if (count > 1) {
                count--;
                updateCounterValue(count);
            }
        });

        counterValue.addEventListener('input', function() {
            var newValue = parseInt(this.value);
            if (!isNaN(newValue) && newValue >= 1) {
                count = newValue;
            }
            updateCounterValue(count);
        });

        function updateCounterValue(value) {
            counterValue.value = value;
        }

    </script>



</body>

</html>
