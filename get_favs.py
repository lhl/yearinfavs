#!/usr/bin/env python 


import json
from   pprint import pprint
import sys
from   twython import Twython


# Twitter Login
creds = json.load(open('creds.json'))
twitter = Twython(creds['APP_KEY'], creds['APP_SECRET'], oauth_version=2)
ACCESS_TOKEN = twitter.obtain_access_token()
twitter = Twython(creds['APP_KEY'], access_token=ACCESS_TOKEN)

# Lets grabe favs from this year
keep_going = 1
min = 0
while keep_going:
  # https://dev.twitter.com/rest/reference/get/favorites/list
  if min:
    favs = twitter.get_favorites(screen_name='lhl', count=200, max_id=min)
  else:
    favs = twitter.get_favorites(screen_name='lhl', count=200)

  # Write out file
  max = favs[0]['id']
  min = favs[-1]['id']
  with open('favs.%s.%s.json' % (max, min), 'w') as outfile:
    json.dump(favs, outfile)

  # Stop after 2014
  if favs[-1]['created_at'][-4:] != '2014':
    keep_going = 0
