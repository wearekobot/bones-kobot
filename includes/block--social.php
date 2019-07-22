			<?php
				$twitter_username = get_theme_mod('twitter_username');
				$facebook_url = get_theme_mod('facebook_url');
				$instagram_username = get_theme_mod('instagram_username');
				$houzz_url = get_theme_mod('houzz_url');
				$youtube_url = get_theme_mod('youtube_url');
				$linkedin_url = get_theme_mod('linkedin_url');
			?>

			<ul class="social-channels">
				<?php if (!empty($facebook_url)) : ?><li class="icon-facebook"><a href="<?php echo $facebook_url; ?>" class="footer-social-facebook">Facebook</a></li><?php endif; ?>
				<?php if (!empty($twitter_username)) : ?><li class="icon-twitter"><a href="https://twitter.com/<?php echo $twitter_username; ?>" class="footer-social-twitter">Twitter</a></li><?php endif; ?>
				<?php if (!empty($instagram_username)) : ?><li class="icon-instagram"><a href="https://instagram.com/<?php echo $instagram_username; ?>" class="footer-social-instagram">Instagram</a></li><?php endif; ?>
				<?php if (!empty($youtube_url)) : ?><li class="icon-youtube"><a href="<?php echo $youtube_url; ?>" class="footer-social-youtube">Youtube</a></li><?php endif; ?>
				<?php if (!empty($linkedin_url)) : ?><li class="icon-linkedin"><a href="<?php echo $linkedin_url; ?>" class="footer-social-linkedin">Linked In</a></li><?php endif; ?>
			</ul>