class BufferFullException(BufferError):
    """Exception raised when CircularBuffer is full.

    message: explanation of the error.

    """
    def __init__(self, message):
        self.message = message


class BufferEmptyException(BufferError):
    """Exception raised when CircularBuffer is empty.

    message: explanation of the error.

    """
    def __init__(self, message):
        self.message = message


class CircularBuffer:
    def __init__(self, capacity):
        self.capacity = capacity
        self.store = [None] * capacity
        self.head = 0
        self.tail = 0

    def read(self):
        if self.store[self.tail] is None:
            raise BufferEmptyException("Circular buffer is empty")
        r = self.store[self.tail]
        self.store[self.tail] = None
        self.tail = (self.tail + 1) % self.capacity
        return r

    def write(self, data):
        for index in range(self.head, self.capacity):
            if self.store[index] is None:
                self.store[index] = data
                self.head = index
                return

        for index in range(0, self.head):
            if self.store[index] is None:
                self.store[index] = data
                self.head = index
                return

        raise BufferFullException("Circular buffer is full")

    def overwrite(self, data):
        try:
            self.write(data)
        except BufferFullException:
            self.store[self.tail] = data
            self.tail = (self.tail + 1) % self.capacity

    def clear(self):
        self.store = [None] * self.capacity
        self.head = 0
        self.tail = 0
