=== World of Warcraft (WoW) Recruitment ===
Contributors: Athlios
Donate Link: https://www.paypal.com/paypalme/athlios
Tags: WOW, Warcraft, Guild, World of Warcraft, Recruitment
Requires at least: 6.0
Tested up to: 6.9.1
Requires PHP: 7.4
Stable tag: 2.0
License: GPL-3.0-or-later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

A widget that helps to display recruitment message of a World of Warcraft guild, also can be used for other games that have different classes.

== Description ==

A widget that displays recruitment messages for World of Warcraft.
It's a simple panel customizable with some CSS techniques.

* please always save the widget once before and after every update, 

New in version 2.0:

* added new classes
* updated all colors
* this plugin now uses npm to build SCSS stylesheets, see source code for details, mixins will be useful if you're building your own wordpress theme

** I will be actively updating this plugin.
** This plugin is property of Gordian Knot but we do share it for free.

To use this widget, simply go to Appearance => Widget and drag it to a sidebar as similar to other widgets.

If you found bugs or want to suggest improvements, please open an issue on the project repository.


== Installation ==

1. Unpack and Upload all files to the `/wp-content/plugins/world-of-warcraft-recruitment` directory
2. Activate the plugin through the **Plugins** menu in WordPress
3. Drag **World of Warcraft (WoW) Recruitment** to your sidebar
4. Enter details and done!
5. *(optional)* go to **Settings > World of Warcraft (WoW) Recruitment** to set up all classes and status texts to your own language
6. *(optional)* if you're using a theme with narrow sidebar, go to **Settings > World of Warcraft (WoW) Recruitment** and choose "For Narrow Sidebars" under "Theme"


== Screenshots ==

1. Here is how it looks
2. Dark theme, small icons

== Changelog ==

= 2.0 =
* major version bump
* cumulative modernization and PHP 8 compatibility work


= 1.5.0 =
* modernized for current WordPress and PHP compatibility
* hardened admin/settings sanitization and output escaping
* refreshed plugin metadata and include loading patterns


== Development Note ==
require [npm](https://www.npmjs.com/) to build stylesheets

<code>npm run build</code> to build stylesheets continuously to ./css/ until Ctrl+C to terminate, test page can be viewed at http://localhost:8001

only tested on Mac, should work in *nix platforms, should work in Windows too