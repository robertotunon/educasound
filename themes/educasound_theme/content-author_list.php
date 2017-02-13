<li class="item noticia flex">
	<figure>
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail('medium'); ?>
		</a>
	</figure>
	<section class="data">
		<h3>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>
		<time class="date"><?php the_date(); ?></time>
		<?php the_excerpt(); ?>
		<a href="" class="leermas">Leer más</a>
	</section>
</li>