#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>

#define BUF 512
#define MBUF 128
#define N 10

long long hashMe(unsigned char *str)
{
	long long h = 1;
	int i;
	unsigned char magic_number = 0x5F;

	for (i = 0; i < 8 && i < strlen((char *)str); i++) {
		str[i] ^= magic_number;
		h *= str[i] << (i % 2);
	}

	return h;
}

int main()
{
	char message[N][MBUF];
	unsigned char pass[BUF];
	unsigned char realpass[BUF];

	FILE *file;
	int i;
	long long f, h;

	printf("pass: ");
	fgets((char *)pass, BUF, stdin);

	h = hashMe(pass);

	sprintf((char *)pass, "%llx", h);

	file = fopen("/home/shell2cgi/pass", "r");
	if (!file) {
		fprintf(stderr, "Nie moge otworzyc pliku.\n");
	}
	fscanf(file, "%s", realpass);
	fclose(file);

	if (!strcmp((char *)realpass, (char *)pass)) {
		system("cat secret");
	} else {
		printf("\nWrong password.\n");
		file = fopen("/home/shell2cgi/fortunes", "r");
		if (!file) {
			fprintf(stderr, "Nie moge otworzyc pliku.\n");
		}
		for (i = 0; i < N; i++) {
			fgets(message[i], BUF, file);
		}
		fclose(file);
		srandom((unsigned int)time(NULL));
		f = h + random();
		printf("\n%s", message[f % N]);
	}

	/* more secure */
	exit(0);

	return 0;
}

