<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php bloginfo('language') ?>"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="<?php bloginfo('language') ?>"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="<?php bloginfo('language') ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php bloginfo('language') ?>"> <!--<![endif]-->
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

    <nav id="main-nav" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php bloginfo( 'url' ) ?>" title="<?php the_SEO( 'title', get_the_ID() ) ?>">
            <img class="img-responsive" src="<?php echo get_template_directory_uri() . '/'; ?>img/agencia.png" alt="<?php the_SEO( 'title', get_the_ID() ) ?>" />
          </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-main-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bars"></i>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div>
    </nav>
    <header id="header" role="presentation">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <h2>
              <small>O novo futuro</small>
              <strong>começa agora</strong>
            </h2>
          </div>
        </div>
      </div>

    </header>
    <?php global $post; if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article id="<?php the_slug(); ?>">
        <h1 class="hidden"><?php the_title() ?></h1>
        <section id="about">

        </section>
        <section id="servicos">

        </section>
        <section id="projetos">

        </section>
        <section id="blog">

        </section>
      </article>
    <?php endwhile; endif; wp_reset_query(); ?>
    <footer id="footer">
      <div id="contato-rapido">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <h2>Entre em contato</h2>
            </div>
            <div class="col-md-8">
              <h3>Faça agora um contato</h3>
              <div class="row">
                <?php echo do_shortcode('[contact-form-7 id="4" title="Contato"]'); ?>
              </div>
            </div>
            <div class="col-md-1">

            </div>
          </div>
        </div>
      </div>
      <div id="mapa">

      </div>
      <div id="copy">

      </div>
    </footer>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri().'/'; ?>js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="<?php echo get_template_directory_uri().'/'; ?>js/vendor/bootstrap-sass/assets/javascripts/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri().'/'; ?>js/plugins.js"></script>
    <script src="<?php echo get_template_directory_uri().'/'; ?>js/vendor/vegas/dist/vegas.min.js"></script>
    <script src="<?php echo get_template_directory_uri().'/'; ?>js/main.js"></script>
    <script >
      jQuery(document).ready(function ($) {
        /** */
        $('#header').vegas({
          transition: 'zoomOut2',
          timer: false,
          transitionDuration: 500,
          slides: [
            {src: '<?php echo get_template_directory_uri().'/'; ?>img/slides/home.jpg'},
            {src: '<?php echo get_template_directory_uri().'/'; ?>img/slides/criacao-sites.jpg'},
            {src: '<?php echo get_template_directory_uri().'/'; ?>img/slides/links-patrocinados.jpg'},
            {src: '<?php echo get_template_directory_uri().'/'; ?>img/slides/social-marketing.jpg'},
            {src: '<?php echo get_template_directory_uri().'/'; ?>img/slides/mobile.jpg'}
          ]

        });
      });
    </script>
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
