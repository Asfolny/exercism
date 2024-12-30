#ifndef KINDERGARTEN_GARDEN_H
#define KINDERGARTEN_GARDEN_H

typedef enum { 
    CLOVER = 0,
    GRASS = 1,
    RADISHES = 2,
    VIOLETS = 3
} plant_t;

typedef struct {
   plant_t plants[4];
} plants_t;

typedef enum {
    ALICE,
    BOB,
    CHARLIE,
    DAVID,
    EVE,
    FRED,
    GINNY,
    HARRIET,
    ILEANA,
    JOSEPH,
    KINCAID,
    LARRY,
    UNKNOWN = -1
} student_t;

plants_t plants(const char *diagram, const char *student);

#endif
