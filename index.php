<?php
// Gets theme settings.
$victory = get_theme_mod( 'victory' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117101144-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-117101144-1');
</script>

	<meta name="google-site-verification" content="qKhAXZie1HMunONo5sjVbL0R8HAhuOAmMML3jYwSsSQ" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="CBRZY">
	<meta name="twitter:description" content="<?php echo get_bloginfo( 'description' ); ?>">
	<meta name="twitter:image" content="https://cbrzy.com/wp-content/uploads/2017/05/Signature_Blue.png">

	<meta property="og:image" content="https://cbrzy.com/wp-content/uploads/2017/05/Signature_Blue.png"/>
	<meta property="og:description" content="<?php echo get_bloginfo( 'description' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0"/>

	<title>CBRZY</title>
	<?php wp_head(); ?>
</head>

<body>
	
<?php 
	// Header section
	get_template_part( 'components/header', 'none' );
	// About section
	get_template_part( 'components/about', 'none' );
	// Work section
	get_template_part( 'components/work', 'none' );
	// Contact form section
	get_template_part( 'components/contact', 'form' );
?>
<?php wp_footer(); ?>
</body>
</html>
