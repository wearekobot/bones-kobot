			<footer id="footer">
				<div class="wrap grid footer--main">
					<div class="six">
						<p class="logo"><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></p>
					</div>
					<div class="three">
						<?php include('includes/block--address.php'); ?>
					</div>
					<nav role="navigation" class="three last">
						<?php bones_footer_nav(); ?>
					</nav>
				</div>
				<div class="footer--minor wrap">
					<p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
				</div>
				
			</footer>
		</div>
		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>
	</body>
</html>

<?php // bones_footer_nav_minor(); ?>