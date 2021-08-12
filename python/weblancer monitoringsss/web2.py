import requests
import json
from bs4 import BeautifulSoup
import time

url = 'https://www.weblancer.net'
headers = {'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0'}
data = {
	"login" : "Maxsobolev",
	"password" : "WVd4nr"
}

session = requests.Session()
session.get(url, headers=headers)
session.headers.update({'Referer':url})
session.headers.update(headers)
r = session.post(url + "/account/login/", data=data)

if r:
	print("Success auth!")
	session.headers.update({'Referer':url})
	page = session.get(url + '/account/contacts/')
else:
	print("Error, while auth: ", r)



soup = BeautifulSoup(page.text, 'html.parser')
path_to_name = ".user_brief > .brief > div > .name"
path_to_conversation_block = ".user_brief-login_block > .row"
path_to_messages = ".col-sm-4 > a"



""" ЕСЛИ ПОТРЕБУЕТСЯ ЗАПИСАТЬ В ФАЙЛ
with open('new2.html', 'w', encoding='utf-8') as f:
	print(soup.prettify(), file=f)  #soup.prettify() делает красивое читаемое отобажение страницы
"""


conversations = [dialog for dialog in soup.select(path_to_conversation_block)]
names = [BeautifulSoup(str(code), 'html.parser').select('.name>a')[0].text for code in conversations]
amount_of_conversations = len(soup.select(path_to_conversation_block))
message_link = [BeautifulSoup(str(code), 'html.parser').select(path_to_messages)[0] for code in conversations]
last_message = []
for i in range(0, amount_of_conversations):
	t = session.get(url + message_link[i]['href'])
	session.headers.update({'Referer':url})
	dialog = session.get(t.url)
	mess = BeautifulSoup(dialog.text, 'html.parser').select('.block-content')
	print(mess)

#print(last_message)