=== Espressionista ===
Contributors: Daniel Tara
Tags: brown, orange, red, white, light, one-column, two-columns,
right-sidebar, fixed-layout, fluid-layout, responsive-layout, custom-background,
custom-menu, editor-style, featured-images, full-width-template,
microformats, threaded-comments, translation-ready
Requires at least: 3.6
Tested up to: 3.9.1
Stable tag: 1.0.4

Description: A handcrafted theme for bloggers who love to write while enjoying a good coffee. With carefully chosen typography and a pleasant color scheme inspired by espresso based drinks.

== Description ==

A handcrafted theme for bloggers who love to write while enjoying a good coffee.
With carefully chosen typography and a pleasant color scheme inspired by espresso based drinks.


== Installation ==

Manual installation:

1. Upload the `espressionista` folder to the `/wp-content/themes/` directory

Installation using "Add New Theme"

1. From your Admin UI (Dashboard), use the menu to select Themes -> Add New
2. Search for 'espressionista'
3. Click the 'Install' button to open the theme's repository listing
4. Click the 'Install' button

Activiation and Use

1. Activate the Theme through the 'Themes' menu in WordPress
2. See Appearance -> Theme Options to change theme specific options

== License ==

Unless otherwise specified, all the theme files, scripts and images
are licensed under GNU General Public Licemse version 2, see file license.txt.
The exceptions to this license are as follows:
* The script jquery.colorbox-min.js is licensed under MIT
* The script html5.js is licensed under MIT
* The script fitvids.js is licensed under WTFPL
* The script ios-orientationchange-fix.js is dual licensed under GPL & MIT
* The script jquery.masonry.min.js is licensed under MIT
* The script mediaelement.js is licensed under MIT
* The script mediaelementplayer.js is licensed under MIT
* The image bg.jpg is in the public domain. Source: http://pixabay.com/


== Theme Notes ==

= Menu Items Overflow =

When the all items in the navigation menu can not be displayed in a single line
the overflowing items will be in a submenu labeled More >>

= Post Excerpts =

By default this theme does not create excerpts by trimming post content to the first 55 words.
Instead custom post excerpts are displayed above post thumbnails along the post content which is displayed below.
This applies to both archive pages and single posts.

= Post Thumbnail Functionality =

Post Thumbnails can be set by choosing "Set as Featured Image" when uploading an image.

= Audio & Video Post Formats =

Posts with the audio & video post format will display the attached media files
in a HTML5 <audio> and <video> tag with flash fallback.
If more than one media file is attached to the post,
then these will be used as fallback sources.
Videos post formats with an embedded video will extract the video and display it
on top of the post content.

= Other Post Formats =

Posts with the aside, status & quote post formats will displayed with no title;
the status post format will display the user's avatar, in a manner similar to Twitter;
the quote post format will only display the post's first <blockquote> tag.
Posts titles from posts with the link post format will link to the source of the first <a> tag in the post.

= Widgets Areas =

The Theme has a widget area in the sidebar and one on the 404 page.

== Frequently Asked Questions ==

= How do I add thumbnails to posts? =

When editing a post, open the upload tool, select the image you wish to set as thumbnail
and select "Use as Featured Image". Note that thumbnails appear only in blog post lists.
To display then in single posts you need to insert them manually.

= How do I make the post excerpt display the first 55 words of the post content? =

If for some reason you need excerpts to have WordPress' default behavior
add this line to you child theme's functions.php file:
add_filter( 'get_the_excerpt', 'wp_trim_excerpt' );

= It doesn't look good in Opera browser on smaller screens =

Opera browser doesn't (yet) support decimans in percentage dimensions,
hence support for responsive layouts is only limited.

= Some content is not properly aligned =

Because of the responsive nature of the layout it is not possible to make all types of content
fit in all possible dimensions. The layout has been optimized to format the content well on
most popular desktop and mobile resolutions. If your have a device that does not display them properly
please let us know and we will try to fix it.

== Support ==

You can use this support forum, for any support questions:
http://www.onedesigns.com/support/forum/theme-support/espressionista

== Additional Notes ==

The theme is released for free under the terms of the GNU General Public License version 2
and some parts under their respective licenses.
In general words, feel free and encouraged to use, modify and redistribute this theme however you like.
You may remove any copyright references (unless required by third party components) and crediting is not necessary.
The theme is offered free of charge. If someone asked money for it, someone just tricked you.

== Changelog ==

= 1.0.4 =

* Updated theme tags
* Updated Theme URI
* Updated Screenshot to 880x660

= 1.0.3 =

* Removed social sharing buttons as required by Theme Review Guidelines

= 1.0.2 =

* Added CSS3 vendor prefixes for all browsers
* Added @media option to custom css function
* Added selective options for social media sharing buttons
* Fixed caret custom color
* Fixed navigation menu not displaying properly on mobile devices when custom menu is present in sidebar
* Fixed navigation menu trimming on mobile devices
* Fixed navicon skipping line for long site titles
* Fixed submenu displaying custom background on mobile devices

= 1.0.1 =

* Fix custom menu in sidebar breaking layout
* Fixed Admin Bar overlapping fixed header
* Added horizontal padding in tables
* Fixed long words overflowing in post titles and content
* Fixed custom background color not displaying

= 1.0 =

* Initial Release