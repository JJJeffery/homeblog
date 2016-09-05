<?php

/**** WIDGETS AREA ****/

/* ***************************************************** 
 * Plugin Name: unik Social widget
 * Description: Display social links.
 * Version: 1.0
 * Author: Weblusive
 * Author URI: http://www.weblusive.com
 * ************************************************** */
class alc_social_widget extends WP_Widget {

	// Widget setup.
	function alc_social_widget() {

		// Widget settings.
		$widget_ops = array(
			'classname' => 'widget_alc_social',
			'description' => __('Display social links', 'unik')
		);

		// Widget control settings.
		$control_ops = array(
			'id_base' => 'alc-social-widget'
		);

		// Create the widget.
		$this->WP_Widget('alc-social-widget', __('Unik - Social links', 'unik') , $widget_ops, $control_ops);
	}

	// Display the widget on the screen.
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$social_target = apply_filters('social_target', $instance['social_target']);
		$bitbucket = apply_filters('bitbucket', $instance['bitbucket']);
		$dribble = apply_filters('dribble', $instance['dribble']);
		$facebook = apply_filters('facebook', $instance['facebook']);
		$flickr = apply_filters('flickr', $instance['flickr']);
		$github = apply_filters('github', $instance['github']);
		$google = apply_filters('google', $instance['google']);
		$instagram = apply_filters('instagram', $instance['instagram']);
		$linkedin = apply_filters('linkedin', $instance['linkedin']);
		$pinterest = apply_filters('pinterest', $instance['pinterest']);
		$skype = apply_filters('skype', $instance['skype']);
		$behance = apply_filters('behance', $instance['behance']);
		$twitter = apply_filters('twitter', $instance['twitter']);
		$youtube = apply_filters('youtube', $instance['youtube']);
		
		$tumblr = apply_filters('tumblr', $instance['tumblr']);
		$youtube = apply_filters('vimeo', $instance['vimeo']);
		$youtube = apply_filters('digg', $instance['digg']);
		
		echo $before_widget;
		
		$socials = array(
			'bitbucket' => $bitbucket, 
			'dribbble' => $dribble, 
			'facebook' => $facebook, 
			'flickr' => $flickr, 
			'github' => $github, 
			'google-plus' => $google, 
			'behance' => $behance,
			'instagram' => $instagram, 
			'linkedin' => $linkedin, 
			'pinterest' => $pinterest, 
			'skype' => $skype, 
			'twitter' => $twitter, 
			'youtube' => $youtube,
			'tumblr' => $tumblr,
			'vimeo-square' => $vimeo,
			'digg' => $digg
		);
		$social_target = ($social_target === '0') ? '' : ' target="_blank"';
		$fullmarkup = array();
		foreach ($socials as $name => $link)
		{
			if ($link !== '' && !empty($link))
			{
				$fullmarkup[] = '<li><a href="'.$link.'"'.$social_target.'><i class="fa fa-'.$name.'"></i></a>';
			}
		}
		echo '<div class="social-box">';
		if ($title) echo $before_title . $title . $after_title;
		echo '<ul class="social-icons">'.implode( "\n", $fullmarkup ).'</ul></div>'.$after_widget;
		
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['social_target'] = strip_tags($new_instance['social_target']);
		$instance['bitbucket'] = strip_tags($new_instance['bitbucket']);
		$instance['dribble'] = strip_tags($new_instance['dribble']);
		$instance['facebook'] = strip_tags($new_instance['facebook']);
		$instance['flickr'] = strip_tags($new_instance['flickr']);
		$instance['github'] = strip_tags($new_instance['github']);
		$instance['google'] = strip_tags($new_instance['google']);
		$instance['instagram'] = strip_tags($new_instance['instagram']);
		$instance['linkedin'] = strip_tags($new_instance['linkedin']);
		$instance['pinterest'] = strip_tags($new_instance['pinterest']);
		$instance['skype'] = strip_tags($new_instance['skype']);
		$instance['twitter'] = strip_tags($new_instance['twitter']);
		$instance['youtube'] = strip_tags($new_instance['youtube']);
		
		$instance['behance'] = strip_tags($new_instance['behance']);
		$instance['tumblr'] = strip_tags($new_instance['tumblr']);
		$instance['vimeo'] = strip_tags($new_instance['vimeo']);
		$instance['digg'] = strip_tags($new_instance['digg']);
		
		return $instance;
	}

	function form($instance) {
		$defaults = array(
		'title' => 'Social links',
		'social_target' => '',
		'bitbucket' => '',
		'dribble' => '',
		'facebook' => '',
		'flickr' => '',
		'github' => '',
		'google' => '',
		'instagram' => '',
		'linkedin' => '',
		'pinterest' => '',
		'skype' => '',
		'twitter' => '',
		'youtube' => '',
		'behance' => '',
		'tumblr' => '',
		'vimeo' => '',
		'digg' => ''
		);
		
		$instance = wp_parse_args((array)$instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'unik'); ?></label>
			<input id="<?php echo $this->get_field_id('title'); ?>" type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('social_target'); ?>"><?php _e('Target window:', 'unik'); ?></label>
			<select id="<?php echo $this->get_field_id('social_target'); ?>" name="<?php echo $this->get_field_name('featured'); ?>" class="widefat">
				<option value="0" <?php if( $instance['social_target'] == 0):?>selected="selected"<?php endif?>>Same window</option> 
				<option value="1" <?php if( $instance['social_target'] == 1):?>selected="selected"<?php endif?>>New window</option> 
			</select>
		</p>
        <p>
			<label for="<?php echo $this->get_field_id('behance'); ?>"><?php _e('Behance:', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('behance'); ?>" type="text" name="<?php echo $this->get_field_name('behance'); ?>" value="<?php echo esc_attr($instance['behance']); ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('bitbucket'); ?>"><?php _e('Bitbucket:', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('bitbucket'); ?>" type="text" name="<?php echo $this->get_field_name('bitbucket'); ?>" value="<?php echo esc_attr($instance['bitbucket']); ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('digg'); ?>"><?php _e('Digg:', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('digg'); ?>" type="text" name="<?php echo $this->get_field_name('digg'); ?>" value="<?php echo esc_attr($instance['digg']); ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('dribble'); ?>"><?php _e('Dribble:', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('dribble'); ?>" type="text" name="<?php echo $this->get_field_name('dribble'); ?>" value="<?php echo esc_attr($instance['dribble']); ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('facebook'); ?>" type="text" name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php echo esc_attr($instance['facebook']); ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('flickr'); ?>"><?php _e('Flickr:', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('flickr'); ?>" type="text" name="<?php echo $this->get_field_name('flickr'); ?>" value="<?php echo esc_attr($instance['flickr']); ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('github'); ?>"><?php _e('Github:', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('github'); ?>" type="text" name="<?php echo $this->get_field_name('github'); ?>" value="<?php echo esc_attr($instance['github']); ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Google+:', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('google'); ?>" type="text" name="<?php echo $this->get_field_name('google'); ?>" value="<?php echo esc_attr($instance['google']); ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram:', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('instagram'); ?>" type="text" name="<?php echo $this->get_field_name('instagram'); ?>" value="<?php echo esc_attr($instance['instagram']); ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('LinkedIn:', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('linkedin'); ?>" type="text" name="<?php echo $this->get_field_name('linkedin'); ?>" value="<?php echo esc_attr($instance['linkedin']); ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest:', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('pinterest'); ?>" type="text" name="<?php echo $this->get_field_name('pinterest'); ?>" value="<?php echo esc_attr($instance['pinterest']); ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('skype'); ?>"><?php _e('Skype:', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('skype'); ?>" type="text" name="<?php echo $this->get_field_name('skype'); ?>" value="<?php echo esc_attr($instance['skype']); ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('tumblr'); ?>"><?php _e('Tumblr:', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('tumblr'); ?>" type="text" name="<?php echo $this->get_field_name('tumblr'); ?>" value="<?php echo esc_attr($instance['tumblr']); ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('twitter'); ?>" type="text" name="<?php echo $this->get_field_name('twitter'); ?>" value="<?php echo esc_attr($instance['twitter']); ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('vimeo'); ?>"><?php _e('Vimeo:', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('vimeo'); ?>" type="text" name="<?php echo $this->get_field_name('vimeo'); ?>" value="<?php echo esc_attr($instance['vimeo']); ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('Youtube:', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('youtube'); ?>" type="text" name="<?php echo $this->get_field_name('youtube'); ?>" value="<?php echo esc_attr($instance['youtube']); ?>" class="widefat" />
    	</p>
	<?php
	}
}

register_widget('alc_social_widget');


/* ***************************************************** 
 * Plugin Name: unik Flickr
 * Description: Retrieve and display photos from Flickr.
 * Version: 1.0
 * Author: Weblusive
 * Author URI: http://www.weblusive.com
 * ************************************************** */
class alc_flickr_widget extends WP_Widget {

	// Widget setup.
	function alc_flickr_widget() {

		// Widget settings.
		$widget_ops = array(
			'classname' => 'widget_alc_flickr',
			'description' => __('Display images from flickr', 'unik')
		);

		// Widget control settings.
		$control_ops = array(
			'id_base' => 'alc-flickr-widget'
		);

		// Create the widget.
		$this->WP_Widget('alc-flickr-widget', __('unik - Flickr images', 'unik') , $widget_ops, $control_ops);
	}

	// Display the widget on the screen.
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$id = $instance['flickr_id'];
		$nr = ($instance['flickr_nr'] != '') ? $nr = $instance['flickr_nr'] : $nr = 16;
		$randomId = mt_rand(0, 100000);
		echo $before_widget;
		if ($title) echo $before_title . $title . $after_title;
		echo "
		<script type=\"text/javascript\">
			jQuery(document).ready(function(){
				jQuery('.flickr-widget-$randomId').jflickrfeed({
					limit: ".$nr.",
					qstrings: {
						id: '".$id."'
					},
					itemTemplate: '<li><a href=\"http://www.flickr.com/photos/".$id."\"><img src=\"{{image_s}}\" alt=\"{{title}}\" /></a></li>'
				});
			});
		</script>";
		echo '<div class="flickr-widget"><ul id="basicuse" class="flickr-list flickr-widget-'.$randomId.'"></ul></div>'.$after_widget;
		
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['flickr_id'] = strip_tags($new_instance['flickr_id']);
		$instance['flickr_nr'] = strip_tags($new_instance['flickr_nr']);
		return $instance;
	}

	function form($instance) {
		$defaults = array(
		'title' => 'Latest From Flickr',
		'flickr_nr' => '16',
		'flickr_id' => '47445714@N03'
		);
		
		$instance = wp_parse_args((array)$instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'unik'); ?></label>
			<input id="<?php echo $this->get_field_id('title'); ?>" type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" class="widefat" />
		</p>
        
		<p>
			<label for="<?php echo $this->get_field_id('flickr_id'); ?>"><?php _e('Flickr ID:', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('flickr_id'); ?>" type="text" name="<?php echo $this->get_field_name('flickr_id'); ?>" value="<?php echo esc_attr($instance['flickr_id']); ?>" class="widefat" />
            <small style="line-height:12px;"><a href="http://www.idgettr.com">Find your Flickr user or group id</a></small>
		</p>
        <p>
			<label for="<?php echo $this->get_field_id('flickr_nr'); ?>"><?php _e('Number of photos:', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('flickr_nr'); ?>" type="text" name="<?php echo $this->get_field_name('flickr_nr'); ?>" value="<?php echo esc_attr($instance['flickr_nr']); ?>" class="widefat" />
		</p>
	<?php
	}
}

register_widget('alc_flickr_widget');


/* ***************************************************** 
 * Plugin Name: Last Tweets
 * Description: Displays Latest Tweets.
 * Version: 1.1
 * Author: Weblusive
 * Author URI: http://www.weblusive.com
 * ************************************************** */

add_action( 'widgets_init', 'latest_tweet_widget' );
function latest_tweet_widget() {
	register_widget( 'Latest_Tweets' );
}
class Latest_Tweets extends WP_Widget {

	function Latest_Tweets() {
		$widget_ops = array( 'classname' => 'twitter-widget'  );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'latest-tweets-widget' );
		$this->WP_Widget( 'latest-tweets-widget','unik - Latest Tweets', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		$no_of_tweets = $instance['no_of_tweets'];
		$transName = 'list_tweets';
	    $cacheTime = 20;
		$twitter_username 		= $instance['twitter_username'];
		$consumer_key 			= $instance['consumer_key'];
		$consumer_secret		= $instance['consumer_secret'];
		$access_token 			= $instance['access_token'];
		$access_token_secret 	= $instance['access_token_secret'];
		
	if( !empty($twitter_username) && !empty($consumer_key) && !empty($consumer_secret) && !empty($access_token) && !empty($access_token_secret)  ){
	    if(false === ($twitterData = get_transient($transName) ) ){
		
			$twitterConnection = new TwitterOAuth( $consumer_key , $consumer_secret , $access_token , $access_token_secret	);
			$twitterData = $twitterConnection->get(
					  'statuses/user_timeline',
					  array(
					    'screen_name'     => $twitter_username ,
					    'count'           => $no_of_tweets
						)
					);
			if($twitterConnection->http_code != 200)
			{
				$twitterData = get_transient($transName);
			}
	        // Save our new transient.
	        set_transient($transName, $twitterData, 60 * $cacheTime);
	    }
		/* Before widget (defined by themes). */
		echo $before_widget;
	
	
			echo $before_title; ?>
			<?php echo $title ; ?>
		<?php echo $after_title; 

			if( !empty($twitterData) && is_array($twitterData)  && !isset($twitterData['error'])){
				$i=0;
				$hyperlinks = true;
				$encode_utf8 = true;
				$twitter_users = true;
				$update = true;
				echo '
				<div id="twitter-widget" class="widget footer-widgets tweets-widget">
					<ul class="tweet-list">';
						foreach($twitterData as $item){
		                    $msg = $item->text;
		                    $permalink = 'http://twitter.com/#!/'. $twitter_username .'/status/'. $item->id_str;
		                    if($encode_utf8) $msg = utf8_encode($msg);
		                    $link = $permalink;
		                     echo '
							<li class="twitter-item"><p><i class="fa fa-twitter"></i>';
		                      if ($hyperlinks) {    $msg = $this->hyperlinks($msg); }
		                      if ($twitter_users)  { $msg = $this->twitter_users($msg); }
		                      echo $msg;
		                    if($update) {
		                      $time = strtotime($item->created_at);
		                      if ( ( abs( time() - $time) ) < 86400 )
		                        $h_time = sprintf( __('%s ago', 'unik'), human_time_diff( $time ) );
		                      else
		                        $h_time = date(__('Y/m/d', 'unik'), $time);
		                      echo sprintf( __('%s', 'twitter-for-wordpress', 'unik'),' <span class="twitter-timestamp">'.$h_time.'</span>' );
		                     }
		                    echo '</p></li>
';
		                    $i++;
		                    if ( $i >= $no_of_tweets ) break;
		            }
					echo '</ul> 
					</div>';
            	}
				else
				{ 
					echo _e('Sorry , Twitter seems down or responds slowly.', 'unik'); 
				}
            ?>
		<?php
		/* After widget (defined by themes). */
		echo $after_widget;
	}
	else{
		echo $before_widget;
		echo $before_title; ?>
			<a href="http://twitter.com/<?php echo $twitter_username?>" class="twitter-title"><?php echo $title ; ?></a>
		<?php echo $after_title._e('You need to Setup Twitter API OAuth settings first', 'unik');
		echo $after_widget;
	}
}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['no_of_tweets'] = strip_tags( $new_instance['no_of_tweets'] );
		
		$instance['twitter_username'] = strip_tags( $new_instance['twitter_username'] );
		$instance['consumer_key'] = strip_tags( $new_instance['consumer_key'] );
		$instance['consumer_secret'] = strip_tags( $new_instance['consumer_secret'] );
		$instance['access_token'] = strip_tags( $new_instance['access_token'] );
		$instance['access_token_secret'] = strip_tags( $new_instance['access_token_secret'] );
		//$instance['accounts'] = strip_tags( $new_instance['accounts'] );
		//$instance['replies'] = strip_tags( $new_instance['replies'] );
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' =>__('@Follow Me' , 'unik') , 'no_of_tweets' => '5', 'twitter_username'=>'weblusive', 'consumer_key' => '', 'consumer_secret' => '', 'access_token' => '', 'access_token_secret' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter_username' ); ?>"><?php _e('Username', 'unik')?> : </label>
			<input id="<?php echo $this->get_field_id( 'twitter_username' ); ?>" name="<?php echo $this->get_field_name( 'twitter_username' ); ?>" value="<?php echo esc_attr($instance['twitter_username']); ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'consumer_key' ); ?>"><?php _e('Consumer Key', 'unik')?> : </label>
			<input id="<?php echo $this->get_field_id( 'consumer_key' ); ?>" name="<?php echo $this->get_field_name( 'consumer_key' ); ?>" value="<?php echo esc_attr($instance['consumer_key']); ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'consumer_secret' ); ?>"><?php _e('Consumer Secret', 'unik')?> : </label>
			<input id="<?php echo $this->get_field_id( 'consumer_secret' ); ?>" name="<?php echo $this->get_field_name( 'consumer_secret' ); ?>" value="<?php echo esc_attr($instance['consumer_secret']); ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'access_token' ); ?>"><?php _e('Access Token', 'unik')?> : </label>
			<input id="<?php echo $this->get_field_id( 'access_token' ); ?>" name="<?php echo $this->get_field_name( 'access_token' ); ?>" value="<?php echo esc_attr($instance['access_token']); ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'access_token_secret' ); ?>"><?php _e('Access Token Secret', 'unik')?> : </label>
			<input id="<?php echo $this->get_field_id( 'access_token_secret' ); ?>" name="<?php echo $this->get_field_name( 'access_token_secret' ); ?>" value="<?php echo esc_attr($instance['access_token_secret']); ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', 'unik')?> : </label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr($instance['title']); ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'no_of_tweets' ); ?>"><?php _e('Number of Tweets to show', 'unik')?> : </label>
			<input id="<?php echo $this->get_field_id( 'no_of_tweets' ); ?>" name="<?php echo $this->get_field_name( 'no_of_tweets' ); ?>" value="<?php echo esc_attr($instance['no_of_tweets']); ?>" type="text" size="3" />
		</p>
	<?php
	}
	
		/**
	 * Find links and create the hyperlinks
	 */
	private function hyperlinks($text) {
	    $text = preg_replace('/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"$1\" class=\"twitter-link\">$1</a>", $text);
	    $text = preg_replace('/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"http://$1\" class=\"twitter-link\">$1</a>", $text);
	    // match name@address
	    $text = preg_replace("/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i","<a href=\"mailto://$1\" class=\"twitter-link\">$1</a>", $text);
	        //mach #trendingtopics. Props to Michael Voigt
	    $text = preg_replace('/([\.|\,|\:|\?|\?|\>|\{|\(]?)#{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/#search?q=$2\" class=\"twitter-link\">#$2</a>$3 ", $text);
	    return $text;
	}
	/**
	 * Find twitter usernames and link to them
	 */
	private function twitter_users($text) {
	       $text = preg_replace('/([\.|\,|\:|\?|\?|\>|\{|\(]?)@{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/$2\" class=\"twitter-user\">@$2</a>$3 ", $text);
	       return $text;
	}
	
}

/* ***************************************************** 
 * Plugin Name: unik Last Works
 * Description: Retrieve and display latest works (Portfolio).
 * Version: 1.0
 * Author: Weblusive
 * Author URI: http://www.weblusive.com
 * ************************************************** */
class alc_works_widget extends WP_Widget {

	// Widget setup.
	function alc_works_widget() {

		// Widget settings.
		$widget_ops = array(
			'classname' => 'widget_alc_works post-widget recent-post-box',
			'description' => __('Display latest works (Portoflio)', 'unik')
		);

		// Create the widget.
		$this->WP_Widget('alc-works-widget', __('unik - Latest Works', 'unik') , $widget_ops);
	}

	// Display the widget on the screen.
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['post_title']);
		
		echo $before_widget;
		
		$post_count = $instance['post_count'];
		$featured = $instance['featured'];
		
		$args = array('post_type' => 'portfolio', 'taxonomy'=> 'portfolio_category', 'posts_per_page' => $post_count);
		if ($featured)
		{
			$args['meta_key'] = '_portfolio_featured'; 
			$args['meta_value'] = '1';
		}
		$loop = new WP_Query($args);
		?>
		<div class="recent-post-box">
		<?php if ($title) echo $before_title . $title . $after_title;?>
		<ul class="recent-list">
		<?php while ( $loop->have_posts() ) : $loop->the_post();?>
			<li>
				<a href="<?php the_permalink()?>" class="pull-left">
					<?php if(has_post_thumbnail()):?>
						<?php the_post_thumbnail('blog-thumb', array('class'=>'media-object') ); ?>
					<?php else:?>
						<img src = "http://placehold.it/50x50" alt="No Image" />
					<?php endif?>
				</a> 
				<p><?php echo limit_words(get_the_excerpt(), '8')?></p>
			</li>
            <?php endwhile;?>
		</ul>
		</div>
		<?php echo $after_widget; 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['post_title'] = strip_tags($new_instance['post_title']);
		$instance['post_count'] = strip_tags($new_instance['post_count']);
		$instance['featured'] = strip_tags($new_instance['featured']);
		return $instance;
	}

	function form($instance) {
		$defaults = array(
			'post_title' => 'Recent works',
			'post_count' => '3',
			'featured' => '0',
		);
		$instance = wp_parse_args((array)$instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('post_title'); ?>"><?php _e('Title', 'unik'); ?></label>
			<input id="<?php echo $this->get_field_id('post_title'); ?>" type="text" name="<?php echo $this->get_field_name('post_title'); ?>" value="<?php echo esc_attr($instance['post_title']); ?>" class="widefat" />
		</p>
        
         <p>
			<label for="<?php echo $this->get_field_id('featured'); ?>"><?php _e('Show only featured posts', 'unik'); ?></label> 
			<select id="<?php echo $this->get_field_id('featured'); ?>" name="<?php echo $this->get_field_name('featured'); ?>" class="widefat">
				<option value="0" <?php if( $instance['featured'] == 0):?>selected="selected"<?php endif?>>No</option> 
				<option value="1" <?php if( $instance['featured'] == 1):?>selected="selected"<?php endif?>>Yes</option> 
			</select>
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e('Number of Posts to show', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('post_count'); ?>" type="text" name="<?php echo $this->get_field_name('post_count'); ?>" value="<?php echo $instance['post_count']; ?>" class="widefat" />
		</p>
	<?php
	}
}

register_widget('alc_works_widget');



/* ***************************************************** 
 * Plugin Name: unik Blog Posts
 * Description: Retrieve and display latest blog posts.
 * Version: 1.0
 * Author: Weblusive
 * Author URI: http://www.weblusive.com
 * ************************************************** */
class alc_blogposts_widget extends WP_Widget {

	// Widget setup.
	function alc_blogposts_widget() {

		// Widget settings.
		$widget_ops = array(
			'classname' => 'widget_alc_blogposts',
			'description' => __('Display latest blog posts', 'unik')
		);

		// Create the widget.
		$this->WP_Widget('alc-blogposts-widget', __('unik Blog Posts', 'unik') , $widget_ops);
	}

	// Display the widget on the screen.
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['post_title']);
		
		echo $before_widget;
		if ($title) echo $before_title . $title . $after_title;
		$post_count = $instance['post_count'];
		$post_category = $instance['post_category'];
		$post_thumbs = $instance['post_thumbs'];
		global $post;
		$args = array( 'numberposts' => $post_count);
		if (!empty($post_category))
		$args['category'] = $post_category;
		$myposts = get_posts( $args );
		
		if ($myposts): ?>
		<div class="recent-post-box latest-post-widget">
			<ul class="post-list">
		<?php 	foreach( $myposts as $post ) :	setup_postdata($post);  ?>          
				<?php if ($post_thumbs == 1):?>
				<li>
					<a href="<?php the_permalink()?>" class="post-th">
						<?php if(has_post_thumbnail()):?>
							<?php the_post_thumbnail('blog-thumb', array('class'=>'media-object') ); ?>
						<?php else:?>
							<img src = "http://placehold.it/50x50" alt="No Image" />
						<?php endif?>
					</a>
						<h5 class="media-heading"><a href="<?php the_permalink()?>"><?php the_title()?></a></h5> 
						<small><?php the_date()?></small>
				</li>
				<?php else:?>
					<li>
						<h5 class="media-heading"><a href="<?php the_permalink()?>"><?php the_title()?></a></h5> 
					</li>
				<?php endif?>
			<?php endforeach; ?>
			</ul>
		</div>
		<?php endif; ?>
        <?php echo $after_widget; 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['post_title'] = strip_tags($new_instance['post_title']);
		$instance['post_count'] = strip_tags($new_instance['post_count']);
		$instance['post_thumbs'] = strip_tags($new_instance['post_thumbs']);
		$instance['post_category'] = strip_tags($new_instance['post_category']);
		return $instance;
	}

	function form($instance) {
		$defaults = array(
			'post_title' => 'Latest from the blog',
			'post_count' => '2',
			'post_category' => '',
			'post_thumbs' => ''
		);
		$instance = wp_parse_args((array)$instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('post_title'); ?>"><?php _e('Title', 'unik'); ?></label>
			<input id="<?php echo $this->get_field_id('post_title'); ?>" type="text" name="<?php echo $this->get_field_name('post_title'); ?>" value="<?php echo esc_attr($instance['post_title']); ?>" class="widefat" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e('Number of Posts to show', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('post_count'); ?>" type="text" name="<?php echo $this->get_field_name('post_count'); ?>" value="<?php echo esc_attr($instance['post_count']); ?>" class="widefat" />
		</p>
        
         <p>
			<label for="<?php echo $this->get_field_id('post_category'); ?>"><?php _e('Category (Leave Blank to show from all categories)', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('post_category'); ?>" type="text" name="<?php echo $this->get_field_name('post_category'); ?>" value="<?php echo esc_attr($instance['post_category']); ?>" class="widefat" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('post_thumbs'); ?>"><?php _e('Show thumbnails', 'unik'); ?></label>
			<select id="<?php echo $this->get_field_id('post_thumbs'); ?>" name="<?php echo $this->get_field_name('post_thumbs'); ?>" class="widefat">
				<option value="0" <?php if( $instance['post_thumbs'] == 0):?>selected="selected"<?php endif?>>No</option> 
				<option value="1" <?php if( $instance['post_thumbs'] == 1):?>selected="selected"<?php endif?>>Yes</option> 
			</select>
		</p>
	<?php
	}
}

register_widget('alc_blogposts_widget');



/* ***************************************************** 
 * Plugin Name: 3-in-1 Posts
 * Description: Retrieve and display popular/latest posts/latest comments.
 * Version: 1.0
 * Author: Weblusive
 * Author URI: http://www.weblusive.com
 * ************************************************** */
class alc_totalposts_widget extends WP_Widget {

	// Widget setup.
	function alc_totalposts_widget() {

		// Widget settings.
		$widget_ops = array(
			'classname' => 'widget_alc_totalposts',
			'description' => __('Retrieve and display popular/latest posts/latest comments.', 'unik')
		);

		// Create the widget.
		$this->WP_Widget('alc-totalposts-widget', __('unik Popular/Latest posts/Last comments', 'unik') , $widget_ops);
	}

	// Display the widget on the screen.
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['post_title']);
		
		echo $before_widget;
		if ($title) echo $before_title . $title . $after_title;
		$post_count = $instance['post_count'];
		$post_category = $instance['post_category'];
		
		global $post;
		$args = array( 'numberposts' => $post_count);
		if (!empty($post_category))
		$args['category'] = $post_category;
		?>
		<div class="horizontal-tabs-box alc-tabs-widget">
			<ul class="nav nav-tabs tab-widget-links">
				<li><a href="#widget-popular" class="active" data-toggle="tab"><?php _e('Popular', 'unik')?></a></li>
				<li><a href="#widget-recent" data-toggle="tab"><?php _e('Recent', 'unik')?></a></li>
				<li><a href="#widget-comments" data-toggle="tab"><?php _e('Comments', 'unik')?></a></li>
			</ul>
			<div class="tab-content">
				<div  class="tab-pane active" id="widget-popular">
					<?php $myposts = get_posts( $args ); 
					if ($myposts):
										echo "<ul class='post-popular'>";
						foreach( $myposts as $post ) :	setup_postdata($post);  ?>                 
							<li>
								<a href="<?php the_permalink()?>" class="pull-left">
									<?php if(has_post_thumbnail()):?>
										<?php the_post_thumbnail('blog-thumb', array('class'=>'media-object') ); ?>
									<?php else:?>
										<img src = "http://placehold.it/50x50" alt="<?php _e('No Image', 'unik')?>" />
									<?php endif?>
								</a>
								<h6 class="media-heading"><a href="<?php the_permalink()?>"><?php the_title()?></a></h6> 
							</li>
						<?php endforeach;
											echo "</ul>";
					endif; ?>
				</div>
                <div  class="tab-pane" id="widget-recent">
					<?php wp_reset_query();
					$args ['orderby'] = 'comment_count';
					$myposts = get_posts( $args ); 
					if ($myposts):
						echo "<ul class='post-recent'>";
							foreach( $myposts as $post ) :	setup_postdata($post);  ?>                 
								<li>
									<a href="<?php the_permalink()?>" class="pull-left">
										<?php if(has_post_thumbnail()):?>
											<?php the_post_thumbnail('blog-thumb', array('class'=>'media-object') ); ?>
										<?php else:?>
											<img src = "http://placehold.it/50x50" alt="<?php _e('No Image', 'unik')?>" />
										<?php endif?>
									</a>
									<h6 class="media-heading"><a href="<?php the_permalink()?>"><?php the_title()?></a></h6> 
								</li>
							<?php endforeach; 
                        echo "</ul>";
					endif; ?>
				</div>
                <div  class="tab-pane" id="widget-comments">
					<?php 
					global $wpdb;	
					$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved, comment_type, comment_author_url, SUBSTRING(comment_content,1,70) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT 5";
					$comments = $wpdb->get_results($sql);
					 echo "<ul class='post-comments'>";
					foreach ($comments as $comment) :?>
						<li>
							<a href="<?php echo get_permalink($comment->ID).'#comment-'.$comment->comment_ID?>" title="<?php echo strip_tags($comment->comment_author).' '.__('on ', 'unik').' '.$comment->post_title?>" class="pull-left">
								<?php echo get_avatar($comment, '50')?>
							</a>
							<h6>
								<a href="<?php echo get_permalink($comment->ID).'#comment-'.$comment->comment_ID?>" title="<?php echo strip_tags($comment->comment_author).' '.__('on', 'unik').' '.$comment->post_title?>">
									<?php echo strip_tags($comment->comment_author)?>
								</a>
							</h6>
							<p><?php echo strip_tags($comment->com_excerpt)?></p>
							<time datetime="<?php echo get_the_time('Y-m-d'); ?>"><small><?php echo get_the_time('F d, Y'); ?></small></time>
						</li>
					<?php endforeach;
					echo "</ul>";
					wp_reset_query();?>			
				</div> 
			</div>
        </div>
        <?php echo $after_widget; 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['post_title'] = strip_tags($new_instance['post_title']);
		$instance['post_count'] = strip_tags($new_instance['post_count']);
		$instance['post_category'] = strip_tags($new_instance['post_category']);
		return $instance;
	}

	function form($instance) {
		$defaults = array(
			'post_title' => 'Blog posts',
			'post_count' => '3',
			'post_category' => ''
		);
		$instance = wp_parse_args((array)$instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('post_title'); ?>"><?php _e('Title', 'unik'); ?></label>
			<input id="<?php echo $this->get_field_id('post_title'); ?>" type="text" name="<?php echo $this->get_field_name('post_title'); ?>" value="<?php echo esc_attr($instance['post_title']); ?>" class="widefat" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e('Number of Posts to show', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('post_count'); ?>" type="text" name="<?php echo $this->get_field_name('post_count'); ?>" value="<?php echo esc_attr($instance['post_count']); ?>" class="widefat" />
		</p>
        
         <p>
			<label for="<?php echo $this->get_field_id('post_category'); ?>"><?php _e('Category (Leave Blank to show from all categories)', 'unik'); ?></label> 
			<input id="<?php echo $this->get_field_id('post_category'); ?>" type="text" name="<?php echo $this->get_field_name('post_category'); ?>" value="<?php echo esc_attr($instance['post_category']); ?>" class="widefat" />
		</p>
	<?php
	}
}

register_widget('alc_totalposts_widget');


/* ***************************************************** 
 * Plugin Name: unik Contact Widget
 * Description: Display contact widget on footer.
 * Version: 1.0
 * Author: Weblusive
 * Author URI: http://www.weblusive.com
 * ************************************************** */
/**
 * Contact Form Widget Class
 */
class alc_Contact_Form extends WP_Widget {
	
	function alc_Contact_Form() {
		$widget_ops = array('classname' => 'alc_contact_form_entries', 'description' => __("Contact widget", 'unik') );
		$this->WP_Widget('alc_Contact_Form', __('unik - Contact Form', 'unik'), $widget_ops);
	}

	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Contact Us', 'unik') : $instance['title'], $instance);
		$email = apply_filters('widget_title', empty($instance['email']) ? __('', 'unik') : $instance['email'], $instance);
		$success = apply_filters('widget_title', empty($instance['success']) ? __('Thank you, e-mail sent.', 'unik') : $instance['success'], $instance);
		
		echo $before_widget;
		
		if ( $title ) echo $before_title . $title . $after_title;
        ?>                
			<form action="#" method="post" id="contactFormWidget">
                            <div class="row">
					<div class="col-md-6">
						<input type="text" name="wname" id="wname" value="" size="22" placeholder="<?php _e('Name', 'unik')?>"/>
					</div>
					<div class="col-md-6">
						<input type="text" name="wemail" id="wemail" value="" size="22" placeholder="<?php _e('Email', 'unik')?>" />
					</div>
                             </div>
                            <div class="row">	
					<div class="col-md-12">
						<textarea name="wmessage" id="wmessage"  placeholder="<?php _e('Message', 'unik')?>"></textarea>
					
						<input type="submit" id="wformsend" value="<?php _e('Send', 'unik')?>" class="btn" name="wsend" />
					</div>
                            </div>
				<div class="loading"></div>
				<div>
					<input type="hidden" name="wcontactemail" id="wcontactemail" value="<?php echo $email?>" />
					<input type="hidden" value="<?php echo home_url()?>" id="wcontactwebsite" name="wcontactwebsite" />
					<input type="hidden" name="wcontacturl" id="wcontacturl" value="<?php echo get_template_directory_uri()?>/library/sendmail.php" />
				</div>
				<div class="clear"></div>
				<div class="widgeterror"></div>
				<div class="widgetinfo"><i class="fa fa-envelope"></i><?php echo $success?></div>
			</form>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['email'] = strip_tags($new_instance['email']);
		$instance['success'] = strip_tags($new_instance['success']);
		return $instance;
	}

	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$email = isset($instance['email']) ? esc_attr($instance['email']) : '';
		$success = isset($instance['success']) ? esc_attr($instance['success']) : '';
	?>
	
		<div>
        	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:<br />', 'unik'); ?>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
		</div>
        <div>
        	<label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email Address:<br />', 'unik'); ?>
			<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" /></label></p>
		</div>
        <div>
        	<label for="<?php echo $this->get_field_id('success'); ?>"><?php _e('Success Message:<br />', 'unik'); ?>
			<input class="widefat" id="<?php echo $this->get_field_id('success'); ?>" name="<?php echo $this->get_field_name('success'); ?>" type="text" value="<?php echo $success; ?>" /></label></p>
		</div>
		<div style="clear:both"></div>
<?php
	}
}

register_widget('alc_Contact_Form');
?>