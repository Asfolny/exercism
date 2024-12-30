-module(meetup).

-export([meetup/4]).

dow(DayOfWeek) ->
  case DayOfWeek of
    monday    -> 1;
    tuesday   -> 2;
    wednesday -> 3;
    thursday  -> 4;
    friday    -> 5;
    saturday  -> 6;
    sunday    -> 7
  end.

first(Year, Month, DayOfWeek) -> 1 + (7 + dow(DayOfWeek) - calendar:day_of_the_week(Year,Month,1)) rem 7.

meetup(Year, Month, DayOfWeek, Week) -> 
  case Week of
    first  -> {Year, Month, first(Year, Month, DayOfWeek)}; 
    second -> {Year, Month, first(Year, Month, DayOfWeek) + 7};
    third  -> {Year, Month, first(Year, Month, DayOfWeek) + 2 * 7}; 
    fourth -> {Year, Month, first(Year, Month, DayOfWeek) + 3 * 7};
    teenth ->
      case first(Year, Month, DayOfWeek) + 2*7 < 20 of
        true  -> {Year, Month, first(Year, Month, DayOfWeek) + 2 * 7};
        false -> {Year, Month, first(Year, Month, DayOfWeek) + 7 }
      end;
    last -> 
      case Month of
        12 -> calendar:gregorian_days_to_date(calendar:date_to_gregorian_days({Year+1, 1, first(Year+1, 1, DayOfWeek)}) - 7 );
        _  -> calendar:gregorian_days_to_date(calendar:date_to_gregorian_days({Year, Month + 1, first(Year, Month+1, DayOfWeek)}) - 7)
      end
  end.