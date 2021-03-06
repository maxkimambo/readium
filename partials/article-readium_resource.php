<?php /*

Readium Theme
-------------

article-readium_resource.php

Resource default template file	

* Called from within the loop. Will not work otherwise. *

*/


$is_column = (!is_singular('readium_resource') && !is_search()) ? true : false;

?>

<?php if ($is_column) : ?>
<div class="g4 resource_holder">
<?php endif; ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<!-- Post Title -->
		<?php if ($is_column) : // column display ?>

			<?php if (has_post_thumbnail()) : ?>
			<div class="thumbnail"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('resource-thumb'); ?></a></div>
			<?php endif; ?>
			<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php the_excerpt(); ?>

		<?php elseif (is_single()) : // single resource view ?>
			<!-- <h1><?php the_title(); ?></h1> -->

			<?php if (has_post_thumbnail()) : ?>
			<div class="thumbnail large alignleft"><?php the_post_thumbnail('medium'); ?></div>
			<?php endif; ?>

			<div class="post-content">
			
			<?php the_content(); ?>

			<?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages') . ':', 'after' => '</div>')); ?>
			
			</div>

		<?php else : // any other place it might show up ?>

			<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

			<?php if (has_post_thumbnail()) : ?>
			<div class="thumbnail large alignleft"><?php the_post_thumbnail('medium'); ?></div>
			<?php endif; ?>

			<div class="post-content">
				<?php the_excerpt(); ?>
			</div>

		<?php endif;?>

		<!-- Post Links -->
		<div class="links">
			<ul class="link-list">
				<li><a href="<?php the_permalink(); ?>" title="<?php __('Permalink'); ?>" class="perma-link"><i class="fa fa-link"></i><span class="text"><?php __('Permalink'); ?></span></a></li>
				<?php if (comments_open()) : ?>
				<?php $comment_icon = '<i class="fa fa-comment"></i>'; ?>
				<li><?php comments_popup_link($comment_icon . '<span class="text">Comment</span>', $comment_icon . '<span class="text">1 Comment</span>', $comment_icon . '<span class="text">% Comments</span>'); ?></li>
				<?php endif; ?>
				<?php edit_post_link('<i class="fa fa-pencil"></i><span class="text">Edit</span>', '<li>', '</li>' ); ?>
			</ul>
		</div>

		<!-- Post Meta -->
		<?php $categories_list = get_the_category_list(', '); ?>
		<?php $tags_list = get_the_tag_list('', ', '); ?>

		<div class="details"><?php if ($categories_list) : ?>Posted in <?php echo $categories_list; ?> &bullet; <?php endif; ?><a href="<?php the_permalink(); ?>" title="Permalink"><?php the_time(get_option('date_format')); ?></a></div>

		<?php if (is_singular('readium_resource')) : ?>
		<div class="sharing">
			<div class="sharing-heading">Share</div>
			<?php share_links(get_permalink(), get_the_title()); ?>
		</div>

		<div class="readline"><!-- Indcator for how much of the article has been read --></div>
		<?php endif; ?>

	</article>

<?php if ($is_column) : ?>
</div>
<?php endif; ?>

<?php if (is_single()) : ?>
<div class="directional-links horizontal">
	<div class="nav-previous"><?php previous_post_link('%link', '<i class="fa fa-angle-left"></i> <span class="text">&#8220;%title&#8221;</span>'); ?></div>
	<div class="nav-next"><?php next_post_link('%link', '<span class="text">&#8220;%title&#8221;</span> <i class="fa fa-angle-right"></i>'); ?></div>
</div>
<?php endif; ?>
