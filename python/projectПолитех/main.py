import telebot
import math
from telebot import types
import requests

from weblancer import web4



#DataBase-------------------------------------------------------------------------------
subjects = ['Русский','Математика','Физ-ра','Физика','Философия','История', 'Английский']
month = {
'week1' :{
    'Понедельник' : {
        subjects[0] : 5,
        subjects[1] : 4,
        subjects[2] : 1
        },
    'Вторник' : {
        subjects[0] : 5,
        subjects[1] : 4,
        subjects[3] : 4
        },
    'Среда': {
        subjects[4] : 5,
        subjects[6]:  0,
        subjects[5] : 4
        },
    'Четверг' : {
        subjects[0] : 3,
        subjects[1] : 5,
        subjects[2]:  2
        },
    'Пятница' : {
        subjects[5] : 0,
        subjects[1] : 0,
        subjects[2] : 0
        }
},
'week2' :{
    'Понедельник' : {
        subjects[0] : 4,
        subjects[1] : 1,
        subjects[2] : 2
        },
    'Вторник' : {
        subjects[0] : 5,
        subjects[1] : 4,
        subjects[3] : 4
        },
    'Среда': {
        subjects[4] : 5,
        subjects[6]:  0,
        subjects[5] : 4
        },
    'Четверг' : {
        subjects[0] : 3,
        subjects[1] : 5,
        subjects[2]:  2
        },
    'Пятница' : {
        subjects[5] : 1,
        subjects[1] : 0,
        subjects[2] : 0
        }
},
'week3' :{
    'Понедельник' : {
        subjects[0] : 5,
        subjects[1] : 4,
        subjects[2] : 1
        },
    'Вторник' : {
        subjects[0] : 5,
        subjects[1] : 4,
        subjects[3] : 4
        },
    'Среда': {
        subjects[4] : 5,
        subjects[6]:  0,
        subjects[5] : 4
        },
    'Четверг' : {
        subjects[0] : 3,
        subjects[1] : 5,
        subjects[2]:  2
        },
    'Пятница' : {
        subjects[5] : 0,
        subjects[1] : 0,
        subjects[2] : 0
        }
},
'week4' :{
    'Понедельник' : {
        subjects[0] : 5,
        subjects[1] : 4,
        subjects[2] : 1
        },
    'Вторник' : {
        subjects[0] : 5,
        subjects[1] : 4,
        subjects[3] : 4
        },
    'Среда': {
        subjects[4] : 5,
        subjects[6]:  0,
        subjects[5] : 4
        },
    'Четверг' : {
        subjects[0] : 3,
        subjects[1] : 5,
        subjects[2]:  2
        },
    'Пятница' : {
        subjects[5] : 1,
        subjects[1] : 1,
        subjects[2] : 1
        }
}
}
min = { #80 - условное количество баллов для допуска к зачету, 0 - количество набранных
    subjects[0]:      [80, 0],
    subjects[1]:      [80, 0],
    subjects[2]:      [80, 0],
    subjects[3]:      [80, 0],
    subjects[4]:      [80, 0],
    subjects[5]:      [80, 0],
    subjects[6]:      [80, 0]
}
#/DataBase-------------------------------------------------------------------------------


TOKEN = '1044374037:AAGD2n4hoqK3IDmq6INjUF5g1f1jJlmk_HI'
bot = telebot.TeleBot(TOKEN)

@bot.message_handler(func=lambda message: True)
def chek(message):
    id = message.chat.id
    n = 0
    np = 0
    if message.text in subjects:
        for thisweek in month:
            for weekday in month[thisweek]:
                try:
                    min[message.text][1] = min[message.text][1] + month[thisweek][weekday][message.text]
                    n += 1
                    if month[thisweek][weekday][message.text] > 0:
                        np += 1

                except KeyError:
                    n += 0
        if min[message.text][1] < min[message.text][0]:
            textMessage = '<b>Нужно набрать еще %s баллов, чтобы получить допуск к зачету.</b>\n• В следующем месяце, вас ожидает %s занятий\n• Настоятельно рекомендую тебе посетить минимум %s из них, чтобы перейти порог.\n\nВ прошлом месяце вы посетили %s уроков\nВаша посещаемость составляет %s\n\n<i>%s</i>\n%s' % (str(min[message.text][0] - min[message.text][1]), str(n), str(math.ceil((min[message.text][0] - min[message.text][1])/5)),str(np),str((np/n)*100) + '%', requests.get('http://api.forismatic.com/api/1.0/?method=getQuote&key=457653&format=json&lang=ru').json()['quoteText'],requests.get('http://api.forismatic.com/api/1.0/?method=getQuote&key=457653&format=json&lang=ru').json()['quoteAuthor']  )

            
            bot.send_message(id, textMessage ,parse_mode='html',reply_markup = keyboard())

        else:
            bot.send_message(id,'У тебя уже ' + str(min[message.text][1]) + ' из ' + str(min[message.text][0])+' баллов.')
            bot.send_message(id,'Поздравляем, ты допущен к сдаче зачета!',parse_mode='html',reply_markup = keyboard())
    elif message.text == '/start':
        bot.send_message(id, 'Привет, напиши название предмета, по которому хочешь получить сводку :)',reply_markup = keyboard())

    else:
        bot.send_message(id,'Некорректное название предмета')
def keyboard():
    markup = types.ReplyKeyboardMarkup(one_time_keyboard = True, resize_keyboard = True)
    btn1 = types.KeyboardButton('Русский')
    btn2 = types.KeyboardButton('Математика')
    btn3 = types.KeyboardButton('Физ-ра')
    btn4 = types.KeyboardButton('Философия')
    btn5 = types.KeyboardButton('История')
    btn6 = types.KeyboardButton('Английский')

    markup.add(btn1,btn2,btn3,btn4,btn5,btn6)
    return markup

bot.polling()
