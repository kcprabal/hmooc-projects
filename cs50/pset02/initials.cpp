#include <stdio.h>
#include <string.h>
#include <stdlib.h>

int main(int argc, const char * argv[]){
   if(argc == 1){
      printf("usage: ./initials <your_name>\n"); 
      exit(1);
   }
   
   for(int i = 1;i < argc; i ++){
       printf("%c",*argv[i]); 
   }
   printf("\n");
   return 0; 
}
