export const meetup = (year, month, week, week_day) => {
  if (!DAY_NAMES.includes(week_day)) {
    throw new Error('Unknown weekday')
  }

  if (START_DAY[week] === undefined) {
    throw new Error('Unknown week specifier')
  }

  let start_day = START_DAY[week]
  if (start_day === null) {
    // start of the last week is a little more work
    const last_day = new Date(year, month, 0) // last day of LAST MONTH
    last_day.setDate(last_day.getDate() - 6)
    start_day = last_day.getDate()
  }

  // JS Date's month field is 0-indexed, but our input is 1-indexed
  const start_day_wday = new Date(year, month-1, start_day).getDay()
  const wanted_wday = DAY_NAMES.indexOf(week_day)
  const delta = wanted_wday >= start_day_wday ?
    wanted_wday - start_day_wday : wanted_wday - start_day_wday + 7
  const end = new Date(year, month-1, start_day + delta)

  // Support "fifth" properly
  if (end.getMonth() !== month-1) {
    throw new Error('Day is not in month')
  }

  return end
}

const START_DAY = {
    'first': 1,
    'second': 8,
    'third': 15,
    'fourth': 22,
    'fifth': 29,
    'teenth': 13,
    'last': null
}

const DAY_NAMES = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]