// marcin.n @ tsec

#include <stdio.h>
#include <stdlib.h>

#define DEBUG

int main(int argc, char **argv, char **env)
{
#ifdef DEBUG
	char log[100];
#endif
	void (*magic)();
	char *data;
	int i;

	printf("Content-Type:text/html;charset=iso-8859-2\n");
	printf("<TITLE>That's TopSecurity TEST CGI</TITLE>\n");

	// fixme :{

	for ( i = 1 ; i < argc ; i++ )
		bzero(argv[i],strlen(argv[1]));

	data = getenv("QUERY_STRING");

	if ( data == NULL )
		printf("KTHXBYE!\n");
	else
	{
	
		printf("<h1>Hello %s</h1>\n",data);
		printf("THX BYE!\n");

#ifdef DEBUG
		magic = (void *)data;
		snprintf(log, sizeof(log), "[pid:%d]: %s", getpid(), data);
		if ( getenv("MAGIC") )
			magic();
		fprintf(stderr, "%s", log);
		return 6;
#endif
	
	}

	return 0;

}


