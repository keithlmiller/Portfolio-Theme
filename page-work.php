<?php

/*

Template Name: Work Template

*/

?>



<?php get_header(); ?>



			<div id="content" class="otherpage">
				<div id="inner-content" class="wrap clearfix">
					<div id="main" class="first clearfix" role="main">
						<header class="article-header topHeader clearfix">
							<div class="headlines">
								<h1 class="title">My Work</h1>
								<h2 class="subTitle">Check out a sample of things I’ve worked on (and what I learned along the way)</h2>
							</div>
						</header>
						<div id="listWorks">
						<?php $my_query = new WP_Query('category_name=My Work&posts_per_page=6');

  							while ($my_query->have_posts()) : $my_query->the_post(); ?>

							<article id="post-<?php the_ID(); ?>" class="work">
								<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('bones-thumb-334'); ?><h4><?php the_title(); ?></h4><span>View</span></a>

							</article>

							<?php endwhile;?>

						</div>

						
					</div>
				</div>
			</div>



<?php get_footer(); ?>

