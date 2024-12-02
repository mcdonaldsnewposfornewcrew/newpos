<!DOCTYPE html>

<html>
    <head>
        <title>Contacts - McDonald's POS System</title>
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

    <body>
        <header id="header" class="fixed-top">
            <div class="container d-flex justify-content-center align-items-center">
                <a href="index.php" class="logo mr-auto"><img src="images/logo.jpg" width="150px"/></a>
            </div>

            <div class="container d-flex justify-content-center align-items-center">

                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="pos.php">Shop</a></li>
                        <li class="active"><a href="contacts.php">Contacts</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="custWrap contact">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <h1>Contact us</h1>
                <div class="cont">
                    <p>Contact us for any questions or inquiries. We would be happy to answer your questions and set up a meeting time with you. McDonald can help you with any problem that may arise!</p>
                </div>
            </div>

            <div class="row d-flex justify-content-center align-items-center">
                <div class="custCon col-md-3">
                    <div class="box">
                        <div class="icon d-flex justify-content-center align-items-center"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                        <div class="text d-flex flex-column">
                            <h3>Address</h3>
                            <p>110 N. Carpenter St. Chicago, IL 60607</p>
                        </div>
                    </div>

                    <div class="box">
                        <div class="icon d-flex justify-content-center align-items-center"><i class="fa fa-phone" aria-hidden="true"></i></div>
                        <div class="text d-flex flex-column">
                            <h3>Phone</h3>
                            <p>02-8635490</p>
                        </div>
                    </div>

                    <div class="box">
                        <div class="icon d-flex justify-content-center align-items-center"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                        <div class="text d-flex flex-column">
                            <h3>Email</h3>
                            <p>writeus@ph.mcd.com</p>
                        </div>
                    </div>
                </div>

                <div class="contactForm col-md-3">
                    <form id="formAdd">
                        <h2>Send Message</h2>
                        <div class="inputBox">
                            <input type="text" class="fr" name="" required>
                            <span>Full name</span>
                        </div>

                        <div class="inputBox">
                            <input type="email" class="fr" name="" required>
                            <span>Email</span>
                        </div>

                        <div class="inputBox">
                            <textarea required></textarea>
                            <span>Message</span>
                        </div>

                        <div class="inputBox">
                            <input type="button" onclick="alertNotif()" class="cusBtn btn btn-outline-danger" name="" value="Send">
                        </div>
                    </form>
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