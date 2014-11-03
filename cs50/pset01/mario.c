#include <stdio.h>

void print(int a){
    int i = 0,j = 0;
    for(i = 0; i <= a; i ++){
        for(j = a-i-1; j >= 0; j --)
            printf(" ");       
        for(j = 0; j < i; j++)
            printf("#");
        printf(" ");
        for(j = 0; j < i; j++)
            printf("#");
        for(j = a-i-1; j>= 0; j--){
            printf(" ");
        } 
        printf("\n");
    }
}

int main(){
    int a = 0;
    printf("input the height: ");
    fflush(stdout);
    scanf("%d",&a);
    print(a);
    return 0;
}
