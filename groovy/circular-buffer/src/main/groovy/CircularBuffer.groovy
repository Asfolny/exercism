class EmptyBufferException extends Exception {}
class FullBufferException extends Exception {}

class CircularBuffer {
    int capacity
    def values
    
    CircularBuffer(int cap) {
        this.capacity = cap
        this.values = []
    }

    def clear() {
        this.values.clear()
    }

    def read() {
        if (this.values.size() == 0) {
            throw new EmptyBufferException()
        }

        return this.values.pop()
    }

    def write(int item) {
        if (this.values.size() == this.capacity) {
            throw new FullBufferException()
        }

        this.values.add(item)
    }

    def overwrite(int item) {
        if (this.values.size() == this.capacity) {
            this.values.pop()
        }

        this.values.add(item)
    }
}
