#define _XOPEN_SOURCE
#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <unistd.h>

int main(){
   printf("without \\0 %s\n",crypt("ab","50")); 
   printf("with \\0 %s\n",crypt("ab\0","50")); 
    return 0;
}
