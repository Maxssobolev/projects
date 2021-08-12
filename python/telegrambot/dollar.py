import urllib.request
import requests
from requests.exceptions import HTTPError
from http.cookiejar import CookieJar
import xml.etree.ElementTree as ET


# Ежедневные курсы валют ЦБ РФ

def get_current_exchange(code):
	url = "http://www.cbr.ru/scripts/XML_daily.asp"
	try:
	    req=urllib.request.Request(url, None, {'User-Agent': 'Mozilla/5.0 (X11; Linux i686; G518Rco3Yp0uLV40Lcc9hAzC1BOROTJADjicLjOmlr4=) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.157 Safari/537.36','Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8','Accept-Charset': 'ISO-8859-1,utf-8;q=0.7,*;q=0.3','Accept-Encoding': 'gzip, deflate, sdch','Accept-Language': 'en-US,en;q=0.8','Connection': 'keep-alive'})
	    cj = CookieJar()
	    opener = urllib.request.build_opener(urllib.request.HTTPCookieProcessor(cj))
	    response = opener.open(req)
	    raw_response = response.read().decode('utf8', errors='ignore')
	    response.close()
	except urllib.request.HTTPError as inst:
	    output = format(inst)
	    print(output)

	myroot = ET.fromstring(raw_response)
	for el in myroot:
		if el.attrib['ID'] == code:
			for x in el:
				if x.tag == 'Value':
					return x.text
