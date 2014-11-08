#define _XOPEN_SOURCE
#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <unistd.h>

int main(int argc, const char *argv[]){
    if(argc != 2){
        printf("Usage: ./crack <salt_and_hashed_string>\n");
        exit(1);
    }
    char salt[3];
    memset(salt,0,sizeof(salt));
    salt[0] = argv[1][0];
    salt[1] = argv[1][1];
    salt[2] = '\0'; 
    
    char key[20];
    memset(key,0,sizeof(key));
    int i = 0;
    for(i = 2 ; i < (int)strlen(argv[1]); i++){
        key[i-2] = argv[1][i];     
    } 
    key[i] = '\0';
    char guess[10];
    memset(guess,0,sizeof(guess));
    guess[1] = '\0';
    int h = 0;
    while(h < 8){
        for(int k = 32; k < 127; k++){
            guess[0] = k;
            if(strcmp(argv[1],crypt(guess,salt)) == 0){
                printf("%s\n",guess);
                return 0;
            }
        }
        if(guess[1] == '\0'){
            h ++;
            printf("2 digits\n");
            guess[1] =32;
        }
        else{
            guess[1] ++;
        }
        for(int j = 1; j <= h; j++){
            if(guess[j] > 126){
                guess[j] = 32;
                if(guess[j+1] != '\0'){
                    guess[j+1] ++; 
                }else{
                    guess[h] = 32;
                    h ++;
                    printf("%d digits\n",h+1);
                    guess[h] = '\0';
                }
            }
        }
    }
    return 0;
}
