""" security module """

import os

def chroot(path):
	try:
		os.chroot(path)
		os.chdir('/')
		return True
	except:
		return False

def dropPrivileges(uid,gid):
	try:
		os.setregid(gid, gid)
		os.setreuid(uid, uid)
		# niby zbedne ;>
		if os.getuid() != uid or os.getgid() != gid or os.geteuid() != uid or os.getegid() != gid:
			return False
		return True
	except:
		return False

