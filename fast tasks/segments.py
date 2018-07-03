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
        print counter
        
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
            print counter
except:
    pass
for i in range(int(n)):
    print AY[i]
    i = i + 1

j = 0
jk = 0

#for j in xrange(int(n)):
 #   if AY[j] == 1:
  #      jj = j + int(c)
   #     if jj <= int(n):
    #        if AY[jj] == 1:
     #           for i in range (j, jj):
      #              AY[i] = 2
       #             i = i + 1

for j in range(int(n)):
    if AY[j] == 1:
        try:
            if AY[j+int(c)] == 1:
                jk = jk + 1
        except:
            pass
                
print(int(n) - jk)
