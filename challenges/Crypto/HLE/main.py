from flask import Flask, request, abort
import time
import hashlib
from base64 import b64decode

key = 'shdbfkd512a@sdnaksg5sdjf@#$@#$df'
def insecure_compare(s1,s2):
    for i,j in zip(s1,s2):
        if i != j:
            return 0
        time.sleep(0.05)
    return 1

app = Flask(__name__)

@app.route('/check',methods=['POST'])
def check():
    file = b64decode(request.form['file'])
    signature = request.form['signature']
    signature_for_file = hashlib.md5(key + file).hexdigest()
    if insecure_compare(signature_for_file,signature):
        content = open(file,'r').read()
        if content:
            return content,200
        else:
            return "No file",404
    return "Wrong signature",500

if __name__ == '__main__':
    app.run('0.0.0.0',5000)

