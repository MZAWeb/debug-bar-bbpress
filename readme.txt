=== Debug Bar bbPress ===
Contributors: MZAWeb
Tags: debug bar bbpress
Requires at least: 3.1
Tested up to: 3.5.1
Stable tag: 0.3

Displays information about the bbPress runtime in the Debug Bar.

== Description ==

Displays information about the loaded bbPress types, and a list of the templates loaded on the current request. Requires the [Debug Bar](http://wordpress.org/extend/plugins/debug-bar/) plugin.

If you have a cool idea about data I should add, open a ticket in the support forum.

== Installation ==

1. Install the [Debug Bar](http://wordpress.org/extend/plugins/debug-bar/) plguin
2. Place this plugin folder in your '/wp-content/plugins/' directory.
3. Activate it.

== Screenshots ==

1. bbPress panel

== Changelog ==

= 0.4 =
* Remove the "Loaded templates" header if there's no template to show
* Added bbp-debug-bar-panels action to allow users to add custom info or to change the displayed order
* Added bbp-debug-bar-before-panel and bbp-debug-bar-after-panel actions

= 0.3 =
* Don't load the panel if bbPress is not active (Thanks jjj)

= 0.2 =
* Show full path to template instead of just name,so it's easier to spot overrides.
* Introduce filter 'bbp-debug-bar-vars' to add vars at the top (like Forum or Topic ID)
* Hide the panels if there's nothing to show, like outside bbp pages. (Thanks jjj)

= 0.1 =

Initial release
