		</main><!-- .container -->
		<footer id="footer" class="footer">
			<div class="container">
				<div class="row">
					<div class="footer-logo-container col-sm-6">
						<?php if( get_field('show_logo', 'option') ) :
								if( get_field('use_header_logo', 'option') ) : ?>
									<img src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ) ?> Logo Footer" />
								<?php else : ?>
									<img src="<?php the_field('footer_logo', 'option'); ?>" />
								<?php endif; // use header logo condition ?>
						<?php endif; // show logo condition ?>
					</div>
					<div class="footer-menu-container col-sm-6">
						<div class="row">
							<div class="col-sm-3">
								<h4 class="footer-menu-title">RTL CBS</h4>
								<?php wp_nav_menu( array(
									'menu_class' => 'footer-menu',
									'container' => '',
									'theme_location' => 'footer',
								) ); ?>
							</div>
							<div class="col-sm-5">
								<h4 class="footer-menu-title">About Us</h4>
								<?php wp_nav_menu( array(
									'menu_class' => 'footer-menu',
									'container' => '',
									'theme_location' => 'about',
								) ); ?>
							</div>
							<div class="col-sm-4">
								<?php wp_nav_menu( array(
									'menu_class' => 'footer-menu',
									'container' => '',
									'theme_location' => 'extra',
								) ); ?>
							</div>
						</div>	
					</div>
				</div>		
			</div>
			<div class="footer-text">
				<div class="container">
					<p><?php the_field('footer_text', 'option'); ?></p>
				</div>
			</div>
		</footer><!-- .footer -->
		<?php wp_footer(); ?>
    </body>
</html>