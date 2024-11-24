defmodule LibraryFees do
  def datetime_from_string(string) do
    NaiveDateTime.from_iso8601!(string)
  end

  def before_noon?(datetime) do
    NaiveDateTime.to_time(datetime)
    |> Time.before?(~T[12:00:00])
  end

  def return_date(checkout_datetime) do
    adding = if before_noon?(checkout_datetime), do: 28, else: 29 
    NaiveDateTime.add(checkout_datetime, 24 * 60 * 60 * adding)
    |> NaiveDateTime.to_date()
  end

  def days_late(planned_return_date, actual_return_datetime) do
    diff = Date.diff(NaiveDateTime.to_date(actual_return_datetime), planned_return_date)
    if diff < 1, do: 0, else: diff
  end

  def monday?(datetime) do
    NaiveDateTime.to_date(datetime)
    |> Date.compare(Date.beginning_of_week(datetime))
    |> Kernel.==(:eq)
  end

  def calculate_late_fee(checkout, return, rate) do
    checkout = datetime_from_string(checkout)
    return = datetime_from_string(return)

    fee = days_late(return_date(checkout), return) * rate
    if monday?(return), do: trunc(fee / 2), else: fee
  end
end
