<?php
/*
Plugin Name: Page Announcements
Plugin URI: http://dev.computer-rebooter.com
Version: 1.1
Author: The Computer Rebooter Ltd.
Author URI: http://dev.computer-rebooter.com
Description: This plugin enables you to display announcements on your blog posts and pages. Requires PHP 5.0 or later.

Copyright 2012 The Computer Rebooter Ltd.

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// plugin class
if(!class_exists('GD_PageAnnouncements')) {
	class GD_PageAnnouncements {

		// admin sidebar menu option
		function sidebar_menu_item() {
			return add_action('admin_menu', array('GD_PageAnnouncements', 'menu_hook'));
		}

		// admin menu hook
		function menu_hook() {
			return add_options_page('Page Announcements Settings', 'Page Announcements', 8, __FILE__, array('GD_PageAnnouncements', 'options_page'));
		}
		
		// admin options page
		function options_page() {
			// form submitted
			if(isset($_POST['announcement_admin'])) {
				// save announcement 1 settings to variables
				if(!empty($_POST['gd_ann_1_msg'])) {
					$option_value_1_message = $_POST['gd_ann_1_msg'];
				} else {
					$option_value_1_message = NULL;
				}

				if(!empty($_POST['gd_ann_1_link_text'])) {
					$option_value_1_link_text = $_POST['gd_ann_1_link_text'];
				} else {
					$option_value_1_link_text = NULL;
				}

				if(!empty($_POST['gd_ann_1_link_url'])) {
					$option_value_1_link_url = $_POST['gd_ann_1_link_url'];
				} else {
					$option_value_1_link_url = NULL;
				}

				if(!empty($_POST['gd_ann_1_enabled']) AND ($_POST['gd_ann_1_enabled'] === 'gd_ann_1_enabled') AND (!empty($_POST['gd_ann_1_msg'])) AND (!empty($_POST['gd_ann_1_msg']))) {
					$option_value_1_enabled = ' checked="checked"';				
				} else {
					$option_value_1_enabled = NULL;
				}

				// save announcement 2 settings to variables
				if(!empty($_POST['gd_ann_2_msg'])) {
					$option_value_2_message = $_POST['gd_ann_2_msg'];
				} else {
					$option_value_2_message = NULL;
				}

				if(!empty($_POST['gd_ann_2_link_text'])) {
					$option_value_2_link_text = $_POST['gd_ann_2_link_text'];
				} else {
					$option_value_2_link_text = NULL;
				}

				if(!empty($_POST['gd_ann_2_link_url'])) {
					$option_value_2_link_url = $_POST['gd_ann_2_link_url'];
				} else {
					$option_value_2_link_url = NULL;
				}

				if(!empty($_POST['gd_ann_2_enabled']) AND ($_POST['gd_ann_2_enabled'] === 'gd_ann_2_enabled') AND (!empty($_POST['gd_ann_2_msg'])) AND (!empty($_POST['gd_ann_2_msg']))) {
					$option_value_2_enabled = ' checked="checked"';				
				} else {
					$option_value_2_enabled = NULL;
				}

				// save announcement 3 settings to variables
				if(!empty($_POST['gd_ann_3_msg'])) {
					$option_value_3_message = $_POST['gd_ann_3_msg'];
				} else {
					$option_value_3_message = NULL;
				}

				if(!empty($_POST['gd_ann_3_link_text'])) {
					$option_value_3_link_text = $_POST['gd_ann_3_link_text'];
				} else {
					$option_value_3_link_text = NULL;
				}

				if(!empty($_POST['gd_ann_3_link_url'])) {
					$option_value_3_link_url = $_POST['gd_ann_3_link_url'];
				} else {
					$option_value_3_link_url = NULL;
				}

				if(!empty($_POST['gd_ann_3_enabled']) AND ($_POST['gd_ann_3_enabled'] === 'gd_ann_3_enabled') AND (!empty($_POST['gd_ann_3_msg'])) AND (!empty($_POST['gd_ann_3_msg']))) {
					$option_value_3_enabled = ' checked="checked"';				
				} else {
					$option_value_3_enabled = NULL;
				}

				// save display settings to variable
				if(empty($_POST['gd_selection'])) {
					$option_value_display_output = 'display_single';
				} else {
					if($_POST['gd_selection'] === 'display_single') {
						$option_value_display_output = 'display_single';
						$option_value_display_output_single = ' checked="checked"';
						$option_value_display_output_all = NULL;
					} elseif($_POST['gd_selection'] === 'display_all') {
						$option_value_display_output = 'display_all';
						$option_value_display_output_single = NULL;
						$option_value_display_output_all = ' checked="checked"';
					} else {
						$option_value_display_output = 'display_single';
						$option_value_display_output_single = ' checked="checked"';
						$option_value_display_output_all = NULL;
					}
				}

				// save everything to database
				update_option('gd_ann_1_msg', $option_value_1_message);
				update_option('gd_ann_1_link_text', $option_value_1_link_text);
				update_option('gd_ann_1_link_url', $option_value_1_link_url);
				update_option('gd_ann_1_enabled', $option_value_1_enabled);
				update_option('gd_ann_2_msg', $option_value_2_message);
				update_option('gd_ann_2_link_text', $option_value_2_link_text);
				update_option('gd_ann_2_link_url', $option_value_2_link_url);
				update_option('gd_ann_2_enabled', $option_value_2_enabled);
				update_option('gd_ann_3_msg', $option_value_3_message);
				update_option('gd_ann_3_link_text', $option_value_3_link_text);
				update_option('gd_ann_3_link_url', $option_value_3_link_url);
				update_option('gd_ann_3_enabled', $option_value_3_enabled);
				update_option('gd_ann_selection', $option_value_display_output);

				// display confirmation and settings page
		?>
		<div class="updated"><p><strong>Settings updated.</strong></p></div>
		
		<div class="wrap">
			<h2>Page Announcements</h2>

			<h3>Usage</h3>
			<p>Simply use the shortcode <b>[page_announcements]</b> in any of your pages.  You can choose to either randomly display 1 announcement out of a possible 3, or display all 3 announcements.</p>
			<p>All announcements are wrapped inside &lt;div&gt; tags, giving you the flexibility to use advanced CSS to style your announcements!</p>
			<p>Each &lt;div&gt; tag is assigned a CSS class value of <b>"PageAnnouncement"</b> and given individual IDs (<b>"PageAnnouncement1"</b>, <b>"PageAnnouncement2"</b> and <b>"PageAnnouncement3"</b>).</p>
			<p>The separate DIVs are contained in a parent DIV called <b>"PageAnnouncementContainer"</b>.</p>

			<h3>Need some help?</h3>
			<p>Get support for this plugin by visiting the <a href="http://wordpress.org/extend/plugins/page-announcements/">plugin page on the WordPress forums</a>.</p>

			<h3>Settings</h3>

			<form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
				<?php wp_nonce_field('update-options'); ?>

				<h4>Announcement 1</h4>
				<label><input name="gd_ann_1_enabled" type="checkbox" value="gd_ann_1_enabled"<?php echo $option_value_1_enabled; ?> /> Enabled</label>

				<table class="form-table" style="border: 1px solid #F9F9F9" onmouseover="this.style.backgroundColor='#E0E0E0'; this.style.border='1px solid #D4D4D4'" onmouseout="this.style.backgroundColor='#F9F9F9'; this.style.border='1px solid #F9F9F9'">
					<tr valign="top">
						<th scope="row">Message</th>
						<td>
							<textarea class="large-text-code" onmouseover="this.style.border='1px solid #B8B8B8'" onmouseout="this.style.border='1px solid #DFDFDF'" name="gd_ann_1_msg" rows="5" cols="50"><?php echo $option_value_1_message; ?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Link Text</th>
						<td>
							<input class="regular-text" onmouseover="this.style.border='1px solid #B8B8B8'" onmouseout="this.style.border='1px solid #DFDFDF'" type="text" name="gd_ann_1_link_text" value="<?php echo $option_value_1_link_text; ?>" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Link URL</th>
						<td>
							<input class="regular-text" onmouseover="this.style.border='1px solid #B8B8B8'" onmouseout="this.style.border='1px solid #DFDFDF'" type="text" name="gd_ann_1_link_url" value="<?php echo $option_value_1_link_url; ?>" />
						</td>
					</tr>
				</table>

				<h4>Announcement 2</h4>
				<label><input name="gd_ann_2_enabled" type="checkbox" value="gd_ann_2_enabled"<?php echo $option_value_2_enabled; ?> /> Enabled</label>

				<table class="form-table" style="border: 1px solid #F9F9F9" onmouseover="this.style.backgroundColor='#E0E0E0'; this.style.border='1px solid #D4D4D4'" onmouseout="this.style.backgroundColor='#F9F9F9'; this.style.border='1px solid #F9F9F9'">
					<tr valign="top">
						<th scope="row">Message</th>
						<td>
							<textarea class="large-text-code" onmouseover="this.style.border='1px solid #B8B8B8'" onmouseout="this.style.border='1px solid #DFDFDF'" name="gd_ann_2_msg" rows="5" cols="50"><?php echo $option_value_2_message; ?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Link Text</th>
						<td>
							<input class="regular-text" onmouseover="this.style.border='1px solid #B8B8B8'" onmouseout="this.style.border='1px solid #DFDFDF'" type="text" name="gd_ann_2_link_text" value="<?php echo $option_value_2_link_text; ?>" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Link URL</th>
						<td>
							<input class="regular-text" onmouseover="this.style.border='1px solid #B8B8B8'" onmouseout="this.style.border='1px solid #DFDFDF'" type="text" name="gd_ann_2_link_url" value="<?php echo $option_value_2_link_url; ?>" />
						</td>
					</tr>
				</table>

				<h4>Announcement 3</h4>
				<label><input name="gd_ann_3_enabled" type="checkbox" value="gd_ann_3_enabled"<?php echo $option_value_3_enabled; ?> /> Enabled</label>

				<table class="form-table" style="border: 1px solid #F9F9F9" onmouseover="this.style.backgroundColor='#E0E0E0'; this.style.border='1px solid #D4D4D4'" onmouseout="this.style.backgroundColor='#F9F9F9'; this.style.border='1px solid #F9F9F9'">
					<tr valign="top">
						<th scope="row">Message</th>
						<td>
							<textarea class="large-text-code" onmouseover="this.style.border='1px solid #B8B8B8'" onmouseout="this.style.border='1px solid #DFDFDF'" name="gd_ann_3_msg" rows="5" cols="50"><?php echo $option_value_3_message; ?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Link Text</th>
						<td>
							<input class="regular-text" onmouseover="this.style.border='1px solid #B8B8B8'" onmouseout="this.style.border='1px solid #DFDFDF'" type="text" name="gd_ann_3_link_text" value="<?php echo $option_value_3_link_text; ?>" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Link URL</th>
						<td>
							<input class="regular-text" onmouseover="this.style.border='1px solid #B8B8B8'" onmouseout="this.style.border='1px solid #DFDFDF'" type="text" name="gd_ann_3_link_url" value="<?php echo $option_value_3_link_url; ?>" />
						</td>
					</tr>
				</table>

				<br />

				<h4>Announcement Output</h4>

				<table class="form-table">
					<tr valign="top">
						<th>
							<label><input name="gd_selection" type="radio" value="display_single" class="tog"<?php echo $option_value_display_output_single; ?> /> Display a single random announcement in one &lt;div&gt; tag</label>
						</th>
					</tr>
					<tr valign="top">
						<th>
							<label><input name="gd_selection" type="radio" value="display_all" class="tog"<?php echo $option_value_display_output_all; ?> /> Display all announcements in separate &lt;div&gt; tags</label>
						</th>
					</tr>
				</table>

				<input type="hidden" name="action" value="update" />
				<input type="hidden" name="page_options" value="gd_ann_1_msg,gd_ann_1_link_text,gd_ann_1_link_url,gd_ann_1_enabled,gd_ann_2_msg,gd_ann_2_link_text,gd_ann_2_link_url,gd_ann_2_enabled,gd_ann_3_msg,gd_ann_3_link_text,gd_ann_3_link_url,gd_ann_3_enabled,gd_ann_selection" />
				<p class="submit"><input type="submit" class="button-primary" name="announcement_admin" value="<?php _e('Save Changes') ?>" /></p>
			</form>
		</div>
<?php

			// form not submitted
			} else {
				// grab announcement values from database
				$options_page_announcement_1_msg = get_option('gd_ann_1_msg');
				$options_page_announcement_1_link_text = get_option('gd_ann_1_link_text');
				$options_page_announcement_1_link_url = get_option('gd_ann_1_link_url');
				$options_page_announcement_1_enabled = get_option('gd_ann_1_enabled');
				$options_page_announcement_2_msg = get_option('gd_ann_2_msg');
				$options_page_announcement_2_link_text = get_option('gd_ann_2_link_text');
				$options_page_announcement_2_link_url = get_option('gd_ann_2_link_url');
				$options_page_announcement_2_enabled = get_option('gd_ann_2_enabled');
				$options_page_announcement_3_msg = get_option('gd_ann_3_msg');
				$options_page_announcement_3_link_text = get_option('gd_ann_3_link_text');
				$options_page_announcement_3_link_url = get_option('gd_ann_3_link_url');
				$options_page_announcement_3_enabled = get_option('gd_ann_3_enabled');

				// grab display settings from database
				$options_page_output = get_option('gd_ann_selection');

				// check values for announcement 1
				switch($options_page_announcement_1_msg) {
					case FALSE:
						add_option('gd_ann_1_msg', 'Text for announcement 1 goes here.', '', 'no', '', 'no');
						$options_page_announcement_1_msg = get_option('gd_ann_1_msg');
						break;

					case TRUE:
						break;

					default:
						break;
				}

				switch($options_page_announcement_1_link_text) {
					case FALSE:
						add_option('gd_ann_1_link_text', 'Read more...', '', 'no');
						$options_page_announcement_1_link_text = get_option('gd_ann_1_link_text');
						break;

					case TRUE:
						break;

					default:
						break;
				}

				switch($options_page_announcement_1_link_url) {
					case FALSE:
						add_option('gd_ann_1_link_url', 'http://wordpress.org', '', 'no');
						$options_page_announcement_1_link_url = get_option('gd_ann_1_link_url');
						break;

					case TRUE:
						break;

					default:
						break;
				}

				switch($options_page_announcement_1_enabled) {
					case FALSE:
						add_option('gd_ann_1_enabled', ' checked="checked"', '', 'no');
						$options_page_announcement_1_enabled = get_option('gd_ann_1_enabled');
						break;

					case TRUE:
						break;

					default:
						break;
				}

				// check values for announcement 2
				switch($options_page_announcement_2_msg) {
					case FALSE:
						add_option('gd_ann_2_msg', 'Text for announcement 2 goes here.', '', 'no');
						$options_page_announcement_2_msg = get_option('gd_ann_2_msg');
						break;

					case TRUE:
						break;

					default:
						break;
				}

				switch($options_page_announcement_2_link_text) {
					case FALSE:
						add_option('gd_ann_2_link_text', 'Read more...', '', 'no');
						$options_page_announcement_2_link_text = get_option('gd_ann_2_link_text');
						break;

					case TRUE:
						break;

					default:
						break;
				}

				switch($options_page_announcement_2_link_url) {
					case FALSE:
						add_option('gd_ann_2_link_url', 'http://wordpress.org', '', 'no');
						$options_page_announcement_2_link_url = get_option('gd_ann_2_link_url');
						break;

					case TRUE:
						break;

					default:
						break;
				}

				switch($options_page_announcement_2_enabled) {
					case FALSE:
						add_option('gd_ann_2_enabled', ' checked="checked"', '', 'no');
						$options_page_announcement_2_enabled = get_option('gd_ann_2_enabled');
						break;
						
					case TRUE:
						break;

					default:
						break;
				}
				
				// check values for announcement 3
				switch($options_page_announcement_3_msg) {
					case FALSE:
						add_option('gd_ann_3_msg', 'Text for announcement 3 goes here.', '', 'no');
						$options_page_announcement_3_msg = get_option('gd_ann_3_msg');
						break;

					case TRUE:
						break;

					default:
						break;
				}

				switch($options_page_announcement_3_link_text) {
					case FALSE:
						add_option('gd_ann_3_link_text', 'Read more...', '', 'no');
						$options_page_announcement_3_link_text = get_option('gd_ann_3_link_text');
						break;

					case TRUE:
						break;

					default:
						break;
				}

				switch($options_page_announcement_3_link_url) {
					case FALSE:
						add_option('gd_ann_3_link_url', 'http://wordpress.org', '', 'no');
						$options_page_announcement_3_link_url = get_option('gd_ann_3_link_url');
						break;

					case TRUE:
						break;

					default:
						break;
				}

				switch($options_page_announcement_3_enabled) {
					case FALSE:
						add_option('gd_ann_3_enabled', ' checked="checked"', '', 'no');
						$options_page_announcement_3_enabled = get_option('gd_ann_3_enabled');
						break;

					case TRUE:
						break;
				}

				// check display settings
				switch($options_page_output) {
					case FALSE:
						add_option('gd_ann_selection', 'display_single', '', 'no');
						$valDisplaySingle = ' checked="checked"';
						$valDisplayAll = NULL;
						break;

					case TRUE:
						if($options_page_output === 'display_single') {
							$valDisplaySingle = ' checked="checked"';
							$valDisplayAll = NULL;
						} elseif($options_page_output === 'display_all') {
							$valDisplaySingle = NULL;
							$valDisplayAll = ' checked="checked"';
						}

						break;

					default:
						break;
				}

		?>
		<div class="wrap">
			<h2>Page Announcements</h2>

			<h3>Usage</h3>
			<p>Simply use the shortcode <b>[page_announcements]</b> in any of your pages.  You can choose to either randomly display 1 announcement out of a possible 3, or display all 3 announcements.</p>
			<p>All announcements are wrapped inside &lt;div&gt; tags, giving you the flexibility to use advanced CSS to style your announcements!</p>
			<p>Each &lt;div&gt; tag is assigned a CSS class value of <b>"PageAnnouncement"</b> and given individual IDs (<b>"PageAnnouncement1"</b>, <b>"PageAnnouncement2"</b> and <b>"PageAnnouncement3"</b>).</p>
			<p>The separate DIVs are contained in a parent DIV called <b>"PageAnnouncementContainer"</b>.</p>

			<h3>Need some help?</h3>
			<p>Get support for this plugin by visiting the <a href="http://wordpress.org/extend/plugins/page-announcements/">plugin page on the WordPress forums</a>.</p>

			<h3>Settings</h3>

			<form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
				<?php wp_nonce_field('update-options'); ?>

				<h4>Announcement 1</h4>
				<label><input name="gd_ann_1_enabled" type="checkbox" value="gd_ann_1_enabled"<?php echo $options_page_announcement_1_enabled; ?> /> Enabled</label>

				<table class="form-table" style="border: 1px solid #F9F9F9" onmouseover="this.style.backgroundColor='#E0E0E0'; this.style.border='1px solid #D4D4D4'" onmouseout="this.style.backgroundColor='#F9F9F9'; this.style.border='1px solid #F9F9F9'">
					<tr valign="top">
						<th scope="row">Message</th>
						<td>
							<textarea class="large-text-code" onmouseover="this.style.border='1px solid #B8B8B8'" onmouseout="this.style.border='1px solid #DFDFDF'" name="gd_ann_1_msg" rows="5" cols="50"><?php echo $options_page_announcement_1_msg; ?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Link Text</th>
						<td>
							<input class="regular-text" onmouseover="this.style.border='1px solid #B8B8B8'" onmouseout="this.style.border='1px solid #DFDFDF'" type="text" name="gd_ann_1_link_text" value="<?php echo $options_page_announcement_1_link_text; ?>" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Link URL</th>
						<td>
							<input class="regular-text" onmouseover="this.style.border='1px solid #B8B8B8'" onmouseout="this.style.border='1px solid #DFDFDF'" type="text" name="gd_ann_1_link_url" value="<?php echo $options_page_announcement_1_link_url; ?>" />
						</td>
					</tr>
				</table>

				<h4>Announcement 2</h4>
				<label><input name="gd_ann_2_enabled" type="checkbox" value="gd_ann_2_enabled"<?php echo $options_page_announcement_2_enabled; ?> /> Enabled</label>

				<table class="form-table" style="border: 1px solid #F9F9F9" onmouseover="this.style.backgroundColor='#E0E0E0'; this.style.border='1px solid #D4D4D4'" onmouseout="this.style.backgroundColor='#F9F9F9'; this.style.border='1px solid #F9F9F9'">
					<tr valign="top">
						<th scope="row">Message</th>
						<td>
							<textarea class="large-text-code" onmouseover="this.style.border='1px solid #B8B8B8'" onmouseout="this.style.border='1px solid #DFDFDF'" name="gd_ann_2_msg" rows="5" cols="50"><?php echo $options_page_announcement_2_msg; ?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Link Text</th>
						<td>
							<input class="regular-text" onmouseover="this.style.border='1px solid #B8B8B8'" onmouseout="this.style.border='1px solid #DFDFDF'" type="text" name="gd_ann_2_link_text" value="<?php echo $options_page_announcement_2_link_text; ?>" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Link URL</th>
						<td>
							<input class="regular-text" onmouseover="this.style.border='1px solid #B8B8B8'" onmouseout="this.style.border='1px solid #DFDFDF'" type="text" name="gd_ann_2_link_url" value="<?php echo $options_page_announcement_2_link_url; ?>" />
						</td>
					</tr>
				</table>

				<h4>Announcement 3</h4>
				<label><input name="gd_ann_3_enabled" type="checkbox" value="gd_ann_3_enabled"<?php echo $options_page_announcement_3_enabled; ?> /> Enabled</label>

				<table class="form-table" style="border: 1px solid #F9F9F9" onmouseover="this.style.backgroundColor='#E0E0E0'; this.style.border='1px solid #D4D4D4'" onmouseout="this.style.backgroundColor='#F9F9F9'; this.style.border='1px solid #F9F9F9'">
					<tr valign="top">
						<th scope="row">Message</th>
						<td>
							<textarea class="large-text-code" onmouseover="this.style.border='1px solid #B8B8B8'" onmouseout="this.style.border='1px solid #DFDFDF'" name="gd_ann_3_msg" rows="5" cols="50"><?php echo $options_page_announcement_3_msg; ?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Link Text</th>
						<td>
							<input class="regular-text" onmouseover="this.style.border='1px solid #B8B8B8'" onmouseout="this.style.border='1px solid #DFDFDF'" type="text" name="gd_ann_3_link_text" value="<?php echo $options_page_announcement_3_link_text; ?>" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Link URL</th>
						<td>
							<input class="regular-text" onmouseover="this.style.border='1px solid #B8B8B8'" onmouseout="this.style.border='1px solid #DFDFDF'" type="text" name="gd_ann_3_link_url" value="<?php echo $options_page_announcement_3_link_url; ?>" />
						</td>
					</tr>
				</table>

				<br />

				<h4>Announcement Output</h4>

				<table class="form-table">
					<tr valign="top">
						<th>
							<label><input name="gd_selection" type="radio" value="display_single" class="tog"<?php echo $valDisplaySingle; ?> /> Display a single random announcement in one &lt;div&gt; tag</label>
						</th>
					</tr>
					<tr valign="top">
						<th>
							<label><input name="gd_selection" type="radio" value="display_all" class="tog"<?php echo $valDisplayAll; ?> /> Display all announcements in separate &lt;div&gt; tags</label>
						</th>
					</tr>
				</table>

				<input type="hidden" name="action" value="update" />
				<input type="hidden" name="page_options" value="gd_ann_1_msg,gd_ann_1_link_text,gd_ann_1_link_url,gd_ann_1_enabled,gd_ann_2_msg,gd_ann_2_link_text,gd_ann_2_link_url,gd_ann_2_enabled,gd_ann_3_msg,gd_ann_3_link_text,gd_ann_3_link_url,gd_ann_3_enabled,gd_ann_selection" />
				<p class="submit"><input type="submit" class="button-primary" name="announcement_admin" value="<?php _e('Save Changes') ?>" /></p>
			</form>
		</div>
		<?php
			}
		}
		
		// shortcode functions
		function short_code() {
			// get output type
			$short_code_output_choice = get_option('gd_ann_selection');

			switch($short_code_output_choice) {
				// single random <div> output
				case 'display_single':
					$short_code_1_enabled = get_option('gd_ann_1_enabled');
					$short_code_2_enabled = get_option('gd_ann_2_enabled');
					$short_code_3_enabled = get_option('gd_ann_3_enabled');
					
					if(($short_code_1_enabled != ' checked="checked"') AND ($short_code_2_enabled != ' checked="checked"') AND ($short_code_3_enabled != ' checked="checked"')) {
						// no announcements are enabled, don't output anything
						$short_code_output_display = NULL;
					} else {
						// select a random single item from selection of enabled announcements
						$short_code_array[1] = FALSE;
						$short_code_array[2] = FALSE;
						$short_code_array[3] = FALSE;

						if($short_code_1_enabled === ' checked="checked"') $short_code_array[1] = TRUE;
						if($short_code_2_enabled === ' checked="checked"') $short_code_array[2] = TRUE;
						if($short_code_3_enabled === ' checked="checked"') $short_code_array[3] = TRUE;

						foreach($short_code_array AS $short_code_array_key => $short_code_array_value) {
							if($short_code_array_value === FALSE) {
								unset($short_code_array[$short_code_array_key]);
							}
						}

						$short_code_random_announcement = array_rand($short_code_array, 1);
						$short_code_announcement_id = $short_code_random_announcement;
						$short_code_announcement_msg = get_option('gd_ann_' . $short_code_announcement_id . '_msg');
						$short_code_announcement_link_text = get_option('gd_ann_' . $short_code_announcement_id . '_link_text');
						$short_code_announcement_link_url = get_option('gd_ann_' . $short_code_announcement_id . '_link_url');
						
						// determine whether link text and url are present
						if(empty($short_code_announcement_link_text) AND empty($short_code_announcement_link_url)) {
							// both fields are empty, don't output a link
							$short_code_full_link = NULL;
						} elseif(!empty($short_code_announcement_link_text) AND !empty($short_code_announcement_link_url)) {
							// both fields contain values, output a link
							$short_code_full_link = '<a title="' . $short_code_announcement_link_text . '" href="' . $short_code_announcement_link_url . '">' . $short_code_announcement_link_text . '</a>';
						} else {
							// one of the fields is empty, don't output a link
							$short_code_full_link = NULL;
						}

						// generate output
						$short_code_output_display = '<div id="PageAnnouncementContainer">';
						$short_code_output_display .= "\n" . '	<div class="PageAnnouncement" id="PageAnnouncement' . $short_code_announcement_id . '">' . "\n";
						$short_code_output_display .= '		<p>' . $short_code_announcement_msg . '</p>' . "\n";
						$short_code_output_display .= '		<p>' . $short_code_full_link . '</p>' . "\n";
						$short_code_output_display .= '	</div>' . "\n";
						$short_code_output_display .= '</div>' . "\n";

					}

					break;

				// output all <div> sections
				case 'display_all':
					$short_code_1_enabled = get_option('gd_ann_1_enabled');
					$short_code_2_enabled = get_option('gd_ann_2_enabled');
					$short_code_3_enabled = get_option('gd_ann_3_enabled');

					if(($short_code_1_enabled != ' checked="checked"') AND ($short_code_2_enabled != ' checked="checked"') AND ($short_code_3_enabled != ' checked="checked"')) {
						// no announcements are enabled, don't output anything
						$short_code_output_display = NULL;
					} else {
						// announcement 1
						if($short_code_1_enabled != ' checked="checked"') {
							// disabled, don't show this announcement
							$short_code_enabled[1] = FALSE;
						} else {
							// enabled, determine whether link text and url are present
							$short_code_enabled[1] = TRUE;
							$short_code_enabled_link_text[1] = get_option('gd_ann_1_link_text');
							$short_code_enabled_link_url[1] = get_option('gd_ann_1_link_url');
							
							if(empty($short_code_enabled_link_text[1]) AND empty($short_code_enabled_link_url[1])) {
								// both fields are empty, don't output a link
								$short_code_full_link[1] = NULL;
							} elseif(!empty($short_code_enabled_link_text[1]) AND !empty($short_code_enabled_link_url[1])) {
								// both fields contain values, output a link
								$short_code_full_link[1] = '<a title="' . $short_code_enabled_link_text[1] . '" href="' . $short_code_enabled_link_url[1] . '">' . $short_code_enabled_link_text[1] . '</a>';
							} else {
								// one of the fields is empty, don't output a link
								$short_code_full_link[1] = NULL;								
							}
							
							// get announcement message from database
							$short_code_enabled_msg[1] = get_option('gd_ann_1_msg');
							
							// generate output for announcement 1
							$short_code_output_announcement[1] = "\n" . '	<div class="PageAnnouncement" id="PageAnnouncement1">' . "\n";
							$short_code_output_announcement[1] .= '		<p>' . $short_code_enabled_msg[1] . '</p>' . "\n";
							$short_code_output_announcement[1] .= '		<p>' . $short_code_full_link[1] . '</p>' . "\n";
							$short_code_output_announcement[1] .= '	</div>' . "\n";
						}

						// announcement 2
						if($short_code_2_enabled != ' checked="checked"') {
							// disabled, don't show this announcement
							$short_code_enabled[2] = FALSE;
						} else {
							// enabled, determine whether link text and url are present
							$short_code_enabled[2] = TRUE;
							$short_code_enabled_link_text[2] = get_option('gd_ann_2_link_text');
							$short_code_enabled_link_url[2] = get_option('gd_ann_2_link_url');
							
							if(empty($short_code_enabled_link_text[2]) AND empty($short_code_enabled_link_url[2])) {
								// both fields are empty, don't output a link
								$short_code_full_link[2] = NULL;
							} elseif(!empty($short_code_enabled_link_text[2]) AND !empty($short_code_enabled_link_url[2])) {
								// both fields contain values, output a link
								$short_code_full_link[2] = '<a title="' . $short_code_enabled_link_text[2] . '" href="' . $short_code_enabled_link_url[2] . '">' . $short_code_enabled_link_text[2] . '</a>';
							} else {
								// one of the fields is empty, don't output a link
								$short_code_full_link[2] = NULL;								
							}
							
							// get announcement message from database
							$short_code_enabled_msg[2] = get_option('gd_ann_2_msg');
							
							// generate output for announcement 2
							$short_code_output_announcement[2] = "\n" . '	<div class="PageAnnouncement" id="PageAnnouncement2">' . "\n";
							$short_code_output_announcement[2] .= '		<p>' . $short_code_enabled_msg[2] . '</p>' . "\n";
							$short_code_output_announcement[2] .= '		<p>' . $short_code_full_link[2] . '</p>' . "\n";
							$short_code_output_announcement[2] .= '	</div>' . "\n";
						}
						
						// announcement 3
						if($short_code_3_enabled != ' checked="checked"') {
							// disabled, don't show this announcement
							$short_code_enabled[3] = FALSE;
						} else {
							// enabled, determine whether link text and url are present
							$short_code_enabled[3] = TRUE;
							$short_code_enabled_link_text[3] = get_option('gd_ann_3_link_text');
							$short_code_enabled_link_url[3] = get_option('gd_ann_3_link_url');
							
							if(empty($short_code_enabled_link_text[3]) AND empty($short_code_enabled_link_url[3])) {
								// both fields are empty, don't output a link
								$short_code_full_link[3] = NULL;
							} elseif(!empty($short_code_enabled_link_text[3]) AND !empty($short_code_enabled_link_url[3])) {
								// both fields contain values, output a link
								$short_code_full_link[3] = '<a title="' . $short_code_enabled_link_text[3] . '" href="' . $short_code_enabled_link_url[3] . '">' . $short_code_enabled_link_text[3] . '</a>';
							} else {
								// one of the fields is empty, don't output a link
								$short_code_full_link[3] = NULL;								
							}
							
							// get announcement message from database
							$short_code_enabled_msg[3] = get_option('gd_ann_3_msg');
							
							// generate output for announcement 3
							$short_code_output_announcement[3] = "\n" . '	<div class="PageAnnouncement" id="PageAnnouncement3">' . "\n";
							$short_code_output_announcement[3] .= '		<p>' . $short_code_enabled_msg[3] . '</p>' . "\n";
							$short_code_output_announcement[3] .= '		<p>' . $short_code_full_link[3] . '</p>' . "\n";
							$short_code_output_announcement[3] .= '	</div>' . "\n";
						}

						// output enabled announcements
						$short_code_output_display = "\n" . '<div id="PageAnnouncementContainer">';
						
						foreach($short_code_enabled AS $short_code_enabled_key => $short_code_enabled_value) {
							if($short_code_enabled_value === FALSE) {
								unset($short_code_enabled[$short_code_enabled_key]);
							}
						}
						
						foreach($short_code_enabled AS $short_code_enabled_key => $short_code_enabled_value) {
							$short_code_output_display .= $short_code_output_announcement[$short_code_enabled_key];
						}

						$short_code_output_display .= '</div>';
					}

					break;

				default:
					break;
			}

			return $short_code_output_display;
		}

		// create the [page_announcements] shortcode
		function create_shortcode() {
			return add_shortcode('page_announcements', array('GD_PageAnnouncements', 'short_code'));
		}
		
		// load jQuery and Cycle plugin
		function load_jquery(){
			if (!is_admin()) {
				// jQuery core
				wp_enqueue_script('jquery');
				
				// Cycle plugin
				wp_deregister_script('cycle');
				wp_register_script('cycle', plugins_url('/jquery.cycle.all.js', __FILE__));
				wp_enqueue_script('cycle');
				
				// loader.js
				wp_deregister_script('tcr_pa_script_loader');
				wp_register_script('tcr_pa_script_loader', plugins_url('/loader.js', __FILE__));
				wp_enqueue_script('tcr_pa_script_loader');				
			}
		}
		
		// add "Settings" link
		function plugin_add_settings_link($links) {
			$settings_link = '<a href="options-general.php?page=' . plugin_basename(__FILE__) . '">Settings</a>';
		  	array_push( $links, $settings_link );
		  	return $links;
		}

		// function initialisations
		function start_me_up() {		
			// append short code functionality
			self::create_shortcode();

			// load plugin
			self::sidebar_menu_item();
			
			// add "Settings" link
			$plugin = plugin_basename(__FILE__);
			add_filter("plugin_action_links_$plugin", array($this, 'plugin_add_settings_link'), 10, 4);
			
			// enqueue jQuery
			add_action('init', array($this, 'load_jquery'));
		}

		// plugin class constructor
		function GD_PageAnnouncements() {
			return self::start_me_up();
		}

	}
}

// initialise class
if(class_exists('GD_PageAnnouncements')) $GD_PageAnnouncements_class = new GD_PageAnnouncements;

?>