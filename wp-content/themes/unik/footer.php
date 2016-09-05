<footer>
    <div class="up-footer" id="footer">
		<div class="row" id="footer_in">
                <?php 
                    $footer_widget_count = weblusive_get_option('footer_widgets');
                    if($footer_widget_count !== 'none'):
                    for($i = 1; $i<= $footer_widget_count; $i++){
                        if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Widget ".$i) ) :endif;
                    }			
                ?>
                <?php endif; ?>
				<p class="f_bq"> <?php if($word_t2!=""){echo $word_t2;}else{echo '版权所有';}  ?> &copy;<?php echo date("Y"); echo " "; bloginfo('name'); 
if($icp_b !=="") {echo ' |   <a rel="nofollow" target="_blank" href="http://www.miitbeian.gov.cn/">'.$icp_b.'</a>'; };
echo ' |  <a class="banquan" target="_blank" href="http://www.2zzt.com">WordPress</a>'; ?> </p>
        </div>
    </div>	
    <div class="footer-line">
		<p><?php echo  htmlspecialchars_decode(do_shortcode(weblusive_get_option('footer_copyright')))?></p>
		 <?php if(!weblusive_get_option('hide_footer_top')):?>
		<a class="go-top" href="#"><i class="fa fa-angle-up"></i></a>
		<?php endif; ?>
    </div>
</footer>
<!-- end of div id=content-->
<?php if (!is_page_template('under-construction.php')):?>	
</div> 
<?php endif; ?>
<!--end container-->
</div>
<?php if(weblusive_get_option('footer_code')) echo  htmlspecialchars_decode(weblusive_get_option('footer_code')); ?>
<?php wp_footer()?>
</body>
</html>
