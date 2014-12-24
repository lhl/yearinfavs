#!/usr/bin/env python


import arrow
import glob
import json
from   pprint import pprint
import sys


# Fill out 2014 Favs
favs2014 = []
for f in sorted(glob.glob('favs.*.*.json')):
  favs = json.load(open(f))
  for fav in favs:
    a = arrow.get(fav['created_at'], 'ddd MMM DD HH:mm:ss ZZ YYYY')
    if a.format('YYYY') == '2014':
      fav['created_at_epoch'] = a.format('X')
      favs2014.append(fav)

# Sort list
favs2014 = sorted(favs2014, key=lambda k: k['created_at_epoch'])

# Write out favs
json.dump(favs2014, open('favs.2014.json','w'))

# Just the IDs pls
favids =[]
for fav in favs2014:
  favids.append(fav['id'])
json.dump(favids, open('favids.2014.json','w'))
