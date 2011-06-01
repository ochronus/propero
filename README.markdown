Propero
=============
<div style="float:left;margin:0 10px 10px 0; width: 152px;"><img src="http://blog.mostof.it/wp-content/uploads/measure-150x150.jpg"></div>

Simply put Propero is a javascript, php and mongodb based page load measurement system based on the new Navigation Timing property

What exactly is this 'Navigation Timing' thing?
-------

First, you can [read more here (W3C)](http://www.w3.org/TR/navigation-timing/)

Navigation Timing is a new way to get detailed information about page load times via javascript.

See the diagram below for measurement points

![Navigation Timing measurement points](http://www.w3.org/TR/navigation-timing/timing-overview.png)

Currently this window property is known to work in latest Chrome and IE9.


What you need to install
-------

* Install PHP 5.2+ (5.3 preferred), [see how](http://php.net/manual/en/install.php)
* Install a web server (apache, nginx, lighttpd, any you like), see google for a howto
* Install mongodb [see how](http://www.mongodb.org/display/DOCS/Quickstart)
* Install the PECL mongodb extension for PHP [see how](http://www.php.net/manual/en/mongo.installation.php)

What next
-------

* Clone this repo to a directory on your webserver, accessible by HTTP from the outside world
* modify propero_config.php 
* run generator.php to generate propero.js (produces a minified JS code)
* insert measurement script tag (generator.php echoes this to the console) to sites right before &lt;/body&gt;

bonus:

* configure proper caching on propero.js, see your webserver's manual

What's inside?
-------

propero.js will initiate an AJAX GET call to the logger after the page has completed loading with all navigation timing data json'd. 
The logger will then log the current timestamp, the url and the timing data to mongodb


{ "_id" : ObjectId("4de630c28809b5567f000000"), "timing" : { "connectStart" : 1261333531, "responseStart" : 1261333614, "domLoading" : 1261333622, "connectEnd" : 1261333531, "domInteractive" : 1261336002, "fetchStart" : 1261333531, "secureConnectionStart" : 0, "domainLookupStart" : 1261333531, "responseEnd" : 1261333660, "requestStart" : 1261333533, "loadEventEnd" : 1261336280, "domComplete" : 1261336272, "redirectStart" : 0, "unloadEventEnd" : 1261333620, "domContentLoadedEventStart" : 1261336002, "domContentLoadedEventEnd" : 1261336008, "domainLookupEnd" : 1261333531, "navigationStart" : 1261333531, "unloadEventStart" : 1261333615, "loadEventStart" : 1261336272, "redirectEnd" : 0 }, "time" : 1306931394, "url" : "http://piwik.mostof.it/test.html" }

TODO
-------

Erm... everything? :)

* Support for multiple domains (stats / domain instead of one big pool of logs)
* Stat screen(s), currently data is in mongodb only, there's no monitoring/stat screen yet

