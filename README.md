Tiny project to capture my Twitter (and maybe other) favs from 2014

## index.html
Simply use an embedded timeline:
* doc: https://dev.twitter.com/web/embedded-timelines
* config: https://twitter.com/settings/widgets

## get_favs.py
Grabs my favorite tweets from this year, you'll want to change the user variable
* Make an app to get creds, https://apps.twitter.com/
* doc: https://dev.twitter.com/rest/reference/get/favorites/list
* dumps to json file for massaging. we want to do this for any work since rate-limit is super low (15 req/15 min)

## organize_favs.py
Chronologically orders the JSON files pulled by get_favs.py

## bake_favs.py
Creates static Twitter Output


# Notes

Rendering a Tweet:
* https://twittercommunity.com/t/manually-generating-embed-html-for-tweets/8210
* https://dev.twitter.com/web/embedded-tweets
* https://dev.twitter.com/web/embedded-tweets/javascript-create
* https://dev.twitter.com/web/embedded-tweets/parameters


http://openmymind.net/2012/5/30/Client-Side-vs-Server-Side-Rendering/

http://stackoverflow.com/questions/18755419/rendering-tweets-on-the-server-side



https://github.com/twitter/twitter-text

https://dev.twitter.com/overview/api/twitter-libraries


