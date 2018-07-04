#!/usr/bin/env python3


n = input("Lenght of AY:")
a = input("Georgi:")
b = input("Gergana:")
c = input("Line size:")
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
    print(AY[i])
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
        try:
            if AY[jk+1]==0 or AY[jk+1]==1:
                co = co + 1
        except:
            pass
        
print("Answer is: ")
print(co)



#Vizualization
import matplotlib.pyplot as plt
import numpy as np


col1='#ff0000'
col2='#3433ff'





def lineplot(x_data, y_data, colorr, x_label="", y_label="", title="Red line - connected dots."):
    _, ax = plt.subplots()
    plt.axis([0, N-1, 0, 2])
    ax.plot(x_data, y_data, lw = 10, color = colorr, alpha = 0.95)
            
            
    for jk in range(N):
        if AY[jk]==2 or AY[jk]==3:
            try:
                if AY[jk+1]==2 or AY[jk+1]==3:
                    ax.plot([jk,jk+1], [1,1], lw=10, color= col1, alpha=0.9)
            except:
                pass
        if AY[jk]>0:
            ax.plot([jk], [1], 'ro', lw = 10, color = '#f7ff53', alpha = 1)
    
    
    ax.set_title(title)
    ax.set_xlabel(x_label)
    ax.set_ylabel(y_label)
    plt.show()
wer=[0,N-1]
wer2=[1] * len(wer)

lineplot(wer, wer2, col2)
