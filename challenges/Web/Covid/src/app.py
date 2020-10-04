from flask import Flask, render_template,json,request,render_template_string,redirect,url_for
import subprocess
import shlex
import urllib.parse
import re
from flask import Flask, session
app= Flask(__name__)
app.config['SECRET_KEY'] = 'Sorry_but_i_can_not_give_you_flag'
flag="PTITCTF{Fl4Sk_IS_N07_s3CuR3}"
with open("opt.txt", "r") as file:
    opt_key = file.read().rstrip()

def validate_cookie():
	username = session.get('username')
	money = session.get('money')
	if username and money:
		return True
	else:
		return False

@app.route('/news', methods =['POST','GET'])
def news():
	if not validate_cookie():
		return render_template('info.html')
	return render_template('news.html')

@app.route('/us', methods =['POST','GET'])
def us():
	return render_template('us.html')

@app.route('/', methods =['POST','GET'])
def index():
	if request.method=='POST':
		name=request.form.get('name') or None
		print (name)
		if name==None or len(name)<4 or len(name)>15:
			return render_template('info.html',err="Tên phải từ 5-10 kí tự")
		session['username'] = name
		session['money'] = 2000
		return redirect(url_for('news'))
	else:
		return render_template('info.html')
@app.route('/store', methods =['POST','GET'])
def store():
	if not validate_cookie():
		return render_template('info.html')
	if request.method=='POST':
		category=request.form.get('category') or None
		number= request.form.get('number') or None
		if number:
			if number.isdigit()==False:
				return render_template('index.html', err="Chỉ nhập số")
		else:
			return render_template('index.html', err="Không hợp lệ")
		number= int(number)
		if number<0:
			return render_template('index.html', err="Không hợp lệ")
		if category:
			if len(category)>15:
				return render_template('index.html',err="Không hợp lệ")
			if filter(category):
				if execute(category, number):
					if category=="cv":
						return render_template('index.html',err="Thank you!! Here is your <a href='https://drive.google.com/file/d/1nfmITOftVJI51_bhqdgKilZsUNihsVyt/view?usp=sharing'>award<a/>")
					else:
						return render_template('index.html',err="Mua hàng thành công")
				else:
					return render_template('index.html',err="Bạn không đủ tiền để mua")
			else:
				return show_error(category)
		else:
			return render_template('index.html')
	else:
		return render_template('index.html')

@app.route('/flag', methods =['POST','GET'])
def show_flag():
	if not validate_cookie():
		return render_template('info.html')
	if request.method=='POST':
		otp= request.form.get('otp') or None
		if otp and len(otp)>5:
			if execute('flag',1) and otp==opt_key:
				return render_template('flag.html', flag=flag)
			return render_template('flag.html', flag="Giao dịch thất bại, ban mat 10000$")
		return render_template('flag.html', flag="Mã OTP không hợp lệ")
	return render_template('flag.html', flag='')
def check_command(s):
    return any(i.isdigit() for i in s)
def filter(command):
	blacklist=['curl','rm','mkdir','nano','vi','vim','head','tail','less','more','"',"\\",';','wget','\'','`','[',']','|','&','#','>','<']
	command=command.lower()
	if check_command(command):
		return False
	for item in blacklist:
		if item in command:
			return False
	return True
def execute(category,number):
    command="cat shop/"+category+".txt" 
    okay=False
    p = subprocess.Popen(command, shell=True, stdout=subprocess.PIPE, stderr=subprocess.STDOUT)
    for line in p.stdout.readlines():
       	if line.isdigit():
       		num=int(line)
       		total= num*number
       		your_money=session.get('money')
       		if total<=your_money:
       			session['money']=your_money-total
       			okay=True
       	print(line)
    retval = p.wait()
    return okay


def show_error(keyword):
	string ='''<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<title>Forbiden</title>
<h1>Forbiden</h1>
<p> Your word: {} is in our blacklist</p>
'''.format(keyword)
	return render_template_string(string)
@app.errorhandler(404)
def not_found(error):
    keyword='url'
    string ='''<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<title>Not Found</title>
<h1>Not Found</h1>
'''.format(keyword)
    return render_template_string(string), 404

if __name__=="__main__":
	app.run(host='0.0.0.0', port=8010,debug=False)
