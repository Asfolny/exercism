export const isPaired = (input) => {
  const state = {
    'open_brackets': 0,
    'open_parenthesis': 0,
    'open_braces': 0,
    'expected_close': []
  }

  for (const char of input.split('')) {
    let field = null

    switch(char) {
      case '[':
        state['expected_close'].push(']')
        state['open_brackets']++
        break
        
      case '{':
        state['expected_close'].push('}')
        state['open_braces']++
        break

      case '(':
        state['expected_close'].push(')')
        state['open_parenthesis']++
        break

      // Closing
      case ']':
        field = 'open_brackets'
      case '}':
        if (field === null) {
          field = 'open_braces'
        }
      case ')':
        if (field === null) {
          field = 'open_parenthesis'
        }
        
        const expect = state['expected_close'].pop()
        // Unexpected return
        if (char !== expect) {
          return false
        }

        state[field]--
        break
    }
  }

  return state['open_brackets'] === 0 &&
    state['open_braces'] === 0 &&
    state['open_parenthesis'] === 0
}
