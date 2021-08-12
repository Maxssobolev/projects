import os
import sys
import re
import time

desktop = os.path.join(os.path.join(os.environ['USERPROFILE']), 'Desktop\\') #путь до рабочего стола
reg = r"\d.\s(.+)"
for_delete = []

with open(desktop + 'matches.txt','r') as file:
	for line in file:
		file_path = re.findall(reg, line)
		if file_path != []:
			for_delete.append(file_path[0])

input('Уверены, что хотите удалить файлы, которые остались в файле Matches.txt? [ENTER]')
for el in for_delete:
	os.remove(el)
	print(os.path.basename(el) + ' удален')