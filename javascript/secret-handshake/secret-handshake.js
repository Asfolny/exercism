export const commands = (input) => {
  let output = []

  if (input & 0b00001) {
    output.push("wink")
  }

  if (input & 0b00010) {
    output.push("double blink")
  }

  if (input & 0b00100) {
    output.push("close your eyes")
  }

  if (input & 0b01000) {
    output.push("jump")
  }

  if (input & 0b10000) {
    output = output.reverse()
  }

  return output
}
