import telebot
import math
from telebot import types
import requests

TOKEN = '1283872158:AAH7u9g21dm8VN7HuJ808LeLVss4PqUf32w'
bot = telebot.TeleBot(TOKEN)

# Handle '/start' and '/help'
@bot.message_handler(commands=['start'])
def send_welcome(message):
    bot.reply_to(message, """\
Привет, этот бот мониторит заказы на бирже Weblancer.ru по выбранным категориям\
""",reply_markup = keyboard())








def keyboard():
    markup = types.ReplyKeyboardMarkup(one_time_keyboard = True, resize_keyboard = True)
    btn1 = types.KeyboardButton('ЗАПУСТИТЬ МОНИТОРИНГ')
    markup.add(btn1)
    return markup

bot.polling()