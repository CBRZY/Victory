<?php
// Gets theme settings.
$victory = get_theme_mod( 'victory' );
?>

<header class="animated slow fade-in" id="header">
	<?php
	if ( ! empty( $victory['profile_image'] ) ) {
		echo '<a class="profile" href="/" style="background-image: url(' . $victory['profile_image'] . ');"></a>';
	} else {
		echo '<div class="profile-placeholder"></div>';
	}
        if ( ! empty( $victory['linkedin'] ) ) {
		echo '<a class="social linkedin" href="' . $victory['linkedin'] . '" target="_blank"></a>';
	}
        if ( ! empty( $victory['unity'] ) ) {
		echo '<a class="social unity" href="' . $victory['unity'] . '" target="_blank"></a>';
	}
        if ( ! empty( $victory['gamejolt'] ) ) {
		echo '<a class="social gamejolt" href="' . $victory['gamejolt'] . '" target="_blank"></a>';
	}
        if ( ! empty( $victory['viewbug'] ) ) {
		echo '<a class="social viewbug" href="' . $victory['viewbug'] . '" target="_blank"></a>';
	}
        if ( ! empty( $victory['facebook'] ) ) {
		echo '<a class="social facebook" href="' . $victory['facebook'] . '" target="_blank"></a>';
	}
	if ( ! empty( $victory['twitter'] ) ) {
		echo '<a class="social twitter" href="' . $victory['twitter'] . '" target="_blank"></a>';
	}
	if ( ! empty( $victory['instagram'] ) ) {
		echo '<a class="social instagram" href="' . $victory['instagram'] . '" target="_blank"></a>';
	}
	if ( ! empty( $victory['medium'] ) ) {
		echo '<a class="social medium" href="' . $victory['medium'] . '" target="_blank"></a>';
	}
	if ( ! empty( $victory['dribbble'] ) ) {
		echo '<a class="social dribbble" href="' . $victory['dribbble'] . '" target="_blank"></a>';
	}
	if ( ! empty( $victory['tumblr'] ) ) {
		echo '<a class="social tumblr" href="' . $victory['tumblr'] . '" target="_blank"></a>';
	}
	if ( ! empty( $victory['lastfm'] ) ) {
		echo '<a class="social lastfm" href="' . $victory['lastfm'] . '" target="_blank"></a>';
	}
	if ( ! empty( $victory['flickr'] ) ) {
		echo '<a class="social flickr" href="' . $victory['flickr'] . '" target="_blank"></a>';
	}
	?>
</header>