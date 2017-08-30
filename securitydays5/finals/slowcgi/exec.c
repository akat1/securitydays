// written in ts labz!

#include <stdio.h>
#include <string.h>

#define PASSWORD "changeme"

void safecpy(char *to, int len, char *from)
{
	snprintf(to,len,from);
	return;
}

int main(int argc, char **argv, char **env)
{
	unsigned int uid = 0xdeaddead;
	char upwd[100];
	char exec[1000];
	char *password = PASSWORD;

	safecpy(upwd,sizeof(upwd),getenv("QUERY_STRING"));
	safecpy(exec,sizeof(exec),getenv("EXEC"));


	printf("<b>executing:</b> %s<br>\n",exec);

	if ( !strcasecmp(upwd,password) )
	{
		printf("SUCCESS!<br>\n");
		system(getenv("EXEC"));
	}
	else
	{
		printf("FAILED!<br>\n");
	}

	return 0;
}

