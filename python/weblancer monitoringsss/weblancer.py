import re

reg = r"(.+\d)(.*)"

string = "13:18uibsdfubisdfiubdf\nssssssssssssssssssssssss"

match = re.findall(reg, string, re.DOTALL)
text = ''.join(match[1:])
print(match[0][1])