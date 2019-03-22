<?php 
get_header();
if (have_posts()): 
    while(have_posts()): the_post(); ?>
	<div>
		
		<article class="post page">
			<!-- column -->
			<div class="column-container clearfix">
				<h2> <?php the_title() ?>  </h2>
				<div class="title-column">
					<?php the_content(); ?> 

 				</div> <!-- title column-->

     		</div> <!-- column -->
		</article>
	</div>
    <?php endwhile;
    else:
        echo '<p> No content found </p>';
    endif;

get_footer();
?>
