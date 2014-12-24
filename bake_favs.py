#!/usr/bin/env python


import json
from   pprint import pprint
import sys


for fav in json.load(open('favs.2014.json')):
  print '<blockquote class="twitter-tweet"><a href="http://twitter.com/%s/status/%s"></a></blockquote>' % (fav['user']['screen_name'], fav['id'])
