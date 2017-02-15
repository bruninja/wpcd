<?php
/**
 *	The template part to displaying the search form.
 *
 *	@package WordPress
 *	@subpackage kira-lite	
 */
?>
<form method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div>
		<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php echo esc_attr_x( 'Search', 'search', 'kira-lite' ); ?>" />
		<input type="submit" id="searchsubmit" value="&#xf002;" />
	</div>
</form>