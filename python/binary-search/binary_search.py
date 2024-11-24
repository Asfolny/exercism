def find(search_list, value):
    if len(search_list) < 1 or \
        (len(search_list) == 1 and value != search_list[0]):
        raise ValueError('value not in array')

    mid_point = len(search_list) // 2

    if value == search_list[mid_point]:
        return mid_point

    if value < search_list[mid_point]:
        return find(search_list[:mid_point], value)

    if value > search_list[mid_point]:
        return mid_point + find(search_list[mid_point:], value)
    