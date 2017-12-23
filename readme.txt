=== bitsy ===

Contributors: sewmyheadon, ivycat
Tags: translation-ready, custom-background, theme-options, custom-menu, post-formats, threaded-comments, performance optimized

Requires at least: 4.0
Tested up to: 4.9.1
Stable tag: 0.9.9
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Bitsy is a slim, optimized starter theme based on skel.io and underscores.me.

== Description ==

Bitsy is a simple, optimized starter theme based on [underscores](http://underscores.me/), [Skel](http://skel.io/), and [Baseline](https://github.com/ajlkn/baseline) with a cool theme wrapper to keep your code warm and [DRY](https://en.wikipedia.org/wiki/Don%27t_repeat_yourself).

Bitsy includes support for Grunt to help you compile and optimize SASS, JS, update your readme.md file, and more.

== Installation ==

Either upload the zip file through the WordPress Admin, or use git to clone the theme into you _themes_ directory.

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

### Development
Since Bitsy is a starter theme, chances are you're going to continue theme development using Bitsy as a basis.

While you don't have to use it, Bitsy's all set up with Grunt to do the following:
- Compile SASS using Compass
- Test our JS
- Concatenate JS
- Copy your readme.txt to a readme.md file for GitHub or other git hosts.

#### Prerequisites ####
- Install or update [Node and npm](https://nodejs.org/en/download/).
- Control any command-line fear.

#### Install Dependencies ####
Once Node and npm are installed and you've got the theme in the right place, you'll want to use the command line to `cd`
into the theme directory and run `npm install`, which will pull in all of the required theme automation packages.

== Frequently Asked Questions ==

= There are a thousand good themes out there, why build another? =

To learn and be lean.

= Does this theme support any plugins? =

Bitsy currently includes support for:

- Infinite Scroll in Jetpack.
- WooCommerce

= Can I contribute? =

Absolutely! Please feel free to contribute comments, suggestions, pull requests, dark chocolate, or bug reports in [Bitsy's GitHub repo](https://github.com/sewmyheadon/bitsy).

== Changelog ==
= 0.9.9 - Dec 23 2017
* Add margin top when logged in to clear admin bar

= 0.9.8 - Dec 19 2017
* More color streamlining

= 0.9.7 - Dec 17 2017
* Streamline color definitions and variables
* Update header font sizing
* Fix footer class call

= 0.9.6 - Dec 10 2017 =
* Update readme files to document Grunt.

= 0.9.5 - Nov 24 2017 =
* Add WooCommerce support. Update to current _s.
* Add hooks for header, content, and footer classes.

= 0.9.3 - Nov 13 2017 =
* Minor docs update to help developers get started with Grunt.

= 0.9.2 - Jul 2 2017 =
* Minor docs updates - give credit to Baseline, linkify inspirational projects

= 0.8.1 - Jul 2 2017 =
* Minor docs update to give credit where it's due.

= 0.8 - Nov 5 2016 =
* Initial release

== Code Quality ==

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sewmyheadon/bitsy/badges/quality-score.png?b=dev)](https://scrutinizer-ci.com/g/sewmyheadon/bitsy/?branch=dev) [![Build Status](https://scrutinizer-ci.com/g/sewmyheadon/bitsy/badges/build.png?b=dev)](https://scrutinizer-ci.com/g/sewmyheadon/bitsy/build-status/dev)

== Credits ==

* Skel http://skel.io/, (C) 2016 skel.io, [MIT](https://opensource.org/licenses/MIT)
* Baseline https://github.com/ajlkn/baseline, (C) 2016 n33, [MIT](https://opensource.org/licenses/MIT)
* Underscores http://underscores.me/, (C) 2012-2016 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css http://necolas.github.io/normalize.css/, (C) 2012-2016 Nicolas Gallagher and Jonathan Neal, [MIT](http://opensource.org/licenses/MIT)
