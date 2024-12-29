# Search an array for a value and return the index.
#
# + array - a sorted array of integers
# + value - the integer item to find
# + return - the index of the value, or nil if the value is not found
public function find(int[] array, int value) returns int? {
    int middle = array.length() / 2;
    int shift = array.length() % 2;

    if array.length() === 0 {
        return ();
    } else if value === array[middle] {
        return middle;
    } else if value < array[middle] {
        return find(array.slice(0, middle), value);
    } else {
        return middle + shift + find(array.slice(middle + shift), value);
    }
}