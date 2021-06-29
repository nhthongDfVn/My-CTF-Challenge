import base64
import random

flag=b'ANHTOICTF{The_gioi_cua_base,moi_thu_deu_la_base}'
cipher=flag
for i in range (0,35):
    print (i)
    k=random.randint(0,4)
    if k==0:
        #print ("base16")
        cipher=base64.b16encode(cipher)
    elif k==1:
        #print ("base32")
        cipher=base64.b32encode(cipher)
    elif k==2:
        #print ("base64")
        cipher=base64.b64encode(cipher)
    else:
        #print ("base85")
        cipher=base64.b85encode(cipher)

f=open("cipher.txt","w")
f.write(cipher.decode('utf-8'))
f.close()
print ('done')
