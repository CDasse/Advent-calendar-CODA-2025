#include <stdio.h>

typedef struct reindeers_s {
    char name[7];
    int present;
} reindeers_t;


int countPresentReindeers(reindeers_t reindeers[]) {
    int count = 0;

    for (int i = 0; i < 8; i++) {
        if (reindeers[i].present == 1) {
            count++;
        }
    }

    return count;
}


int main(void) {

    reindeers_t reindeers[8] = {
        {"Dasher", 1},
        {"Dancer", 0},
        {"Prancer", 1},
        {"Vixen", 0},
        {"Comet", 1},
        {"Cupid", 0},
        {"Donner", 1},
        {"Blitzen", 1}
    };

    int numberOfReindeers = 8;
    int numberOfReindeersPresent = countPresentReindeers(reindeers);

    printf("🎅 Santa: %d out of %d reindeers are present in the stable tonight.\n", numberOfReindeersPresent, numberOfReindeers);

    return 0;
}