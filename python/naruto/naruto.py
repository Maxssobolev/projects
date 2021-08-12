import requests
from bs4 import BeautifulSoup
from urllib.request import urlopen
import os
import time
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.firefox.firefox_binary import FirefoxBinary
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.common.action_chains import ActionChains
url = "http://fan-naruto.ru/load/anime_onlajn/naruto_2_sezon_ozvuchka_2x2_onlajn/137-1-0-2490"

def wait_for_element_to_load(driver, element):
    try:
        return WebDriverWait(driver, 20).until(lambda driver : driver.find_element_by_xpath(element))
    finally:
        pass


chrome_options = Options()
chrome_options.add_extension("C:\\Users\\igrus\\Desktop\\projects\\python\\naruto\\adblock.crx")
browser = webdriver.Chrome("C:\\Users\\igrus\\Desktop\\projects\\python\\naruto\\chromedriver.exe", chrome_options=chrome_options)
time.sleep(5)

browser.get(url)
time.sleep(5)
#
seria = browser.find_element_by_css_selector(".lips>[data-author='036']")
ActionChains(browser).move_to_element(seria).perform()
seria.click()

time.sleep(10)
ActionChains(browser).move_to_element(browser.find_element_by_xpath("/html/body/div[1]/div[1]/div[1]/div[2]/div[2]/div[2]/div[1]/p[2]")).perform()
open_in_full = browser.find_element_by_xpath("//*[@id=\"video_player\"]/div/div[3]/div[5]/div")
browser.execute_script("console.log(arguments[0])",open_in_full)
open_in_full.click()


 

"""
ActionChains(browser).move_to_element(open_in_full).perform()
ActionChains(browser).double_click(open_in_full).perform()


open_full = WebDriverWait(browser, 10).until(
EC.element_to_be_clickable((By.XPATH, open_full_path)))
open_full.click()

while 1==1:
	try:
		open_full_path = "/html/body/div[2]/div[1]/div/div[2]/div[4]/div[1]/div[1]/div[1]/div[1]/div/pjsdiv/pjsdiv[18]/pjsdiv[1]/pjsdiv[58]"
		open_full = browser.find_element_by_xpath(open_full_path)
		open_full.click()
		if open_full:
			break
	except:
		browser.find_element_by_xpath("/html/body/div[2]/div[1]/div/div[2]/div[4]/div[1]/div[1]/div[1]/div[1]/div/pjsdiv/pjsdiv[18]/pjsdiv[3]").click()





player_path = "/html/body/div[2]/div[1]/div/div[2]/div[4]/div[1]/div[1]/div[1]/div[1]/div/pjsdiv/pjsdiv[12]/pjsdiv[1]/pjsdiv"

player.click()



propusk_path = "/html/body/div[5]/div[1]/div[2]/div/div[2]/div[1]/div[1]/div[2]/div[2]/div[4]"
propusk = WebDriverWait(browser, 10).until(
EC.element_to_be_clickable((By.XPATH, propusk_path)))
propusk.click();



browser.find_element_by_css_selector("[data-target='#login_form']").click()
browser.find_element_by_css_selector(" [name='login']").send_keys("Maxsobolev")
browser.find_element_by_css_selector(" [name='password']").send_keys("WVd4nr")
browser.find_element_by_xpath("/html/body/div[2]/div/div/div[3]/button").click()

for i in browser.find_element_by_css_selector('.text-muted'):
	print(i.attrs["data-original-title"])

while 1==1:
	
	print("hello")
	time.sleep(60)
	browser.refresh()
	alert = browser.switch_to_alert()
	alert.accept()
"""