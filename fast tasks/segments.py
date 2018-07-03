n = raw_input("Lenght of AY:")
a = raw_input("Georgi:")
b = raw_input("Gergana:")
c = raw_input("Line size:")
t = 0
N = int(n)+1

AY = [0] * N
counter = 0
AY[0]=1
try:
    for counter in range(N):
        counter = t + int(a)
        AY[counter]=1
        t = counter
        
except:
    pass


t = N
AY[t-1]=1
print t
try:
    for counter in range(N):
        counter = t - int(b)
        if counter > 0:
            AY[counter-1] = 1
            t = counter
except:
    pass


j = 0
jk = 0


for j in range(N):
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
                

for i in range(N):
    print AY[i]
    i = i + 1


co = 0
for jk in range(N):
    if AY[jk]==0 or AY[jk]==1:
        try:
            if AY[jk+1]==0 or AY[jk+1]==1 or AY[jk+1]==2 or AY[jk+1]==3:
                co = co + 1
        except:
            pass
        
    if AY[jk]==2 or AY[jk]==3:
        if AY[jk+1]==0 or AY[jk+1]==1:
            co = co + 1
        
        
print "Answer is: "
print co
