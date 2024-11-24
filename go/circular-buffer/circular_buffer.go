package circular

import "errors"
// Implement a circular buffer of bytes supporting both overflow-checked writes
// and unconditional, possibly overwriting, writes.
//
// We chose the provided API so that Buffer implements io.ByteReader
// and io.ByteWriter and can be used (size permitting) as a drop in
// replacement for anything using that interface.

// Define the Buffer type here.
type Buffer struct {
    cap int
    data []byte
    head int
    tail int
}

func NewBuffer(size int) *Buffer {
	return &Buffer{
        cap: size,
        data: make([]byte, size),
    }
}

func (b *Buffer) ReadByte() (byte, error) {
	if b.data[b.tail] == 0 {
        return 0, errors.New("Circular buffer is empty")
    }
    data := b.data[b.tail]
    b.data[b.tail] = 0
    b.tail = (b.tail + 1) % b.cap
    
    return data, nil
}

func (b *Buffer) WriteByte(c byte) error {
	for i := b.head; i < b.cap; i++ {
        if b.data[i] == 0 {
            b.data[i] = c
            b.head = (i + 1) % b.cap
            return nil
        }
    }

    for i := 0; i < b.head; i++ {
        if b.data[i] == 0 {
            b.data[i] = c
            b.head = (i + 1) % b.cap
            return nil
        }
    }

    return errors.New("Circular buffer is full")
}

func (b *Buffer) Overwrite(c byte) {
	if err := b.WriteByte(c); err != nil {
        b.data[b.tail] = c
        b.tail = (b.tail + 1) % b.cap
    }
}

func (b *Buffer) Reset() {
	b.data = make([]byte, b.cap)
    b.head = 0
    b.tail = 0
}
