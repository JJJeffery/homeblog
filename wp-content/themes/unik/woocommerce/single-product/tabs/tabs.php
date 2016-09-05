<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>
<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12">
		<div class="tabs" id="single-product-tab">
			<ul id="tab" class="nav nav-tabs">
				<?php $counter = 0; foreach ( $tabs as $key => $tab ) : ?>
					<li class="<?php echo $key ?>_tab <?php if ($counter == 0):?>active<?php endif?>">
						<a href="#tab-<?php echo $key ?>" data-toggle="tab"><i class="fa fa-plus-square"></i><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?></a>
					</li>
				<?php $counter++; endforeach; ?>
			</ul>
			<div id="tab-content" class="tab-content">
				<?php $contentnum = 0; foreach ( $tabs as $key => $tab ) : ?>
					<div class="tab-pane <?php echo ($contentnum == 0) ? 'active in' : 'fade'; ?>" id="tab-<?php echo $key ?>">
						<?php call_user_func( $tab['callback'], $key, $tab ) ?>
					</div>
				<?php $contentnum++; endforeach; ?>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<?php endif; ?>