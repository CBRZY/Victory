<?php
// Gets theme settings.
$victory = get_theme_mod( 'victory' );
?>
<section class="row intro" id="about">
	<div class="content">
		<header class="row">
			<nav>
				<?php
				// if ( ! empty( $victory['website_heading'] ) ) {
				// 	echo '<a class="current scroll" href="#website">' . $victory['website_heading'] . '</a>';
				// }
                //                 if ( ! empty( $victory['mobile_heading'] ) ) {
				// 	echo '<a class="current scroll" href="#mobile">' . $victory['mobile_heading'] . '</a>';
				// }
                //                 if ( ! empty( $victory['photography_heading'] ) ) {
				// 	echo '<a class="current scroll" href="#photography">' . $victory['photography_heading'] . '</a>';
				// }
                //                 if ( ! empty( $victory['videography_heading'] ) ) {
				// 	echo '<a class="current scroll" href="#videography">' . $victory['videography_heading'] . '</a>';
				// }
                //                 if ( ! empty( $victory['miscellaneous_heading'] ) ) {
				// 	echo '<a class="current scroll" href="#miscellaneous">' . $victory['miscellaneous_heading'] . '</a>';
				// }
				// if ( ! empty( $victory['arrivals_heading'] ) ) {
				// 	echo '<a class="arrivals current scroll" href="#arrivals">' . $victory['arrivals_heading'] . '</a>';
				// }
//				if ( ! empty( $victory['contact_heading'] ) ) {
//					echo '<a class="contact current scroll" href="#contact">' . $victory['contact_heading'] . '</a>';
//				}
				?>
			</nav>
		</header>

		<?php
		if ( ! empty( $victory['about_image'] ) ) {
			echo '<div class="row media pullup" style="background-image: url(' . $victory['about_image'] . ');"></div>';
		}
		?>

		<footer class="row">
                    
			<?php
				if ( ! empty( $victory['contact_button'] ) ) {
					echo '<div class="actions"><a class="button scroll" href="#contact">' . esc_html__( 'Contact the Captain', 'victory' ) . '</a></div>';
			?>
					<div class="row copy">
						<?php
						if ( ! empty( $victory['about_title'] ) ) {
							echo '<h1 class="cbrzyTitle">' . $victory['about_title'] . '</h1>';
						}
						if ( ! empty( $victory['about_content'] ) ) {
							echo '<p class="cbrzyPara">' . $victory['about_content'] . '</p>';
						}
						?>
					</div>
			<?php
				}else{
			?>
					<div class="row">
						<div class="divLeft copy">
							<?php
								if ( ! empty( $victory['about_title'] ) ) {
									echo '<h1 class="cbrzyTitle">' . $victory['about_title'] . '</h1>';
								}
							?>
						</div>
						<div class="divRight copy">
							<?php
								if ( ! empty( $victory['about_content'] ) ) {
									echo '<p class="cbrzyPara">' . $victory['about_content'] . '</p>';
								}
							?>
						</div>
					</div>
			<?php
				}
			?>

			
		</footer>
	</div>
</section>