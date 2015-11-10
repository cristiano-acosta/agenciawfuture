<?php
  /**=============
   * Widgets locations
   * =============**/
  include('functions/widgets.php');
  /**=============
   * Post Thumbmais and Image Sizes
   * =============**/
  require_once('functions/post-thumbnails.php');
  /**=============
   * Use get_the_excerpt() to print an excerpt by specifying a maximium number of characters.
   * =============**/
  function get_the_excerpt_max_charlength($charlength) {
    $excerpt = get_the_excerpt();
    $charlength++;

    if ( mb_strlen( $excerpt ) > $charlength ) {
      $subex = mb_substr( $excerpt, 0, $charlength - 5 );
      $exwords = explode( ' ', $subex );
      $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
      if ( $excut < 0 ) {
        $excerpt = mb_substr( $subex, 0, $excut );
      } else {
        $excerpt  = $subex;
      }
      $excerpt .= '...';
      return $excerpt;
    } else {
      return $excerpt;
    }
  }

  /**=============
   * get_excerpt_by_id http://uplifted.net/programming/wordpress-get-the-excerpt-automatically-using-the-post-id-outside-of-the-loop/
   * =============**/
  function get_excerpt_by_id( $post_id ) {
    $the_post       = get_post( $post_id ); //Gets post ID
    $the_excerpt    = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
    $excerpt_length = 10; //Sets excerpt length by word count
    $the_excerpt    = strip_tags( strip_shortcodes( $the_excerpt ) ); //Strips tags and images
    $words          = explode( ' ', $the_excerpt, $excerpt_length + 1 );
    if ( count( $words ) > $excerpt_length ) :
      array_pop( $words );
      array_push( $words, '…' );
      $the_excerpt = implode( ' ', $words );
    endif;
    //$the_excerpt = '<p>' . $the_excerpt . '</p>';
    return $the_excerpt;
  }

  /**=============
   * Custom excerpt ellipses for 2.9+
   * =============**/
  function custom_excerpt_more( $more ) {
    return 'Leia mais &raquo;';
  }

  add_filter( 'excerpt_more', 'custom_excerpt_more' );
  /**=============
   * No more jumping for read more link
   * =============**/
  function no_more_jumping( $post ) {
    //return '<br /><a href="' . get_permalink($post->ID) . '" class="btn-read-more">' . 'Ler Mais' . '</a>';
    return '';
  }

  add_filter( 'excerpt_more', 'no_more_jumping' );
  /**=============
   * Category id in body and post class
   * =============**/
  function category_id_class( $classes ) {
    global $post;
    foreach ( ( get_the_category( $post->ID ) ) as $category ) {
      $classes [] = 'cat-' . $category->cat_ID . '-id';
    }
    return $classes;
  }

  /**=============
   * Menu suports and locatiosn
   * =============**/
  add_theme_support( 'menus' );
  if ( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus( array(
      'menu-topo'    => 'Menu Topo',
      'header-menu'    => 'Header Menu',
      'sidebar-menu'   => 'Sidebar Menu',
      'footer-menu'    => 'Footer Menu',
      'logged-in-menu' => 'Logged In Menu'
    ) );
  }
  /**=============
   * Add Custom Post Type Archive to Page nav-menus.php
   * =============**/
  add_action( 'admin_head-nav-menus.php', 'wpclean_add_metabox_menu_posttype_archive' );
  function wpclean_add_metabox_menu_posttype_archive() {
    add_meta_box( 'wpclean-metabox-nav-menu-posttype', 'Custom Post Type Archives', 'wpclean_metabox_menu_posttype_archive', 'nav-menus', 'side', 'default' );
  }

  function wpclean_metabox_menu_posttype_archive() {
    $post_types = get_post_types( array( 'show_in_nav_menus' => true, 'has_archive' => true ), 'object' );
    if ( $post_types ) :
      $items      = array();
      $loop_index = 999999;
      foreach ( $post_types as $post_type ) {
        $item = new stdClass();
        $loop_index ++;
        $item->object_id        = $loop_index;
        $item->db_id            = 0;
        $item->object           = 'post_type_' . $post_type->query_var;
        $item->menu_item_parent = 0;
        $item->type             = 'custom';
        $item->title            = $post_type->labels->name;
        $item->url              = get_post_type_archive_link( $post_type->query_var );
        $item->target           = '';
        $item->attr_title       = '';
        $item->classes          = array();
        $item->xfn              = '';
        $items[]                = $item;
      }
      $walker = new Walker_Nav_Menu_Checklist( array() );
      echo '<div id="posttype-archive" class="posttypediv">';
      echo '<div id="tabs-panel-posttype-archive" class="tabs-panel tabs-panel-active">';
      echo '<ul id="posttype-archive-checklist" class="categorychecklist form-no-clear">';
      echo walk_nav_menu_tree( array_map( 'wp_setup_nav_menu_item', $items ), 0, (object) array( 'walker' => $walker ) );
      echo '</ul>';
      echo '</div>';
      echo '</div>';
      echo '<p class="button-controls">';
      echo '<span class="add-to-menu">';
      echo '<input type="submit"' . disabled( 1, 0 ) . ' class="button-secondary submit-add-to-menu right" value="' . __( 'Add to Menu', 'andromedamedia' ) . '" name="add-posttype-archive-menu-item" id="submit-posttype-archive" />';
      echo '<span class="spinner"></span>';
      echo '</span>';
      echo '</p>';
    endif;
  }

  /**=============
   * require_once ('functions/wp-bootstrap-navwalker/wp_bootstrap_navwalker.php');
   * Bootstrap NavWalker for Wordpress Menus
   * =============**/
  require_once('functions/wp_bootstrap_navwalker.php');
  /**=============
   * require_once ('functions/wp-bootstrap-navwalker/wp_bootstrap_navwalker.php');
   * Fundations NavWalker for Wordpress Menus https://gist.github.com/awshout/3943026
   * =============**/
  require_once('functions/wp_fundation_navwalker.php');
  //require_once('functions/foundation4-topbar-walker.php');

  /**=============
   * adds Post Format support  // learn more: http://codex.wordpress.org/Post_Formats
   * =============**/
  //add_theme_support( 'post-formats', array( 'aside', 'gallery','link','image','quote','status','video','audio','chat' ) );
  /**=============
   * removes detailed login error information for security
   * =============**/
  //add_filter('login_errors', create_function('$a', "return null;"));
  /**=============
   * Removes the WordPress version from your header for security
   * =============**/
  function wb_remove_version() {
    return '<!--built on the Whiteboard Framework-->';
  }

  add_filter( 'the_generator', 'wb_remove_version' );
  /**=============
   * Removes Trackbacks from the comment cout
   * =============**/
  add_filter( 'get_comments_number', 'comment_count', 0 );
  function comment_count( $count ) {
    if ( ! is_admin() ) {
      global $id;
      $comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
      return count( $comments_by_type['comment'] );
    } else {
      return $count;
    }
  }

  /**=============
   * invite rss subscribers to comment
   * =============**/
  function rss_comment_footer( $content ) {
    if ( is_feed() ) {
      if ( comments_open() ) {
        $content .= 'Comments are open! <a href="' . get_permalink() . '">Add yours!</a>';
      }
    }
    return $content;
  }

  add_filter( 'post_class', 'category_id_class' );
  add_filter( 'body_class', 'category_id_class' );
  /**=============
   * Adds a class to the post if there is a thumbnail
   * =============**/
  function has_thumb_class( $classes ) {
    global $post;
    if ( has_post_thumbnail( $post->ID ) ) {
      $classes[] = 'has_thumb';
    }
    return $classes;
  }

  add_filter( 'post_class', 'has_thumb_class' );
  /**=============
   * resumos para paginas
   * =============**/
  function Post_type_excerpt() {
    add_post_type_support( 'page', array( 'excerpt' ) );
  }

  add_action( 'init', 'Post_type_excerpt' );
  /**=============
   * enable_category_taxonomy_for_pages
   * =============**/
  add_action( 'init', 'enable_category_taxonomy_for_pages', 500 );
  function enable_category_taxonomy_for_pages() {
    register_taxonomy_for_object_type( 'category', 'page' );
  }

  /**=============
   * Make Archives.php Include Custom Post Types
   * =============**/
  /*function namespace_add_custom_types( $query ) {
    if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
      $query->set( 'post_type', array(
       'post', 'serv'
      ));
      return $query;
    }
  }
  add_filter( 'pre_get_posts', 'namespace_add_custom_types' );*/
  /**=============
   * Templates Tags para SEO
   * =============**/
  function the_SEO_title() {
    if ( is_category() ) {
      echo ' &quot;';
      single_cat_title();
      echo '&quot; - ';
      bloginfo( 'name' );
    } else if ( is_tag() ) {
      echo 'Tags &quot;';
      single_tag_title();
      echo '&quot; - ';
      bloginfo( 'name' );
    } else if ( is_archive() ) {
      wp_title( '' );
      echo ' - ';
      bloginfo( 'name' );
    } else if ( is_search() ) {
      echo 'Buscado por &quot;&quot; - ';
      bloginfo( 'name' );
    } else if ( is_home() ) {
      bloginfo( 'name' );
      echo ' - ';
      bloginfo( 'description' );
    } else if ( is_404() ) {
      bloginfo( 'name' );
      echo '- Error 404 Nada Encontrado';
    } else if ( is_single() ) {
      bloginfo( 'name' );
      echo ' - ';
      wp_title( '' );
    } else {
      bloginfo( 'name' );
      echo ' - ';
      bloginfo( 'description' );
    }
  }

  /**=============
   * resumos limitados por tamanho!
   * =============**/
  function the_excerpt_limited( $limit ) {
    $excerpt = explode( ' ', get_the_excerpt(), $limit );
    if ( count( $excerpt ) >= $limit ) {
      array_pop( $excerpt );
      $excerpt = implode( " ", $excerpt ) . ' (...)';
    } else {
      $excerpt = implode( " ", $excerpt );
    }
    $excerpt = preg_replace( '`\[[^\]]*\]`', '', $excerpt );
    echo $excerpt;
  }

  /**=============
   * Templates Tags para SEO
   * =============**/
  function the_SEO( $parametro, $post_id = '' ) {
    $description = 'Somos uma agência de marketing digital especializada na Criação de Sites, Loja Virtual e Sistemas. Acesse o nosso insight e confira!';
    if ( is_front_page() ) {
      $description = get_bloginfo( 'description' );
    } else {
      $description = get_excerpt_by_id( $post_id );
    }
    $keywords = 'planejamento, midia, criacao, branding, sustentabilidade,  midia, sociais, insight, comunicacao, portfolio, marketing, digital, SEO, landing page, hot insight, insight';
    if ( $parametro == 'title' ) {
      the_SEO_title();
    }
    if ( $parametro == 'description' ) {
      bloginfo( 'name' );
      echo ' - ' . $description;
    }
    if ( $parametro == 'keywords' ) {
      bloginfo( 'name' );
      echo ' - ' . $keywords;
    }
  }

  /**=============
   * Templates Tags para pegar retornar o slug
   * =============**/
  function the_slug( $echo = true ) {
    $slug = basename( get_permalink() );
    do_action( 'before_slug', $slug );
    $slug = apply_filters( 'slug_filter', $slug );
    if ( $echo ) {
      echo $slug;
    }
    do_action( 'after_slug', $slug );
    return $slug;
  }

  function get_the_slug() {
    $post_data = get_post( $post->ID, ARRAY_A );
    $slug      = $post_data['post_name'];
    return $slug;
  }

  /**=============
   * Templates Tags para pegar a imagem destaque ou a primeira anexada!!!
   * =============**/
  function the_breadcrumb() { ?>
    <?php if ( ! is_front_page() ) { ?>
      <ul class="breadcrumbs">
        <?php if ( ! is_front_page() ) { ?>
          <li><a href="<?php echo get_option( 'home' ); ?>">Home</a></li>
        <?php } if ( is_home() ) { ?>
            <li>Blog</li>
        <?php } if ( is_category() || is_single() ) { ?>
          <li><?php echo the_category( ' </li><li> ' ); ?></li>
        <?php } if ( is_single() ) { ?>
          <li><?php echo the_title(); ?></li>
        <?php } else if ( is_page() && ! is_front_page() ) {
          global $post;
          if ( get_post_ancestors( $post->ID ) ) {
            $anc = array_reverse( get_post_ancestors( $post->ID ) );
            foreach ( $anc as $ancestor ) {
        ?>
          <li>
            <a href="<?php echo get_permalink( $ancestor ); ?>" title="<?php echo get_the_title( $ancestor ); ?>">
              <?php echo get_the_title( $ancestor ); ?>
            </a>
          </li>
          <?php } ?>
          <li><?php echo the_title(); ?></li>
        <?php } else { ?>
          <li><?php echo the_title(); ?></li>
        <?php } } else if ( is_tag() ) { single_tag_title(); } else if ( is_day() ) { ?>
          <li>Archive for <?php echo the_time( 'F jS, Y' ); ?></li>
        <?php } else if ( is_month() ) { ?>
          <li>Archive for <?php echo the_time( 'F, Y' ); ?></li>
        <?php } else if ( is_year() ) { ?>
          <li>Archive for <?php echo the_time( 'Y' ); ?></li>
        <?php } else if ( is_author() ) { ?>
          <li>Author Archive</li>
        <?php } elseif ( isset( $_GET['paged'] ) && ! empty( $_GET['paged'] ) ) { ?>
          <li>Blog Archives</li>
        <?php } else if ( is_search() ) { ?>
          <li>Search Results</li>
        <?php } ?>
        <?php  if ( is_post_type_archive('servicos') )  { ?>
          <li>Serviços</li>
        <?php } ?>

      </ul>
    <?php } ?>
  <?php }
  function the_image() {
    if ( has_post_thumbnail() ) {
      the_post_thumbnail( '', array( 'class' => 'wp-post-image post_thumbnail img-responsive' ) );
    } else {
      //<img src="" alt="" class="f_left15 pic">
      $imgAtach    = array(
        'post_type'      => 'attachment',
        'numberposts'    => 1,
        "post_mime_type" => "image/jpeg,image/gif,image/jpg,image/png",
        'exclude'        => get_post_thumbnail_id(),
        'post_status'    => null,
        'post_parent'    => get_the_ID(),
        'meta_key'       => 'wpcf-banner',
        'meta_value'     => '',
        'meta_compare'   => '='
      );
      $attachments = get_posts( $imgAtach );
      if ( $attachments ) {
        foreach ( $attachments as $attachment ) {
          //echo wp_get_attachment_image( $attachment->ID, 'full', false, array('class'=>'attachment-work-small wp-post-image'));
          $image_attributes = wp_get_attachment_image_src( $attachment->ID, 'full' );
          echo '<img itemprop="image" src="' . $image_attributes[0] . '" alt="' . get_the_title() . '" class="post_attachment wp-post-image img-responsive">';
        }
      } else {
        echo '<img itemprop="image" src="//placehold.it/490x388/161647/FFF" alt="' . get_the_title() . '" class="post_defaut wp-post-image img-responsive">';
      }
    }
  }

  function the_images() {
    //<img src="" alt="" class="f_left15 pic 'exclude' => get_post_thumbnail_id(),">
    $imgAtach    = array(
      'post_type'      => 'attachment',
      'numberposts'    => - 1,
      "post_mime_type" => "image/jpeg,image/gif,image/jpg,image/png",
      'post_status'    => null,
      'post_parent'    => get_the_ID()
    );
    $attachments = get_posts( $imgAtach );
    if ( $attachments ) {
      foreach ( $attachments as $attachment ) {
        //echo wp_get_attachment_image( $attachment->ID, 'full', false, array('class'=>'attachment-work-small wp-post-image'));
        $image_attributes = wp_get_attachment_image_src( $attachment->ID, 'full' );
        echo '<img src="' . $image_attributes[0] . '" alt="' . get_the_title() . '" class="post_attachment wp-post-image img-rounded img-responsive">';
      }
    } else {
      echo '<img src="//placehold.it/490x388/161647/FFF" alt="' . get_the_title() . '" class="post_defaut wp-post-image img-responsive">';
    }
  }

  function the_gallery_images( $link_class ) {
    $imgAtach    = array(
      'post_type'      => 'attachment',
      'numberposts'    => - 1,
      "post_mime_type" => "image/jpeg,image/gif,image/jpg,image/png",
      'post_status'    => null,
      'post_parent'    => get_the_ID()
    );
    $attachments = get_posts( $imgAtach );
    if ( $attachments ) {
      foreach ( $attachments as $attachment ) {
        //echo wp_get_attachment_image( $attachment->ID, 'full', false, array('class'=>'attachment-work-small wp-post-image'));
        $image_attributes = wp_get_attachment_image_src( $attachment->ID, 'full' );
        echo '

					<a rel="gallery_fancybox" href="' . $image_attributes[0] . '" title="' . get_the_title() . '" class="' . $link_class . '" >

					  <img src="' . $image_attributes[0] . '" alt="' . get_the_title() . '" class="post_attachment wp-post-image img-responsive img-rounded">

					</a>';
      }
    } else {
      echo '<img src="//placehold.it/490x388/161647/FFF" class="post_defaut wp-post-image img-responsive">';
    }
  }

  function the_image_src() {
    if ( has_post_thumbnail() ) {
      //the_post_thumbnail('', array('class' => 'attachment-work-medium wp-post-image'));
      print_r( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) );
    } else {
      //<img src="" alt="" class="f_left15 pic">
      $imgAtach    = array(
        'post_type'   => 'attachment',
        'numberposts' => 1,
        'post_status' => null,
        'post_parent' => get_the_ID()
      );
      $attachments = get_posts( $imgAtach );
      if ( $attachments ) {
        foreach ( $attachments as $attachment ) {
          //echo wp_get_attachment_image( $attachment->ID, 'full', false, array('class'=>'attachment-work-small wp-post-image'));
          $image_attributes = wp_get_attachment_image_src( $attachment->ID, 'full' );
          print_r( $image_attributes[0] );
        }
      } else {
        $image = '//placehold.it/490x388/161647/FFF';
        print_r( $image );
      }
    }
  }

  /**=============
   * Exibe post thumbnail numa coluna no dashboard
   * =============**/
  function ST4_get_featured_image( $post_ID ) {
    $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
    if ( $post_thumbnail_id ) {
      $post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'featured_preview' );
      return $post_thumbnail_img[0];
    }
  }

  function posts_columns( $defaults ) {
    $defaults['the_post_thumbs'] = __( 'Imagem Destaque' );
    return $defaults;
  }

  function posts_custom_columns( $column_name, $id ) {
    if ( $column_name === 'the_post_thumbs' ) {
      //echo the_post_thumbnail();
      $post_ID             = get_the_ID();
      $post_featured_image = ST4_get_featured_image( $post_ID );
      if ( $post_featured_image ) {
        echo '<img style="width: 40%;" src="' . $post_featured_image . '" />';
      } else {
        echo '<b>Não tem imagem!</b>';
      }
    }
  }

  add_filter( 'manage_posts_columns', 'posts_columns' );
  add_filter( 'manage_pages_columns', 'posts_columns' );
  add_filter( 'manage_custom_post', 'posts_columns' );
  add_action( 'manage_posts_custom_column', 'posts_custom_columns', 10, 2 );
  add_action( 'manage_pages_custom_column', 'posts_custom_columns', 10, 2 );
  add_action( 'manage_custom_post_column', 'posts_custom_columns', 10, 2 );
  /**=============
   * Mudar o logo na tela de login
   * =============**/
  function custom_login_logo() {
    echo '<style type="text/css">
        .login h1 a { background-image: url(http://www.agenciawfuture.com.br/logo.png) !important; width: 100%;  }
        </style>';
  }

  add_action( 'login_head', 'custom_login_logo' );
  /**=============
   * Jetpack & WordPress SEO Conflict
   * http://www.tjkelly.com/blog/facebook-debugger-more-than-one-og-url-specified/
   * =============*/
  add_filter( 'jetpack_enable_opengraph', '__return_false', 99 );
  add_filter( 'jetpack_enable_open_graph', '__return_false' );
  // remove jetpack open graph tags
  remove_action( 'wp_head', 'jetpack_og_tags' );
  /**=============
   * Multi Image Metabox for Custom Post Types
   * =============**/
  add_filter( 'images_cpt', 'my_image_cpt' );
  function my_image_cpt() {
    $cpts = array( 'portfolio' );
    return $cpts;
  }

  /**=============
   * Help Contact Form 7 Play Nice With Twitter Bootstrap
   * =============**/
  /*add_filter( 'wpcf7_form_class_attr', 'wildli_custom_form_class_attr' );
    function wildli_custom_form_class_attr( $class ) {
      $class .= ' form-horizontal';
    return $class;
    }*/
  /**=============
   * Aplicando máscaras nos campos de formulário do Contact Form 7
   * =============*/
  add_filter( 'wpcf7_support_html5', '__return_true' );
  add_filter( 'wpcf7_support_html5_fallback', '__return_true' );
  /**=============
   * Remove Annoying WP-Types Meta Box "How-to Display..."
   * =============**/
  if ( is_admin() ) :
    function remove_annoying_meta_boxes() {
      // Get post_type
      global $post;
      $post_type = get_post_type( $post->ID );
      remove_meta_box( 'wpcf-marketing', $post_type, 'side' );
    }

    add_action( 'add_meta_boxes', 'remove_annoying_meta_boxes' );
  endif;
  /**=============
   * enter the full name you want displayed alongside the email address
   * from http://miloguide.com/filter-hooks/wp_mail_from_name/
   * =============**/
  function xyz_filter_wp_mail_from_name( $from_name ) {
    return get_bloginfo( 'name' );
  }

  add_filter( "wp_mail_from_name", "xyz_filter_wp_mail_from_name" );

?>