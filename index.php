<?php
include 'backend/controller.php';
$controller = new Controller();
$online_tool_list = $controller->online_tool_list_controller();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta name="description" content="Life on the park">
    <meta name="keywords" content="Charisma">
    <meta name="author" content="Impact North">
    <link rel="icon" type="image/png" href="assets/Charisma-on-the-Park.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css"> 
    <?php 
    foreach ($online_tool_list as $data){

      echo html_entity_decode($data['header_content']);

    } ?>
    <title>CHARISMA ON THE PARK | Register</title>
</head>
<body>
<header>
    <div class="d-flex justify-content-center p-4">
        <div id="logoWrapper">
            <img src="assets/Charisma-on-the-Park.png" alt="logo" class="img-fluid"/>
        </div>
    </div>
        <div id="banner" class="d-flex justify-content-center">
            <div id="bannerWrapper">
                <img src="assets/banner-min.jpg" class="img-fluid"/>
            </div>
            <div class="banner-center">
                <h1 id="bannerTxt" class="d-block p-3">life on the park.</h1>
                <button class="btn btn-primary bnt-lg" type="button">Register Now</button>
            </div>
            <div id="bannerLftTxt">CHARISMA</div>
            <div id="bannerRghtTxt">ON THE PARK</div>
        </div>
</header>
<div class="container pt-4">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7 col-lg-8 col-xl-5">
            <div class="col-xs-12">
                <h3>the way <span class="span-break">to live.</span></h3>
                <p class="lead">PHASE 2 - CONDOS AT VAUGHAN MILLS</p>
                <p>Alluring, refined and perfectly positioned - Charisma On the Park presents condo living that redines what a true new home experience  is all about. located at Jane and Rutherford, at the centre of all Vaughan has to offer, Charisma literally puts you on the doorstep of shops, restaurants and entertainment. the comforts of home have never been so complete - outdoor pool, bocce courts, party rooms, a theatre and so much more. Experience life on the park at Charisma. Reigster today to recieve the latest updates.</p>
            </div>
        </div>
        <div class="col-md-5 col-lg-4 col-xl-4 d-flex justify-content-center align-items-center">
            <div class="post-img-wrapper">
                <img src="assets/rendering.jpg" alt="image" class="img-fluid post-img"/>
                <div class="post-img-background"></div>
                <div class="post-img-txt d-flex justify-content-center align-items-center">
                    <span class="text-center" style="width: 170px">COMING SPRING 2019</span>    
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 d-flex justify-content-center mt-5">
        <h3 class="title pl-4 pr-4 pb-3">REGISTER</h3>
    </div>
    <div class="col-xs-12" id="contact-form">
    <form method="post">
        <div id="formMsg"></div>
        <div class="form-row mt-4">
            <div class="col-md-6 mb-3">
                <input type="text" name="firstName" id="firstName" class="custom-form form-control form-control-lg" placeholder="*First name">
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" name="lastName" id="lastName" class="custom-form form-control form-control-lg" placeholder="*Last name">
            </div>
            <div class="col-md-6 mb-3">
                <input type="email" name="email" id="email" class="custom-form form-control form-control-lg" placeholder="*Email Address">
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" name="phoneNumber" id="phoneNumber" class="custom-form form-control form-control-lg" placeholder="*Phone Number">
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" name="city" id="city" class="custom-form form-control form-control-lg" placeholder="*City">
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" name="postalCode" id="postalCode" class="custom-form form-control form-control-lg" placeholder="*Postal Code">
            </div>
            <div class="col-md-6 mt-3">
                <p class="lead">I AM INTERESTED IN..</p>
            </div>
            <div class="col-md-12">
            <div class="form-group row">
                <label for="unitSize" class="custom-form col-sm-3 col-form-label" id="unitSizeLabel">*Unit Size</label>
                <div class="col-sm-6">
                    <div class="input-group">
                        <input type="text" class="custom-form form-control form-control-lg" name="unitSize" id="unitSize">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="validationTooltipUsernamePrepend">FT<sup>2</sup></span>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-12">
            <div class="form-group row">
                <label for="contactSource" class="custom-form col-sm-3 col-form-label" id="contactSourceLabel">*How did you hear about us?</label>
                <div class="col-sm-6">
                <input type="text" class="custom-form form-control form-control-lg" name="contactSource" id="contactSource">
                </div>
            </div>
            </div>
            <div class="col-md-12">
            <div class="form-group row">
                <label for="priceRange" class="custom-form col-sm-3 col-form-label" id="priceRangeLabel">*Price Range</label>
                <div class="col-sm-6">
                <input type="text" class="custom-form form-control form-control-lg" name="priceRange" id="priceRange">
                </div>
            </div>
            </div>
            <div class="col-md-12 mb-1">
                <div class="form-group row">
                    <label for="isBroker" class="custom-form col-sm-3 col-form-label" id="isBrokerLabel">*Are you a broker?</label>
                    <div class="col-sm-6">
                        <div class="col-sm-12 col-lg-5 col-xl-4 broker-radio-wrapper">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="custom-form form-check-input mr-1" name="isBroker" value="Yes">Yes
                                    <span></span>
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="custom-form form-check-input mr-1" name="isBroker" value="No">No
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-1">
                <div class="form-group">
                    <div class="form-check">
                        <input class="custom-form form-check-input" type="checkbox" id="antiSpamCheck" name="antiSpamCheck">
                        <label class="form-check-label" for="antiSpamCheck">
                        *In accordance with Canadian Anti-Spam Legislation, i give my consent to receive electronic communications from Greenpark Group regarding communities, current communities, leasing opportunities, announcements, invitations, events, promotions and all other related electronic communications.
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button type="button" id="submit" class="btn btn-primary btn-lg" name="submit">Submit</button>
            </div>
        </div>
    </form>
    </div>
</div>
<footer class="mt-4 d-flex justify-content-center">
    <div class="footer">
        <div class="p-5 d-flex justify-content-center align-items-center" id="footerContent1">
            <div class="mr-2" id="footerContent1Img">
                <img src="assets/Greenpark-Group.png" class="img-fluid"/>
            </div>
            <div id="footerContent1Social">
            <div class="social-links">
                <a href="#"><i class="fa fa-linkedin fa-lg"></i></a>
                <a href="https://www.facebook.com/brijeshh.ahirr"><i class="fa fa-facebook fa-lg"></i></a>
                <a href="https://www.linkedin.com/in/brijesh-ahir-9b8b40101/"><i class="fa fa-twitter fa-lg"></i></a>
                <a href="#"><i class="fa fa-google-plus fa-lg"></i></a>
            </div>
            </div>
        </div>
        <div id="footerContent2">
        <div class="col-sm-12 text-white text-center" id="footerContent2Text">
            <p>&copy; 2017 Greenpark holdings Ltd. Greenpark is a registered trademark of Greenpark Holdings Ltd. All Rights Reserved. <span class="span-break">Prices and specfications subject to change without notice E. & O.E. Brokers protected. Privacy Policy / Accessibility</span></p>
        </div>
    </div>
    </div>  
</footer>
<a href="#" id="scrollup">Scroll</a>
<noscript>You need to enable JavaScript to run this app.</noscript>
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<?php 
foreach ($online_tool_list as $data){

    echo html_entity_decode($data['footer_content']);

} ?>
</body>
</html>
