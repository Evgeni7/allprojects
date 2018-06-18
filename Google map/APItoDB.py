#gets data from API and saves to data.json
#99501 - 99524
#http://api.apixu.com/v1/search.json?key=cf20be730e4a4502a2575501181506&q={0}".format(i)
#forecast

import requests
import json
from pprint import pprint
import MySQLdb
h = 0
i = 0
for h in xrange (-180, 180):
	for i in xrange (-180, 180):
		response = requests.get("http://api.apixu.com/v1/search.json?key=cf20be730e4a4502a2575501181506&q={0},{1}".format(i,h))
		print(h)
		print(i)
		print(response.status_code)
		data = response.json()
		with open('data.json', 'w') as fp:
		    json.dump(data, fp)



			#gets data from data.json and imports to DB
		#connects to map db
		conn = MySQLdb.connect(host= "localhost",
				  user="wordpressuser",
				  passwd="Passw0rd!",
				  db="map")
		x = conn.cursor()



		with open('data.json') as data_file:
			data_item = json.load(data_file)



		i = 0
		j = len(data_item)
		for i in xrange(j):
			#inserts into list table
			try:
			   x.execute("INSERT INTO list VALUES (%s,%s,%s,%s,%s,%s,%s)" ,(data_item[i]["id"],data_item[i]["name"],data_item[i]["region"],data_item[i]["lat"],data_item[i]["lon"],data_item[i]["country"],data_item[i]["url"]))
			   conn.commit()
			except:
			   conn.rollback()
			i = i+1

		conn.close()
		if i > 0:
			print("Imported to DB.")
		else:
			print("No data found.")
print("Done.")


#gets json file as list in python
#with open('data.json') as data_file:
#	data_item = json.load(data_file)
#pprint(data_item)



#for x in data_item:
#	print x
#	print("======================")

#created as values in list not as dicts ;(
#print (data_item[0])


#a = dict(data_item[0])
#print a["name"]



