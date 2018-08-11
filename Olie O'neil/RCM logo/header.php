<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>

        <meta charset="<?php bloginfo('charset'); ?>">
        <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <link rel="icon" href="../favicon.ico">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!--================= Include All Styles ==================-->
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/animate.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/meanmenu.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/owl.theme.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/owl.transitions.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/preset.css"/>
        <!-- main styles-->
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/styles.css"/>
        <!-- responsive styles-->
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/responsive.css"/>
        <?php wp_head(); ?>

<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){
z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//v2.zopim.com/?3wAFOUROjeQUhYTQsNBfVlht4jPWQSia';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->
    
</head>
<!--==================== body ======================= -->
<body <?php body_class(); ?>>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-78245712-1', 'auto');
  ga('send', 'pageview');

</script>

    <!--================= Header Section ==================-->
    <header id="header">
        <div class="navbar-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <div class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>"></a></div> 
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-7 col-lg-7 no-padding-right">
                        <div class="navigation">
                            <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'mainnav')); ?>
                        </div><!--/navigation-->                                         
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 hidden-xs hidden-sm no-padding">
                        <a class="free-audit" href="http://www.redcupmedia.com.au/contact/">Free website audit</a>
                    </div>
                </div>
            </div>
        </div><!--/sticky-wrapper-->
    </header><!--/header-->   

