<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>T</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <!-- Bootstrap icons-->
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css') }}"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

    <style>
        $primary: #rgb(0, 0, 0);
        $font: 'Lato', sans-serif;

        *:focus {
            outline: none;
        }

        .left {
            width: 70%;
            /* Initially set to 70% */
            float: left;
            clear: both;
        }

        .right {
            width: 30%;
            /* Initially set to 30% */
            float: right;
            margin-bottom: 25px;
        }

        body {
            background: -moz-linear-gradient(-45deg, #ffffff 0%, #ffffff 100%);
            /* FF3.6-15 */
            background: -webkit-linear-gradient(-45deg, #ffffff 0%, #ffffff 100%);
            /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(135deg, #ffffff 0%, #000000 100%);
            /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            height: auto;
            min-height: calc(100vh);
            font-family: $font;
            font-weight: 500;

            #wrapper {
                height: 100vh;

                display: flex;
                display: -webkit-flex;
                -webkit-align-items: center;
                align-items: center;
                -webkit-justify-content: center;
                justify-content: center;

                #container {
                    background: white;
                    height: 600px;
                    min-width: 600px;
                    width: 800px;
                    z-index: 1;
                    -webkit-box-shadow: 0px 3px 15px -1px rgba(0, 0, 0, 0.2);
                    -moz-box-shadow: 0px 3px 15px -1px rgba(0, 0, 0, 0.2);
                    box-shadow: 0px 3px 15px -1px rgba(0, 0, 0, 0.2);

                    #left-col {
                        min-width: 240px;
                        height: 100%;
                        float: left;
                        background: #000000;

                        #left-col-cont {
                            margin: 20px 25px;
                            color: white;

                            h2 {
                                margin: 25px 0 0 0;
                            }

                            div.item {
                                margin: 30px 0;
                                clear: both;

                                .img-col {
                                    width: 30%;
                                    float: left;

                                    img {
                                        width: 100%;
                                        max-height: 100px;
                                    }
                                }

                                .meta-col {
                                    width: 70%;
                                    float: right;

                                    h3 {
                                        font-size: 0.7em;
                                        margin: 10px 0 0 5px;
                                    }

                                    p {
                                        font-size: 0.9em;
                                        margin: 5px 0 0 5px;
                                        opacity: .5;
                                    }
                                }
                            }

                            .total {
                                text-transform: uppercase;
                                text-align: left;
                                font-size: 0.7em;
                                opacity: .5;
                                margin: 125px 0 5px 0;
                            }

                            h4#total-price {
                                text-align: left;
                                font-size: 2em;
                                margin: 0;

                                span {
                                    color: #ffffff;
                                }
                            }
                        }
                    }

                    #right-col {
                        min-width: 310px;
                        height: 100%;
                        margin: 20px 25px;
                        float: left;

                        h2 {
                            float: left;
                            margin: 6px 0 0 0;
                        }

                        div#logotype {
                            float: right;
                            margin: 4px 0 0 0;

                            img {
                                width: 80px;
                                height: auto;

                                &#visa {
                                    margin-top: -10px;
                                }
                            }
                        }
                    }

                    label {
                        display: block;
                        font-family: $font;
                        font-size: 0.7em;
                        font-weight: 600;
                        text-transform: uppercase;
                        margin: 14px 0 4px;

                        &#cvc-label {
                            i {
                                cursor: pointer;
                                margin-left: 3px;
                            }
                        }
                    }

                    input {
                        display: block;
                        padding: 6px 8px;
                        border: 1px solid lightgrey;
                        border-radius: 2px;
                        font-size: 0.9em;

                        &:focus {
                            border-color: $primary;
                        }

                        &::-webkit-input-placeholder {
                            opacity: .5;
                        }

                        &::-moz-placeholder {
                            opacity: .5;
                        }

                        &#cardholder {
                            width: calc(100% - 18px);
                        }

                        &#cvc {
                            width: calc(100% - 18px);
                        }
                    }

                    select {
                        border: 1px solid lightgrey;
                        border-radius: 2px;
                        background: none;
                        width: 90px;
                        font-weight: 500;
                        font-size: 0.9em;
                        padding: 6px 8px;
                        color: rgba(0, 0, 0, .2);
                        -webkit-appearance: none;
                        -moz-appearance: none;
                        appearance: none;
                    }

                    .button {
                        align-items: center;
                        background-color: var(--color-primary);
                        border-radius: 999em;
                        color: #fff;
                        display: flex;
                        gap: 0.5em;
                        justify-content: center;
                        padding-block: 0.75em;
                        padding-inline: 1em;
                        transition: 0.3s;
                    }

                    .button:focus,
                    .button:hover {
                        background-color: #ffffff;
                    }

                    .button--full {
                        inline-size: 100%;
                    }

                    p#support {
                        font-size: 0.7em;
                        text-align: center;
                        color: rgba(0, 0, 0, .5);

                        a {
                            text-decoration: none;
                            color: inherit;
                            padding: 0 1px 2px 1px;
                            border-bottom: 1px solid rgba(0, 0, 0, .5);

                            &:hover {
                                padding-bottom: 3px;
                            }
                        }
                    }
                }
            }
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="container">
            <div id="left-col">
                <div id="left-col-cont">
                    <form action="{{ route('pay') }}" class="form" method="POST">
                        @csrf
                        @method('POST')
                        <h2>Summary</h2>
                        @foreach ($products as $product)
                            <div class="item">
                                <hr>
                                <input type="hidden" value="{{$product->product_id}}" name="product_id[]">
                                <input type="hidden" value="{{$product->quantity}}" name="quantity[]">
                                <div class="img-col">
                                    <img src="{{ asset($product->image) }}" alt="">
                                </div>
                                <div class="meta-col">
                                    <h3><b>{{ $product->name }}</b></h3>
                                    <p class="price"><input type="hidden" name="price[]" value="{{$product->price}}"> {{$product->price}} </p>
                                    <p class="price">Quantity: {{ $product->quantity }}</p>
                                </div>
                            </div>
                            @endforeach
                        <div class="total">
                            <p>
                            <h5> Discount Code:</h5>
                            <input type="text">
                            <b>Rs.xxx</b></p>

                            <p>
                            <h5> Delivery Charge:</h5>
                            <h6><b>Rs.150</b></h6>
                            </p>
                            <p>
                            <h5> Total:</h5>
                            <h6><b>Rs.{{ $total }}</b></h6>
                            </p>

                            <p>
                                <?php $total = $total + 150; ?>
                            <h5> Total Amount:</h5>
                            <h6><b>Rs.{{ $total }}</b></h6>
                            </p>
                        </div>
                </div>
            </div>
            <div id="right-col">
                <h2>Payment</h2><br><br>
                <div class="form-group">
                    <hr>
                    <input type="hidden" name="user_id" value="{{$products->first()->user_id}}">
                    <input type="text" class="form-control" name="name" placeholder="{{$user->first()->name}}" value="{{$user->first()->name}}"><br>
                    <input type="text" class="form-control" name="email" value="{{$user->first()->email}}"><br>
                    <input type="text" class="form-control" name="address" placeholder="Enter Address">
                    <small>Eg: Balkhu-14, Kathmandu</small>
                    <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number"><br>
                </div><br>
                <div class="form-group">
                    <div class="form__radio">   
                        <label for="cod">
                            <img src="{{ asset('COD.png') }}" width="30px">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button id="payment-button" name="pay" value="Cash on Delivery"
                                style="background-color: #1a8f24; cursor: pointer; color: #fff; border: none; padding: 5px 10px; border-radius: 2px">Cash
                                On Delivery</button>
                        </label>


                        <label for="khalti"><img src="{{ asset('Khalti.png') }}" width="50px">
                            <button onclick="dummyPay()" id="payment-button" name="pay" value="khalti"
                                style="background-color: #5C2D91; cursor: pointer; color: #fff; border: none; padding: 5px 10px; border-radius: 2px">Pay
                                with Khalti</button>
                        </label>

                        <label for="esewa">
                            <src="{{ asset('E-Sewa.png') }}" width="50px">
                            <button onclick="dummyPay()" id="payment-button" name="pay" value="esewa"
                                style="background-color: #1a8f24; cursor: pointer; color: #fff; border: none; padding: 5px 10px; border-radius: 2px">Pay
                                with E-Sewa</button>
                            </button></label>
                        </form>
                    </div>

                </div>
            </div>
        </div>

</body>

</html>
