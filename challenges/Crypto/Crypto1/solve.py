f=open('cipher3.txt','r')
cipher=f.read()
prefix='ANHTOICTF'

cipher=cipher.decode('hex')
flag=''

j=0
for i in cipher:
    flag+=chr(ord(i)^ord(prefix[j]))
    j+=1
    if (j==len(prefix)):
        j=0
print flag
