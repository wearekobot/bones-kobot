			<?php
				$business_name = get_theme_mod('business_name');
				$suite_number = get_theme_mod('suite_number');
				$street_address = get_theme_mod('street_address');
				$city = get_theme_mod('city');
				$province = get_theme_mod('province');
				$postal_code = get_theme_mod('postal_code');
				$phone_number = get_theme_mod('phone_number');
				$fax_number = get_theme_mod('fax_number');
				$email_address = get_theme_mod('email_address');
			?>
			<h2>Address</h2>
			<p class="address">
				<?php echo $business_name; ?><br>
				<?php echo $suite_number; ?> <?php echo $street_address; ?><br>
				<?php echo $city; ?>,  <?php echo $province; ?> <?php echo $postal_code; ?>
			</p>
			<h2>Contact</h2>
			<ul>
				<?php if (isset($phone_number) && !empty($phone_number)) : ?><li><strong>Phone:</strong> <a href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a></li><?php endif; ?>
				<?php if (isset($fax_number) && !empty($fax_number)) : ?><li><strong>Fax:</strong> <?php echo $fax_number; ?></li><?php endif; ?>
				<?php if (isset($email_address) && !empty($email_address)) : ?><li><strong>Email:</strong> <a href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a></li><?php endif; ?>
			</ul>
