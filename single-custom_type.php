<?php
/*
 * CUSTOM POST TYPE TEMPLATE
 *
 * This is the custom post type post template. If you edit the post type name, you've got
 * to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is "register_post_type( 'bookmarks')",
 * then your single template should be single-bookmarks.php
 *
 * Be aware that you should rename 'custom_cat' and 'custom_tag' to the appropiate custom
 * category and taxonomy slugs, or this template will not finish to load properly.
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

								<header class="article-header" id="workSingleTop">

									<h1 class="title"><?php the_title(); ?></h1>
									<p class="byline vcard"><?php
										printf( __( 'Posted <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) ), get_the_term_list( $post->ID, 'custom_cat', ' ', ', ', '' ) );
									?></p>

								</header>
								
							<h1 class="title">Mad Dragon</h1>
							<h2 class="subTitle">Check out a sample of things I’ve worked on (and what I learned along the way)</h2>

							<a class="btn seeLive" href="#">See it Live</a>
						</div>
						<div id="workShowcase"></div>
						<div id="summary">
							<div id="resp">
								<ul>
									<li>Front-end Development</li>
									<li>Strategy</li>
									<li>Responsive UI Design</li>
									<li>Wordpress Development</li>
								</ul>
							</div>
							<div id="chal">
								<p>Mad Dragon Music is a record label run by students of Drexel’s Music Industry
							 	program. They provided me with a newly designed logo and an overview of what pages they wanted 
							 	on the site. Words they were looking for in the design were “hip”, “modern”, and “minimal”.</p>
							</div>
						</div>
						<div id="workDesc">
							<p>The beginning of the process was an ongoing discussion with the client on what they were 
							looking for. They showed me several websites they liked and we discussed what they liked about 
							them. I did research on record label websites that I liked and we looked at what elements might 
							work for the specific needs of Mad Dragon Records. </p>
							<p>While this was going on, a graphic design student developed a series of new logos for the 
							different sections of the music group. Using the main logo as a base, I developed the visual 
							design of the site to go with it. </p>
							<p>Once everything was ready I started building with WordPress on a bare-bones theme called Bones.
							 I used and customized several plugins to let the future site managers easily add music, photo 
							 albums, and featured news stories. I also added custom fields to blog posts to let them easily 
							 add social media links that integrate into the design</p>
						</div>
								<section class="entry-content cf">
									<?php
										// the content (pretty self explanatory huh)
										the_content();

										/*
										 * Link Pages is used in case you have posts that are set to break into
										 * multiple pages. You can remove this if you don't plan on doing that.
										 *
										 * Also, breaking content up into multiple pages is a horrible experience,
										 * so don't do it. While there are SOME edge cases where this is useful, it's
										 * mostly used for people to get more ad views. It's up to you but if you want
										 * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
										 *
										 * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
										 *
										*/
										wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
										) );
									?>
								</section> <!-- end article section -->

								<footer class="article-footer">
									<p class="tags"><?php echo get_the_term_list( get_the_ID(), 'custom_tag', '<span class="tags-title">' . __( 'Custom Tags:', 'bonestheme' ) . '</span> ', ', ' ) ?></p>

								</footer>

								<?php comments_template(); ?>

							</article>

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
											<p><?php _e( 'This is the error message in the single-custom_type.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

						<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
