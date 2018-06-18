#Part 4 Ex 9
import math
a = [2, 4, 9, 16, 25]

#for
b = [0] * len(a)
for i in xrange(len(a)):
	t = 0
	b[i] = math.sqrt(a[i])
	#b[i] = int(math.sqrt(a[i]))
	t = t+ 1
print b

#map
def root(x):
	return math.sqrt(x)
c = list(map(root, a))
print c

#list comprehention
d = [math.sqrt(a[i]) for i in xrange(len(a))]
print d

#generator expression
e = (int(math.sqrt(a[i])) for i in xrange(len(a)))
k = [0] * len(a)
for i in e:
	k[i-1] = i
print k
