<?php
/*
Plugin Name: WP-Authorinfo
Plugin URI: http://www.seyhunakyurek.com/
Description: Create author information box with social media bookmark features
Author: S.AKYUREK
Version: 0.1
Author URI: http://www.seyhunakyurek.com/
*/

/** register stylesheet */
function add_stylesheet() {
        $url = WP_PLUGIN_URL . '/wp-authorinfo/styles.css';
        $file = WP_PLUGIN_DIR . '/wp-authorinfo/styles.css';
        if (file_exists($file)) {
            wp_register_style('stylesheet', $url);
            wp_enqueue_style('stylesheet');
        }
}

/**
 * MyBio Class
 */

class MyAuthorinfoWidget extends WP_Widget {

/** constructor */
function MyAuthorinfoWidget() {
	$widget = array('classname' => 'MyAuthorinfoWidget', 'description' => __( "Create author information box with popular bookmark list") );
	$control = array('width' => 400, 'height' => 300);   
	parent::WP_Widget('MyAuthorinfoWidget', __('My Authorinfo'), $widget, $control);	
}

/** @see WP_Widget::widget */
function widget($args, $instance) {		
		extract($args); 	
		$name = isset( $instance['name'] ) ? $instance['name'] : false;
		$email = isset( $instance['email'] ) ? $instance['email'] : false;
		$bio = isset( $instance['bio'] ) ? $instance['bio'] : false;
		$gravatar = isset( $instance['gravatar'] ) ? $instance['gravatar'] : false;
		$size = isset( $instance['size'] ) ? $instance['size'] : false;
		$delicious = isset( $instance['delicious'] ) ? $instance['delicious'] : false;
		$facebook = isset( $instance['facebook'] ) ? $instance['facebook'] : false;
		$friendfeed = isset( $instance['friendfeed'] ) ? $instance['friendfeed'] : false;
		$twitter = isset( $instance['twitter'] ) ? $instance['twitter'] : false;
		$linkedin = isset( $instance['linkedin'] ) ? $instance['linkedin'] : false;
		$xing = isset( $instance['xing'] ) ? $instance['xing'] : false;
		$youtube = isset( $instance['youtube'] ) ? $instance['youtube'] : false;
		$myspace = isset( $instance['myspace'] ) ? $instance['myspace'] : false;
	    $technorati = isset( $instance['technorati'] ) ? $instance['technorati'] : false;
   	    $stumbleupon = isset( $instance['stumbleupon'] ) ? $instance['stumbleupon'] : false;
		$feedburner = isset( $instance['feedburner'] ) ? $instance['feedburner'] : false;
		?>
	    <?php echo $before_widget; ?>
          <?php echo $before_title
              . $instance['title']
              . $after_title; ?>   
           <?php
              echo '<div id="myauthorinfo">';
              if ($name) echo '<h2 id="name"> '. $name . ' </h2>';	
              if ($size) echo '<img id="img" src="http://www.gravatar.com/avatar.php?gravatar_id='.md5($email).'?s='.$size.'</img>';
              if ($bio) echo '<p id="bio"> ' . $bio . ' </p>';
			  echo '<h2 id="find">Find me at</h2>';
              if ($delicious) echo '<p><a target="_blank" href="http://www.delicious.com/'. $delicious .'">
              <img src="'.get_bloginfo('url').'/wp-content/plugins/wp-authorinfo/images/delicious.png" width="16" height="16"></a>';
              if ($facebook) echo '<a target="_blank" href="http://www.facebook.com/'. $facebook .'">
              <img src="'.get_bloginfo('url').'/wp-content/plugins/wp-authorinfo/images/facebook.png" width="16" height="16"></a>';
              if ($friendfeed) echo '<a target="_blank" href="http://www.friendfeed.com/'. $friendfeed .'">
              <img src="'.get_bloginfo('url').'/wp-content/plugins/wp-authorinfo/images/friendfeed.png" width="16" height="16"></a>';
              if ($twitter) echo '<a target="_blank" href="http://www.twitter.com/'. $twitter .'">
              <img src="'.get_bloginfo('url').'/wp-content/plugins/wp-authorinfo/images/twitter.png" width="16" height="16"></a>';
			  if ($linkedin) echo '<a target="_blank" href="http://www.linkedin.com/in/'. $linkedin .'">
              <img src="'.get_bloginfo('url').'/wp-content/plugins/wp-authorinfo/images/linkedin.png" width="16" height="16"></a>';
			  if ($xing) echo '<a target="_blank" href="http://www.xing.com/profile/'. $xing .'">
              <img src="'.get_bloginfo('url').'/wp-content/plugins/wp-authorinfo/images/xing.png" width="16" height="16"></a>';
			  if ($youtube) echo '<a target="_blank" href="http://www.youtube.com/user/'. $youtube .'">
              <img src="'.get_bloginfo('url').'/wp-content/plugins/wp-authorinfo/images/youtube.png" width="16" height="16"></a>';
			  if ($myspace) echo '<a target="_blank" href="http://www.myspace.com/user/'. $myspace .'">
              <img src="'.get_bloginfo('url').'/wp-content/plugins/wp-authorinfo/images/myspace.png" width="16" height="16"></a>';
			  if ($technorati) echo '<a target="_blank" href="http://technorati.com/people/technorati/'. $technorati .'">
              <img src="'.get_bloginfo('url').'/wp-content/plugins/wp-authorinfo/images/technorati.png" width="16" height="16"></a>';
			  if ($stumbleupon) echo '<a target="_blank" href="http://'. $stumbleupon .'.stumbleupon.com">
              <img src="'.get_bloginfo('url').'/wp-content/plugins/wp-authorinfo/images/stumbleupon.png" width="16" height="16"></a>';
			  if ($feedburner) echo '<a target="_blank" href="http://feeds2.feedburner.com/'. $feedburner .'">
              <img src="'.get_bloginfo('url').'/wp-content/plugins/wp-authorinfo/images/feedburner.png" width="16" height="16"></a></p>';
              echo '</div>';
            ?>
      <?php echo $after_widget; ?>
	<?php
}

/** @see WP_Widget::update */
function update($new_instance, $old_instance) {				
	$instance = $old_instance;
    $instance['name'] = strip_tags( $new_instance['name'] );
    $instance['email'] = strip_tags( $new_instance['email'] );
	$instance['bio'] = strip_tags( $new_instance['bio'] );
    $instance['gravatar'] = strip_tags( $new_instance['gravatar'] );
    $instance['size'] = strip_tags( $new_instance['size'] );
	$instance['delicious'] = strip_tags( $new_instance['delicious'] );
	$instance['facebook'] = strip_tags( $new_instance['facebook'] );
	$instance['friendfeed'] = strip_tags( $new_instance['friendfeed'] );
	$instance['twitter'] = strip_tags( $new_instance['twitter'] );
	$instance['linkedin'] = strip_tags( $new_instance['linkedin'] );
	$instance['xing'] = strip_tags( $new_instance['xing'] );
	$instance['youtube'] = strip_tags( $new_instance['youtube'] );
	$instance['myspace'] = strip_tags( $new_instance['myspace'] );
	$instance['technorati'] = strip_tags( $new_instance['technorati'] );
	$instance['stumbleupon'] = strip_tags( $new_instance['stumbleupon'] );
	$instance['feedburner'] = strip_tags( $new_instance['feedburner'] );
    return $instance;
}

/** @see WP_Widget::form */
function form($instance) {	
	$defaults = array( 'title' => 'About', 'name' => 'Your name', 'email' => 'your@mail.com', 'show_email' => true );
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>	

    <p>
        <label for="<?php echo $this->get_field_id('name'); ?>">Your name:</label>
        <input id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name' ); ?>" 
        value="<?php echo $instance['name']; ?>" style="width:40%;" />
    </p>    
    <p>
        <label for="<?php echo $this->get_field_id('email'); ?>">Your email:</label>
        <input id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email' ); ?>" 
        value="<?php echo $instance['email']; ?>" style="width:40%;" />
    </p>    
     <p>
        <label for="<?php echo $this->get_field_id('email'); ?>">Your bio: (150 char)</label>
         <textarea name="<?php echo $this->get_field_name('bio'); ?>" id="<?php echo $this->get_field_id('bio'); ?>" 
         cols="45" rows="5"><?php echo $instance['bio']; ?></textarea>       
     </p>
     
     	<p>
        <input class="checkbox" type="checkbox" <?php checked($instance['gravatar'], true ); ?> id="<?php echo $this->get_field_id('gravatar'); ?>" name="<?php echo $this->get_field_name('gravatar'); ?>" />
        <label for="<?php echo $this->get_field_id('gravatar'); ?>">Gravatar Supported?</label>
		</p>
        
    
      <p>
        <label for="<?php echo $this->get_field_id('size'); ?>">Your Gravatar Size: </label> 
        <label for="<?php echo $this->get_field_id('size'); ?>">Selected: <?php echo $instance['size']; ?></label> 
        <select name="<?php echo $this->get_field_name('size'); ?>" id="<?php echo $this->get_field_id('size'); ?>" value="<?php echo $instance['size']; ?>">
        <option value="0">Select a size</option>
        <option value="32">32x32</option>
        <option value="50">50x50</option>
        <option value="80">80x80</option>
        <option value="100">100x100</option>
        </select>
     </p>     
      <p>
        <img src="<?php echo get_bloginfo('url')?>/wp-content/plugins/wp-authorinfo/images/delicious.png" width="16" height="16"> 
        <label for="<?php echo $this->get_field_id('delicious'); ?>">Delicious</label>
         <input id="<?php echo $this->get_field_id('delicious'); ?>" name="<?php echo $this->get_field_name('delicious'); ?>" 
        value="<?php echo $instance['delicious']; ?>" style="width:30%;" />
        (YourID) - <a href="https://secure.delicious.com/register" target="_blank">get one</a>
     </p>     
      <p>
        <img src="<?php echo get_bloginfo('url')?>/wp-content/plugins/wp-authorinfo/images/facebook.png" width="16" height="16"> 
        <label for="<?php echo $this->get_field_id('facebook'); ?>">Facebook</label>
        <input id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook' ); ?>" 
        value="<?php echo $instance['facebook']; ?>" style="width:30%;" />
        (YourID) - <a href="http://www.facebook.com/" target="_blank">get one</a>
     </p>     
     <p>
        <img src="<?php echo get_bloginfo('url')?>/wp-content/plugins/wp-authorinfo/images/friendfeed.png" width="16" height="16"> 
        <label for="<?php echo $this->get_field_id('friendfeed'); ?>">Friendfeed</label>
        <input id="<?php echo $this->get_field_id('friendfeed'); ?>" name="<?php echo $this->get_field_name('friendfeed' ); ?>" 
        value="<?php echo $instance['friendfeed']; ?>" style="width:30%;" />
        (YourID) - <a href="https://friendfeed.com/account/create?formonly=1" target="_blank">get one</a>
     </p>     
       <p>
        <img src="<?php echo get_bloginfo('url')?>/wp-content/plugins/wp-authorinfo/images/twitter.png" width="16" height="16"> 
        <label for="<?php echo $this->get_field_id('twitter'); ?>">Twitter</label>
        <input id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter' ); ?>" 
        value="<?php echo $instance['twitter']; ?>" style="width:30%;" />
        (YourID) - <a href="https://twitter.com/signup" target="_blank">get one</a>
      </p>     
      
        <p>
        <img src="<?php echo get_bloginfo('url')?>/wp-content/plugins/wp-authorinfo/images/linkedin.png" width="16" height="16"> 
        <label for="<?php echo $this->get_field_id('linkedin'); ?>">Linkedin</label>
        <input id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin' ); ?>" 
        value="<?php echo $instance['linkedin']; ?>" style="width:30%;" />
        (YourID) - <a href="https://linkedin.com" target="_blank">get one</a>
      </p>    
      
       <p>
        <img src="<?php echo get_bloginfo('url')?>/wp-content/plugins/wp-authorinfo/images/xing.png" width="16" height="16"> 
        <label for="<?php echo $this->get_field_id('xing'); ?>">Xing</label>
        <input id="<?php echo $this->get_field_id('xing'); ?>" name="<?php echo $this->get_field_name('xing' ); ?>" 
        value="<?php echo $instance['xing']; ?>" style="width:30%;" />
        (YourID) - <a href="https://xing.com" target="_blank">get one</a>
      </p>    
      
      
       <p>
        <img src="<?php echo get_bloginfo('url')?>/wp-content/plugins/wp-authorinfo/images/youtube.png" width="16" height="16"> 
        <label for="<?php echo $this->get_field_id('youtube'); ?>">Youtube</label>
        <input id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube' ); ?>" 
        value="<?php echo $instance['youtube']; ?>" style="width:30%;" />
        (YourID) - <a href="https://youtube.com" target="_blank">get one</a>
      </p>   
          
       <p>
        <img src="<?php echo get_bloginfo('url')?>/wp-content/plugins/wp-authorinfo/images/myspace.png" width="16" height="16"> 
        <label for="<?php echo $this->get_field_id('myspace'); ?>">Myspace</label>
        <input id="<?php echo $this->get_field_id('myspace'); ?>" name="<?php echo $this->get_field_name('myspace' ); ?>" 
        value="<?php echo $instance['myspace']; ?>" style="width:30%;" />
        (YourID) - <a href="https://myspace.com" target="_blank">get one</a>
      </p>  
      
        <p>
        <img src="<?php echo get_bloginfo('url')?>/wp-content/plugins/wp-authorinfo/images/technorati.png" width="16" height="16"> 
        <label for="<?php echo $this->get_field_id('technorati'); ?>">Technorati</label>
        <input id="<?php echo $this->get_field_id('technorati'); ?>" name="<?php echo $this->get_field_name('technorati'); ?>" 
        value="<?php echo $instance['technorati']; ?>" style="width:30%;" />
        (YourID) - <a href="http://technorati.com/" target="_blank">get one</a>
      </p>    
      
       <p>
        <img src="<?php echo get_bloginfo('url')?>/wp-content/plugins/wp-authorinfo/images/stumbleupon.png" width="16" height="16"> 
        <label for="<?php echo $this->get_field_id('stumbleupon'); ?>">Stumbleupon</label>
        <input id="<?php echo $this->get_field_id('stumbleupon'); ?>" name="<?php echo $this->get_field_name('stumbleupon'); ?>" 
        value="<?php echo $instance['stumbleupon']; ?>" style="width:30%;" />
        (YourID) - <a href="http://stumbleupon.com/" target="_blank">get one</a>
      </p>  
      
        <p>
        <img src="<?php echo get_bloginfo('url')?>/wp-content/plugins/wp-authorinfo/images/feedburner.png" width="16" height="16"> 
        <label for="<?php echo $this->get_field_id('feedburner'); ?>">Feedburner</label>
        <input id="<?php echo $this->get_field_id('feedburner'); ?>" name="<?php echo $this->get_field_name('feedburner' ); ?>" 
        value="<?php echo $instance['feedburner']; ?>" style="width:30%;" />
        (YourID) - <a href="http://www.feedburner.com" target="_blank">get one</a>
      </p>        
	<?php }
} 

// register widget
add_action('wp_print_styles', 'add_stylesheet');
add_action('widgets_init', create_function('', 'return register_widget("MyAuthorinfoWidget");'));
?>
