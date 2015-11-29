
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
          <a class="navbar-brand" href="/">{{ bloginfo('name') }}</a>
        </div>  

        <div id="bs-example-navbar-collapse-5" class="collapse navbar-collapse">

          <?php
              wp_nav_menu( array(
                  'menu'              => 'header-nav',
                  'theme_location'    => 'header-nav',
                  'depth'             => 2,
                  'container'         => null,
                  'menu_class'        => 'nav navbar-nav',
                  'walker'            => new Roots\Soil\Nav\NavWalker())
              );
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
