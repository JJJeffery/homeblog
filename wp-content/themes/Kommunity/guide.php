<?php
function theme_guide(){
add_theme_page( 'Theme guide','Theme documentation','edit_themes', 'theme-documentation', 'fabthemes_theme_guide');
}
add_action('admin_menu', 'theme_guide');

function fabthemes_theme_guide(){ ?>

		
<div id="welcome-panel" class="about-wrap">
<div class="container">

<div class="row">

	<div class="col3 col">
		<img src="<?php echo get_template_directory_uri() ?>/screenshot.png" />
	</div>
	<div class="col34 col">
		<h2> Welcome to <?php echo wp_get_theme(); ?> WordPress theme! </h2>
		<p>  <?php echo wp_get_theme(); ?> is a responsive theme for social network sites. This theme is compatible with the 
			popular WordPress social media plugin, Buddypress. This theme is responsive and built on bootstrap framework. It also comes
			with theme options, custom page templates, custom homepage, fontawesome icons etc. </p>
	</div>

</div>


<div class="row">

	<div class="col col1">
		<h3>Theme setup</h3>

		<h4> 1. Installing theme</h4>

		<p>Download the theme zip file from Fabthemes.com. Open your WordPress admin panel and go to <b> Appearence > Themes</b> . Click <b> Add new </b> and then <b> Upload the theme </b> to your themes directory and activate it.  </p>

		<h4> 2. Setting up Homepage</h4>

		<p> After theme activation, go to the Pages and create a new page named "Home". In the page attribute section you can find a dropdown box for page templates. Select the "Home" template from the dropdown list. Leave the page content section empty and publish the page. </p>
		<p>Go to settings > Reading > Front page displays. Select the "static page" option and for front page select "Home" from the dropdown page list.</p>

		<h4> 3. Setting up Blog page </h4>
		<p> Create a new page called Blog. Go to settings > Reading > Front page displays. Select "Blog" page front the dropdown list for posts page. </p>
		
	</div>

</div>


<div class="row">

	<div class="col col1">
		<h3>Plugins required</h3>

		<h4> 1. Installing Buddypress</h4>

		<p> This theme requires the Buddypress plugin to power up the social network section of the site. On your admin panel you will find a notification to install the buddypress plugin.   </p>

		<h4> 2. Setting up Buddypress </h4>

		<p> If you do not have pretty permalinks enabled, you will see a notice to enable them. (BuddyPress will not currently work without them.) </p>
			
			<ul>
				<li>	1. Visit 'Settings > BuddyPress > Components' and adjust the active components to match your community. (You can always toggle these later.) </li>
				<li>    2. Visit 'Settings > BuddyPress > Pages' and setup your directories and special pages. We create a few automatically, but suggest you customize these to fit the flow and verbiage of your site. </li>
				<li>    3. Visit 'Settings > BuddyPress > Settings' and take a moment to match BuddyPress's settings to your expectations. We pick the most common configuration by default, but every community is different. </li>
			</ul>	
		
		<p> For detailed documentation of buddypress - <a href="https://codex.buddypress.org/ ">https://codex.buddypress.org/ </a></p>
		
	</div>

</div>

<div class="row">
	<div class="col col1">
		<h3> Widget areas </h3>

		<p> The theme has 4 widget areas. 
		<ol>
			<li> One sidebar widget </li>
			<li> Three footer widgets </li>
		</ol>
		</p>

	</div>
</div>

<div class="row">

	 <div class="col col1"> 
		<h3>Theme Options </h3>
		<p> Theme comes with an options panel to customize its settings. </p>
	 </div>

	 <div class="col col1">
	 	<h4> 1. Intro section </h4>
	 	<p> This section is available only on the custom homepage template. You have the option to upload an intro image and enter a custom
	 	intro title and message. You can also setup button with custom hyperlink in the intro section. </p>
	 </div>

	 <div class="col col1">
	 	<h4> 2. Feature widgets </h4>
	 	<p>  On the homepage, just below the intro section you have a section that displays three feature widgets. You can configure the widget title, text, icon and link via the theme options.</p>
	 </div>

	 <div class="col col1">
	 	<h4> 3. Custom styling</h4>
	 	<p> Use this options to color customize your theme.</p>
	 </div>

	 <div class="col col1">
	 	<h4> 4. Banner settings </h4>
	 	<p> Use this options to customize the banner ads on the sidebar.</p>
	 </div>

</div>

<div class="row">
	<div class="col col1">
			<?php echo file_get_contents(dirname(__FILE__) . '/FT/license-html.php'); ?>
	</div>
</div>


</div>
</div>



<style media="screen" type="text/css">

	.container{	width: 960px;}
	.row { background: #fff;  margin-bottom: 20px; padding: 20px 0px;}
	.row:before, .row:after {  display: table;  content: " ";}
	.row:after {  clear: both;	}
	.row:before, .row:after {  display: table;  content: " ";}
	.row:after { clear: both; }
	.col{ padding:0px 20px 0px 20px;  position:relative; 	 }
	.col1{ width: 920px;}
	.col2{ width: 440px; float: left;}
	.col3{ width: 280px; float: left;}
	.col34{ width: 600px; float: left;}
	.col h2{ font-weight: 700; font-size: 30px;}
	.col h3{ font-weight: 300; font-size: 24px; margin:0px 0px 20px 0px; background: #333; color:#fff; padding: 10px; }
	.col h4{ font-weight: bold; font-size: 16px; margin:10px 0px;}
	.clear{clear: both;}
	.red{color: red;}
	dl{margin-bottom: 20px;}
	dl dt{font-weight: 800;}
	dl dd{margin:10px 0px 20px 0px}
	
</style>	

<?php }
