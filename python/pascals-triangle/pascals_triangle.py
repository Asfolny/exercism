def rows(row_count):
    if row_count < 0:
        raise ValueError("number of rows is negative")

    if row_count == 0:
        return []

    all_rows = rows(row_count-1)
    last_row = all_rows[-1] if len(all_rows) > 1 else []
    current_row = []

    for i in range(row_count):
        # edges
        if i == 0 or i == row_count-1:
            current_row.append(1)
            continue

        current_row.append(
            last_row[i-1] + last_row[i]
        )
    
    all_rows.append(current_row)
    return all_rows
