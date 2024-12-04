import scala.collection.mutable.ListBuffer

class EmptyBufferException() extends Exception {}

class FullBufferException() extends Exception {}

class CircularBuffer(val capacity: Int) {
  var values = new ListBuffer[Int]()

  def write(value: Int) =
    if (values.length == capacity) then
      throw new FullBufferException()
    
    values.addOne(value)

  def read(): Int = 
    if (values.isEmpty) then
      throw new EmptyBufferException()
  
    values.remove(0)

  def overwrite(value: Int) = 
    if (values.length == capacity) then
      values.remove(0)

    values.addOne(value)

  def clear() = values.clear()
}