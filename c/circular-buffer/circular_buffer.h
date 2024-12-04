#ifndef CIRCULAR_BUFFER_H
#define CIRCULAR_BUFFER_H

#include <stdint.h>

typedef int buffer_value_t;

typedef struct circular_buffer {
    int capacity;
    int head;
    int tail;
    buffer_value_t values[];
} circular_buffer_t;

circular_buffer_t *new_circular_buffer(int cap);
void clear_buffer(circular_buffer_t *buffer);
void delete_buffer(circular_buffer_t *buffer);
int16_t read(circular_buffer_t *buffer, buffer_value_t *out);
int16_t write(circular_buffer_t *buffer, buffer_value_t in);
int16_t overwrite(circular_buffer_t *buffer, buffer_value_t in);

#endif
