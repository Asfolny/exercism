#include "circular_buffer.h"
#include <stdlib.h>
#include <errno.h>

circular_buffer_t *new_circular_buffer(int cap) {
    circular_buffer_t *buffer = calloc(1, sizeof(circular_buffer_t) + sizeof(buffer_value_t) * cap);
    buffer->capacity = cap;

    return buffer;
}

void clear_buffer(circular_buffer_t *buffer) {
    buffer->head = 0;
    buffer->tail = 0;
    
    for (int i = 0; i < buffer->capacity; ++i)
        buffer->values[i] = 0;
}

void delete_buffer(circular_buffer_t *buffer) {
    free(buffer);
}

int16_t read(circular_buffer_t *buffer, buffer_value_t *out) {
    if (buffer->values[buffer->tail] == 0) {
        errno = ENODATA;
        return EXIT_FAILURE;
    }

    int new_tail = (buffer->tail + 1) % buffer->capacity;
    *out = buffer->values[buffer->tail];
    buffer->values[buffer->tail] = 0;
    buffer->tail = new_tail;

    return EXIT_SUCCESS;
}

int16_t write(circular_buffer_t *buffer, buffer_value_t in) {
    if (buffer->values[buffer->head] != 0) {
        errno = ENOBUFS;
        return EXIT_FAILURE;
    }

    int new_head = (buffer->head + 1) % buffer->capacity;
    buffer->values[buffer->head] = in;
    buffer->head = new_head;

    return EXIT_SUCCESS;
}

int16_t overwrite(circular_buffer_t *buffer, buffer_value_t in) {
    if (buffer->values[buffer->head] == 0)
        return write(buffer, in);
    
    int new_tail = (buffer->tail + 1) % buffer->capacity;
    buffer->values[buffer->tail] = in;
    buffer->tail = new_tail;

    return EXIT_SUCCESS;
}
