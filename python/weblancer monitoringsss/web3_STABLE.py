from selenium import webdriver
from selenium.webdriver.firefox.firefox_binary import FirefoxBinary
import urllib.request
import requests
import json
from bs4 import BeautifulSoup
import time
import re




def login(browser):
	browser.find_element_by_xpath("/html/body/div[2]/div/div/div[2]/form/div[1]/input").send_keys("Maxsobolev")
	browser.find_element_by_xpath("/html/body/div[2]/div/div/div[2]/form/div[2]/input").send_keys("WVd4nr")
	browser.find_element_by_xpath("/html/body/div[2]/div/div/div[3]/button").click()
binary = FirefoxBinary("C:\\Users\\igrus_000\\Desktop\\weblancer\\geckodriver.exe")
browser = webdriver.Firefox()




#Первоначальный вход
url = 'https://www.weblancer.net'
browser.get(url)
browser.find_element_by_xpath("/html/body/div[1]/header/div/nav/div/ul[2]/li[2]/a").click()
login(browser)
#-------------------

time.sleep(1)


#Definition----------------------------------------
regex = r"(\d*)"
path_to_name = ".user_brief > .brief > div > .name"
path_to_conversation_block = ".user_brief-login_block > .row"
path_to_messages = ".col-sm-4 > a"
#--------------------------------------------------

browser.get(url + "/account/contacts/")



def get_recent_coversations(message_link, names, amount=3,):
	errors = []
	helper = {}
	last_message = {}
	reg = r"(.+\d)(.*)"

	#Прохожу по первым {amount} диалогам и беру последнее сообщение 
	for i in range(0,amount):
		try:
			if 'btn-success' in message_link[i]['class']:
				total_amount = 'new'
				link_title = message_link[i].text

			else:
				total_amount = 'old'
				link_title = message_link[i].text
			link_url = url + message_link[i]['href']
			browser.get(link_url)
			if browser.title != 'Вы не авторизованы':
				time.sleep(2)
				helper[i] = {'message':BeautifulSoup(browser.page_source, 'html.parser').select('.block-content > div:last-child')[0], 'state' : total_amount, 'amount': link_title, 'link' :link_url}
			else:
				try:
					login(browser)
					time.sleep(2)
					helper[i] = {'message':BeautifulSoup(browser.page_source, 'html.parser').select('.block-content > div:last-child')[0], 'state' : total_amount, 'amount': link_title, 'link' :link_url}
				except:
					print('Не авторизирован. на индексе ' + i)
				
		except:
			helper[i] = ''
			errors.append('Выход за границу массива диалогов на индексе ' + str(i) + '.\n Неудалось получить диалог с ' + names[i])

	"""
	Парсинг последнего сообщения:
	Разбиваю его на части и собираю в удобном виде - 
			 Имя того, с кем диалог {
			 	от кого:
			 	время отправления:
			 	было ли просмотрено собеседником:
			 	текст сообщения:
			 }
	 """
	for i in range(0, amount):
		if helper[i] != '':
			try:
				code = BeautifulSoup(str(helper[i]['message']), 'html.parser')
				t = code.select("div > div:nth-child(1)")[0].text
				if code.select("[title='не прочитано']"):
					v = "no"
					fro_m = 'you'
				else: 
					v = "yes"
					fro_m = names[i]
			except:
				errors.append('Неудалось получить последнее сообщение от контакта ' + names[i])

			te = re.findall(reg,code.text, re.S)
			text = te[0][1]

			last_message[str(i)+names[i]] = {'state': helper[i]['state'], 'amount': helper[i]['amount'], 'from': fro_m, 'time': t, 'view':v, 'message':text, 'amount': helper[i]['amount'], 'link' : helper[i]['link']}
		else:
			errors.append('Ошибка с пользователем ' + names[i])
	browser.get(url + "/account/contacts/")
	return errors, last_message
def chek_for_new_message():
	soup = BeautifulSoup(browser.page_source, 'html.parser')
	new_conversations = [dialog for dialog in soup.select(path_to_conversation_block)]
	new_message_link = [BeautifulSoup(str(code), 'html.parser').select(path_to_messages)[0] for code in new_conversations]
	new_names = [BeautifulSoup(str(code), 'html.parser').select('.name>a')[0].text for code in new_conversations]
	errors, new_last_message = get_recent_coversations(new_message_link, new_names)
	for person in new_last_message:
		if new_last_message[person]['state'] == 'new':
			if new_last_message[person]['from'] != 'you':
				mess['response'] = f"\n-----------------\n{new_last_message[person]['amount']} от {new_last_message[person]['from']}:\n{new_last_message[person]['message']} \nв {new_last_message[person]['time']}\n-----------------"
				mess['info'] = {
					'link': new_last_message[person]['link'],
					'from': new_last_message[person]['from']
				}
	return mess



#Проверка на наличие новых диалогов каждые 30 минут
while True:
#-------BEFORE
	soup = BeautifulSoup(browser.page_source, 'html.parser')
	conversations = [dialog for dialog in soup.select(path_to_conversation_block)]
	names = [BeautifulSoup(str(code), 'html.parser').select('.name>a')[0].text for code in conversations]
	message_link = [BeautifulSoup(str(code), 'html.parser').select(path_to_messages)[0] for code in conversations]
	mess = {}

	time.sleep(10)
#-------AFTER
	

	browser.get(url + "/account/contacts/")
	if browser.title != 'Вы не авторизованы':  	
		messsage = chek_for_new_message()
	else:
		try:
			login(browser)
			time.sleep(2)
			messsage = chek_for_new_message()
		except:
			print('Ошибка при авторизации')
	
	if messsage:
		print(messsage['response'])
		answ = input('Ответить? [Да/Нет]  ')

		if answ != '':
			if answ.lower() == 'да':

				browser.get(messsage['info']['link'])
				user_message = input('Введите ответное сообщение: ')
				browser.find_element_by_xpath("/html/body/div[2]/footer/form/div/div/div[1]/div/div[2]/div").send_keys(user_message)
				browser.find_element_by_xpath("/html/body/div[2]/footer/form/div/div/div[2]/a[1]").click()

				print('Сообщение отправлено!')
				answ = input('Следить за диалогом?')










