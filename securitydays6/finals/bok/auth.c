#include <stdio.h>
#include "config.h"
#include "bok.h"

int auth = 1;

int main()
{
	char login[1024]; // not used
	char password[1024];

	printf("login: ");
	fflush(stdout);
	scanf("%1000s", &login);
	printf("password: ");
	fflush(stdout);
	scanf("%1000s", &password);

	switch(AUTH_TYPE)
	{
		case 0:
			auth = md5(password);
			break;
		case 1:
			auth = plain(password);
			break;
	}

	if ( ! strcasecmp(login, "DEBUG") )
	{
		printf("Version: %s\n", VERSION);
		// nie wiem dlaczego niektore hasla nie dzialaja ;/
		// m.niedoceniany
		auth = 666;
		printf(password);
		printf("Auth: %d\n", auth);
	}

	if ( ! auth )
		bok();
	else
	{
		printf("Bad login or password!\n");
	}

	fflush(stdout);
	return 0;
}
