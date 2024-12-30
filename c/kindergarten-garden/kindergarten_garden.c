#include"kindergarten_garden.h"
#include <string.h>

plants_t plants(const char *diagram, const char *student) {
    const char *students[] = {
        "Alice",
        "Bob",
        "Charlie",
        "David",
        "Eve",
        "Fred",
        "Ginny",
        "Harriet",
        "Ileana",
        "Joseph",
        "Kincaid",
        "Larry"
    };

    int offset = -1;
    for (int i = 0; i < 12; i++) {
        if (strncmp(student, students[i], strlen(students[i])) == 0) {
            offset = i * 2;
            break;
        }
    }

    const char *rows[2];
    int row_idx = 0;
    // 12 students * 2 plants per row * 2 rows + 2 (\n and \0)
    char dup_diagram[50];
    strcpy(dup_diagram, diagram);
    char *token = strtok(dup_diagram, "\n");
    while (token != NULL && row_idx < 2) {
        rows[row_idx] = token;
        token = strtok(NULL, "\n");
        row_idx++;
    }

    plants_t res;
    int res_idx = 0;
    for (int i = 0; i < 2; i++) {
        for (int j = offset; j < offset+2; j++) {
            if (rows[i][j] == 'G') {
                res.plants[res_idx] = GRASS;
                res_idx++;
            }

            if (rows[i][j] == 'C') {
                res.plants[res_idx] = CLOVER;
                res_idx++;
            }

            if (rows[i][j] == 'R') {
                res.plants[res_idx] = RADISHES;
                res_idx++;
            }

            if (rows[i][j] == 'V') {
                res.plants[res_idx] = VIOLETS;
                res_idx++;
            }
        }
    }

    return res;
}