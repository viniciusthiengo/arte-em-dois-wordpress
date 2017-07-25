=== Basic ===
Contributors: wppuzzle, avovkdesign
Requires at least: WordPress 4.2
Tested up to: WordPress 4.7.3
Version: 1.3.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Donate link: https://www.liqpay.com/checkout/wppuzzle
Tags: two-columns, one-column, left-sidebar, right-sidebar, custom-background, custom-colors, custom-header, custom-menu, editor-style, featured-images,sticky-post, threaded-comments, translation-ready

== Description ==
Basic is simple responsive WordPress theme. It has custom color option, customized layout (left- or rightbar, full or centered content). Preset share buttons, structured data mark-up, clean, valid and SEO-friendly code. English, Russian, Ukrainian, French, German, Polish. Available 6 child themes with individual design

* Responsive layout (mobile first)
* Customized page layouts (leftbar, rightbar, full and centered content)
* Custom main color
* Custom header and background
* Social share links (custom or Yandex)
* The GPL v2.0 or later license. :) Use it to make something cool.

== Installation ==

1. In your admin panel, go to Appearance -> Themes and click the 'Add New' button.
2. Type in basic in the search form and press the 'Enter' key on your keyboard.
3. Click on the 'Activate' button to use your new theme right away.
4. Navigate to Appearance > Theme Options in your admin panel and customize to taste.


== Changelog ==

= 1.3.2 =
* fix: lang prefix
* update: translations

= 1.3.1 =
* fix: check for empty logo image
* check: WordPress 4.7.3 compatibility

= 1.3.0 =
* fix: a stray end tag h1

= 1.2.3 =
* add: options for customize shop and search pages layout
* add: option for hide/show share buttons on static pages
* add: WooCommerce support
* add: bbPress support (styles)
* add: Turkish language
* fix: removed site url in logo from home page
* fix: `comment_form` defaults args
* fix: `pre` tag overflow
* removed: filter menu item classes (`nav_menu_css_class`)
* fix: show sidebar on mobile option preview
* fix: customizer live preview working when options not saved yet
* fix: markup print by defaults
* add: new filter `basic_comment_form_defaults`
* add: new filter `basic_postmeta_list_defaults`

= 1.2.2 =
* fix: list styles
* remove: descriptions as title for category link in default Categories widget
* add: Polish language (thanks [Mamo, Tato pobawmy się!](http://mamotatopobawmysie.pl/))
* add: German language
* add: full [WPML](https://wpml.org/) compatible!
* add: new filters for pagination argumets:
 * `basic_posts_pagination_args`
 * `basic_archive_posts_pagination_args`
 * `basic_search_posts_pagination_args`

= 1.2.1 =
* hotfix: custom style echo without `wp_specialchars_decode`
* add: new actions:
 * `basic_main_content_inner_begin`
 * `basic_main_content_inner_end`

= 1.2.0 =
* add: option for show logo image and site title
* add: option for enable thumbnail on mobile
* add: new section Advertisement for banners/scripts before and after post content
* add: filter for main color css for <style> customizer tag:
 * `basic_customizer_css` - filter full css for <style> tag
 * `basic_customizer_main_color_css` - filter css for main color before append to total style tag
 * `basic_customizer_header_textcolor_css` - filter css for header_textcolor before append to total style tag
* add: new filters:
 * `basic_header_class`
 * `basic_header_sitetitle_class`
 * `basic_logo_class`
 * `basic_header_topnav_class`
 * `basic_footer_class`
 * `basic_footer_menu_class`
 * `basic_footer_copyrights_class`
 * `basic_footer_copytext_class`
 * `basic_footer_themeby_class`
* add: new actions:
 * `basic_before_blogname_in_logo`
 * `basic_after_blogname_in_logo`
 * `basic_after_footer`
 * `basic_before_close_post_article`
 * `basic_before_page_article`
 * `basic_after_page_article`
 * `basic_before_post_article`
 * `basic_after_post_article`
 * `basic_before_post_comments_area`
 * `basic_after_post_comments_area`
 * `basic_before_page_comments_area`
 * `basic_after_page_comments_area`
 * `basic_before_comment_list`
 * `basic_after_comment_list`
 * `basic_before_comment_form`
 * `basic_after_comment_form`
* change: Layout and Markup sections move to panel Post in Customizer
* change: HTML code for 'Read more' link relocated to /inc/html-blocks.php in function basic_the_more_link() and hooked to 'basic_after_post_excerpt'
* fix: set variables and `basic_update_style` JS function global in customize-preview.js
* fix: layout styles (break point to show sidebar -> 1024px)

= 1.1.6 =
* add: Ukrainian language
* add: French language (Canada, France, Belgium). Thank Abdelkrim Jebbour for translation!
* add: option to set post meta information and its display order
* add: custom logo
* fix: translate comment date
* fix: bug with displaying site description, social buttons and fixed header height
* add: filters for set up your custom social buttons:
 * `basic_yandex_social_list` - set comma separated list for yandex social list (default = 'vkontakte,facebook,odnoklassniki,gplus,twitter')
 * `basic_yandex_show_counter` - bool value true/false wtha enable or disable show social counters
* add: filters for set up your custom thumbnail settings:
 * filter `basic_singular_thumbnail_size` - customize feature image size
 * filter `basic_singular_thumbnail_attr` - customize feature image attributes (see second param for `the_post_thumbnail()` function)
* add: post meta filters:
 * `basic_post_meta_list` - your custom post meta list (accept 'date', 'author', 'category', 'comments', 'tags')
 * `basic_post_meta_list_html` - array with post meta slug as key and html code for echo as value
 * `basic_post_meta_html` - full html list for display post meta information
* add: function `basic_get_postmeta` hooked to `basic_after_post_title` and echo post meta information (published date, author, category, comments). Function can be overridden in child theme
* add: post meta information was removed from `content.php`, now it is displayed with action `basic_after_post_title`
* add: new actions:
 * `basic_before_sitelogo`
 * `basic_before_sitetitle`
 * `basic_before_post_title`
 * `basic_after_post_title`
 * `basic_before_post_thumbnail`
 * `basic_after_post_thumbnail`
 * `basic_before_more_link`
 * `basic_after_more_link`
 * `basic_before_page_content_box` - before div.entry-box on page.php
 * `basic_after_page_content_box` - after div.entry-box on page.php
 * `basic_before_page_content` - before in div.entry on page.php
 * `basic_after_page_content` - after div.entry on page.php

= 1.1.5 =
* fix: change custom pagination function with `the_posts_pagination`
* fix: schema markup enabled by default
* fix: layout custom setting
* remove: Share42 social buttons
* remove: deprecated tags
* add: new actions:
 * `basic_postexcerpt_before_title`
 * `basic_postexcerpt_after_title`
 * `basic_single_before_title`
 * `basic_single_after_title`
 * `basic_post_meta_before_first`
 * `basic_post_meta_after_last`

= 1.1.4 =
* add: backward compatible for old option name

= 1.1.3 =
* fix: renamed main theme option prefix (from `theme_option_*` to `basic_theme_option_*`)
* fix: some functions prefixed with `basic_`

= 1.1.2 =
* add: new option for customize header image repeatable and header height
* add: new option for add counters in footer
* add: new option for customize copyright text
* add: styles for gallery columns
* add: option for control site title position
* add: option for control site description show
* include the non-minified version for all minified scripts
* prefix some functions, script and styles with theme slug
* escape all home_url() functions with esc_url()
* escape HTML attributes like title="" and alt="" with esc_attr()
* backward title compatible function `basic_render_title()` removed
* remove constant with template directory path and URLS
* migrate all theme options to the Customizer

= 1.1.1 =

* Enable/disable sidebar show for mobile
* Fixed custom menu styles
* Fixed `comment_notes_after` problem in comments.php
* Footer menu depth changed to 1 level

= 1.1.0 =

* Added the following action for use in child themes or plugins:
 * `basic_before_header`
 * `basic_after_sitelogo`
 * `basic_before_topnav`
 * `basic_after_topnav`
 * `basic_after_header`
 * `basic_before_content`
 * `basic_after_content`
 * `basic_before_footer`
 * `basic_before_footer_menu`
 * `basic_before_footer_copyrights`
 * `basic_after_footer_copyrights`
* Added filter `basic_singular_content` (takes one argument, $content), to be able to change the text or add your code in child themes or plugins
* Added options for the html code before and after the entry
* Added displaying the description for the first page of the archive tags and author
* In Schema.org Article connected link to the full image (Google requires photo by 600 pixels)
* Fixed list bullets
* Fixed problem with incorrect display of menu styles
* Fixed a problem with options translation adjustments in child themes
* Fixed compatibility issues with PHP 5.5 or higher


= 1.0.4 =

* "Read more" button aligned on right side
* In main menu when displaying pages by default, also displayed link to home page
* Customizable color logo in header
* Fixed styles in header (block with logo on entire width now)
* Fixed bug with displaying menus in footer
* Fixed styles with absolute positioning in footer
* Added backward compatibility wp_title () for WordPress lower than 4.0

= 1.0.3 =

* Added styles to visual editor in admin
* Fixed style conflicts with galleries WordPress
* Small edits, code refactoring

= 1.0.2 =

* Fixed date format in micro markup
* Link to wp-puzzle.com removed to noindex, nofollow
* Made refinement in translation, added translation of new settings
* Fixed warning in pagination

= 1.0.1 =

* Fixed micro markup (from individual variants for yandex and google to one universal)
* Fixed comments output format, removed link on yourself in names of author’s article

= 1.0 =

* Release



== Copyright ==

Basic WordPress Theme, Copyright 2014-2015 WordPress.org
Basic theme files, scripts, icons and images is distributed under the terms of the GNU GPL

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.


Basic Theme bundles the following third-party resources:

Thumbnail image in theme screenshot
Author: Alexandra Vovk (http://avovkdesign.com)
License: GNU GPL, Version 2 (or later)

Script HTML5 Shiv v3.7.0, Copyright 2014 Alexander Farkas
License: MIT/GPL2
Source: https://github.com/aFarkas/html5shiv

