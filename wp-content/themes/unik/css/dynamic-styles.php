<?php  header("Content-type: text/css; charset: UTF-8"); 
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
 ?>
<?php if(weblusive_get_option('sticky_header')):?>
header{ z-index:9999 !important}
header {
	position: absolute;
}
header{position:fixed !important;}
header{width:270px; max-width:100%}
<?php endif?>

<?php  $css =  weblusive_get_option('css'); if (isset($css)) echo htmlspecialchars_decode($css ) , "\n";?>
<?php if( weblusive_get_option('css_tablets') ) : ?>
@media (min-width: 768px) and (max-width: 979px) { 
<?php echo htmlspecialchars_decode( weblusive_get_option('css_tablets') ) , "\n";?>
}
<?php endif; ?>
<?php if( weblusive_get_option('css_wide_phones') ) : ?>
@media (max-width: 767px) {
<?php echo htmlspecialchars_decode( weblusive_get_option('css_wide_phones') ) , "\n";?>
}
<?php endif; ?>
<?php if( weblusive_get_option('css_phones') ) : ?>
@media (max-width: 480px) {
<?php echo htmlspecialchars_decode( weblusive_get_option('css_phones') ) , "\n";?>
}
<?php endif; ?>

