export const age = (planet, seconds) => {
  let years = seconds / (60 * 60 * 24 * 365.25)

  switch(planet) {
    case 'mercury':
      years /= 0.2408467
      break
    case 'venus':
      years /= 0.61519726
      break
    case 'mars':
      years /= 1.8808158
      break
    case 'jupiter':
      years /= 11.862615
      break
    case 'saturn':
      years /= 29.447498
      break
    case 'uranus':
      years /= 84.016846
      break
    case 'neptune':
      years /= 164.79132
      break
  }

  return parseFloat(years.toFixed(2))
}
