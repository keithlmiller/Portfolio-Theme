<?php get_header(); ?>

			<div id="content" class="singleWork">

				<div id="inner-content" class="wrap cf">
					<div id="main" class=" first clearfix" role="main">
		

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php
							$subTitle = rwmb_meta( 'km_subTitle' );
							$url = rwmb_meta( 'km_URL' );
							$chal = rwmb_meta( 'km_chal' );
							$subTitle2 = rwmb_meta( 'km_descTitle' );
							$chalTitle = rwmb_meta( 'km_chalTitle' );
							$desc1 = rwmb_meta( 'km_desc1' );
							$desc2 = rwmb_meta( 'km_desc2' );
							$desc3 = rwmb_meta( 'km_desc3' );
							$hero = rwmb_meta( 'km_hero','type=file' );
							$img1 = rwmb_meta( 'km_image1' );
							$img2 = rwmb_meta( 'km_image2' );
						?>
						<header class="article-header topHeader">
							<div class="headlines">
								<h1 class="title"><?php the_title(); ?></h1>
								<h2 class="subTitle"><?php echo $subTitle ?></h2>
							</div>
							<a class="btn seeLive" href="<?php echo $url ?>">See it Live</a>
						</header>
					</div>
				</div>

						<div id="workShowcase">
							<?php 
								foreach ( $hero as $image )
									{
									    echo "<img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' />";
									}
							?>
						</div>
						<div id="summary">
							<div id="sumInner" class="clearfix">
								<div id="resp">
									<h4 class="smallTitle">Responsibilities</h4>
									<ul>
										<li>Front-end Development</li>
										<li>Strategy</li>
										<li>Responsive UI Design</li>
										<li>Wordpress Development</li>
									</ul>
								</div>
								<div id="chal">
									<h4 class="smallTitle"><?php echo $chalTitle ?></h4>
									<p><?php echo $chal ?></p>
								</div>
							</div>
						</div>
						<div id="workDesc">
							<h3 class="sectionTitle"><?php echo $subTitle2 ?></h3>
							<p><?php echo $desc1 ?></p>
							<?php 
								// if(!empty($desc2) && !empty($desc3)){
								// 	echo "<p>".$desc2."</p><p>".$desc3."</p>"; 
								// } elseif (!empty($desc2) && empty($desc3)) {
								// 	echo "<p>".$desc2."</p>";
								// }$img1
								if(!empty($img1)){
									echo $img1; 
								} 
								if(!empty($desc2)){
									echo "<p>".$desc2."</p>"; 
								} 

								if(!empty($img2)){
									echo $img2; 
								} 
								if (!empty($desc3)) {
									echo "<p>".$desc3."</p>";
								}
							?>
							
						</div>

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry cf">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
									</footer>
							</article>

						<?php endif; ?>

					

				

			</div>

<?php get_footer(); ?>
