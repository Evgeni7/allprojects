#Table created by "create table Ek_atte (number int, ekatte int primary key, tvm varchar(255), name varchar(255), oblast varchar(255), obstina varchar(255), kmetstvo varchar(255), kind int, category int, altitude int, document int, tsb varchar(255), abc int);"

import MySQLdb
import csv

conn = MySQLdb.connect(host= "localhost",
	          user="wordpressuser",
	          passwd="Passw0rd!",
	          db="ekatte")
x = conn.cursor()

with open('ekatte.csv', mode='r') as f:
	list = []
   	for word in f:
        	list.append(word)
		
#word[x] = character
#words[x] = string	
print len(list)

i = 2
while i <= len(list):
	words = list[i].split(",")
	print words[3]
	try:
		x.execute("insert into Ek_atte values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",(words[0],words[1],words[2],words[3],words[4],words[5],words[6],words[7],words[8],words[9],words[10],words[11],words[12]))
		conn.commit()
	except:
	   	conn.rollback()
	i = i + 1
