import copy

k = raw_input("Number of rows:")
l = raw_input("Number of columns:")
r = raw_input("Number of days:")
sb11 = raw_input("Strawberrie one row:")
sb12 = raw_input("Strawberrie one column:")
sb21 = raw_input("Strawberrie two row:")
sb22 = raw_input("Strawberrie two column:")



a = [[0 for x in range(int(l))] for y in range(int(k))] 
a[int(sb11)-1][int(sb12)-1] = 1
a[int(sb21)-1][int(sb22)-1] = 1
b = [[0 for x in range(int(l))] for y in range(int(k))]
b[int(sb11)-1][int(sb12)-1] = 1
b[int(sb21)-1][int(sb22)-1] = 1


for i in range(int(r)):
	for x in range(int(k)):
		for y in range(int(l)):
			try:
				if a[x][y] == i + 1:
					if a[x+1][y] == 0:
						b[x+1][y]= i + 2
			except IndexError:
				pass
			try:			
				if a[x][y+1] == i + 1:
					if a[x][y] == 0:					
						b[x][y] = i + 2
			except IndexError:
				pass
			try:
				if a[x][y] == i + 1:
					if a[x][y+1] == 0:
						b[x][y+1]= i + 2
			except IndexError:
				pass
			try:			
				if a[x+1][y] == i + 1:
					if a[x][y] == 0:
						b[x][y] = i + 2
			except IndexError:
				pass
	a = copy.deepcopy(b)

count = 0
for x in range(int(k)):
	for y in range(int(l)):
		try:
			if a[x][y] == 0:
				count = count + 1
		except IndexError:
			pass


summ= int(k)*int(l)
print a
print "Fresh strawberries: ", count
print "Out of", summ, "in total."
asd = ((summ - count)*100) /summ
print asd, "% rotten strawberries."
