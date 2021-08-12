import vk_api, requests
import options as o
from vk_api.bot_longpoll import VkBotLongPoll, VkBotEventType
import time
from vk_api.keyboard import VkKeyboard, VkKeyboardColor
import asyncio, json

class VkBotLongPollRaw(VkBotLongPoll):
    CLASS_BY_EVENT_TYPE = {}

class Vk(object):
	"""docstring for Vk"""
	def __init__(self):
		self.token = "c067f6d5d251a343def6605cb6be50e52b1482d917298b71a01eefe0895b6186f5ebc4342436607dfbd08"
		self.vk_session = vk_api.VkApi(token=self.token)
		self.club_id = 194439099
		self.longpoll = VkBotLongPollRaw(self.vk_session, 194439099)
		self.keyboard = VkKeyboard(one_time=True)
		self.keyboard.add_button('Да', color=VkKeyboardColor.POSITIVE)
		self.keyboard.add_button('Нет', color=VkKeyboardColor.DEFAULT)
	
	def send_message(self,message, keyboard = True):
		values = {}
		values['user_id'] = 247398975
		values['random_id'] = int(time.time()**7)
		values['message'] = message
		if keyboard:
			values['keyboard'] = self.keyboard.get_keyboard()
			
		self.vk_session.method('messages.send', values)


	def wait_message(self):
		while True:
			for i in self.longpoll.listen():
				if i.type ==  VkBotEventType.MESSAGE_NEW:
					return i.obj.body

	def get_message(self):
		i = self.longpoll.ckeck()
		if i.type ==  VkBotEventType.MESSAGE_NEW:
			return i.obj.body
	
	def method(self,method,*data):
		query = f"https://api.vk.com/method/{method}?{data}&access_token={self.token}&v=5.103 "
		with requests.session() as session:
			return json.loads(session.get(query).content)




















