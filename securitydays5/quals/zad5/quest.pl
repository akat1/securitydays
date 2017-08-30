#!/usr/bin/perl -w
use strict;

my $chroot_dir = "/tmp/";
my $good_uid = 502;
my $good_gid = 1000;

chdir $chroot_dir;

if ( (chroot $chroot_dir)  != 1 ) {
	print "BLAD1 - skontaktuj sie z administratorem SecurityDays\n";
	exit;
}

$( = $) = $good_gid;
$< = $> = $good_uid; 

sub security_test {
	if(!( ($( == $))&&($( == $good_gid)&&($< == $>)&&($< == $good_uid) )){
		print "BLAD2 - skontaktuj sie z administratorem SecurityDays\n";
		exit;
	}
}

my $level = 0;
# 0 - pierwsze menu - ifconfig+tcpdump+telnet
# 1 - drugie menu - logowanie - loginj
# 2 - drugie menu - logowanie - pass
# 3 - trzecie menu mail+keys
# 4 - fake logowanie na admina

my $user;


################# hash part
my $int_32max = 4294967296;
my $good_hash = 2085664678;

my %letters = ( 'a' => 61,
		'b' => 73 ,
		'c' => 79 ,
		'd' => 67 ,
		'e' => 37 ,
		'f' => 107 ,
		'g' => 83 ,
		'h' => 131 ,
		'i' => 59 ,
		'j' => 71 ,
		'k' => 31 ,
		'l' => 53 ,
		'm' => 137 ,
		'n' => 109 ,
		'o' => 43 ,
		'p' => 113 ,
		'q' => 89 ,
		'r' => 103 ,
		's' => 47 ,
		't' => 23 ,		
		'u' => 41 ,
		'v' => 29 ,
		'w' => 101 ,
		'x' => 97 ,
		'y' => 127 ,
		'z' => 19 );

my @wagi = qw /1 2 3 5 7 11 13 17/;


sub make_int32 {
	return ($_[0] % $int_32max);
	}

sub hash {
	my $text = $_[0];
	my $value = 1;
	my $len =  length $text;
	my $i = 1;
	for(my $i = 0; $i < $len; $i++){
		$value *= $wagi[$i]*$letters{substr($text,$i,1)};
				
		}
	return make_int32($value);
}

################


sub prompt() {
if ($level == 0) { 
	print "guest\@net: ";
	}
elsif ($level == 1) {
        print "\n===Formularz logowania===\nUser: ";
	}
elsif ($level == 2) {
	print "Password: ";
     }
elsif ($level == 3) {
	print "admin\@topsec: ";
	}
elsif ($level == 4) {
	print "Podaj haslo: ";
	}
}


sub l0_help() {
print "Dostepne polecenia:\n\tifconfig - statystyki interfejsu sieciowego\n\ttcpdump - analizator ruchu sieciowego\n\ttelnet - klient telnet\n\tarp - wyswietlenie tabeli arp\n\troute - wyswietlenie tabeli routingu\n\tadmin - logowanie na konto administratora\n\tinfo - informacje o serwerze\n\thelp - pomoc\n\texit - wylogowanie\n\n";
}

sub l0_info(){
print "Serwer >>NET<<\nProsimy o uzytkowanie serwerow zgodnie z regulaminem.\nMaszyny w naszej sieci pracuja na procesorach 32 bitowych firmy XXX.\nAkutalnie w sieci uruchomione jest oprogramowanie w fazie testow. W razie problemow prosze o kontakt (ew. gniazdko;-) joke).\n\tadmin\@topsec\n\n";
}

sub l0_ifconfig() {
print "Device: fxp0\nMedia Type: FastEthernet\nHardware address: 00:50:8b:32:15:87\nIpv4 address: 10.12.22.50 Netmask 255.255.255.224\nIpv6 - disabled\n\n";
}

sub l0_tcpdump() {
print "0x0000:  0050 8b32 1587 0050 8b31 875a 0800 4500\n0x0010:  0055 a1a3 4000 4006 179f 0a33 11bb 0a0c\n0x0020:  1632 1388 06c9 f8fe 28be f917 eac6 8018\n0x0030:  4000 81a8 0000 0101 080a 00eb 891d 00eb\n0x0040:  891d 0a3d 3d3d 466f 726d 756c 6172 7a20\n0x0050:  6c6f 676f 7761 6e69 613d 3d3d 0a55 7365\n0x0060:  723a 20\n\n";
}

sub l0_telnet_error() {
print "Zle parametry\nSposob uzycia:\ntelnet cel port\n\tcel - adres ip docelowego komputera\n\tport - docelowy port uslugi\n\n";
}

sub l0_telnet_good_pass() {
	$level = 1;
}

sub l0_telnet_bad_pass() {
	sleep 2;
	print "Host nieosiagalny\n\n";
}

sub l0_admin() {
	$level = 4;
}

sub l0_todo() {
	print "Opcja w trakcie realizacji.\n\n";

}

sub l2_good_pass() {
	$level = 3;
}

sub l2_bad_pass() {
	my $tmp_hash = $_[0];
	$level = 1;
	sleep 2;
	print "Bledne haslo\n\nDEBUG: (wersja testowa oprogramowania)\nAktualna wartosc funkcji skrotu: $tmp_hash\nWymagana wartosc funkcji skrotu: $good_hash\n";
}

sub l2_bad_pass_regex() {
	$level = 1;
	print "Haslo moze zawierac maksymalnie 8 znakow ze zbioru malych liter\n\n";
}


sub l3_help() {
	print "Dostepne polecenia:\n\tmail - sprawdzenie skrzynki pocztowej\n\tkeys - wyswietlenie kluczy asymetrycznych\n\tstat - statystki serwerow\n\tinfo - informacje o serwerze\n\thelp - pomoc\n\texit - wylogowanie\n\n";
}

sub l3_keys() {
	print "Twoj klucz publiczny: e=173, n=8549\nTwoj klucz prywatny: d=2369, n=8549\nZgromadzone klucze publiczne:\n\tmarketing\@topsec: e=47, n=7373\n\tszef\@topsec: e=87, n=6943\n\tfinanse\@topsec: e=17, n= 3233\n\n";
}

sub l3_mail() {
	print "Dostepna 1 wiadomosc.\nOd szef\@topsec\nDo admin\@topsec\nKlucz wiadomosci: 3507\nTresc:\n\\x5c\\xb9\\x5f\\xbc\\x51\\xca\\x3e\\xbb\\x51\\xa6\\x47\\xb8\\x52\\xa5\\x57\\xae\\x3e\\xbe\\x55\\xa4\\x50\\xa8\\x44\\xb2\\x52\\xae\\x4d\\xcb\\x5b\\xbf\\x5f\\xbb\\x30\\xcb\\x56\\xaa\\x4d\\xa7\\x51\\xcb\\x4a\\xa4\\x24\\xcb\\x7c\\x8a\\x7a\\x9e\\x75\\xeb\n\n";
}

sub l3_info(){
	print "Serwer >>TOPSEC<\nProsimy o uzytkowanie serwerow zgodnie z regulaminem.\nMaszyny w naszej sieci pracuja na procesorach 32 bitowych firmy XXX.\nAkutalnie w sieci uruchomione jest oprogramowanie w fazie testow. W razie problemow prosze o kontakt (ew. gniazdko;-) joke).\nW przygotowaniu jest transparentna opcja szyfrowania wiadomosci algorytmem xor za pomoca losowego klucza (unikalnego dla kazdej wiadomosci) zaszyfrowanego algorytmem rsa - dzieki temu wasze wiadomosci beda bezpieczne.\n\tadmini\@topsec\n\n";
}

sub error() {
	print "Nieznane polecenie lub bledne parametry\n";
}


security_test;
prompt();
while(defined(my $line = <>)) {
	security_test;
	chomp($line);
	if ($line ne "") {
	if ($level == 0) {
		if ($line =~ /^\s*telnet.*/) { 
			if ($line =~ /^\s*telnet\s*([0-9\.]+)\s+(\d+)\s*$/ ) {
				if ($1 eq "10.51.17.187" && $2 == 5000) { l0_telnet_good_pass(); }
				else { l0_telnet_bad_pass; }
			}
			else { l0_telnet_error(); }
		}
		elsif ($line =~ /^\s*admin\s*$/) { l0_admin();}
		elsif ($line =~ /^\s*help\s*$/) { l0_help();}
		elsif ($line =~ /^\s*info\s*$/) { l0_info(); }
		elsif ($line =~ /^\s*ifconfig\s*$/) { l0_ifconfig(); }
		elsif ($line =~ /^\s*tcpdump\s*$/) { l0_tcpdump(); }
		elsif ($line =~ /^\s*arp\s*$/) { l0_todo(); }
		elsif ($line =~ /^\s*route\s*$/) { l0_todo(); }
		elsif ($line =~ /^\s*exit\s*$/) { exit; }
		else { error(); }
	
	}

	elsif ($level == 4) {
		sleep 2;
		print "Zle haslo\n";
		$level = 0;
	}
	elsif ($level == 1) {
		$user = $line;
		$level = 2;
	}
	elsif ($level == 2) {
		my $tmp_hash;
		if (!($line =~ /^\s*([a-z]{1,8})\s*$/)) { l2_bad_pass_regex(); }
		elsif ((($tmp_hash = hash($1)) == $good_hash) && ($user eq "admin")) { l2_good_pass(); }
		else { &l2_bad_pass($tmp_hash); } 
	}
	elsif ($level == 3) {
		if ($line =~ /^\s*help\s*$/) { l3_help(); }
		elsif ($line =~ /^\s*mail\s*$/) { l3_mail();}
		elsif ($line =~ /^\s*info\s*$/) { l3_info(); }
		elsif ($line =~ /^\s*keys\s*$/) { l3_keys(); }
		elsif ($line =~ /^\s*stat\s*$/) { l0_todo(); }
		elsif ($line =~ /^\s*exit\s*$/) { exit; }
		else { error(); }
						
	}
	}
prompt();
}
