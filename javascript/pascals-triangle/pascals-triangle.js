export const rows = (row_count) => {
  if (row_count < 0) {
    throw new Error('cannot produce a negative row count triangle')
  }

  if (row_count == 0) {
    return []
  }

  const all_rows = rows(row_count-1)
  const last_row = all_rows.length > 0 ? 
    all_rows[all_rows.length-1] : []
  const current_row = []

  for (let i = 0; i < row_count; i++) {
    if (i === 0 || i === row_count-1) {
      current_row.push(1)
      continue
    }

    current_row.push(
      last_row[i-1] + last_row[i]
    )
  }

  all_rows.push(current_row)
  return all_rows
}
