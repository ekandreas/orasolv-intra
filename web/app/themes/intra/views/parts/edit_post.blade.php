@if( current_user_can('edit_post', get_the_ID() ) )
	<p>
		<a href="/wp/wp-admin/post.php?post={{ get_the_ID() }}&action=edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ändra innehållet</a>
	</p>
@endif