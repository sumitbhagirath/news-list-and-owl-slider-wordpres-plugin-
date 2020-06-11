=== Simple News and Slider  ===
Contributors: sumitbhagirath
Tags: sumit-bhagirath, wordpress news plugin, news website, main news page slider , wordpress vertical news plugin, Free slider news wordpress plugin, Free slider news widget wordpress plugin, WordPress set post or page as news, WordPress dynamic news, news, latest news, custom post type, cpt, widget, news shortcode, owl slider, scroller
Requires at least: 4.0
Tested up to: 5.4.1
Stable tag: trunk
Requires PHP: 7.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A quick, easy and simple way to add an News custom post type, vertical scrolling news list to Wordpress. Also work with Gutenberg shortcode block.

== Description ==

Simple News List and Slider for show news archives, news slider and thumbnails.

**Its work with Gutenberg shortcode block also**.

= Important Note For How to Install =

> Please make sure that Permalink link should not be "/news" Otherwise all your news will go to archive page. You can give it other name like "/ournews, /latestnews etc"**  

**As this pluign is created with custom post type, you can now add Gutenberg  editor support for the plugin for writing the news post. For that we have added apply_filters. For more details please check plugin FAQ section.**

<code>apply_filters( 'nwowls_news_registered_post_type_args', $news_args ); </code>

**Now you can Display news post with the help of short code :** 

<code> [news_slider ] </code>

**Display News with Grid:**

<code>[news_slider type="list"] </code>

**Display News with Slider:**

<code>[news_slider type="slider"] </code>

**Also you can Display the news post with Multiple categories wise** 

<code>Demo news : 
[news_slider category="category_id"]
Test news 
[news_slider category="category_id"]
</code>

**Setting for slider and news list**

**Comments for the news**


**Template code :**

 <code><?php echo do_shortcode('[news_slider]'); ?></code>

= Following are News Parameters: =

* **category :**  [news_slider category="category_id"] (Display News categories wise).
* **pagination_type:** [news_slider pagination_type="numeric"] (Select the pagination type for News ie "numeric" OR "next-prev" ).

The plugin adds a News tab to your admin menu, which allows you to enter news items just as you would regular posts.

If you are getting any kind of problum with news page means your are not able to see all news items then please remodify your permalinks Structure for example 
first select "Default" and save then again select "Custom Structure "  and save. 

= The Plugin Features (latest added) : =
* Display News with Grid <code>[news_slider]</code> or <code>[news_slider type="list"]</code> and Slider <code>[news_slider type="slider"]</code>
* Category wise News <code> Sports news [news_slider category="category_id"] </code> 


= Privacy & Policy =
* We have also opt-in e-mail selection , once you download the plugin , so that we can inform you and nurture you about products and its features.

== Installation ==

1. Upload the 'simple-news-list-and-slider' folder to the '/wp-content/plugins/' directory.
1. Activate the Simple News List and Slider  plugin through the 'Plugins' menu in WordPress.
1. Add and manage news items on your site by clicking on the  'News' tab that appears in your admin menu.
1. Create a page with the any name and paste this short code  <code> [news_slider] </code>.
 
== Frequently Asked Questions ==

= How to enable/disable Gutenberg editor support for News Posts? =

Just add this code in your theme function.php file to enable/disable Gutenberg editor support for  News Posts :

<code>
function prefix_gutenberg_editor_support($news_args){
 $news_args['show_in_rest'] = false; 
  return $news_args;	
}
add_filter( 'nwowls_news_registered_post_type_args', 'prefix_gutenberg_editor_support' );
</code>

= Do I need to update my permalinks after I activate this plugin? =

No, not usually. But if you are geting "/news" page OR 404 error on single news then please  update your permalinks to Custom Structure.   

= I am getting 404 page in news detail page? =

If you are getting this error, please go to Setting -->  Permalinks and under Permalinks Setting select "Plain" radio button and save. Now again go to "Post name" radio button and save again. This will fix your issue. 

= Are there shortcodes for news items? =

Yse  <code> [news_slider] </code>

== Screenshots ==

1. Listing all news in admin
2. Add new news
3. News and slider settings
4. Display News with grid view
5. Display News with List view

== Changelog ==
= 1.1.0 =
* Initial release.

== Upgrade Notice ==

= 1.0 =
Initial release.