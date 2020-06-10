=== Simple News Grid and Slider  ===
Contributors: sumit-bhagirath
Tags: sumit-bhagirath, wordpress news plugin, news website, main news page scrolling , wordpress vertical news plugin, Free scrolling news wordpress plugin, Free scrolling news widget wordpress plugin, WordPress set post or page as news, WordPress dynamic news, news, latest news, custom post type, cpt, widget, news shortcode, owl slider
Requires at least: 4.0
Tested up to: 5.4.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A quick, easy and simple way to add an News custom post type, vertical scrolling news list to Wordpress. Also work with Gutenberg shortcode block.

== Description ==

Dynamic & easy-to-use Simple News List and Slider. 

Website’s performance is the most significant thing for any online business owner. Simple News List and Slider is one of the ways to effectively increase the dynamics of the online web space with news archives, scrolling news widgets and thumbnails. Add, manage and remove the news section on your CMS website.  

**Also work with Gutenberg shortcode block**.

= Important Note For How to Install =

> Please make sure that Permalink link should not be "/news" Otherwise all your news will go to archive page. You can give it other name like "/ournews, /latestnews etc"**  

**As this pluign is created with custom post type, you can now add Gutenberg  editor support for the plugin for writing the news post. For that we have added apply_filters. For more details please check plugin FAQ section.**

<code>apply_filters( 'news_slider_registered_post_type_args', $news_args ); </code>

**Now you can Display news post with the help of short code :** 

<code> [news_slider ] </code>

**Display News with Grid:**

<code>[news_slider type="list"] </code>

**Display News with Slider:**

<code>[news_slider type="slider"] </code>

**Also you can Display the news post with Multiple categories wise** 

<code>Sports news : 
[news_slider category="category_id"]
Arts news 
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
* Added List view <code>[news_slider grid="list"] </code>
* Category wise News <code> Sports news [news_slider category="category_id"] </code>
* Display News with Grid <code>[news_slider]</code>, List <code>[news_slider grid="list"]</code> and Slider <code>[news_slider grid="slider"]</code>


= Privacy & Policy =
* We have also opt-in e-mail selection , once you download the plugin , so that we can inform you and nurture you about products and its features.

== Installation ==

1. Upload the 'news-slider' folder to the '/wp-content/plugins/' directory.
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
add_filter( 'news_slider_registered_post_type_args', 'prefix_gutenberg_editor_support' );
</code>

= Do I need to update my permalinks after I activate this plugin? =

No, not usually. But if you are geting "/news" page OR 404 error on single news then please  update your permalinks to Custom Structure.   

= I am getting 404 page in news detail page? =

If you are getting this error, please go to Setting -->  Permalinks and under Permalinks Setting select "Plain" radio button and save. Now again go to "Post name" radio button and save again. This will fix your issue. 

= Are there shortcodes for news items? =

Yse  <code> [news_slider] </code>

== Screenshots ==

1. Display News with grid view
2. A complate view with comments
3. Display News with List view
4. Add new news
5. Single News view
6. Also work with Gutenberg shortcode block.

== Changelog ==
= 1.1.0 =
* Initial release.