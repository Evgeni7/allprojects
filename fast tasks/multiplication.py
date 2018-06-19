i=1
string = str(0)
a = [0] * 3200001
for i in xrange(0, 310000):
	a[i-1] = i*i	
	string = string + str(a[i-1])

#print string[2:]
print a[4]
N = raw_input("Number of the element:")
if int(N) >= 3200000:
	print ("Error. Selected number should be less then 3200000.")
	exit()
print ("The element is:")
print string[int(N)+1]
