<!DOCTYPE html>

<html>
    <head>
        <title>Home - McDonald's POS System</title>
        <link rel="shortcut icon" type="image/jpg" href="images/icon.jpg">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    </head>

    <body>
        <header id="header" class="fixed-top">
            <div class="container d-flex justify-content-center align-items-center">
                <a href="index.php" class="logo mr-auto"><img src="images/logo.jpg" width="150px"/></a>
            </div>

            <div class="container d-flex justify-content-center align-items-center">

                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="pos.php">Shop</a></li>
                        <li><a href="contacts.php">Contacts</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="custWrap">
            <div class="row">
                <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                    <div>
                        <div class="welcome">
                            <p class="wText">Welcome to </p>
                            <img src="images/logo2.jpg" width="100px">
                        </div>
    
                        <div>
                            <p class="subtitle">An <span class="emp">Exclusive POS Website</span> for the restaurant</p>
                        </div>
    
                        <div>
                            <p class="desc">Built to make it easier to manage sales and order products online!</p>
                        </div>
    
                        <div>
                            <a href="pos.php"><button type="button" id="btnShop" class="btn btn-outline-danger">Go to Shop!</button></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 align-items-center">
                    <img src="images/sample.jpg"/>
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
    </body>
</html>