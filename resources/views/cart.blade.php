 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>T</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

    <style>
        body {
            background: #ddd;
            justify-content: center;
            align-items: center;
            height: 100%;
            min-height: 100vh;
            vertical-align: middle;
            font-size: 1rem;
        }

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
                color: #000000;
                height: 30px;
            }
        }

        .title {
            margin-bottom: 5vh;
        }

        .card {
            margin: auto;
            max-width: 950px;
            width: 90%;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
            border: transparent;
        }

        @media(max-width:767px) {
            .card {
                margin: 3vh auto;
            }
        }

        .cart {
            background-color: #fff;
            padding: 4vh 5vh;
            border-bottom-left-radius: 1rem;
            border-top-left-radius: 1rem;
        }

        @media(max-width:767px) {
            .cart {
                padding: 4vh;
                border-bottom-left-radius: unset;
                border-top-right-radius: 1rem;
            }
        }

        .summary {
            background-color: #ddd;
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;
            padding: 2vh;
            color: rgb(65, 65, 65);
        }

        @media(max-width:767px) {
            .summary {
                border-top-right-radius: unset;
                border-bottom-left-radius: 1rem;
            }
        }

        .summary .col-2 {
            padding: 0;
        }

        .summary .col-10 {
            padding: 0;
        }

        .row {
            margin: 0;
        }

        .title b {
            font-size: 1.5rem;
        }

        .main {
            margin: 0;
            padding: 2vh 0;
            width: 100%;
        }

        .col-2,
        .col {
            padding: 0 1vh;
        }

        a {
            padding: 0 1vh;
        }

        .close {
            margin-left: auto;
            font-size: 0.7rem;
        }

        img {
            width: 3.8rem;
        }

        .back-to-shop {
            margin-top: 4.5rem;
        }

        h5 {
            margin-top: 4vh;
        }

        hr {
            margin-top: 1.25rem;
        }

        select {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1.5vh 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input:focus::-webkit-input-placeholder {
            color: transparent;
        }

        .btn {
            background-color: #000;
            border-color: #000;
            color: white;
            width: 100%;
            font-size: 0.7rem;
            margin-top: vh;
            padding: 1vh;
            border-radius: 0;
        }

        .btn:focus {
            box-shadow: none;
            outline: none;
            box-shadow: none;
            color: white;
            -webkit-box-shadow: none;
            -webkit-user-select: none;
            transition: none;
        }

        .btn:hover {
            color: white;
        }

        a {
            color: black;
        }

        a:hover {
            color: black;
            text-decoration: none;
        }

        #code {
            background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: center;
        }
    </style>
</head>


<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Start Bootstrap</a>
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
                            @if ($user->role_name == 'User')
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">{{ $user->name }}</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                                </ul>
                            @elseif ($user->role_name == 'Vendor')
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">{{ $user->name }}</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/vendor/dashboard">Dashboard</a></li>
                                </ul>
                            @elseif ($user->role_name == 'Admin')
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">{{ $user->name }}</a>
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
            </div>
        </div>
    </nav>
    <section class="py-5">
        <header>
            &nbsp;
        </header>
        <div class="card">
            <div class="row">
                <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col">
                                <h4><b>Cart</b></h4>
                            </div>
                        </div>
                    </div>
                
                    <div class="row border-top border-bottom">
                        <div class="col">IMAGE </div>
                        <div class="col">NAME</div>
                        <div class="col">QUANTITY</div>
                        <div class="col">PRICE</div>
                        <div class="col">PRODUCT TOTAL</div>
                        <div class="col">REMOVE</div>
                    </div>
                    @foreach ($products as $product)
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid"
                                    src="{{asset($product->image)}}"></div>
                            <div class="col">
                                <div class="row text-muted">{{ $product->brand }}</div>
                                <div class="row">{{ $product->name }}</div>
                            </div>
                            <div class="col">
                                <div class="quantity-counter">
                                    <button id="counter-increment" class="increment">+</button>
                                    <input id="counter-value" class="value" type="number" value="{{$product->quantity}}">
                                    <button id="counter-decrement" class="decrement">-</button>
                                </div>
                            </div>
                            <div class="col">Rs.{{($product->price)}} </div>
                            <div class="col">Rs.{{($product->price)*($product->quantity)}} </div>
                            <div class="col">
                                <span class="close">&nbsp;<a href="">Remove</a></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="back-to-shop"><a href="#">&leftarrow;<span class="text-muted">Back to
                                shop</span></a></div>
                </div>
                <div class="col-md-4 summary">
                    <div>
                        <h5><b>Summary</b></h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col" style="padding-left:0;">TOTAL ITEMS: <br><span>{{count($products)}}</span></div>
                    </div>
                    <hr>

                    <form>
                        <p>SHIPPING</p>
                        <select>
                            <option class="text-muted">Standard-Delivery: Rs. 150</option>
                        </select>
                        <p>GIVE CODE</p>
                        <input id="code" placeholder="Enter your code">
                    </form>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        <div class="col text-right>">Rs. {{$total}}</div>
                    </div>
                    <button class="btn">CHECKOUT</button>
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
        var counterValue = document.querySelector("#counter-value");
        var counterIncrement = document.querySelector("#counter-increment");
        var counterDecrement = document.querySelector("#counter-decrement");

        var count = 0;

        this.counterIncrement.addEventListener('click', () => {
            count++;
            updateCounterValue(count);
        });

        this.counterDecrement.addEventListener('click', () => {
            if (count > 0) {
                count--;
                updateCounterValue(count);
            }
        });

        counterValue.addEventListener('input', function() {
            var newValue = parseInt(this.value);
            if (!isNaN(newValue) && newValue >= 0) {
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
