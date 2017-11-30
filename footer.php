			<footer id="footer">
				<div class="wrap grid">
					<div class="six">
						<p class="logo"><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></p>
					</div>
					<div class="three">
						<?php include('includes/block--address.php'); ?>
					</div>
					<nav role="navigation" class="three last">
						<?php bones_footer_links(); ?>
					</nav>
				</div>
				<p class="copyright wrap">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
			</footer>
		</div>
		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>
	</body>
</html>
