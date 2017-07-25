<?php if( has_post_thumbnail() ): ?>
<div class="box page-cover">
	<?php the_post_thumbnail( 'full' ); ?>
</div>
<?php endif; ?>

<div class="box box-padding"><?php the_content(); ?></div>