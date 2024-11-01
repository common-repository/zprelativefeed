=== ZP Relative Feed ===
Contributors: zetaprints
Tags: rss, atom, feed, relative link
Requires at least: 2.9
Tested up to: 2.9.2
Stable tag: 0.1

Converts relative links in feeds into absolute links by adding the base of the site from server environment variable.

== Description ==
WP instances converted to use relative links make RSS feeds unusable becase they too contain relative links. This plugin registers a converter function in several filters to solve this issue. These filters apply to links before printing it to the feed output. The plugin's converter function adds scheme, domain name and port (getting the values from PHP's server environment variable) to links in feeds.

This plugin was developed by [ZetaPrints](http://www.zetaprints.com) as an open source project and is hosted in [Wordpress Plugin Directory](http://wordpress.org/extend/plugins/zprelativefeed/). You are welcome to poke around and generally do as you please, as it's under MIT license. 
