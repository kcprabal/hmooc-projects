#include <stdio.h>
#include <stdlib.h>
#include <string.h>
long long int getLongLong(){
    long long int a;
    char b;
    char c[100];
    memset(c,0,100);
    while(1){
        scanf("%s",c);
        if(sscanf(c,"%lld %c",&a,&b) == 1){
            return a;
        }
        else{
            printf("Retry: ");
        }
        // this is really important because this
        // is the command that makes the "Retry: " string
        // displays on the screen. 
        // Otherwise the program will read the input into buffer without
        // any promt on the command line interface.
        fflush(stdout);
    }
}
int verify(long long int a){
    char tmp [100];
    sprintf(tmp,"%lld",a);
    int i = 0, total = 0;
    for(i = 0; i < (int)strlen(tmp); i++){
        if(i%2 == 0)
           total += tmp[i] - '0';
       else{
          int dtmp = 2 * (tmp[i] - '0');
          char stmp[100];  
          sprintf(stmp,"%d",dtmp);
          int j = 0; 
          for(j = 0; j < (int)strlen(stmp); j++){
              total += stmp[j] - '0';
          }
       }
    }
    int type = 0;
    if(tmp [0] == '4')
        type = 1;
    else if( (tmp[0] == '3') & (tmp[1] == '4' || tmp[1] == '7'))
        type = 2;
    else if( (tmp[0] == '5') & (tmp[1] == '1' || tmp[1] == '2' || tmp[1] == '3' || tmp[1] == '4' || tmp[1] == '5'))
        type = 3;

    int vflag = total % 10;
    if (vflag != 0)
        type = -1;

    return type;
}
int main (){
    long long int a = getLongLong();
    int type = verify(a);
    char stype[20];
    switch(type){
        case -1:
            sprintf(stype,"invalid\n");
            break;
        case 1:
            sprintf(stype,"visa\n");
            break;
        case 2:
            sprintf(stype,"American Express\n");
            break;
        case 3:
            sprintf(stype,"Master Card\n");
            break;
    }
    printf("%s",stype);
    return 0;
}
