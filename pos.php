<!DOCTYPE html>

<html>
    <head>
        <title>Shop - McDonald's POS System</title>
        <link rel="shortcut icon" type="image/jpg" href="images/icon.jpg">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>

    <?php 
        $paidAmount = isset($_POST['paidAmount'])? $_POST['paidAmount'] : "";
        $num = isset($_POST['num'])? $_POST['num'] : 0 ;

        $subtotal = 0;
        for($i = 0; $i <= $num; $i++){
            $indexTitle = "productTitle".$i;
            $indexPrice = "productPrice".$i;
            $indexQuantity = "productQuantity".$i;
            
            if(isset($_POST[$indexTitle])){
                $price = $_POST[$indexPrice];
                $nPrice = (float)trim($price, "₱");
                $quantity = (float)$_POST[$indexQuantity];
                $subtotal = $subtotal + ($quantity * $nPrice);
            }

        }

        $total;
        $vat = 0;

        $vat = (float)$subtotal * 0.12;
        $total = (float)$paidAmount - ($vat + (float)$subtotal);

        if($paidAmount != ""){
            $paidAmount = number_format((float)$paidAmount, 2);
        }
    ?>

    <body>
        <header id="header" class="fixed-top">
            <div class="container d-flex justify-content-center align-items-center">
                <a href="index.php" class="logo mr-auto"><img src="images/logo.jpg" width="150px"/></a>
            </div>

            <div class="container d-flex justify-content-center align-items-center">

                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="pos.php">Shop</a></li>
                        <li><a href="contacts.php">Contacts</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="custWrap pos" style="padding-top: 200px; padding-inline: 20px;">
            <div class="row d-flex justify-content-between">
                <div class="cart col-md-4 border border-danger">
                    <h2 class="cart-title">Sale Receipt</h2>
                    
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form">

                        <div class="reciept">
                            <div class="cart-content">
                                <?php 
                                    $indexTitle;
                                    $indexPrice;
                                    $indexQuantity;
                                    $indexProductImg;

                                    for($i = 0; $i <= $num; $i++){
                                        $indexTitle = "productTitle".$i;
                                        $indexPrice = "productPrice".$i;
                                        $indexQuantity = "productQuantity".$i;
                                        $indexProductImg = "productImg".$i;

                                        if(isset($_POST[$indexTitle])){
                                            $title = $_POST[$indexTitle];
                                            $price = $_POST[$indexPrice];
                                            $quantity = $_POST[$indexQuantity];
                                            $productImg = $_POST[$indexProductImg];
        
                                            echo "
                                                <div class='row cart-box'>
                                                    <img src='$productImg' alt='' class='col cart-img'>
                                                    <div class='col-md-9 detail-box' style='width: 50%;'>
                                                        <div class='cart-product-title' style='font-weight: 500;'>$title</div>
                                                        <div class='cart-price'>$price</div>
                                                        <input type='number' value='$quantity' name='$indexQuantity' class='cart-quantity'>
                                                        <input type='hidden' name='$indexTitle' value='$title'>
                                                        <input type='hidden' name='$indexPrice' value='$price'>
                                                        <input type='hidden' name='$indexProductImg' value='$productImg'>
                                                        <input type='hidden' name='num' value='$num'>
                                                    </div>
                                                    <i class='col fa fa-trash cart-remove' aria-hidden='true'></i>
                                                </div>
                                            ";
                                        }
                                    }
                                ?>
                            </div>

                            <div class="total">
                                <div class="total-title">Total</div>
                                <!-- Make Computation through PHP -->
                                <div class="total-price">
                                    <?php 
                                        echo "₱".number_format((float)$subtotal, 2);
                                    ?>
                                </div>
                            </div>

                            <div class="vat total">
                                <div class="vat-title">VAT</div>
                                <div class="vat-price">
                                    <?php 
                                        echo "₱".number_format((float)$vat, 2);
                                    ?>
                                </div>
                            </div>

                        
                            <div class="paid total">
                                <div class="paid-title">Paid Amount</div>
                                <div class="paid-price">
                                    <?php 
                                        echo "₱".$paidAmount;
                                    ?>
                                </div>
                            </div>

                            <div class="overall total">
                                <div class="overall-title">Change</div>
                                <div class="overall-price">
                                    <?php 
                                        if((float)$total < 0){
                                            echo "<span style='color: red;'>₱".number_format((float)$total, 2)."</span>";
                                        }else{
                                            echo "₱".number_format((float)$total, 2);
                                        }
                                    ?>
                                </div>
                            </div>

                            <button type="button" class="col inputpay btn-buy">Input Payment</button>
                        </div>

                        <div class="payment" style="display: none;">
                            <div class="total" style="margin-top: 30px">
                                <div class="total-title">Total</div>
                                <div class="total-price">
                                    <?php 
                                        echo "₱".number_format((float)$subtotal, 2);
                                    ?>
                                </div>
                            </div>

                            <div class="paid total">
                                <div class="paid-title">Paid Amount</div>
                                <input type="number" class="paid" placeholder="Please input amount paid by the customer" type="any" name="paidAmount" required>
                            </div>

                            <div class="row" style="padding-top: 20px">
                                <button type="button" class="d-flex col inputpay btn-buy">Go Back</button>
                                <button type="submit" class="col btn-buy">Order!</button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div class="col-md-8">
                    <ul class="nav nav-tabs" id="tabs1">
                        <li class="nav-item">
                            <button class="cust btn btn-danger nav-link active" data-bs-toggle="tab" data-bs-target="#breakfast">Breakfast</button>
                        </li>
                        <li class="nav-item">
                            <button class="cust btn btn-danger nav-link" data-bs-toggle="tab" data-bs-target="#burgers">Burgers</button>
                        </li>
                        <li class="nav-item">
                            <button class="cust btn btn-danger nav-link" data-bs-toggle="tab" data-bs-target="#chicken">Chicken and Platters</button>
                        </li>
                        <li class="nav-item">
                            <button class="cust btn btn-danger nav-link" data-bs-toggle="tab" data-bs-target="#drinks">Drinks and Desserts</button>
                        </li>
                        <li class="nav-item">
                            <button class="cust btn btn-danger nav-link" data-bs-toggle="tab" data-bs-target="#mcCafe">McCafe</button>
                        </li>
                        <li class="nav-item">
                            <button class="cust btn btn-danger nav-link" data-bs-toggle="tab" data-bs-target="#fries">Fries</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="tabs-content" style="padding-top: 30px; padding-left: 15px;">
                        <div class="tab-pane active" id="breakfast">
                            <div class="row" style="margin-top: 10px;">
                                <div class="col product-box">
                                    <img src="images/eggDesal.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Cheesy Eggdesal</h2>
                                    <span class="price">₱39.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/mcMuffin.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Sausage McMuffin with Egg</h2>
                                    <span class="price">₱124.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/hotcake.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">2pc. Hotcake with Sausage</h2>
                                    <span class="price">₱143.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/sausage.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Sausage Platter with Rice</h2>
                                    <span class="price">₱87.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
                            </div>
                            
                            <div class="row" style="margin-top: 10px;">
                                <div class="col product-box">
                                    <img src="images/eggMcMuffin.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Egg McMuffin</h2>
                                    <span class="price">₱98.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/hashbrown.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Hash Browns</h2>
                                    <span class="price">₱37.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/hotcakes.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">3pc. Hotcakes</h2>
                                    <span class="price">₱110.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>

                                <div class="col"></div>
                            </div>
                        </div>
                        
                        <div class="tab-pane" id="burgers">
                            <div class="row" style="margin-top: 10px;">
                                <div class="col product-box">
                                    <img src="images/bigmac.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Big Mac</h2>
                                    <span class="price">₱186.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/burger.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Burger McDo</h2>
                                    <span class="price">₱94.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/deluxe.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Cheeseburger Deluxe</h2>
                                    <span class="price">₱132.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/cheeseburger.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Cheeseburger</h2>
                                    <span class="price">₱114.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
                            </div>
                            
                            <div class="row" style="margin-top: 10px;">
                                <div class="col product-box">
                                    <img src="images/mcCrispy.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">McCrispy Chicken Sandwich</h2>
                                    <span class="price">₱103.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/mcChicken.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">McChicken Sandwich</h2>
                                    <span class="price">₱155.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/quarter.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Quarter Pounder with Cheese</h2>
                                    <span class="price">₱186.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/cheesyburger.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Cheesy Burger McDo</h2>
                                    <span class="price">₱104.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="chicken">
                            <div class="row" style="margin-top: 10px;">
                                <div class="col product-box">
                                    <img src="images/1pcChickenRice-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">1pc. Chicken Mcdo with Rice</h2>
                                    <span class="price">₱113.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
                                
                                <div class="col product-box">
                                    <img src="images/1pcChickenSpag-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">1pc. Chicken McDo with McSpaghetti</h2>
                                    <span class="price">₱149.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/2pcChickenRice-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">2pc. Chicken Mcdo with Rice</h2>
                                    <span class="price">₱194.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/6pcNuggestswFries-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">6pc. Chicken McNuggets with Fries</h2>
                                    <span class="price">₱157.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
                            </div>
                            
                            <div class="row" style="margin-top: 10px;">
                                <div class="col product-box">
                                    <img src="images/NutritionalFacts-McCrispyFilletMeal-min-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">McCrispy Chicken Fillet with Rice</h2>
                                    <span class="price">₱85.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>

                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col"></div>
                            </div>
                        </div>

                        <div class="tab-pane" id="drinks">
                            <div class="row" style="margin-top: 10px;">
                                <div class="col product-box">
                                    <img src="images/PineappleJuice-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Pineapple Juice</h2>
                                    <span class="price">₱65.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/OrangeJuice-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Orange Juice</h2>
                                    <span class="price">₱65.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/McFlurrywithOreo-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">McFlurry with Oreo Cookies</h2>
                                    <span class="price">₱85.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/UbeMcDip-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Ube Mcdip</h2>
                                    <span class="price">₱16.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
                            </div>
                            
                            <div class="row" style="margin-top: 10px;">
                                <div class="col product-box">
                                    <img src="images/StrawberryMcDip-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Strawberry McDip</h2>
                                    <span class="price">₱16.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/ChocoMcDip-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Chocolate McDip</h2>
                                    <span class="price">₱18.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/VanillaSundaeCone-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Vanilla Sundae Cone</h2>
                                    <span class="price">₱10.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/HotFudgeSundae-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Hot Fudge Sundae</h2>
                                    <span class="price">₱32.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
                            </div>

                            <div class="row" style="margin-top: 10px;">
                                <div class="col product-box">
                                    <img src="images/ApplePie-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Apple Pie</h2>
                                    <span class="price">₱37.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/CokeMcFloat-ALBUMMAINPHOTO-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Coke McFloat</h2>
                                    <span class="price">₱32.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/McCafePremiumRoastCoffee-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">McCafe Premium Roast Coffee</h2>
                                    <span class="price">₱25.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/NutritionalFacts-CaramelSundae-min-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Hot Caramel Sundae</h2>
                                    <span class="price">₱32.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="mcCafe">
                            <div class="row" style="margin-top: 10px;">
                                <div class="col product-box">
                                    <img src="images/McCafe-Americano-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">McCafe Americano</h2>
                                    <span class="price">₱90.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/McCafe-Capuccino-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">McCafe Capuccino</h2>
                                    <span class="price">₱95.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/McCafe-Espresso-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">McCafe Espresso</h2>
                                    <span class="price">₱80.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/McCafe-CafeLatte-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">McCafe Cafe Latte</h2>
                                    <span class="price">₱95.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
                            </div>
                            
                            <div class="row" style="margin-top: 10px;">
                                <div class="col product-box">
                                    <img src="images/McCafe-Macchiato-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">McCafe Macchiato</h2>
                                    <span class="price">₱80.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/McCafe-PremiumHotChocolate-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">McCafe Premium Hot Chocolate</h2>
                                    <span class="price">₱95.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/McCafe-IcedMocha-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">McCafe Iced Mocha</h2>
                                    <span class="price">₱115.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/McCafe-IcedAmericano-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">McCafe Iced Americano</h2>
                                    <span class="price">₱100.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
                            </div>
                            
                            <div class="row" style="margin-top: 10px;">
                                <div class="col product-box">
                                    <img src="images/McCafe-IcedLatte-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">McCafe Iced Latte</h2>
                                    <span class="price">₱105.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/McCafe-DoubleChocoFrappe-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">McCafe Iced Double Choco Frappe</h2>
                                    <span class="price">₱135.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
                                
                                <div class="col product-box">
                                    <img src="images/McCafe-CaramelFrappe-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">McCafe Caramel Frappe</h2>
                                    <span class="price">₱130.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/McCafe-MochaFrappe-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">McCafe Mocha Frappe</h2>
                                    <span class="price">₱140.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
                            </div>

                            <div class="row" style="margin-top: 10px;">
                                <div class="col product-box">
                                    <img src="images/McCafe-FrappeLatter-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">McCafe Latte Frappe</h2>
                                    <span class="price">₱120.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/McCafe-StrawberrySmoothie-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">McCafe Strawberry Smoothie</h2>
                                    <span class="price">₱120.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/BlueberryCheesecake-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Blueberry Cheesecake</h2>
                                    <span class="price">₱135.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/DarkChocolateFudgeCake-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Dark Chocolate Cake</h2>
                                    <span class="price">₱120.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
                            </div>

                            <div class="row" style="margin-top: 10px;">
                                <div class="col product-box">
                                    <img src="images/OreoCheesecake-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Oreo Cheesecake</h2>
                                    <span class="price">₱35.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/Cookie-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title" style="padding-bottom: 10px;">Chocolate Chip Cookie</h2>
                                    <span class="price">₱60.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>

                                <div class="col"></div>
                                <div class="col"></div>
                            </div>
                        </div>

                        <div class="tab-pane" id="fries">
                            <div class="row" style="margin-top: 10px;">
                                <div class="col product-box">
                                    <img src="images/medium.jpeg" alt="" class="product-img" width="250px">
                                    <h2 class="product-title">Small Fries Solo</h2>
                                    <span class="price">₱40.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/Fries-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Medium Fries Solo</h2>
                                    <span class="price">₱60.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>
    
                                <div class="col product-box">
                                    <img src="images/Fries-250.jpeg" alt="" class="product-img">
                                    <h2 class="product-title">Large Fries Solo</h2>
                                    <span class="price">₱80.00</span>
                                    <i class="fa fa-cart-plus add-cart" aria-hidden="true"></i>
                                </div>

                                <div class="col"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer>
            <p>Follow us</p>
            <ul>
                <li><a href="https://www.facebook.com/McDo.ph" target="_blank"><i class="fa fa-facebook"></i></a></li>
                 <li><a href="https://twitter.com/McDonaldsCorp#:~:text=McDonald's%20Corporation%20(%40McDonaldsCorp)%20%2F%20Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://www.instagram.com/mcdonaldscorp/?hl=en" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://www.pinterest.ph/mcdonalds/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
            </ul>

            <div class="copyright">
                <p>Copyright &copy;2023 BSCS3A. Designed by Exceil Matthew Carpio</p>
            </div>
        </footer>

        <script src="main.js"></script>
    </body>
</html>