export const find = (search_list, value) => {
    if (search_list.length < 1 ||
        (search_list.length == 1 && value != search_list[0])) {
      throw new Error('Value not in array')
  }

    const mid_point = Math.floor(search_list.length / 2)

    if (value == search_list[mid_point]) {
        return mid_point
    }

    if (value < search_list[mid_point]) {
        return find(search_list.slice(0, mid_point), value)
    }

    if (value > search_list[mid_point]) {
        return mid_point + find(search_list.slice(mid_point, search_list.length), value)
    }
}
