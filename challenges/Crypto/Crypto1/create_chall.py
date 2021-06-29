import binascii

flag='Giai duoc bai nay, ban xung dang co duoc flag: ANHTOICTF{xor__xor___And_Xor}'
prefix='ANHTOICTF'
cipher=''
j=0
for i in flag:
   cipher +=chr(ord(i)^ord(prefix[j]))
   j+=1
   if (j==len(prefix)):
       j=0
f=open('cipher3.txt','w')
f.write(binascii.hexlify(cipher))
f.close()
print 'done'
