
<div class="header">

  <div class="container">

  	<nav class="navbar navbar-default" role="navigation">

      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-5">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><img src="{{ get_stylesheet_directory_uri() . '/assets/images/orasolv_303x85_white.png' }}" alt="logo" /></a>
        </div>  

        <div id="bs-example-navbar-collapse-5" class="collapse navbar-collapse">

          <?php
              if( has_nav_menu('primary_navigation') ) {
                wp_nav_menu( [
                    'menu'              => 'primary_navigation',
                    'theme_location'    => 'primary_navigation',
                    'depth'             => 1,
                    'container'         => '',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb' => 'wp_page_menu',
                    'walker'            => new Roots\Soil\Nav\NavWalker()
                ]);
              }
          ?>

          <form class="navbar-form navbar-right" role="search">
              <div class="form-search search-only">
                <i class="search-icon glyphicon glyphicon-search"></i>
                <input name="s" type="text" class="form-control search-query">
              </div>
          </form>


        </div>

      </div>

    </nav>

  </div>

</div>
