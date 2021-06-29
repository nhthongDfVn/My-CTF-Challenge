import base64
import re


f=open("cipher.txt","r")
cipher=f.read()
cipher=bytes(cipher,'utf-8')

def b64check(cipher):
    if re.search(b'[\<\~\^\(\@\%\*\?\'\;\:\,\-\$\>\!]',cipher):
        return False
    return True

def solve():
    global cipher
    while b'ANHTOICTF' not in cipher:
        try:
            cipher=base64.b16decode(cipher)
            print (cipher)
            continue
        except:
            print ("not base16 cipher")

        try:
            cipher=base64.b32decode(cipher)
            print (cipher)
            continue
        except:
            print ("not base32 cipher")

        if b64check(cipher)==True:
            try:
                cipher=base64.b64decode(cipher)
                print (cipher)
                continue
            except:
                print ("not base64 cipher")

        try:
            cipher=base64.b85decode(cipher)
            print (cipher)
            continue
        except:
            print ("not base85 cipher")

solve()      


