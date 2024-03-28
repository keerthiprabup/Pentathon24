#include <stdio.h>
#include <stdlib.h>

int len = 0;
int fun(){
    if(len == 0){
        printf("How long is your name: ");
        scanf("%d", &len);
        getchar();  

        if(len > 10){
            printf("keep a nick name instead... ");
            return 1;
        }
    }
    char name[10];  
    fgets(name, len, stdin);
    printf(name);
    printf("still your name ?\n");
    int* temp = &len;
    fun();
}

int main(){
    setvbuf(stdin, NULL, _IONBF, 0);
    setvbuf(stdout, NULL, _IONBF, 0);
    fun();
}