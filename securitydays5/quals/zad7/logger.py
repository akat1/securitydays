import os
import string
from error import error

class Logger:

	__filename = None

	def __init__(self, filename):
		self.__filename = filename

	def log(self, x):
		try:
			a = open(self.__filename,'a')
			x = string.strip(x)
			a.write('['+str(os.getpid())+'] '+x+'\n')
			a.close()
		except:
			error(100)

