<?php 
require_once'functions.php';
?>
   <html>
    <head>
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!--footer section-->
    <footer id="footer" class="py-5" style="background:#232323; color:#fff;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>Follow</h4>
                    <div class="socials-icon">
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-linkedin"></i>
                        <i class="fa fa-whatsapp"></i>
                        <i class="fa fa-youtube"></i>
                        </div>
                        <div class="tags">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Autumn</p>
                                    <p>Winter</p>
                                    <p>Spring</p>
                                    <p>Summer</p>
                                </div>
                                <div class="col-md-6">
                                    <p>Casual</p>
                                    <p>Classic</p>
                                    <p>Urban</p>
                                    <p>Sports</p>
                                </div>
                            </div>
                        </div>
                    
                </div>
                <div class="col-md-8">
                    <h3>New Arrivals Discounts Contact us</h3>
                    <p>Subscribe to get the latest on sale, new reseales and more...</p>
                    <form>
                        <input type="text" class="subs-field">
                        <button class="subs-btn">Subscribe</button>
                    </form>
                    <div class="payment">
                        <p>supported payment systems</p>
                        <img src="imgs/payments.png" class="w-100 img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <div class="copyright py-2">
               <div class="container">
                   <!--<p>&copy;2022 All rights reserve Terms of use<br>Privacy Policy</p>-->
                   <?=template_footer()?>
               </div>
    </div>
   