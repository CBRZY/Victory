<?php
// Gets theme settings.
$victory = get_theme_mod( 'victory' );
?>
<section class="row intro" id="contact">
	<?php
	if ( ! empty( $victory['contact_heading'] ) ) {
		echo '<span class="title">' . $victory['contact_heading'] . '</span>';
	}
	?>

	<div class="content">
		<?php if ( ! empty( $victory['contact_email'] ) ) { ?>
			<div class="row form">
				<form class="row" id="contact-form" action="" method="POST">
					<div class="row message"></div>

					<div class="row">
						<input type="text" name="name" id="name" placeholder="<?php esc_html_e( 'Name', 'victory' ); ?>">
					</div>

					<div class="row">
						<input type="email" name="email" id="email" placeholder="<?php esc_html_e( 'Email', 'victory' ); ?>">
					</div>

					<div class="row">
						<textarea name="message" id="message" placeholder="<?php esc_html_e( 'Message ...', 'victory' ); ?>"></textarea>
					</div>
				</form>
			</div>
		<?php } ?>

		<footer class="row">
			<div class="copy">
				<?php
				if ( ! empty( $victory['contact_title'] ) ) {
					echo '<h2>' . $victory['contact_title'] . '</h2>';
				}

				if ( ! empty( $victory['contact_text'] ) ) {
					echo '<blockquote>' . $victory['contact_text'] . '</blockquote>';
				}
				?>
			</div>

			<?php if ( ! empty( $victory['contact_email'] ) ) { ?>
				<div class="actions">
					<?php $send_button_text = ! empty( $victory['contact_button_text'] ) ? $victory['contact_button_text'] : esc_html__( 'All Done? Send This', 'victory' ); ?>
					<a class="button blue" id="submit" href="#"><?php echo $send_button_text; ?></a>
				</div>
			<?php } ?>
		</footer>
	</div>
</section>