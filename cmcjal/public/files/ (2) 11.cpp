#include "iostream"

typedef signed int SINT;
SINT funcion(SINT **v){

    __asm__(
        "MOV %eax, 10"

    );
}

int main()
{
    return 0;
}
