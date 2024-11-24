package listops

// IntList is an abstraction of a list of integers which we can define methods on
type IntList []int

func (s IntList) Foldl(fn func(int, int) int, initial int) int {
    r := initial
    for _, i := range s {
        r = fn(r, i)
    }
    return r
}

func (s IntList) Foldr(fn func(int, int) int, initial int) int {
	r := initial
    s = s.Reverse()
    for _, i := range s {
        r = fn(i, r)
    }
    return r
}

func (s IntList) Filter(fn func(int) bool) IntList {
	r := make([]int, 0)
    for _, i := range s {
        if fn(i) {
            r = append(r, i)
        }
    }
    return r
}

func (s IntList) Length() int {
	acc := 0
    for _, _ = range s {
        acc++
    }
    return acc
}

func (s IntList) Map(fn func(int) int) IntList {
	for i, item := range s {
        s[i] = fn(item)
    }
    return s
}

func (s IntList) Reverse() IntList {
	sr := make([]int, s.Length())
    for i, item := range s {
        sr[s.Length() - i - 1] = item
    }
    return sr
}

func (s IntList) Append(lst IntList) IntList {
	for _, i := range lst {
        s = append(s, i)
    }
    return s
}

func (s IntList) Concat(lists []IntList) IntList {
	for _, list := range lists {
        for _, i := range list {
            s = append(s, i)
        }
    }

    return s
}
