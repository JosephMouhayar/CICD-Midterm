<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Orders</title>
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
    <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
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

      

      <h1>Orders</h1>

<table class="table">
    <thead>
        <tr>
            <th>
                Order id
            </th>
            <th>
                Customer email
            </th>
            <th>
                Items
            </th>
            <th>
                Location
            </th>
            <th>
                Total price
            </th>
            <th>
                Order Status
            </th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>
                {{$order->id}}
            </td>
            <td>
                {{$order->email}}
            </td>
            <td>
            @foreach($foods as $food)
                {{$food->name}}  x{{$food->qty}}
                <br>
            @endforeach
            </td>
            <td>
                {{$order->location}}
            </td>
            <td>
                {{$order->totalPrice}}
            </td>
            <td>
                {{$order->status}}
            </td>
            <td>
                <form action="/OrderHistory" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <input type="hidden" name="oid" value="{{$order->id}}">
                @if($order->status == "Pending" || $order->status == "In Progress")
                <input type="submit" name="submit" value="Cancel Order">
                @endif
                </form>
            </td>
        </tr>
@endforeach
    </tbody>
</table>
<!-- Page Footer-->
<footer class="section footer-modern context-dark footer-modern-2">
        <div class="footer-modern-line-2">
          <div class="container">
            <div class="row row-30 align-items-center">
              <div class="col-sm-6 col-md-7 col-lg-4 col-xl-4">
                <div class="row row-30 align-items-center text-lg-center">
                  <div class="col-md-7 col-xl-6"><a class="brand" href="index.html"><img src="../images/logo-inverse-198x66.png" alt="" width="198" height="66"/></a></div>
                  <div class="col-md-5 col-xl-6">
                    <div class="iso-1"><span><img src="../../images/like-icon-58x25.png" alt="" width="58" height="25"/></span><span class="iso-1-big">9.4k</span></div>
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