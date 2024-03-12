#include <stdio.h>
#include <stdlib.h>
#include <math.h>
#include <unistd.h>
#include <string.h>

#define SIZE 4
#define TOLERANCE 1.0e-5

//wholetthedogsout is the key
double ans[4][4] = {
    {0.081562,-0.001354,-0.021613,-0.055532},
    {0.002104,0.070214,-0.110231,0.032968},
    {0.012327,-0.014425,0.159540,-0.140205},
    {-0.095306,-0.051296,-0.034010,0.173541}
};

void func_1(char s[], double a[4][4]){
    int c = 0;

    for(int i = 0;i<4;i++){
        for(int j = 0;j<4;j++){
            a[i][j] = (double) s[c];
            c++;
        }
    }
}

// Function to calculate determinant of a matrix
double func_2(double a[SIZE][SIZE], double k) {
    double s = 1, det = 0, b[SIZE][SIZE];
    int i, j, m, n, c;
    if (k == 1) {
        return (a[0][0]);
    } else {
        det = 0;
        for (c = 0; c < k; c++) {
            m = 0;
            n = 0;
            for (i = 0; i < k; i++) {
                for (j = 0; j < k; j++) {
                    b[i][j] = 0;
                    if (i != 0 && j != c) {
                        b[m][n] = a[i][j];
                        if (n < (k - 2))
                            n++;
                        else {
                            n = 0;
                            m++;
                        }
                    }
                }
            }
            det = det + s * (a[0][c] * func_2(b, k - 1));
            s = -1 * s;
        }
    }
    return (det);
}

// Function to find the cofactor of a matrix
void func_3(double num[SIZE][SIZE],double fac[SIZE][SIZE], double f) {
    double b[SIZE][SIZE];
    int p, q, m, n, i, j;
    for (q = 0; q < f; q++) {
        for (p = 0; p < f; p++) {
            m = 0;
            n = 0;
            for (i = 0; i < f; i++) {
                for (j = 0; j < f; j++) {
                    if (i != q && j != p) {
                        b[m][n] = num[i][j];
                        if (n < (f - 2))
                            n++;
                        else {
                            n = 0;
                            m++;
                        }
                    }
                }
            }
            fac[q][p] = pow(-1, q + p) * func_2(b, f - 1);
        }
    }
}

void func_4(double num[SIZE][SIZE], double fac[SIZE][SIZE], double inverse[SIZE][SIZE] , double r) {
    int i, j;
    double b[SIZE][SIZE], d;
    for (i = 0; i < r; i++) {
        for (j = 0; j < r; j++) {
            b[i][j] = fac[j][i];
        }
    }
    d = func_2(num, r);
    for (i = 0; i < r; i++) {
        for (j = 0; j < r; j++) {
            inverse[i][j] = b[i][j] / d;
        }
    }
}

int func_5(double a1[4][4], double a2[4][4]){
    if (a1 == NULL || a2 == NULL) {
        printf("Error: One or both matrices are null.\n");
        return 0;
    }

    for (int i = 0; i < 4; i++) {
        for (int j = 0; j < 4; j++) {
            double v1 = a1[i][j], v2 = a2[i][j];
            double v3 = fabsl(v1 - v2);
            if (v3 > TOLERANCE) {
                return 0;
            }
        }
    }
    return 1;
}

int func_6(char *a){
    char initial_filename[] = "/home/kermit/";
    char *filename = malloc(strlen(initial_filename) + strlen(a) + 1);
    if(filename == NULL) {
        fprintf(stderr, "Failed to allocate memory\n");
        return 1;
    }
    strcpy(filename, initial_filename);
    strcat(filename, a);
    int result = access(filename, R_OK);    
    if(result == -1){
        printf("File not found\n");
    }else{
        printf("File found\n");
        FILE *fptr;
        fptr = fopen(filename, "r");
        char myString[1024];
        while(fgets(myString, 1024, fptr) != NULL) {
            printf("%s", myString);
        }
        fclose(fptr);
    }
    free(filename);
    return 0;
}

int main(int argc,char *argv[]){
    char *buf = argv[1];
    char s[16];

    for(int i = 0;i<16;i++){
        s[i] = (char) buf[i];
    }

    double v1[4][4];
    double v2[4][4];
    double v3[4][4];

    func_1(s,v1);

    func_3(v1,v2,4);

    func_4(v1,v2,v3,4);

    if(func_5(ans,v3)){
        printf("Correct\n");
        func_6(argv[2]);
    }else{
        printf("Incorrect\n");
    } 
    return 0;
}
