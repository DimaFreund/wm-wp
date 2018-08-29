<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wmetier
 */

get_header(); ?>


	<main class="serviceSingle-page-content single-article">
		<div class="wrapper">
			<h1><?php the_title(); ?></h1>
			<div class="content-wrapper">
				<div class="content">
					<?php
					while ( have_posts() ) : the_post();
						$content = get_the_content();
						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]>', $content);
						$pos = strpos($content, '</p>');
						$first_content = substr($content, 0 , $pos);
						$two_content = substr($content, $pos);
						echo $first_content;

					endwhile; // End of the loop.
					?>


				</div>

			</div>

		</div>
		<button class="btn-to-top"></button>

	</main>






<?php
get_footer();
