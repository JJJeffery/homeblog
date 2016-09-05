<?php
 
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
 
if ( post_password_required() ) : ?>
	<p class="nocomment"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'unik' ); ?></p>
	</div>
	<?php return;
endif;
?>
 
<?php if ( have_comments() ) : ?>
	<h1>
		<?php printf( _n( '%1$s Comment', '%1$s Comments', get_comments_number(), 'unik' ),number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );?>
	</h1>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<div class="navigation">
			<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'unik' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'unik' ) ); ?></div>
		</div> <!-- .navigation -->
	<?php endif; ?>
	 
	<ul class="comment-tree">
		<?php wp_list_comments('callback=unik_comment'); ?>
	</ul>
<?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->
	<?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e( 'Comments are closed.', 'unik' ); ?></p>
	 <?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>
	<div class="leave-comment comment-form">
		<h1><?php comment_form_title( __( 'Leave a Reply', 'unik'), __( 'Leave a Reply to %s', 'unik') ); ?></h1>
		<div class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></div>
	 
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<p class="bottom20">
				<?php _e('You must be logged in to post a comment', 'unik')?>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('Click here to login', 'unik')?></a> 
			</p>
		<?php else : ?> 
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="comment-form">				
             
				<?php if ( $user_ID ) : ?>
					<p class="com_logined_text">
						<?php _e('Logged in as', 'unik')?> 
					<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. 
					<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php _e('Log out', 'unik')?> &raquo;</a>
                                    </p>
				<?php else : ?>
                     <div class="text-fields">
						<div class="float-input">
							<input type="text" name="author" id="author" placeholder="<?php _e('Name', 'unik')?>" title="<?php _e('Name', 'unik')?>" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
							<span><i class="fa fa-user"></i></span>
						</div>
						<div class="float-input">
							<input type="text" name="email" id="email" placeholder="<?php _e('Email', 'unik')?>" title="<?php _e('Email', 'unik')?>" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
							<span><i class="fa fa-envelope-o"></i></span>
						</div>
						<div class="float-input">
							<input type="text" name="website" id="website" placeholder="<?php _e('Website', 'unik')?>" title="<?php _e('Website', 'unik')?>" value="<?php echo isset($comment_author_website) ? $comment_author_website : '' ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
							<span><i class="fa fa-link"></i></span>
						</div>
					</div>
				<?php endif; ?>
				<div class="<?php echo ($user_ID) ? 'user-com-text' : 'submit-area' ?>">
					<textarea name="comment" title="<?php _e('Comment', 'unik')?>" placeholder="<?php _e('Comment', 'unik')?>" id="comment" cols="10" rows="15" tabindex="4"></textarea>
					<input type="submit" class="main-button"  value="<?php _e('Add a Comment', 'unik')?>">
					<?php comment_id_fields(); ?>
					<?php do_action('comment_form', $post->ID); ?>
				</div>
			</form>
		<?php endif;  ?>
	</div>
<?php endif;  ?>
