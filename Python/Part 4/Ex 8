#Part 4 Ex 8

def func(y):
	j = 1	
	if y<0:
		j = 0
		y = y*-1
	x = y // 2
	while x > 1:
		if y % x == 0:
			if j == 0:
				x = x * -1
				y = y * -1	
			print(y, 'has factor', x)
			
			break 
		x -= 1
	else: 
		print(y, 'is prime')
print func(1)
print func(2)
print func(3)
print func(7)
print func(15)
print func(-10)
print func(0)
