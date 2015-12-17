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

          <a class="navbar-brand" href="<?php bloginfo( 'url' ) ?>" title="<?php the_SEO( 'title', get_the_ID() ) ?>">
            <img class="img-responsive hidden_on_scroll " src="<?php echo get_template_directory_uri() . '/'; ?>img/agencia.png" alt="<?php the_SEO( 'title', get_the_ID() ) ?>" />
            <img class="img-responsive revel_on_scroll  hidden" src="<?php echo get_template_directory_uri() . '/'; ?>img/apple-touch-icon.png" alt="<?php the_SEO( 'title', get_the_ID() ) ?>" />

          </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class=" navbar-collapse ">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bars"></i>
              </a>
                <?php
                  wp_nav_menu(
                    array(
                      'theme_location'  => 'menu-topo',
                      'depth'           => 2,
                      'menu'            => '',
                      'container'       => false,
                      'container_class' => '',
                      'container_id'    => '',
                      'menu_class'      => 'dropdown-menu',
                      'fallback_cb'     => '',
                      'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                      //Process nav menu using our custom nav walker
                      //'walker' => new wp_bootstrap_navwalker())
                    ) );

                  ?>
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
        <?php
          $pagename = 'agencia';
          $Query = new WP_Query( array('post_type' => 'page','pagename' => $pagename, 'posts_per_page'=> 1 ));
          if ( $Query->have_posts() ) : while ( $Query->have_posts() ) : $Query->the_post();
        ?>
          <section  id="<?php the_slug(); ?>">
            <div class="container">
              <div class="row">
                <div class="col-md-3">
                  <h2 class="text-uppercase"><?php the_title(); ?></h2>
                  <p class="text-right">
                    Criamos projetos de marketing digital focados em presença, audiência e resultados.
                  </p>
                </div>
                <div class="col-md-3">
                  <h3> <i class="fa fa-comments"></i>Colaboração</h3>
                  <p >Focamos nossos projetos na colaboração contínua e mútua entre nossa equipe e nossos clientes.</p>
                </div>
                <div class="col-md-3">
                  <h3> <i class="fa fa-heart"></i>Criação e Design</h3>
                  <p >Criamos peças e conteúdos voltados para a identidade visual e a estética perfeita.</p>
                </div>
                <div class="col-md-3">
                  <h3> <i class="fa fa-code"></i>Desenvolvimento</h3>
                  <p >Usamos as melhores e mais modernas tecnologias da internet fazendo sites, lojas e aplicativos.</p>
                </div>
              </div>
            </div>
            <!-- 16:9 aspect ratio -->
            <div class="embed-responsive embed-responsive-16by9 ">
              <iframe class="embed-responsive-item"  height="300"  src="https://www.youtube.com/embed/KSAiR1RvrxA" allowfullscreen=""></iframe>
            </div>
          </section>
        <?php endwhile; endif; wp_reset_query(); ?>

        <section id="servicos">
          <div class="container">
            <div class="row">

            </div>
          </div>
              <!-- TAB NAVIGATION -->
              <ul class="col-md-3 tabs" role="tablist">
                <li class="list-unstyled">
                  <h2>
                    <?php
                      $obj = get_post_type_object( 'servicos' );
                      echo $obj->labels->singular_name;
                    ?>
                  </h2>
                </li>
                <?php
                  $index = 0;
                  $post_type = 'servicos';
                $Query = new WP_Query(array('post_type' => $post_type, 'post_status' => 'publish', 'orderby'=>'menu_order','order'=>'ASC', 'post_parent' => 0, 'posts_per_page' => -1 ));
                if ($Query->have_posts()) { while ($Query->have_posts()) : $Query->the_post();
                  $index++;
                ?>
                  <li class="<?php if ($index == 1 ) echo 'active' ?> list-unstyled ">
                    <a href="#<?php the_slug() ?>" role="tab" data-toggle="tab">
                      <h3><?php the_title() ?></h3>
                      <p><?php the_excerpt_limited(24) ?></p>
                    </a>
                  </li>
                <?php endwhile; }  wp_reset_query(); ?>
              </ul>
              <!-- TAB CONTENT -->
              <div class="col-md-9 tab-content">
                <?php
                  $index = 0;
                  $post_type = 'servicos';
                  $Query = new WP_Query(array('post_type' => $post_type, 'post_status' => 'publish', 'orderby'=>'menu_order','order'=>'ASC', 'post_parent' => 0, 'posts_per_page' => -1 ));
                  if ($Query->have_posts()) { while ($Query->have_posts()) : $Query->the_post();
                    $index++;
                ?>
                  <div class="col-equalizer <?php if ($index == 1 ) echo 'active' ?> tab-pane fade in" id="<?php the_slug() ?>">
                    <h2 class="hidden"><?php the_title() ?></h2>
                    <?php if (get_post_meta( get_the_ID(), 'wpcf-bg-paralax', true )) { ?>
                      <div class="bg-paralax" style="background-image: url('<?php echo get_post_meta( get_the_ID(), 'wpcf-bg-paralax', true ); ?>');"></div>
                    <?php }  ?>
                    <div class="row">
                      <?php
                          $args = array(
                            'numberposts' => 3,
                            'order' => 'ASC',
                            'orderby'=>'menu_order',
                            'post_parent' => get_the_ID(),
                            'post_status' => null,
                            'post_type' => $post_type,
                          );
                          $childrens = get_children( $args );

                          if ( $childrens ) {
                            foreach ( $childrens as $children ) {
                              ?>
                              <div class="col-md-4">
                                <ul class="diamonds ">
                                  <?php
                                    $term_list = wp_get_post_terms($children->ID, 'icones', array( 'orderby' => 'name', 'order' => 'ASC', "fields" => "all"));
                                    foreach( $term_list as $term ){
                                      ?>
                                      <li>
                                        <a href="#<?php print_r($term->slug) ?>" class="diamond">
                                          <div class="diamond-content">
                                            <h4>
                                              <?php echo tax_icons_output_term_icon($term->term_id, '' ); ?>
                                              <?php print_r($term->name) ?>
                                            </h4>
                                          </div>
                                        </a>
                                      </li>
                                    <?php } ?>

                                </ul>
                                <h3 class="clearfix"><?php print_r($children->post_title) ?></h3>
                              </div>
                              <?
                            }
                          }
                      ?>
                    </div>
                  </div>
                <?php endwhile; }  wp_reset_query(); ?>
              </div>
            </div>
          </div>
        </section>
        <section id="projetos">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h2>Últimos Projetos</h2>
              </div>
              <div class="col-md-3">
                <h3> Nossos projetos buscam promover resultados</h3>
                <p>
                  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                  totam rem aperiam.
                </p>
              </div>
              <div class="col-md-6">
                <div id="carousel-slides" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <?php
                      $index = 0;
                      $post_type = 'portfolio';
                      $Query = new WP_Query(array('post_type' => $post_type, 'post_status' => 'publish', 'posts_per_page' => -1));
                      if ($Query->have_posts()) { while ($Query->have_posts()) : $Query->the_post();
                      $index++;
                    ?>
                      <li data-target="#carousel-slides" data-slide-to="<?php echo $index; ?>" <?php if($index == 1){ echo 'class="active"'; } ?>></li>
                    <?php endwhile; }  wp_reset_query(); ?>
                  </ol>
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <?php
                      $index = 0;
                      $post_type = 'portfolio';
                      $Query = new WP_Query(array('post_type' => $post_type, 'post_status' => 'publish', 'posts_per_page' => -1));
                      if ($Query->have_posts()) { while ($Query->have_posts()) : $Query->the_post();
                        $index++;
                    ?>
                      <div class="item <?php if($index == 1){ echo 'active'; } ?>">
                        <img src="<?php the_image_src(); ?>" alt="<?php the_title(); ?>" class="img-responsive">
                        <div class="carousel-caption">
                        </div>
                      </div>
                    <?php endwhile; }  wp_reset_query(); ?>
                  </div>

                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-slides" role="button" data-slide="prev">
                    <span class="fa fa-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-slides" role="button" data-slide="next">
                    <span class="fa fa-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section id="blog">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h2>Últimos Projetos</h2>
              </div>
              <div class="col-md-3">
                <h3> Nossos projetos buscam promover resultados</h3>
                <p>
                  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                  totam rem aperiam.
                </p>
              </div>
              <div class="col-md-6">
                <div id="carousel-slides" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <?php
                      $index = 0;
                      $post_type = 'post';
                      $Query = new WP_Query(array('post_type' => $post_type, 'post_status' => 'publish', 'posts_per_page' => -1));
                      if ($Query->have_posts()) { while ($Query->have_posts()) : $Query->the_post();
                        $index++;
                        ?>
                        <li data-target="#carousel-slides" data-slide-to="<?php echo $index; ?>" <?php if($index == 1){ echo 'class="active"'; } ?>></li>
                      <?php endwhile; }  wp_reset_query(); ?>
                  </ol>
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <?php
                      $index = 0;
                      $post_type = 'post';
                      $Query = new WP_Query(array('post_type' => $post_type, 'post_status' => 'publish', 'posts_per_page' => -1));
                      if ($Query->have_posts()) { while ($Query->have_posts()) : $Query->the_post();
                        $index++;
                        ?>
                        <div class="item <?php if($index == 1){ echo 'active'; } ?>">
                          <img src="<?php the_image_src(); ?>" alt="<?php the_title(); ?>" class="img-responsive">
                          <div class="carousel-caption">
                          </div>
                        </div>
                      <?php endwhile; }  wp_reset_query(); ?>
                  </div>

                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-slides" role="button" data-slide="prev">
                    <span class="fa fa-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-slides" role="button" data-slide="next">
                    <span class="fa fa-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </section>
      </article>
    <?php endwhile; endif; wp_reset_query(); ?>
    <footer id="footer">
      <div id="contato-rapido">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2>Entre em contato</h2>
            </div>
            <div class="col-md-3">
              <div itemscope itemtype="http://schema.org/LocalBusiness">
                <h3 class="hidden" itemprop="name"><?php bloginfo('name') ?></h3>
                <p class="hidden" itemprop="description"><?php bloginfo('description') ?></p>
                <address itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                  <p itemprop="streetAddress">Av. Antonio de Carvalho, 1625 <br />CJ 301</p>
                  <p itemprop="addressLocality">Porto Alegre</p>
                  <p>CEP: <span itemprop="postalCode">91430-001</span></p>
                  <p><abbr itemprop="addressRegion" title="Rio Grande do Sul">RS</abbr></p>
                </address>
                <a href="mailto:marketing@agenciawfuture.com.br" itemprop="email">marketing@agenciawfuture.com.br</a>
                <a href="tel:+555137790313" itemprop="telephone">51.3779-0313</a>
                <a href="tel:+554833641544" itemprop="telephone">48.3364-1544</a>
              </div>
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
        <div class="embed-responsive embed-responsive-16by9 ">
          <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13813.468480407986!2d-51.1471726!3d-30.0550096!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcda1e7a2aabc1955!2sAg%C3%AAncia+W+Future!5e0!3m2!1spt-BR!2sbr!4v1447350291905" allowfullscreen=""></iframe>
        </div>
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
    <script id="vegas" >
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


