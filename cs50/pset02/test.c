#include <stdio.h>
#include <stdlib.h>
#include <string.h>
int verify_salt(char salt[]){
    int i = 0;
   for(i = 0; i <(int) strlen(salt); i++){
      if( 
              ((int)salt[i] <= (int)'Z' & (int)salt[i] >= (int)'A')
              || 
              ((int)salt[i] <= (int)'z' & (int)salt[i] >= (int)'a')
              ||
              (salt[i] == '.') || (salt[i] == '/')
        )  
          continue;
      else
          return 0;
   }

   return 1; 
}

int main(int argc, char* argv[]){
    if(argc != 2){
        printf("usage : ./crack <hashed_passwd>\n");
        exit(1);
    }
    //the to assign the salt value to the salt.
    char salt [3];
    memset(salt,0,3);
    salt [0] = argv[1][0];
    salt [1] = argv[1][1];
    salt [2] = '\0';

    if(!verify_salt(salt))
        printf("invalid salt!\n");

    return 0;
}
