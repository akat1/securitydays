#! /usr/bin/python
# crap code ;)

import security
from error import error
import sys
import string
import time
import random
import database
import md5
import logger

def checkLogin(login, password):

	login = db.escapeString(login);
	password = db.escapeString(Md5(password))

	if len(db.query('SELECT id FROM users WHERE login="'+login+'" AND password="'+password+'"')):
		return True
	else:
	    	return False

def Md5(str):
	return md5.md5(str).hexdigest()

def Print(str):
	print str
	sys.stdout.flush()

def Printn(str):
	sys.stdout.write(str)
	sys.stdout.flush()

def congratz():
	Print("")
	Print("BRAWO! Udalo Ci sie!")
	Print("HASLO: LOSTKEYS")
	Print("")
	sys.exit(0)

def readline():
	return string.strip(sys.stdin.readline())

def motd():
	Print("")
	Print("  ____  _____  ____  ___  ____  ___  __  __  ____  ____  ____  _  _ ")
	Print(" (_  _)(  _  )(  _ \/ __)( ___)/ __)(  )(  )(  _ \(_  _)(_  _)( \/ )")
	Print("   )(   )(_)(  )___/\__ \ )__)( (__  )(__)(  )   / _)(_   )(   \  / ")
	Print("  (__) (_____)(__)  (___/(____)\___)(______)(_)\_)(____) (__)  (__) ")
	Print("")
	Print("  TOPSECURITY - Biuro Obslugi Klienta ")
	Print("")
	Print("  Jezeli nie jestes pracownikiem TOPSECURITY zaloguj sie jako 'guest'")
	Print("")
	Print("")

def version():
	Print("BOKbox by Top$ecurity - 0.2.13b")

def talk():
	Print("Sprawdzam dostepnosc konsultantow...")
	time.sleep(1)
	Print("Brak wolnych konsultantow...")
	for i in xrange(1,5):
		time.sleep(3)
		Print("Prosze czekac...")
	Print("Przykro nam, w tej chwili wszyscy konsultanci sa zajeci.")
	Print("Prosze sprobowac pozniej")

def listC():

	konsultanci = ["Adam Nowak (id:1)","Marian Pomocny (id:17)","Andrzej Kowalski (id:19)","Agnieszka Przebiegla (id:20)"]
	wolni = random.sample(konsultanci, random.randint(0,len(konsultanci)))

	for x in wolni:
		Print(x)
	
def exit():
	Print("Bye! Klucz sesji: "+hex(random.randint(0x0,0xFFFFFFFFFFFFFFFFFFFF)))
	sys.exit(0)

def dump():
	Print("Sesja zapisana, klucz sesji: "+hex(random.randint(0x0,0xFFFFFFFFFFFFFFFFFFFF)))

def info():
	version()
	Print('')
	Print('Aktualny identyfikator sesji: '+hex(random.randint(0x0,0xfffffffffffffffffff)))
	Print('System Operacyjny : FreeBSD-current')
	Print('Uptime            : disabled')
	Print('Active Sessions   : enabled')
	Print('Talk Server       : enabled')
	Print('')

def contact():
	Print('Top$ecurity S.A.')
	Print('ul. Lesna 6/666')
	Print('69-997 Bezpiecznowo')
	Print('')
	Print('tel. 0700-69-6969')
	Print('e-mail: biuro@topsecurity.sec')

def more(x):
	try:
		x = string.replace(x,'(','')
		x = string.replace(x,'<','')
		x = string.replace(x,'\'','"')
		res = db.query('SELECT login, imie, nazwisko, id, dzial FROM konsultanci WHERE id="'+x+'"')
	except:
		Print('Brak danych')
		return

	if len(res) < 1:
		Print('Brak danych')
		return

	Print('')
	Print('Login: '+res[0][0])
	Print('Imie: '+res[0][1])
	Print('Nazwisko: '+res[0][2])
	Print('Id: '+res[0][3])
	Print('Dzial: '+res[0][4])
	Print('')

def talkTo(x):
	try:
		# na wszelki wypadek
		x = string.replace(x,'(','')
		x = string.replace(x,'<','')

		res = db.query('SELECT imie, nazwisko, login FROM konsultanci WHERE id="'+db.escapeString(x)+'"')
	except:
		res = ()

	if len(res) < 1:
		Print('Brak konsultanta')
		return

	Print('')
	Print('Rozmowa z '+res[0][0]+' '+res[0][1]+' ('+res[0][2]+')')
	Print('')
	Print('<'+res[0][2]+'> Niestety w chwili obecnej jestem niedostepny. Prosze poczekac lub wyslac zapytanie e-mailem')
	Print('<'+res[0][2]+'> Pozdrawiam,');
	Print('<'+res[0][2]+'> '+res[0][0]+' '+res[0][1]);
	Print('')
	Print('Rozmowa zakonczona, klucz rozmowy: '+res[0][2]+Md5(str(random.randint(0,0xffffff))))
	Print('')

def help():
	Print("version - wersja systemu")
	Print("talk    - rozmowa z wolnym konsultantem")
	Print("talk_to - rozmowa z wybranym konsultantem")
	Print("list    - wyswietla dostepnych konsultantow")
	Print("more    - wyswietla informacje odnosnie konsultanta")
	Print("info    - wyswietla informacje dotyczace systemu")
	Print("contact - wyswietla dane kontaktowe")
	Print("dump    - zapisanie sesji w systemie")
	Print("exit    - wyjscie z systemu")
	Print("help    - pomoc")

def prompt():

	Printn(login+'$ ')
	command = readline()
	logSession.log(command)
	command = string.split(command,' ',1)

	

	if len(command) == 0:
		error(3)

	command[0] = string.upper(command[0])

	for com in commands:
		if command[0] == com[0]:
			com[1]();
			return

	for com in commandsArg:
		if command[0] == com[0]:
			if len(command) > 1:
				com[1](command[1])
			else:
				Print('SYNTAX ERROR')
			return

	Print('UNKNOWN COMMAND')

###############
sys.stderr.close()

db = database.Database('127.0.0.1','bok','test123','bok')
logSession = logger.Logger('log.txt')

# security stuff
# chroot

if not security.chroot('/home/zad7/env/'):
	error(0)

if not security.dropPrivileges(1001,1001):
	error(1)

motd()

Printn('login: ')
login = readline()

if login != 'guest':
	Printn('password: ')
	password = readline()
	time.sleep(5)
	if not checkLogin(login, password):
		Print("")
		Print("LOGIN FAILED!")
		Print("")
		sys.exit(0)

if login == 'admin':
	congratz()

Print("")

commands = [ ('VERSION',version), ('TALK',talk), ('LIST',listC), ('HELP',help), ('EXIT',exit), ('DUMP',dump), ('INFO',info), ('CONTACT',contact) ]
commandsArg = [('MORE',more),('TALK_TO',talkTo)]

logSession.log('logged as: '+login)

while True:
	prompt()

