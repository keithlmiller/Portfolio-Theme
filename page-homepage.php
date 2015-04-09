<?php

/*

Template Name: Homepage Template

*/

?>



<?php get_header(); ?>



			<div id="content" class="homepage">
				<div id="inner-content" class="wrap clearfix">
					<div id="main" class=" first clearfix" role="main">
						<div id="homeTop" class="clearfix">
							<section id="homeIntro" class="d-2of5">
								<h1 class="title">Hello, I'm Keith</h1>
								<p>I’m a front-end developer and UX designer based in Philadelphia. 
								I’m passionate about creating and designing delightful web experiences.</p>

								<a class="btn lnk" href="<?php echo home_url(); ?>/about-me">Get to know me</a>
							</section>
						</div>
						<div id="homeWork" class="clearfix">
							<h3 class="sectionTitle">Check out some of my work</h3>
							<div id="listWorks">
								<?php $my_query = new WP_Query('category_name=My Work&posts_per_page=3');

	  							while ($my_query->have_posts()) : $my_query->the_post(); ?>

								<article id="post-<?php the_ID(); ?>" class="work">
									<a class="workLink" href="<?php the_permalink() ?>"><?php the_post_thumbnail('bones-thumb-334'); ?><h4><?php the_title(); ?></h4></a>
								</article>

								<?php endwhile;?>
								<a class="btn lnk" href="<?php echo home_url(); ?>/my-work">See More Projects</a>
							</div>
							
						</div>
					</div>
				</div>
			</div>



<?php get_footer(); ?>

