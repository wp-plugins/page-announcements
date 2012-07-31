=== Page Announcements ===
Contributors: tcrDev
Donate link: http://dev.computer-rebooter.com
Tags: page announcements, news tickers, announcements, announcement, announcement system, page message, page messages, page news, news slides, news snippets, announcement messages
Requires at least: 3.4
Tested up to: 3.4.1
Stable tag: 1.1

This plugin enables you to display announcements on your blog posts and pages.

== Description ==

A simple plugin for your WordPress blog that enables you to display announcements on your blog posts and pages.

All you have to do is install and activate the plugin, and place the shortcode `[page_annoucements]` on any post or page 
within your blog.

Each announcement is placed in a DIV container with a CSS class name of `PageAnnouncement` and has individual IDs 
(`PageAnnouncement1`, `PageAnnouncement2` and `PageAnnouncement3`). The separate DIVs are contained in a parent 
DIV (`PageAnnouncementContainer`).

You can either edit your theme's CSS file or you can place CSS code in your theme's header file. The flexibility of 
this means that you can incorporate any type of effects using CSS.

The announcement messages are all managed from within the WordPress admin section.

== Installation ==

1. Upload the `page-announcements` directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Go to the `Page Announcements` Admin section (under the Settings menu) and enter your announcement messages
1. Use the shortcode `[page_announcements]` in any of your posts or pages

== ChangeLog ==

= Version 1.1 =

* Maintenance release
* Now uses jQuery API distributed with WordPress
* Now uses the Cycle jQuery plugin from malsup.com for slide transitions

= Version 1.0 =

* First release.

== Frequently Asked Questions ==

= Where Can I Use The Page Announcements? =

You can use it in any post or page.  Simply insert the shortcode `[page_announcements]`.

= How Can I Change The Styling Of The Announcements? =

Each announcement is placed in a DIV container with a CSS class name of `PageAnnouncement`. You can either edit your theme's 
CSS file or you can place CSS code in your theme's header file.

The slide transitions are defined in a file called `loader.js` which is located in the plugin directory.

= Can I Use This In My Header/Footer/Sidebar? =

This plugin can only be used in a post or page.

== Screenshots ==

1. The Page Announcements admin section
2. The Page Announcements admin section