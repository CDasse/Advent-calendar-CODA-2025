#include <stdio.h>

double averageWeight(const int w[], const int l) {
    if (w == NULL || l <= 0) {
        return 0.00;
    }
    
    double s = 0;
    for (int i = 0; i < l; i++) {
        s += w[i];
    }
    return s / l;
}

int main() {
    const int weights1[] = {2, 5, 7, 10};
    const int weights2[] = {2};
    const int weights4[] = {1, 2};

    printf("Average weight for 4 gifts {2, 5, 7, 10} : %.2f\n", averageWeight(weights1, 4));
    printf("Average weight for 1 gift {2} : %.2f\n", averageWeight(weights2, 1));
    printf("Average weight for 1 gift {} : %.2f\n", averageWeight(NULL, 0));
    printf("Average weight for 2 gifts {1, 2} : %.2f\n", averageWeight(weights4, 2));

    return 0;
}