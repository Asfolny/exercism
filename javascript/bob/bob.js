export const hey = (message) => {
  let question = false
  let yell = false

  message = message.trim()
  if (message.length === 0) {
    return "Fine. Be that way!"
  }

  if (message[message.length-1] === "?") {
    question = true
  }

  if (message === message.toUpperCase() && message !== message.toLowerCase()) {
    yell = true
  }

  if (question && yell) {
    return "Calm down, I know what I'm doing!"
  }

  if (question) {
    return "Sure."
  }

  if (yell) {
    return "Whoa, chill out!"
  }

  return "Whatever."
}
