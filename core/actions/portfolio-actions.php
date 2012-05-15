<?php
/**
* Portfolio element actions used by response Pro.
*
* Author: Tyler Cunningham
* Copyright: © 2012
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package response Pro
* @since 1.0
*/

/**
* response Portfolio Section actions
*/
add_action( 'response_portfolio_element', 'response_portfolio_element_content' );

function response_portfolio_element_content() {	
	global $options, $post, $themeslug, $root, $wp_query;
	$tmp_query = $wp_query; 
	$image = get_post_meta($post->ID, 'portfolio_image' , true);
	
	if (is_front_page()) {
		$title_enable = $options->get($themeslug.'_front_portfolio_title_toggle');
		$title = $options->get($themeslug.'_front_portfolio_title');

		$img1source = $options->get($themeslug.'_front_portfolio_image_one');
		$img2source = $options->get($themeslug.'_front_portfolio_image_two');
		$img3source = $options->get($themeslug.'_front_portfolio_image_three');
		$img4source = $options->get($themeslug.'_front_portfolio_image_four');
		
		$img1 = $img1source['url'];
		$img2 = $img2source['url'];
		$img3 = $img3source['url'];
		$img4 = $img4source['url'];
	
		$caption1 = $options->get($themeslug.'_front_portfolio_image_one_caption');
		$caption2 = $options->get($themeslug.'_front_portfolio_image_two_caption');
		$caption3 = $options->get($themeslug.'_front_portfolio_image_three_caption');
		$caption4 = $options->get($themeslug.'_front_portfolio_image_four_caption');
	}
	elseif (is_page() && !is_front_page()) {
	
		$slide1 = get_post_meta($post->ID, 'page_slide_one_image' , true);
		$slide2 = get_post_meta($post->ID, 'page_slide_two_image' , true);
		$slide3 = get_post_meta($post->ID, 'page_slide_three_image' , true);
	
		$link1 = get_post_meta($post->ID, 'page_slide_one_url' , true);
		$link2 = get_post_meta($post->ID, 'page_slide_two_url' , true);
		$link3 = get_post_meta($post->ID, 'page_slide_three_url' , true);
	}
	else {
		$title_enable = $options->get($themeslug.'_blog_portfolio_title_toggle');
		$title = $options->get($themeslug.'_blog_portfolio_title');

		$img1source = $options->get($themeslug.'_blog_portfolio_image_one');
		$img2source = $options->get($themeslug.'_blog_portfolio_image_two');
		$img3source = $options->get($themeslug.'_blog_portfolio_image_three');
		$img4source = $options->get($themeslug.'_blog_portfolio_image_four');
		
		$img1 = $img1source['url'];
		$img2 = $img2source['url'];
		$img3 = $img3source['url'];
		$img4 = $img4source['url'];
	
		$caption1 = $options->get($themeslug.'_blog_portfolio_image_one_captiom');
		$caption2 = $options->get($themeslug.'_blog_portfolio_image_two_caption');
		$caption3 = $options->get($themeslug.'_blog_portfolio_image_three_caption');
		$caption4 = $options->get($themeslug.'_blog_portfolio_image_four_caption');
	}

	$title = ($title != '') ? $title : 'Portfolio';	
	$title_output = ($title_enable == 'on' OR $title_enable == '1') ? "<h1 class='portfolio_title'>$title</h1>" : '';
	?>

<div id="portfolio" class="container">
	<div class="row">
		
	<?php
	    	/* Post-specific variables */	
	    	$image = get_post_meta($post->ID, 'portfolio_image' , true);
	    	$title = get_the_title() ;	    	
	?>
	    			<div id='gallery' class='twelve columns'><?php echo $title_output; ?><ul>
					<li id='portfolio_wrap' class='three columns'>
	    				<a href='<?php echo $img1 ;?>' title='Image 1'><img src='<?php echo $img1 ;?>'  alt='Image 1'/>
	    					<div class='portfolio_caption'><?php echo $caption1 ;?></div>
	    				</a>
	    			</li>
	    		
	  	    		<li id='portfolio_wrap' class='three columns'>
	    				<a href='<?php echo $img2 ;?>' title='Image 2'><img src='<?php echo $img2 ;?>'  alt='Image 1'/>
	    					<div class='portfolio_caption'><?php echo $caption2 ;?></div>
	    				</a>
	    			</li>
	    		
					<li id='portfolio_wrap' class='three columns'>
	    				<a href='<?php echo $img3 ;?>' title='Image 1'><img src='<?php echo $img3 ;?>'  alt='Image 1'/>
	    					<div class='portfolio_caption'><?php echo $caption3 ;?></div>
	    				</a>
	    			</li>
	    			
	    			<li id='portfolio_wrap' class='three columns'>
	    				<a href='<?php echo $img4 ;?>' title='Image 1'><img src='<?php echo $img4 ;?>'  alt='Image 1'/>
	    					<div class='portfolio_caption'><?php echo $caption4 ;?></div>
	    				</a>
	    			</li>
	    			</ul></div>


	    	
<?php

/* Begin Portfolio javascript */ 
    
    $out .= <<<OUT
 <script type="text/javascript">
 	jQuery(document).ready(function ($) {
    $(function() {
        $('#gallery a').lightBox({
    		imageLoading:			'$root/images/portfolio/lightbox-ico-loading.gif',		
			imageBtnPrev:			'$root/images/portfolio/lightbox-btn-prev.gif',			
			imageBtnNext:			'$root/images/portfolio/lightbox-btn-next.gif',			
			imageBtnClose:			'$root/images/portfolio/lightbox-btn-close.gif',		
			imageBlank:				'$root/images/portfolio/lightbox-blank.gif',			
	 });
    });
    });
    </script>
OUT;

/* End Portfolio javascript */ 

echo $out;

/* END */ 
?>
	
	</div>
</div>

<?php
}
?>