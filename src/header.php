<!DOCTYPE html>
<html lang="en">
<head>
<title><?php wp_title(''); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
  <link rel="stylesheet" type="text/css" href="http://fnt.webink.com/wfs/webink.css/?project=3DEA36C8-6959-4D76-A08C-F4437FCBF068&amp;fonts=AD34710E-3560-9F69-E834-2BFEF0C41F8F:f=SourceSansPro-Light,803EDC35-B215-7EB3-0C15-9B4E64B9738C:f=AthelasWeb-Italic,D42D39BB-A172-497C-E46E-153BCF66A695:f=SourceSansPro-Regular,B2689794-A243-122B-C567-4112222C0EF6:f=NimbusSanT-Bol" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
  <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style-ie.css" />
  <![endif]-->

  <script type="text/javascript">
    $(document).ready(function() {

      // Pop-up panels for header icons
      $(".icon-link").click(function() {
        if ($(this).hasClass("hover-selected")) {
          $(this).removeClass("hover-selected");
        } else {
          $(".hover-selected").removeClass("hover-selected");
          $(this).addClass("hover-selected");
        }
      });

    });
  </script>
<?php wp_head(); ?>
</head>

<body>

<header>
  <div class="wrapper">

    <div class="site-title">
      <h1><a href="<?php echo home_url() ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a></h1>
    </div>

    <div class="header-icons">
      <a href="#" class="icon-link"><img src="<?php bloginfo('template_directory'); ?>/images/layout/icon-message.png" alt="" class="icon icon-message" /></a>
      <div class="hover-panel message-hover-panel">
        <h2>Hi there!</h2>
        <p>I'm a front-end web designer and developer based in Edinburgh, Scotland. I specialise in creating Responsive designs - a single site design that resizes and re-flows the content to optimise its viewing on mobile, tablet and desktop devices at any screen resolution.  Try resizing your browser window to see how the layout changes!</p>
      </div>

      <a href="#" class="icon-link"><img src="<?php bloginfo('template_directory'); ?>/images/layout/icon-email.png" alt="" class="icon icon-email" /></a>
      <div class="hover-panel email-hover-panel">
        <p>Want to get in touch?</p>
          <ul class="link-list">
            <li class="link-email"><a href="mailto:riccardo.margiotta@gmail.com">riccardo.margiotta@gmail.com</a></li>
            <li class="link-linkedin"><a href="http://www.linkedin.com/pub/riccardo-margiotta/41/170/333">Riccardo Margiotta</a></li>
            <li class="link-twitter"><a href="https://twitter.com/RicMargiotta">@RicMargiotta</a></li>
          </ul>
      </div>
    </div>

  </div>
</header>

<div class="wrapper">