from openpyxl.utils import get_column_letter
#                           обьект листа
#								   заголовок столбца, по которому нужно получить данные
#											  промежуток, в котором ищем 
#																 'cells' (default) : массив с обьектом ячейки и некоторыми данными
# 																 'values' : только значения ячеек в столбце !по порядку!
def get_all_in_col_by_title(sheet, col_title, gap = ['A1','Z1'], view = "cells"):
	if view == "values":
		array = [] #will return
	else:
		array = {} #will return
	names = sheet[gap[0]:gap[1]][0]
	for val in names:
		title = val.value
		if title == col_title:
			column_letter = get_column_letter (val.column)
			for cell in sheet[column_letter]:
				if cell.value != title:
					if view == "values":
						array.append(cell.value)
					else:
						array[cell] = [cell.value, cell.coordinate]
	return	array
