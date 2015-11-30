<?php
	global $post;
	$post = get_post( $module->ID );
	setup_postdata( $post );
?>
<div class="row">

	<div class="col-md-12">

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">{{ get_the_title() }}</h3>
			</div>
			<div class="panel-body">
				{{ get_the_content() }}
			</div>
        </div>
		
	</div>

</div>

<?php

wp_reset_postdata( $post );
