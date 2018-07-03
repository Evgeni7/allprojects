n = raw_input("Lenght of AY:")
a = raw_input("Georgi:")
b = raw_input("Gergana:")
c = raw_input("Line size:")
t = 0

AY = [0] * int(n)
counter = 0
AY[0]=1
try:
    for counter in range(int(n)):
        counter = t + int(a)
        AY[counter]=1
        t = counter
        
except:
    pass


t = int(n)
AY[t-1]=1
try:
    for counter in range(int(n)):
        counter = t - int(b)
        if counter > 0:
            AY[counter] = 1
            t = counter
except:
    pass


j = 0
jk = 0

for j in range(int(n)):
    if AY[j] == 1 or AY[j] == 3:
        try:
            if AY[j+int(c)] == 1 or AY[j+int(c)] == 3:
                i = j
                for i in range(j-1, j + int(c)):
                    i = i + 1
                    if AY[i] == 1 or AY[i] == 3:
                        AY[i] = 3
                    else:
                        AY[i] = 2
        except:
            pass
                

for i in range(int(n)):
    print AY[i]
    i = i + 1


co = 0
for jk in range(int(n)):
    if AY[jk]==0 or AY[jk]==1:
        co = co + 1
print "Answer is: "
print co
