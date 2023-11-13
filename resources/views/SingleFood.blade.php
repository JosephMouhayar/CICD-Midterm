<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Foods</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,600,700,900%7CRaleway:500">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/css/plugins.css">
    <link rel="stylesheet" href="../css/css/style.css">
    <link rel="stylesheet" href="../css/css/lib/bootstrap/dist/css/bootstrap.min.css" />
  </head>
  <body>
    <div class="preloader">
      <div class="wrapper-triangle">
        <div class="pen">
          <div class="line-triangle">
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
          </div>
          <div class="line-triangle">
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
          </div>
          <div class="line-triangle">
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="page">
      <!-- Page Header-->
      <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="56px" data-xl-stick-up-offset="56px" data-xxl-stick-up-offset="56px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-inner-outer">
            <div class="rd-navbar-inner">
                <!-- RD Navbar Panel-->
                
                  <!-- RD Navbar Toggle-->
                  <!-- RD Navbar Brand-->
                
                <div class="rd-navbar-right rd-navbar-nav-wrap">
                  <div class="rd-navbar-main">
                    <!-- RD Navbar Nav-->
                    @if($user == '')
                    <ul class="rd-navbar-nav">
                    <li class="rd-nav-item active">
                      <form action="/" method="get">
                      @csrf
                      <button class="rd-nav-link" style="background-color: transparent;border-color: transparent" name="submit">Home</button>
                      </form>
                      </li>
                      <li class="rd-nav-item active">
                      <form action="/Foods" method="post">
                      @csrf
                      <button class="rd-nav-link" style="background-color: transparent;border-color: transparent" name="submit" value="Foods">Foods</button>
                      </form>
                      </li>
                      <li class="rd-nav-item active">
                      <form action="/Login" method="post">
                      @csrf
                      <button class="rd-nav-link" style="background-color: transparent;border-color: transparent" name="submit">Log in</button>
                      </form>
                      </li>
                    </ul>
                    @endif
                    @if($user != '')
                    <ul class="rd-navbar-nav">
                    <li class="rd-nav-item active">
                      <form action="/welcome" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{ $user->id}}"/>
                      <button class="rd-nav-link" style="background-color: transparent;border-color: transparent" name="submit" value="Foods">Home</button>
                      </form>
                      </li>
                      <li class="rd-nav-item active">
                      <form action="/Foods" method="post">
                      @csrf
                      <input type="hidden" name="uid" value="{{ $user->id}}"/>
                      <button class="rd-nav-link" style="background-color: transparent;border-color: transparent" name="submit" value="Foods">Foods</button>
                      </form>
                      </li>
                      <li class="rd-nav-item active">
                      <form action="/OrderHistory" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{ $user->id}}"/>
                      <button class="rd-nav-link" style="background-color: transparent;border-color: transparent" name="submit" value="history">Order History</button>
                      </form>
                      </li>
                      @if( $user->type == "Cook")
                      <li class="rd-nav-item active">
                      <form action="/MyMenu" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{ $user->id}}"/>
                      <button class="rd-nav-link" style="background-color: transparent;border-color: transparent" name="submit">My Menu</button>
                      </form>
                      </li>
                      <li class="rd-nav-item active">
                      <form action="/Orders" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{ $user->id}}"/>
                      <button class="rd-nav-link" style="background-color: transparent;border-color: transparent" name="submit">My Orders</button>
                      </form>
                      </li>
                      @endif
                      <li class="rd-nav-item active">
                      <form action="/MyCart" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{ $user->id}}"/>
                      <button class="rd-nav-link" style="background-color: transparent;border-color: transparent" name="submit">My Cart</button>
                      </form>
                      </li>
                      <li class="rd-nav-item active">
                      <form action="/" method="get">
                      <button class="rd-nav-link" style="background-color: transparent;border-color: transparent">Log out</button>
                      </form>
                      </li>
                    </ul>
                    @endif
                    
                    
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
<div class="hero mv-single-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- <h1> movie listing - list</h1>
				<ul class="breadcumb">
					<li class="active"><a href="#">Home</a></li>
					<li> <span class="ion-ios-arrow-right"></span> movie listing</li>
				</ul> -->
			</div>
		</div>
	</div>
</div>
<div class="page-single movie-single movie_single">
	<div class="container">
		<div class="row ipad-width2">

			<div class="col-md-4 col-sm-12 col-xs-12">
				
				
				<img src="../images/{{$food->image}}" alt="">
        <br><br>
        @if($food->offer == "0" or $food->offer == "")
        <h4 class="bd-hd">${{$food->price}}</h4>
        @else
        <div class="product-price product-price-old" style="color: white; font-size: 20px">${{$food->price}}</div>
        <div class="product-price"  style="color: white; font-size: 40px">${{$food->price - $food->price * $food->offer / 100}}</div><br><br>
        @endif
        @if($user != '') 
        <div class="button-wrap"> 
          <form action="/Food" method="post">
            @csrf
                  <input type="hidden" name="uid" value="{{$user->id}}"/>
                  <input type="hidden" name="fid" value="{{$food->id}}"/>
                  @if($foodBasket == '')
                  <button class="button button-xs button-secondary button-winona" name="submit" value="addToCart">Add To Cart</button>
                  @else
                  <button class="redbtn" style="width: 260px" name="submit" value="removeFromCart">Remove From Cart</button>
                  @endif

          </form> 
        </div>
        @endif	
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="movie-single-ct main-content">
					
						<form action="/AddReview" method="post">
                        @csrf
						<h1 class="bd-hd">{{$food->name}}</h1>
                        <h2 class="bd-hd">By cook {{$food->fname}} {{$food->lname}}</h2>
                        <br>
            </form>
            <div class="movie-tabs">
						<div class="tabs">
						    <div class="tab-content">
                                <h10 class="bd-hd" style="color:yellow">Description</h10><br><br>
						        <p style="color:white; text-size:20">{{$food->description}} <br>{{$food->calorieCount}}kcal</p>
						    </div>
						</div>
					</div>
            
					<div class="movie-rate">
                        <div class="rv-hd">
                            <form action="/Food" method="post">
                                @csrf
                                @if($user != '')
                                <input type="hidden" name="uid" value="{{$user->id}}"/>
                                @endif
                                <input type="hidden" name="fid" value="{{$food->id}}"/>
                      @if($user != '')
											<div class="top-search" style="width:70%;">
												<input type="text" name='review' style="background-color: transparent; width: 800px; height: 50px" placeholder="Write a review">
                        <div class="button-wrap"> 
                              <button class="button button-xs button-secondary button-winona" name="submit" value="addReview" style="postion: relative; top:-15px; width: 260px; height: 50px">Add Review</button>                   
                        </div>
                        @endif                                           
                       </div>
						            	</div>
                            </form>
					</div>
					<div class="movie-tabs">
						<div class="tabs">
						    <div class="tab-content">
                                <h10 class="bd-hd" style="color:yellow">Reviews</h10><br><br>
						    </div>
                            <div style="margin-left: 10px;width: fit-content;text-align: left">
                            @foreach($review as $reviews)
                            <p style="color:white; text-size:20">{{$reviews->fname}} {{$reviews->lname}}: {{$reviews->description}}</p>
                            <p style="color:white; text-size:20">---------------------------------------------------------------------------------------------------------------------------------------</p>
                            @endforeach    
                            </div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page Footer-->
<footer class="section footer-modern context-dark footer-modern-2">
        <div class="footer-modern-line-2">
          <div class="container">
            <div class="row row-30 align-items-center">
              <div class="col-sm-6 col-md-7 col-lg-4 col-xl-4">
                <div class="row row-30 align-items-center text-lg-center">
                  <div class="col-md-7 col-xl-6"><a class="brand" href="index.html"><img src="../images/logo-inverse-198x66.png" alt="" width="198" height="66"/></a></div>
                  <div class="col-md-5 col-xl-6">
                    <div class="iso-1"><span><img src="../images/like-icon-58x25.png" alt="" width="58" height="25"/></span><span class="iso-1-big">9.4k</span></div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-12 col-lg-8 col-xl-8 oh-desktop">
                <div class="group-xmd group-sm-justify">
                  <div class="footer-modern-contacts wow slideInUp">
                    <div class="unit unit-spacing-sm align-items-center">
                      <div class="unit-left"><span class="icon icon-24 mdi mdi-phone"></span></div>
                      <div class="unit-body"><a class="phone" href="tel:#">+1 718-999-3939</a></div>
                    </div>
                  </div>
                  <div class="footer-modern-contacts wow slideInDown">
                    <div class="unit unit-spacing-sm align-items-center">
                      <div class="unit-left"><span class="icon mdi mdi-email"></span></div>
                      <div class="unit-body"><a class="mail" href="mailto:#">info@demolink.org</a></div>
                    </div>
                  </div>
                  <div class="wow slideInRight">
                    <ul class="list-inline footer-social-list footer-social-list-2 footer-social-list-3">
                      <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                      <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                      <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                      <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-modern-line-3">
          <div class="container">
            <div class="row row-10 justify-content-between">
              <div class="col-md-6"><span>514 S. Magnolia St. Orlando, FL 32806</span></div>
              <div class="col-md-auto">
                <!-- Rights-->
                <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span></span><span>.&nbsp;</span><span>All Rights Reserved.</span><span> Design&nbsp;by&nbsp;<a href="https://www.templatemonster.com">TemplateMonster</a></span></p>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="../js/core.min.js"></script>
    <script src="../js/script.js"></script>
    <!-- coded by Himic-->
  </body>
</html>