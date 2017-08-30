#include <stdio.h>

#define PASSWD		"/home/shell1cgi/.passwd"
#define SECRETFILE	"/home/shell1cgi/secret.html"

char interactive = 0;
int accept = 0;

void
error(char *emsg)
{
	char buf[128];
	
	if ( interactive )
	{
		printf("An error has occured!\nPress ENTER\n");
		getc(stdin);
	}

	snprintf(buf, sizeof(buf)-1, "<html><h1>%s</h1></html>", emsg);
	printf(buf);
	fprintf(stderr, "Exiting...");
	exit(-127);
	return 0;
}

int
verifyPassword(char *pass, char *real)
{
	char p[520];
	int i = 0 ;

	if ( strlen(pass) > 512 )
		error("Nice try...");

	strcpy(p, pass);

	for ( i = 0 ; i < strlen(pass) ; i++ )
		p[i] = p[i]++;

	for ( i = 0 ; i < strlen(real) ; i++ )
	{
		if ( ! p[i] )
			return 0;
		else 
		{
			if ( p[i] != real[i] )
				return 0;
		}
	}	

	return 1;
}

void
logAcc(void)
{
	char buf[300];
	int t = time();
//	FILE *ld;

// 	XXX: kiedy¶ to skoñczê :P - mnidoceniany
//	if ( interactive )
//	fprintf(stderr,"%s
//	else
//		sprintf(
//		fprintf(ld, "%d - %d\n", t, accept);
//	...

	return;
}

int
main(int argc, char **argv)
{
	FILE *fd;
	char buf[1024];
	char *passwd;
	char real[1024];

	if ( argv[1] )
	{
		if ( ! strcmp(argv[1],"-i") )
			interactive = 1;
	}

	fd = fopen(PASSWD,"r");

	if ( !fd )
		error("Can't open passwd file");
	
	fgets(real, sizeof(buf)-1, fd);

	fclose(fd);

	if ( interactive )
	{
		passwd = buf;
		printf("Enter password: ");
		fgets(buf, sizeof(buf)-1, stdin);
	}
	else
		passwd = getenv("MAGIC_PASSWORD");

	if ( ! passwd ) 
		error("MAGIC_PASSWORD is not set!");

	accept = verifyPassword(passwd, real);

	logAcc();

	if ( accept )
	{
		fd = fopen(SECRETFILE, "r");

		if ( ! fd )
			error("Can't open seretfile...");

		while ( fgets(buf, sizeof(buf)-1, fd) )
			puts(buf);

		fclose(fd);
	}
	else
	{
		error("BAD PASSWORD");
	}

	return 0;
}

