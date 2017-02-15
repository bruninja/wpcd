<article <?php hybrid_attr( 'post' ); ?>>

	<?php // Variaveis gerais

	$site_name            = get_theme_mod( 'epico_site_name', get_bloginfo( 'name', 'epico' ) );

	$compactloop          = get_theme_mod( 'epico_compact_loop', 1 );

	$categories           = get_the_category();

	$separator            = ', ';

	$output               = '';

	// Variaveis relativas a comentarios

	$comment_threshold    = get_theme_mod( 'epico_comment_threshold', 0 );

	$comment_ammount      = get_comments_number();

	// Variaveis relativas a imagens

	$show_featured        = get_post_meta( get_the_ID(), 'epico-show-featured', TRUE );

	$feature_thumb        = wp_get_attachment_image_src( get_post_thumbnail_id(), 'epico-tiny' );

	$alt_text             = get_the_title();

	$logo_url             = get_theme_mod( 'epico_logo_upload' );

	$logo_id              = attachment_url_to_postid( $logo_url );

	$logo_attr            = wp_get_attachment_image_src( $logo_id );

	$attachment_id        = get_post_thumbnail_id( get_the_ID() );

	$featured_attr        = wp_get_attachment_metadata( $attachment_id );

	$logo_width           = ( $logo_attr ) ? $logo_attr[1] : '' ;

	$logo_height          = ( $logo_attr ) ? $logo_attr[2] : '' ;

	$featured_height      = ( $featured_attr ) ? $featured_attr['sizes']['epico-tiny']['height'] : '' ;

	$featured_width       = ( $featured_attr ) ? $featured_attr['sizes']['epico-tiny']['width'] : '' ;

	$social_posts         = get_theme_mod( 'epico_socialposts', 1 );

	$social_exclude_posts = get_theme_mod( 'epico_socialposts_exclude' );

	// Define valor padrao da variavel (necessario ao is_post)
	if ( ! $social_exclude_posts ) {

		$excluded_posts = '9999999';

	} else {

		$excluded_posts = $social_exclude_posts;
	}
	?>

	<meta itemprop="mainEntityOfPage" content="<?php echo the_permalink() ?>"/>

	<meta itemprop="inLanguage" content="<?php echo get_bloginfo('language'); ?>"/>

	<span itemprop="publisher" itemscope itemtype="https://schema.org/Organization">

	<?php if ( $logo_url ) : ?>

		<span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">

			<meta itemprop="url" content="<?php echo esc_url( $logo_url ); ?>">

			<meta itemprop="width" content="<?php echo esc_attr( $logo_width ); ?>">

			<meta itemprop="height" content="<?php echo esc_attr( $logo_height ); ?>">

		</span>

	<?php endif; ?>

		<meta itemprop="name" content="<?php echo esc_attr( $site_name ); ?>">

	</span>

	<?php if ( is_singular( get_post_type() ) ) : // Se estiver vendo um post unico. ?>

		<header class="entry-header">

			<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>

			<div class="entry-byline">

				<meta itemprop="dateModified" content="<?php echo the_modified_date( 'Y-m-d\TH:i:sP' ); ?>" />

				<span <?php hybrid_attr( 'entry-author' ); ?>><span itemprop="name"><?php is_multi_author() ? the_author_posts_link() : the_author(); ?></span></span>

				<time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>

				<?php if( $comment_ammount >= $comment_threshold ) : ?>

					<?php comments_popup_link( __( 'Comment', 'epico' ),  __( '1 comment', 'epico' ), __( '% comments', 'epico' ) , 'comments-link', '' ); ?>

				<?php else : ?>

					<?php comments_popup_link( __( 'Comment', 'epico' ),  __( 'Comment', 'epico' ), __( 'Comment', 'epico' ) , 'comments-link', '' ); ?>

				<?php endif; // Finaliza a comparacao com o limiar de comentarios ?>


				<?php hybrid_post_terms( array( 'taxonomy' => 'category', 'text' => __( '%s', 'epico' ) ) ); ?>

				<?php edit_post_link(); ?>

			</div><!-- .entry-byline -->

			<span itemprop="image" itemscope itemtype="https://schema.org/ImageObject">

				<meta itemprop="url" content="<?php the_post_thumbnail_url(); ?>">

				<meta itemprop="width" content="<?php echo $featured_width; ?>">

				<meta itemprop="height" content="<?php echo $featured_height; ?>">

			</span>

			<?php if ( 'on' === $show_featured ) : // Se o meta box da area de artigos tiver o valor configurado para `ligado` ?>

				<?php the_post_thumbnail(); ?>

			<?php endif; ?>

			<?php if ( $social_posts == 1 & ! is_attachment() && ! is_single( $excluded_posts ) ) : ?>

				<?php include( locate_template( '/inc/social-buttons.php' ) ); // Adiciona codigo para botoes sociais. ?>

			<?php endif; ?>

		</header><!-- .entry-header -->

		<div <?php hybrid_attr( 'entry-content' ); ?>>

			<?php the_content(); ?>

			<?php wp_link_pages(); ?>

		</div><!-- .entry-content -->

	<?php else : // Se estiver visualizado a listagem de artigos (ou seja, se NAO estiver visualizando um post unico). ?>

		<?php if ( has_post_thumbnail() ) : ?>

			<span itemprop="image" itemscope itemtype="https://schema.org/ImageObject">

				<a class="img-hyperlink" href="<?php the_permalink() ?>" title="<?php the_title() ?>">

					<?php echo '<img src="' . esc_url( $feature_thumb[0] ) . '" alt="' . esc_attr( $alt_text ) .'" />'; ?>

				</a>

				<meta itemprop="url" content="<?php the_post_thumbnail_url(); ?>">

				<meta itemprop="width" content="<?php echo $featured_width; ?>">

				<meta itemprop="height" content="<?php echo $featured_height; ?>">

			</span>

		<?php else : ?>

			<a class="no-img-hyperlink" href="<?php the_permalink() ?>" title="<?php the_title() ?>"></a>

		<?php endif ?>

		<?php if ( 0 == $compactloop ) : // Se a listagem compacta NAO estiver ativada. ?>

			<div class="entry-byline">

				<span <?php hybrid_attr( 'entry-author' ); ?>><span itemprop="name"><?php is_multi_author() ? the_author_posts_link() : the_author(); ?></span></span>

				<meta itemprop="datePublished" content="<?php echo get_the_time( 'Y-m-d\TH:i:sP' ); ?>" />

				<meta itemprop="dateModified" content="<?php echo the_modified_date( 'Y-m-d\TH:i:sP' ); ?>" />

				<?php hybrid_post_terms( array( 'taxonomy' => 'category', 'text' => __( '%s', 'epico' ) ) ); ?>

				<?php if( post_type_supports( get_post_type(), 'comments' ) ) : // Se o tipo de post suporta comentarios ?>

					<?php if( comments_open() ) : // Se os comentarios estiverem abertos ?>

						<?php if( $comment_ammount >= $comment_threshold ) : ?>

							<span <?php hybrid_attr( 'comments-link-wrap' ); ?>><?php comments_popup_link( __( 'Comment', 'epico' ),  __( '1 comment', 'epico' ), __( '% comments', 'epico' ) , 'comments-link', '' ); ?></span>

						<?php else : ?>

							<span <?php hybrid_attr( 'comments-link-wrap' ); ?>><?php comments_popup_link( __( 'Comment', 'epico' ),  __( 'Comment', 'epico' ), __( 'Comment', 'epico' ) , 'comments-link', '' ); ?></span>

						<?php endif; // Finaliza a comparacao com o limiar de comentarios ?>

					<?php endif; // Finaliza chegagem por comentarios abertos. ?>

				<?php endif; // Finaliza chegagem por suporte a comentarios. ?>

			</div><!-- .entry-byline -->

			<header class="entry-header">

				<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="mainEntityOfPage">', '</a></h2>' ); ?>

			</header><!-- .entry-header -->

			<div <?php hybrid_attr( 'entry-summary' ); ?>>

				<?php the_excerpt(); ?>

			</div><!-- .entry-summary -->

		<?php else : // Se a listagem compacta estiver ativada. ?>

			<div class="entry-byline">

				<span <?php hybrid_attr( 'entry-author' ); ?>><span itemprop="name"><?php is_multi_author() ? the_author_posts_link() : the_author(); ?></span></span>

				<meta itemprop="datePublished" content="<?php echo get_the_time( 'Y-m-d\TH:i:sP' ); ?>" />

				<meta itemprop="dateModified" content="<?php echo the_modified_date( 'Y-m-d\TH:i:sP' ); ?>" />

				<?php if( $categories ) : ?>

					<?php foreach( $categories as $category ) { ?>

						<?php $output .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . __( 'Main category:','epico' ) . ' ' . esc_attr( sprintf( __( "%s" ), $category->name ) ) . '">' . $category->cat_name . '</a>' . $separator; ?>

					<?php } ?>

					<?php echo '<span class="entry-terms category" itemprop="articleSection">' . trim( $output, $separator ) . '</span>'; ?>

				<?php endif; ?>

				<?php if( $comment_ammount >= $comment_threshold ) : ?>

					<span <?php hybrid_attr( 'comments-link-wrap' ); ?>><?php comments_popup_link( '',  '1', '%' , 'comments-link', '' ); ?></span>

				<?php endif; // Finaliza a comparacao com o limiar de comentarios ?>

			</div><!-- .entry-byline -->

			<header class="entry-header">

				<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="mainEntityOfPage">', '</a></h2>' ); ?>

			</header><!-- .entry-header -->

			<div <?php hybrid_attr( 'entry-summary' ); ?>>

				<?php the_excerpt(); ?>

			</div><!-- .entry-summary -->

		<?php endif; // Finaliza checagem por ativacao da listagem compacta. ?>

	<?php endif; // Finaliza chegagem por posts unicos. ?>

	<?php include( locate_template( '/inc/zen-mode.php' ) ); // Adiciona codigo do modo Zen. ?>

</article><!-- .entry -->
