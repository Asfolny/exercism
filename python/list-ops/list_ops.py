def append(list1, list2):
    r = list1
    for i in list2:
        r.append(i)
    return r

def concat(lists):
    return [i for list in lists for i in list]

def filter(function, list):
    r = []
    for i in list:
        if function(i):
            r.append(i)
    return r

def length(list):
    a = 0
    for _ in list:
        a += 1
    return a

def map(function, list):
    r = []
    for i in list:
        r.append(function(i))
    return r

def foldl(function, list, initial):
    r = initial
    for i in list:
        r = function(r, i)
    return r


def foldr(function, list, initial):
    r = initial
    for i in reverse(list):
        r = function(r, i)
    return r

def reverse(list):
    return list[::-1]
