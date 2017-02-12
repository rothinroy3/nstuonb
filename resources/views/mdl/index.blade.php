<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NSTU Online Notice Board</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="{{ asset('notice_files/images/android-desktop.png') }}">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('mdl-file/notice_files/images/ios-desktop.png') }}">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="{{ asset('mdl-file/notice_files/images/favicon.png') }}">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.1/material.deep_purple-pink.min.css">
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('mdl-file/notice_files/styles.css') }}">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://code.getmdl.io/1.1.1/material.min.js"></script>
  
  <script src="{{ asset('mdl-jquery-modal-dialog.js') }}"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('mdl-jquery-modal-dialog.css') }}">
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    .tab1:hover{ 
      color:#e3e3e3!important;
      text-decoration: none; 
    }
    </style>
  </head>



  <body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
        <div class="mdl-layout__header-row" style="min-height: 58px;background: #512DA7">
          
                <!-- Left Side Of Navbar -->
                <div style="float: left;width: 40%">

                  <ul class="nav navbar-nav navbar-left">
                      <li style="padding-left: 30px;"><a style="width: 70px" href="{{ url('/') }}">Home</a></li>
                  </ul>
                </div>
                <!-- Right Side Of Navbar -->
                <div style="float: left;width: 60%">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li style="width: 70px;height: 20px;float: left"><a href="{{ url('/login') }}">Login</a></li>
                        <li style="width: 90px;float: left;"><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown" style="width: 113px">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li style="width: 90px"><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        

        <div class="mdl-layout__header-row mdl-layout--large-screen-only"></div>
        <div class="mdl-layout__header-row  mdl-layout--large-screen-only">
          <h1>NSTU Online Notice Board</h1>
        </div>
        <div class="mdl-layout__header-row  mdl-layout--small-screen-only">
            <h3 style="font-size: 18px">NSTU Online Notice Board</h3>
          </div>
        <div class="mdl-layout__header-row  mdl-layout--large-screen-only"></div>
        

        <!--tab-->
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark">

          <a href="#overview" class="mdl-layout__tab is-active tab1">Public Notices</a>
          <a href="#features" class="mdl-layout__tab tab1">Departmental Notices</a>
          <a href="#vc" class="mdl-layout__tab tab1">Message From VC</a>

        <!--plus button-->
          <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp mdl-color--accent" id="add">
            <i class="material-icons" role="presentation">add</i>
            <span class="visuallyhidden">Add</span>
          </button>


           <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right  mdl-menu--colored mdl-shadow--4dp  mdl-color-text--blue-grey-50" for="add">
            <li class="mdl-menu__item">
             <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">account_circle</i>Profile</a>
             </li>
             
             <li class="mdl-menu__item">
              <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people
              </i>Social</a>
            </li>  
           </ul>

        </div>
      </header>


      <!--plus button have end here -->


  <div class="mdl-layout__drawer">
  <div class="circular"><img src="{{ asset('mdl-file/notice_files/nstu_logo.jpg') }}" /></div>
    <span class="mdl-layout-title" style="padding-left: 74px;font-weight: bold;color: rgb(45, 61, 182);letter-spacing: 2px;"> NSTU </span>

    <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-120">
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>CSTE</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">inbox</i>ICT</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">delete</i>PHARMACY</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">report</i>ACCE</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">forum</i>FIMS</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">flag</i>
          A.MATH</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">local_offer</i>MICROBIOLOGY</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">shopping_cart</i>AGRICULTURE</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>FTNS</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>ECONOCICS</a>
           <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>BBA</a>
           <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>ENVIRONMENT SCIENCE</a>
          <div class="mdl-layout-spacer"></div>
          <!--<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>-->
        </nav>
  </div>

<!---Sidebar Title have ended here-->
<main class="mdl-layout__content" style="padding-bottom: 20px">
  <div class="mdl-layout__tab-panel is-active overview" id="overview">
  <?php $i = 0;?>
@if($posts->count())
@foreach($posts as $row)
  <?php $i++ ;?>
          <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white" style="background: #326BAE !important;">
              <i class="material-icons">assignment</i>
            </header>
            <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
              <div class="mdl-card__supporting-text" style="font-size: 13px;
                font-family: sans-serif;margin-bottom: 10px">
                <h4>{{ $row->notice_name }}</h4>
               {{ $row->notice_details }}
              <p style="padding-top: 10px;"> Date : {{ $row->notice_date }} </p>
              </div>
              <div class="mdl-card__actions">
                <button id="show-info<?php echo $i;?>" class="mdl-button mdl-js-button mdl-button--accent">
                    View Full Notice
                </button>
              </div>
            </div>
          </section>
          <script>
            
            $('#show-info<?php echo $i;?>').click(function () {
                    showDialog({
                      title: 'Physical Notice',
                      text: '<div><iframe src="{{ url("/uploads/test/up/notice/".$row->notice_content )}}"style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); width: 100%; min-height: 450px;"></iframe></div>',
                       negative: {
                                title: 'Cancel'
                            },
                  })
                  /*
                  showLoading();
                  setTimeout(function () {
                        hideLoading();
                    },3000);
                    */
              });
          </script>
  @endforeach
  {{ $posts->render() }}
  @endif 
  </div>







@if (Auth::guest())
<div id="features" class="mdl-layout__tab-panel">
  <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white" style="background: #326BAE !important;">
              <i class="material-icons">assignment</i>
            </header>
            <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
              <div class="mdl-card__supporting-text" style="font-size: 13px;
                font-family: sans-serif;margin-bottom: 10px">
                <h4  style="color:#D73B3B;"><strong>Whopps!</strong></h4>
              <p>You have to Login or Register first to see this section</p>
                <h5>Thank You!</h5>
              </div>
            </div>
          </section>
</div>
@else
    <div class="mdl-layout__tab-panel" id="features">
    <?php
    $id = Auth::user()->department;

    $dbhost = 'localhost';
    $dbname = 'notice';
    $dbuser = 'root';
    $dbpass = '01823';

    try {
      $db = new PDO("mysql: host={$dbhost}; dbname={$dbname}",$dbuser,$dbpass);
      $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      
    } catch (PDOException $e) {
      echo "Opps!!!!Connection Error!";
      
    }

    ?>

 <?php 
  $val= 1;
  $k = 1;
  $nam = $db->prepare('SELECT * FROM notices WHERE dept_id=? and notice_status=?
                     ORDER BY notice_id DESC LIMIT 10');
  $nam->execute(array($id,$val));
  foreach ($nam as $row) {
    $k++;
 ?>
      <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white" style="background: #326BAE !important;">
              <i class="material-icons">assignment</i>
            </header>
            <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
              <div class="mdl-card__supporting-text" style="font-size: 13px;
                font-family: sans-serif;margin-bottom: 10px">
                <h4><?php echo $row['notice_name'] ?></h4>
               <?php echo $row['notice_details']?>
              <p style="padding-top: 10px;"> Date : {{ $row['created_at'] }}</p>
              </div>
              <div class="mdl-card__actions">
                <button id="show-infod<?php echo $k;?>" class="mdl-button mdl-js-button mdl-button--accent">View Full Notice</button>
              </div>
            </div>
          </section>
          <script>
            $('#show-infod<?php echo $k;?>').click(function () {
                    showDialog({
                      title: 'Physical Notice',
                      text: '<div><iframe src="{{  url("/uploads/test/up/notice/".$row["notice_content"]) }}"style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); width: 100%; min-height: 450px;"></iframe></div>',
                       negative: {
                                title: 'Cancel'
                            },
                  })
              });
          </script>
          <?php
          }
          ?>
    </div>
@endif


  

<div class="mdl-layout__tab-panel vc" id="vc">
<?php $j=1;?>
@foreach($vcnotice as $rws)
      <?php $j++; ?>
      <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white"style="background: #326BAE !important;">
              <i class="material-icons">assignment</i>
            </header>
            <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
              <div class="mdl-card__supporting-text" style="font-size: 13px;
                font-family: sans-serif;margin-bottom: 10px">
                <h4>{{ $rws->vc_notice_name }}</h4>
                {{ $rws->vc_notice_details }}

                <p style="padding-top: 10px;"> Date : {{ $rws->created_at }}</p>
              </div>
              <div class="mdl-card__actions">
                <button id="show-infovc<?php echo $j;?>" class="mdl-button mdl-js-button mdl-button--accent">View Message</button>
              </div>
            </div>
          </section>
          <script>
            $('#show-infovc<?php echo $j;?>').click(function () {
                    showDialog({
                      title: 'Physical Notice',
                      text: '<div><iframe src="{{  url("/uploads/test/vc/notice/".$rws->vc_notice_content) }}"style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); width: 100%; min-height: 450px;"></iframe></div>',
                       negative: {
                                title: 'Cancel'
                            },
                  })
              });
          </script>
@endforeach

      </div>

        <footer class="mdl-mega-footer">
          <div class="mdl-mega-footer--middle-section">
            <div class="mdl-mega-footer--drop-down-section">
              <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
              <h1 class="mdl-mega-footer--heading">Features</h1>
              <ul class="mdl-mega-footer--link-list">
                <li><a href="#">About</a></li>
                <li><a href="#">Terms</a></li>
                <li><a href="#">Partners</a></li>
                <li><a href="#">Updates</a></li>
              </ul>
            </div>
            <div class="mdl-mega-footer--drop-down-section">
              <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
              <h1 class="mdl-mega-footer--heading">Details</h1>
              <ul class="mdl-mega-footer--link-list">
                <li><a href="#">Spec</a></li>
                <li><a href="#">Tools</a></li>
                <li><a href="#">Resources</a></li>
              </ul>
            </div>
            <div class="mdl-mega-footer--drop-down-section">
              <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
              <h1 class="mdl-mega-footer--heading">Technology</h1>
              <ul class="mdl-mega-footer--link-list">
                <li><a href="#">How it works</a></li>
                <li><a href="#">Patterns</a></li>
                <li><a href="#">Usage</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Contracts</a></li>
              </ul>
            </div>
            <div class="mdl-mega-footer--drop-down-section">
              <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
              <h1 class="mdl-mega-footer--heading">FAQ</h1>
              <ul class="mdl-mega-footer--link-list">
                <li><a href="#">Questions</a></li>
                <li><a href="#">Answers</a></li>
                <li><a href="#">Contact us</a></li>
              </ul>
            </div>
          </div>
          <div class="mdl-mega-footer--bottom-section">
            <div class="mdl-logo">
              Developed By
            </div>
            <ul class="mdl-mega-footer--link-list">
              <li><a href="#"> Team kakTarua</a></li>
            </ul>
          </div>
        </footer>
        </main>
    </div>
    

  </body>
<!--<script>
    /*==================== PAGINATION =========================*/

    $(window).on('hashchange',function(){
      page = window.location.hash.replace('#','');
      getProducts(page);
    });

    $(document).on('click','.pagination a', function(e){
      e.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      //getProducts(page);
      location.hash = page;
    });

    function getProducts(page){

      $.ajax({
        url: '/ajax/vc?page=' + page
      }).done(function(data){
        $('.overview').html(data);
      });
    }
</script>-->

</html>