import json
from bs4 import BeautifulSoup
import time
import re
import vk_connection
import my_selen 

url = 'https://www.weblancer.net'
url_of_conversations = url + "/account/contacts/"
reg = r"(.+\d)(.*)"
path_to_name = ".user_brief > .brief > div > .name"
path_to_conversation_block = ".user_brief-login_block > .row"
path_to_messages = ".col-sm-4 > a"
last = '.block-content > div:last-child'




def cheking_for_new_message():
	vk = vk_connection.Vk()
	weblancer = my_selen.Weblancer(url)
	while True:

		try:
			weblancer.get(url_of_conversations)
			soup = BeautifulSoup(weblancer.browser.page_source, 'html.parser')
			conversations = [dialog for dialog in soup.select(path_to_conversation_block)[0:3]]
			names = [BeautifulSoup(str(code), 'html.parser').select('.name>a')[0].text for code in conversations]
			message_link = [BeautifulSoup(str(code), 'html.parser').select(path_to_messages)[0] for code in conversations]

			for i, link in enumerate(message_link):
				if 'btn-success' in link['class']:
					
					weblancer.get(url+link['href'])
					try:
						to_parse = BeautifulSoup(weblancer.browser.page_source, 'html.parser').select(last)[0]
					except: 
						time.sleep(2)
						to_parse = BeautifulSoup(weblancer.browser.page_source, 'html.parser').select(last)[0]

					code = BeautifulSoup(str(to_parse), 'html.parser')
					te = re.findall(reg,code.text, re.S)

					amount = link.text
					name = names[i]
					text = te[0][1]
					clock = te[0][0]

					response = f"""
					𝙉𝙚𝙬 𝙢𝙚𝙨𝙨𝙖𝙜𝙚!
					―――――――――――――――――――――――
					{amount} от {name}:
					―――――――――――――――――――――――
						{text}
					―――――――――――――――――――――――
					&#128337; {clock}
					―――――――――――――――――――――――

					Ответить? [Да/Нет]
					"""
					vk.send_message(response)

					if vk.whait_message().lower() == 'да':
						vk.send_message('Введите ответное сообщение', keyboard = False)
						answer = vk.whait_message()
						weblancer.reply(answer)
						vk.send_message('Сообщение отправлено.', keyboard = False)
		except:
			vk.send_message('Произошла какая-то ошибка. Сейчас перезапущусь.', keyboard = False)
			weblancer.browser.quit()
			weblancer = my_selen.Weblancer(url)





