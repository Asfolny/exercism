def is_paired(input_string):
    state = {
        'open_brackets': 0,
        'open_braces': 0,
        'open_parenthesis': 0,
        'expected_close': []
    }

    try:
        for char in list(input_string):
            match(char):
                case '[':
                    state['open_brackets'] += 1
                    state['expected_close'].append(']')
                    
                case '{':
                    state['open_braces'] += 1
                    state['expected_close'].append('}')
                    
                case '(':
                    state['open_parenthesis'] += 1
                    state['expected_close'].append(')')
    
                case ']':
                    expect = state['expected_close'].pop()
                    if char != expect:
                        return False
                    state['open_brackets'] -= 1
                    
                case '}':
                    expect = state['expected_close'].pop()
                    if char != expect:
                        return False
                    state['open_braces'] -= 1
                    
                case ')':
                    expect = state['expected_close'].pop()
                    if char != expect:
                        return False
                    state['open_parenthesis'] -= 1
    except IndexError:
        return False

    return state['open_brackets'] == 0 and \
        state['open_braces'] == 0 and \
        state['open_parenthesis'] == 0