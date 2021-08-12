import vk_api
import options as o
from vk_api.bot_longpoll import VkBotLongPoll, VkBotEventType
import time

class VkBotLongPollRaw(VkBotLongPoll):
    CLASS_BY_EVENT_TYPE = {}

class Vk(object):
	"""docstring for Vk"""
	def __init__(self):
		self.token = "c067f6d5d251a343def6605cb6be50e52b1482d917298b71a01eefe0895b6186f5ebc4342436607dfbd08"
		self.vk_session = vk_api.VkApi(token=self.token)
		self.longpoll = VkBotLongPollRaw(self.vk_session, 194439099)
	
	def send_message(self,message):
		self.vk_session.method('messages.send',{'user_id': 247398975, 'random_id': int(time.time()**7), 'message':message})


	def get_message(self):
		while True:
			for i in self.longpoll.listen():
				if i.type ==  VkBotEventType.MESSAGE_NEW:
					return i.obj.body.lower()


