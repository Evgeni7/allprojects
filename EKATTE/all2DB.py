import pandas as pd
#stands for "Python Data Analysis Library"
#takes data and creates object with rows and columns that looks similar to Excel
import MySQLdb
#used to connect to DB
import csv
#used to write file to .csv
import warnings
#ignores utf8 warnings
warnings.filterwarnings("ignore")





data_xls = pd.read_excel('Ek_atte.xls', 'Ek_atte', index_col=None)
data_xls.to_csv('ekatte.csv', encoding='utf-8')


conn = MySQLdb.connect(host= "localhost",
	          user="wordpressuser",
	          passwd="Passw0rd!",
	          db="ekatte")
x = conn.cursor()

with open('ekatte.csv', mode='r') as f:
	list = []
   	for word in f:
        	list.append(word)
		
#word[x] returns a character
#words[x] returns a string	

i = 2
while i < len(list):
	words = list[i].split(",")
	#print words[2] + words[3]
        if(words[1]>0):
            try:
                    x.execute("insert into sel values (%s,N%s,N%s,N%s)",(words[1],words[2],words[3],words[5]))
                    conn.commit()
            except:
                    print "Fail with: " + words[3] + " in sel"
                    conn.rollback()
        else:
            pass
	i = i + 1
	
	
#oblast
data_xls = pd.read_excel('Ek_obl.xls', 'Ek_obl', index_col=None)
data_xls.to_csv('ekatte.csv', encoding='utf-8')


conn = MySQLdb.connect(host= "localhost",
	          user="wordpressuser",
	          passwd="Passw0rd!",
	          db="ekatte")
x = conn.cursor()

with open('ekatte.csv', mode='r') as f:
	list = []
   	for word in f:
        	list.append(word)
		

i = 0
while i < len(list):
	words = list[i].split(",")
	#print words[1]+ " " +words[3]
	try:
		x.execute("insert into obl values (%s,N%s,N%s)",(words[2], words[1], words[3]))
		conn.commit()
	except:
	   	print "Fail with: " + words[3] + " in obl"
	   	conn.rollback()
		
	i = i + 1
	
	
	
#obstina
data_xls = pd.read_excel('Ek_obst.xls', 'Ek_obst', index_col=None)
data_xls.to_csv('ekatte.csv', encoding='utf-8')


conn = MySQLdb.connect(host= "localhost",
	          user="wordpressuser",
	          passwd="Passw0rd!",
	          db="ekatte")
x = conn.cursor()

with open('ekatte.csv', mode='r') as f:
	list = []
   	for word in f:
        	list.append(word)
		

i = 0
while i < len(list):
	words = list[i].split(",")	
	wordy = words[1][0]+words[1][1]+words[1][2]
	try:
		x.execute("insert into obst values (%s,N%s,N%s,N%s)",(words[2],words[1],wordy,words[3]))
		#print words[0] + words[1] + words[2] + words[3]		
		conn.commit()
	except:
	   	print "Fail with: " + words[3] + " in obst"
	   	conn.rollback()
		
	i = i + 1




