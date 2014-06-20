			<footer class="footer">
				<div id="inner-footer">
					<h1><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></h1>
					<nav role="navigation">
						<?php bones_footer_links(); ?>
					</nav>
					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>
				</div>
			</footer>
		</div>
		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>
	</body>
</html>
