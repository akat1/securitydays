#! /usr/bin/python

import security
import sys
import string
import random
import time
from error import error

def Print(x):
	print x
	sys.stdout.flush()

def ReadLine():
	return string.strip(sys.stdin.readline())

def Challenge(key):

	global logged;

	if logged > 0:
		Print("-ERR");
		return

	i = random.randint(10,15)
	i = 0

	while i > 0:

		c = random.randint(0,2**512-1)
		Print("+CHLG "+str(c));

		try:
			x = int(ReadLine());
		except:
			Print("-ERR OMG")
			sys.exit(0)

		if x >= 2**512:
			Print("-ERR OMG")
			sys.exit(0)

		if (key & c) != x:
			Print("-ERR OMG");
			sys.exit(0)

		i -= 1;

	logged = 1
	global user
	Print("+HELLO "+user)

##########################################

def comUser(x):
	global user
	global logged
	if logged == 0:
		if user == None:
			user = x
			Print("+OK")
		else:
			Print("-ERR")
	else:
		Print("-ERR already authenticated")

def comVers():
	global logged
	if logged != 0:
		Print("+ Version 0.12b");
	else:
		Print("-ERR");

def comFlush():
	global logged

	if logged == 0:
		Print("-ERR");
		return
	
	if user == "root":
		Print("BRAWO! UDALO CI SIE!");
		Print("Haslo na strone: THEDOWNWARDSPIRAL")
		return
	
	Print("-EPERM");

def comList(x):
	if logged == 0:
		Print("-ERR")
	else:
		Print("-ERR Syntax")

def comAdd(x):
	if user != "root":
		Print("-ERR")
	else:
		Print("-ERR Syntax")

def comRemove(x):
	if user != "root":
		Print("-EPERM")
	else:
		Print("-ERR Syntax")

def comPasswd():
	if logged == 0:
		Print("-ERR");
		return
	print("-------+----------+-------------------------------------------------------------------+--------");
	print("user_id| authtype | magicNumber                                                       | perm   ");
	print("-------+----------+-------------------------------------------------------------------+--------");
	print("0      | AND      | 3716BA50165BCA887ECCBE20576BDFE56937F6C008B7414CA90E1D9034593CAD  | ARFLP ");
	print("10     | AND      | C0FFE92B31E5DE35624E74D7E9089BDA7B5E90829C7AAB2432F93C94C85E8210  | LP ");
	print("1      | AND      | BADBADBADBADBADBADBADBADBADBADBADBADBDABADBADBDABDBADBDADBADABDD  | AR ");
	print("-------+----------+-------------------------------------------------------------------+--------");

def comVrfy(x):
	Print("\x42\x98\x32\xf3\x3dProgress: %d\x00\x99\x0a");
	sys.exit(0);

def comMotd():
	if logged > 0:
		Print("admin:    niedzielny.koder <>");
		Print("tech:     marcin.niedoceniany <>");
		Print("tech:     andrzej.kowalksi <>");
		return;
	else:
		Print("-ERR")

def comLoad():
	if logged != 0:
		Print("+INFO Load: 0.00 0.00 0.00");
		Print("+INFO rl0 in : "+str(1024+random.randint(-500,500))+" kbps");
		Print("+INFO rl0 out: "+str(1024+random.randint(-500,500))+" kbps");
		Print("+INFO l0 : "+str(3+random.randint(-3,10))+" kbps");
		Print("+INFO l0 : "+str(5+random.randint(-5,5))+" kbps");
	else:
		Print("-ERR");
		
def comNetstat():
	while True:
		Print("+NETSTAT")
		Print("+NETSTAT rl0 in : "+str(1024+random.randint(-500,500))+" kbps");
		Print("+NETSTAT rl0 out: "+str(1024+random.randint(-500,500))+" kbps");
		Print("+NETSTAT l0 : "+str(3+random.randint(-3,10))+" kbps");
		Print("+NETSTAT l0 : "+str(5+random.randint(-5,5))+" kbps");
		
		if ( random.randint(0,10) == 0 ):
			Print("-ERR Broken frame");
			Print("-ERR content: "+hex(random.randint(0,0xfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff)));

		time.sleep(5);

def comInfo():
	if logged != 0:
		Print("System: TopSecurityFW 0.12b")
		Print("UPS   : Present - 100%")
		Print("AC    : Present - online")
		Print("LDisk : Disabled")
		Print("Switch: Disabled")
		Print("Bridge: Disabled")
		Print("RSEC  : Enabled");
	else:
		Print("-EPERM");

def comHelp():
	global logged
	if logged != 0:
		Print("+ EXIT QUIT VERS FLUSH LIST ADD REMOVE")
		Print("+ DBPS VRFY INFO LOAD  MOTD NS  COM");
		Print("+ OK")
	else:
		Print("-ERR")

def comCom(x):
	if logged != 0:
		Print("-EPERM");
	else:
		Print("-ERR");

def comExit():
	Print("+OK THXBYE!")
	sys.exit(0)

def comDbps():
	time.sleep(10)
	comPasswd()
	Print("-ERR")

def comChallenge():
	key = 0;
	if user == "root":
		key = 0x3716BA50165BCA887ECCBE20576BDFE56937F6C008B7414CA90E1D9034593CADA77C3213F0755CD12147AF83DE5295AB9BADEF5A5EFF800C4FFF51AD94D984CA
	if user == "marcin":
		key = 0xC0FFE92B31E5DE35624E74D7E9089BDA7B5E90829C7AAB2432F93C94C85E8210735005E6157989497F535E4D987FAF3066E0AF04C9D248EAE5F472B3C4A9BA04

	if key == 0:
		Print("-ERR bad user")
		return

	Challenge(key);

##########################################

def interact():
	command = ReadLine()
	command = string.split(command,' ',1)

	command[0] = string.upper(command[0]);

	for com in commands:
		if com[0] == command[0]:
			com[1]()
			return

	for com in commandsArg:
		if com[0] == command[0]:
			if len(command) > 1:
				com[1](command[1])
			else:
				Print("-ERR what did you say?")
			return

	Print("-ERR ?!?!")



###########################################

sys.stderr.close()

if not security.chroot('/home/zad6/env/'):
        error(0)

if not security.dropPrivileges(1002,1002):
        error(1)

commands = [("LOAD",comLoad),("HELP",comHelp),("EXIT",comExit),("QUIT",comExit),("CHLG",comChallenge),("FLUSH",comFlush),("VERS",comVers),("NS",comNetstat),("DBPS",comDbps),("INFO",comInfo),("MOTD",comMotd)]
commandsArg = [("USER",comUser),("ADD",comAdd),("REMOVE",comRemove),("LIST",comList),("VRFY",comVrfy),("COM",comCom)]

Print("?")
Print("?TopSecurity - main-fw")
Print("?Unauthorized access to this computer system and/or software is prohibited")
Print("?Use of this system constitutes consent to security testing and monitoring")
Print("?")
Print("?TopSecurityFW                                                       0.12b")
Print("?")
Print("+OK")

logged  = 0
user = None

while True:
	interact()

