<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- SEO -->
    <title><?php the_SEO('title', get_the_ID()) ?></title>
    <!-- SEO metatags + The Open Graph protocol -->
    <link rel="sitemap" type="application/xml" title="Sitemap" href="sitemap.xml">
    <meta name="author" property="og:author" content="<?php bloginfo('name') ?>" />
    <meta name="description" property="og:description" content="<?php the_SEO('description', get_the_ID()) ?>" />
    <meta name="keywords" content="<?php the_SEO('description', get_the_ID()) ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php the_SEO('title', get_the_ID()) ?>" />
    <meta property="og:url" content="<?php bloginfo('url') ?>" />
    <meta property="og:image" content="<?php echo get_template_directory_uri().'/'; ?>img/tile-wide.png" />
    <meta property="og:site_name" content="<?php bloginfo('name') ?>" />
    <!-- SEO metatags -->
    <meta name="googlebot" content="all"/>
    <meta name="robots" content="index, follow"/>
    <meta name="rating" content="Geral"/> <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri().'/'; ?>img/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri().'/'; ?>img/apple-touch-icon.png">
    <!-- .CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/'; ?>style.css">
    <!-- .JS -->
    <script src="<?php echo get_template_directory_uri().'/'; ?>js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
  </head>
  <body>
    <!--[if lt IE 8]>
      <p class="browserupgrade label label-danger">
        Você está usando um navegador <strong>desatualizado</strong>. Por Favor,
        <a href="http://browsehappy.com/">atualize</a> para melhorar sua experiência.
      </p>
    <![endif]-->





    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri().'/'; ?>js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="<?php echo get_template_directory_uri().'/'; ?>js/vendor/bootstrap-sass/assets/javascripts/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri().'/'; ?>js/plugins.js"></script>
    <script src="<?php echo get_template_directory_uri().'/'; ?>js/main.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
      (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
          }, i[r].l = 1 * new Date();
        a = s.createElement(o),
          m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
      })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
      ga('create', 'UA-56774533-1', 'auto');
      ga('send', 'pageview');
    </script>
  </body>
</html>
