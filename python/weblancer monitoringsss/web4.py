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
					πππ¬ π’ππ¨π¨πππ!
					βββββββββββββββββββ
					{amount} ΠΎΡ {name}:
					βββββββββββββββββββ
						{text}
					βββββββββββββββββββ
					&#128337; {clock}
					βββββββββββββββββββ

					ΠΡΠ²Π΅ΡΠΈΡΡ? [ΠΠ°/ΠΠ΅Ρ]
					"""
					vk.send_message(response)

					if vk.wait_message().lower() == 'Π΄Π°':
						vk.send_message('ΠΠ²Π΅Π΄ΠΈΡΠ΅ ΠΎΡΠ²Π΅ΡΠ½ΠΎΠ΅ ΡΠΎΠΎΠ±ΡΠ΅Π½ΠΈΠ΅', keyboard = False)
						answer = vk.wait_message()
						weblancer.reply(answer)
						vk.send_message('Π‘ΠΎΠΎΠ±ΡΠ΅Π½ΠΈΠ΅ ΠΎΡΠΏΡΠ°Π²Π»Π΅Π½ΠΎ.', keyboard = False)
		except:

			vk.send_message('ΠΡΠΎΠΈΠ·ΠΎΡΠ»Π° ΠΊΠ°ΠΊΠ°Ρ-ΡΠΎ ΠΎΡΠΈΠ±ΠΊΠ°. Π‘Π΅ΠΉΡΠ°Ρ ΠΏΠ΅ΡΠ΅Π·Π°ΠΏΡΡΡΡΡ.', keyboard = False)
			weblancer.browser.quit()
			weblancer = my_selen.Weblancer(url)





cheking_for_new_message()