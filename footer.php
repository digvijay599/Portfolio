<?php
/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package resume
 */

?>
	<?php
		// Footer
		$admin_email = get_theme_mod('admin_email');
		$phone_info = get_theme_mod('_phone_info');
		$footer_logo = get_theme_mod('footer_logo');

		// Socials Link
		$linkedin_link = get_theme_mod('_linkedin_link');
		$facebook_link = get_theme_mod('_facebook_link');
		$instagram_link = get_theme_mod('_instagram_link');
		$github_link = get_theme_mod('_github_link');
	?>



	<footer id="footer" data-bg="Dark-BG">
			<div class="container">
				<div class="row">
					<?php if($footer_logo): ?>
					<div id="JF-Footer"><a id="log" href="#scrollContainer" data-scroll-to=""><img src="<?=$footer_logo?>" alt="Jason Frelich - JF" /></a></div>
					<?php endif; ?>
					<div class="col-xl-6 Text-Center">
						<div class="Sub-Header Add-Flourish"><?=get_theme_mod('_footer_text');?></div>
						<p><?=get_theme_mod('footer_content');?></p>
						<?php  if($admin_email): ?>
						<div>E: <a href="mailto:<?=$admin_email?>"><?=$admin_email?></a></div>
						<?php endif; ?>
						<?php  if($phone_info): ?>
						<div>P: <a href="tel:<?=$phone_info?>"><?=$phone_info?></a></div>
						<?php endif; ?>
						<ul class="SocialMedia  text-center-mobile">
							<?php if($linkedin_link): ?>
							<li><a target="_blank" rel="noopener" href="<?=$linkedin_link?>" aria-label="Linked-In"> <em class="fab fab fa-linkedin-in" aria-hidden="true"> <span class="screen-reader">Linked-In</span></em></a></li>
							<?php endif; ?>
							<?php if($facebook_link): ?>
							<li><a target="_blank" rel="noopener" href="<?=$facebook_link?>" aria-label="Facebook"> <em class="fab fab fa-facebook-f" aria-hidden="true"> <span class="screen-reader">Facebook</span></em></a></li>
							<?php endif; ?>
							<?php if($instagram_link): ?>
							<li><a target="_blank" rel="noopener" href="<?=$instagram_link?>" aria-label="Instagram"> <em class="fab fab fa-instagram" aria-hidden="true"> <span class="screen-reader">Instagram</span></em></a></li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>

			<div class="Footer-Copyright">
				<div class="container">
					<div class="row">
						<div class="col-xl-12 Footer-Bottom">
							<div class="Copyright"><?=get_theme_mod('_copyright_info')?></div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<a id="ScrollUp" href="#scrollContainer" data-scroll data-scroll-to data-scroll-sticky data-scroll-target="#scrollContainer"><span></span></a>
	</div>
	<?php wp_footer();?>
</body>
</html>
