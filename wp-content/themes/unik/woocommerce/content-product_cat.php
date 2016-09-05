<?php
/**
 * The template for displaying product category thumbnails within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product_cat.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Increase loop count
$woocommerce_loop['loop']++;
$percolumn = weblusive_get_option('products_per_row');
if (empty($percolumn)) $percolumn = 'col-sm-4';
$cols = 3;

switch ($percolumn){
	case 'col-sm-4':
	$cols = 3;
	break;
	
	case 'col-sm-3':
	$cols = 4;
	break;
	
	case 'col-sm-6':
	$cols = 2;
	break;
	
	case 'col-sm-2':
	$cols = 6;
	break;
	
	default:
	$cols = 3;
	break;
}

$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', $cols);

if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>
<div class="item <?php echo $percolumn?>">
	<div class="product-category product<?php
		if ( ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] == 0 || $woocommerce_loop['columns'] == 1 )
			echo ' first';
		if ( $woocommerce_loop['loop'] % $woocommerce_loop['columns'] == 0 )
			echo ' last';
		?>">
		<div class="product-group">
			<?php do_action( 'woocommerce_before_subcategory', $category ); ?>

			<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
				<div class="product-thumbnail">
				<?php
					/**
					 * woocommerce_before_subcategory_title hook
					 *
					 * @hooked woocommerce_subcategory_thumbnail - 10
					 */
					do_action( 'woocommerce_before_subcategory_title', $category );
				?>
				</div>
				<div class="product-meta">
				<h3 class="product-title">
					<?php
						echo $category->name;

						if ( $category->count > 0 )
							echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . $category->count . ')</mark>', $category );
					?>
				</h3>

				<?php
					/**
					 * woocommerce_after_subcategory_title hook
					 */
					do_action( 'woocommerce_after_subcategory_title', $category );
				?>
				</div>
			</a>

			<?php do_action( 'woocommerce_after_subcategory', $category ); ?>
		</div>
	</div>
</div>