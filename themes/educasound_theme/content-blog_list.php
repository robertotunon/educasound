<li class="item articulo flex">
	<figure class="articulo_thumb">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail('medium'); ?>
		</a>
	</figure>
	<section class="articulo_data">
		<h3 class="articulo_title">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>
		<address class="articulo_author">por <?php the_author_posts_link(); ?></address>
		<time class="articulo_date"><?php echo get_the_date(); ?></time>
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink() ?>" class="leermas">Leer más</a>
	</section>
</li>