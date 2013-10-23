<?php
/*
Plugin Name: Add Plain Text Email
Plugin URI: http://dannyvankooten.com/wordpress-plugins/mailchimp-for-wordpress/
Description: Adds a text/plain email to text/html emails to decrease the chance of emails being tagged as spam.
Version: 1.0
Author: Danny van Kooten
Author URI: http://dannyvanKooten.com
*/

defined( 'ABSPATH' ) OR exit;

class APTE {

	private $html_message = '';

	public function __construct()
	{
		add_action('wp_mail', array($this, 'check_for_html_content'));
	}

	public function check_for_html_content($args)
	{
		extract($args);

		// only run if text/html, check by checking if text contains tags
		$stripped_message = strip_tags($message);
		if(strlen($message) == strlen($stripped_message)) {
			return $args;
		}

		// store message to access it later
		$this->html_message = $message;

		// add action so function actually runs
		add_action('phpmailer_init', array($this, 'set_plaintext_body') );

		return $args;
	}

	public function set_plaintext_body($phpmailer)
	{
		// only run if AltBody is still empty
		if(!empty($phpmailer->AltBody) || empty($this->html_message)) { return; }

		$text_message = $this->strip_html_tags($this->html_message);
		$phpmailer->AltBody = $text_message;

		// reset
		$this->html_message = '';
		remove_action('phpmailer_init', array($this, 'set_plaintext_body') );
	}

	/**
	 * Remove HTML tags, including invisible text such as style and
	 * script code, and embedded objects.  Add line breaks around
	 * block-level tags to prevent word joining after tag removal.
	 */
	private function strip_html_tags( $text )
	{
	    $text = preg_replace(
	        array(
	          // Remove invisible content
	            '@<head[^>]*?>.*?</head>@siu',
	            '@<style[^>]*?>.*?</style>@siu',
	            '@<script[^>]*?.*?</script>@siu',
	            '@<object[^>]*?.*?</object>@siu',
	            '@<embed[^>]*?.*?</embed>@siu',
	            '@<applet[^>]*?.*?</applet>@siu',
	            '@<noframes[^>]*?.*?</noframes>@siu',
	            '@<noscript[^>]*?.*?</noscript>@siu',
	            '@<noembed[^>]*?.*?</noembed>@siu',
	         	 // Add line breaks before and after blocks
	            '@</?((address)|(blockquote)|(center)|(del))@iu',
	            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
	            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
	            '@</?((table)|(th)|(td)|(caption))@iu',
	            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
	            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
	            '@</?((frameset)|(frame)|(iframe))@iu',
	        ),
	        array(
	            ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
	            "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
	            "\n\$0", "\n\$0",
	        ),
	        $text );
	    return strip_tags( $text );
	}

}

new APTE;
