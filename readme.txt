=== Query Has Results ===

Contributors:      mel_cha,hamworks 
Tags:              block
Requires at least: 6.7 
Tested up to:      6.7 
Requires PHP:      8.1 
Stable tag:        0.1.2
License:           GPLv2 or later 
License URI:       https://www.gnu.org/licenses/gpl-2.0.html

A WordPress block that shows content only when query results exist.

== Description ==

Query Has Results is a WordPress block plugin that allows you to wrap content that should only be displayed when a query returns results. This is particularly useful when working with Query Loop blocks to create conditional layouts.

== Features ==

- Simple wrapper block that shows/hides content based on query results
- Works with WordPress Query Loop blocks
- Supports both global queries and custom queries
- Zero configuration required

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/query-has-results` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Query Has Results block in the block editor

== Usage ==

1. Add a Query Loop block to your page/post
2. Inside the Query Loop, add a Query Has Results block
3. Place any content you want to show only when results exist inside the Query Has Results block
4. Content will automatically show/hide based on whether the query returns results
