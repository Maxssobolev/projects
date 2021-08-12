import vk_api
import options as o
from vk_api.bot_longpoll import VkBotLongPoll, VkBotEventType

class VkBotLongPollRaw(VkBotLongPoll):
    CLASS_BY_EVENT_TYPE = {}


vk_session = vk_api.VkApi('79213583245', 'cj,jktdvfrcbvcthuttdbx4016')
vk_session.auth()
longpoll = VkBotLongPollRaw(vk_session, 194439099)

for event in longpoll.listen():

    if event.type == VkBotEventType.MESSAGE_NEW:
        if event.obj.body == 'чекни':
        	print('вот ')


"""

import requests
import json
import random
import ast
import vk_api
from vk_api.bot_longpoll import VkBotLongPoll, VkBotEventType


login, password, token = '79213583245', 'cj,jktdvfrcbvcthuttdbx4016', 'c067f6d5d251a343def6605cb6be50e52b1482d917298b71a01eefe0895b6186f5ebc4342436607dfbd08'
club_id = 194439099
vk = vk_api.VkApi(token = token, api_version = '5.103') 
vk._auth_token()



longpoll = VkBotLongPoll(vk, club_id)
print(longpoll.check())
    

url = "https://api.vk.com/method/groups.getLongPollServer?group_id="+str(club_id)+"&access_token="+token+"&v=5.103"
response = requests.get(url).json()['response']

query_get = "{server}?act=a_check&key={key}&ts={ts}&wait=25".format(
		server = response['server'],
		key = response['key'],
		ts = response['ts']
	)

longpol = requests.get(query_get)
message = json.loads(longpol.text)['updates'][0]['object']['body']

if message == 'Привет!':
	answer = 'И тебе привет!'

query_send = 'https://api.vk.com/method/{METHOD_NAME}?user_id={user_id}&random_id={random_id}&peer_id={peer_id}&message={message}&access_token={ACCESS_TOKEN}&v=5.103'.format(
	METHOD_NAME = 'messages.send',
	user_id = json.loads(longpol.text)['updates'][0]['object']['user_id'],
	random_id = random.getrandbits(64),
	peer_id = club_id,
	message =  answer,
	ACCESS_TOKEN = token
	)

requests.get(query_send)
print(requests.get(query_get).json()['ts'])
"""