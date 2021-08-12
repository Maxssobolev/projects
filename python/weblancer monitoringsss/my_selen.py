from selenium import webdriver
from selenium.webdriver.firefox.firefox_binary import FirefoxBinary
import time

class Weblancer(object):
	def get(self, url):
			self.browser.get(url)
			time.sleep(1) #here we wait for loading
			if self.browser.title == 'Вы не авторизованы':
				self.login()

	def login(self):
		self.browser.find_element_by_xpath("/html/body/div[2]/div/div/div[2]/form/div[1]/input").send_keys("Maxsobolev")
		self.browser.find_element_by_xpath("/html/body/div[2]/div/div/div[2]/form/div[2]/input").send_keys("WVd4nr")
		self.browser.find_element_by_xpath("/html/body/div[2]/div/div/div[3]/button").click()
		time.sleep(1) #here we wait for loading
	
	def first_login(self):
		self.browser.find_element_by_xpath("/html/body/div[1]/header/div/nav/div/ul[2]/li[2]/a").click()
		self.login()
		time.sleep(1) #here we wait for loading

	def reply(self,user_message):
		self.browser.find_element_by_xpath("/html/body/div[2]/footer/form/div/div/div[1]/div/div[2]/div").send_keys(user_message)
		self.browser.find_element_by_xpath("/html/body/div[2]/footer/form/div/div/div[2]/a[1]").click()
	def __init__(self, url):
		self.url = url
		self.browser= webdriver.Firefox()
		self.browser.get(url)
		self.first_login()
