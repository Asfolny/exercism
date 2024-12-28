class AssemblyLine
  PRODUCTION_BASE = 221

  def initialize(speed)
    @speed = speed
  end

  def success_rate
    if @speed < 1
      0
    elsif @speed < 5
      1
    elsif @speed < 9
      0.9
    elsif @speed < 10
      0.8
    else
      0.77
    end
  end

  def production_rate_per_hour
    PRODUCTION_BASE * @speed * success_rate()
  end

  def working_items_per_minute
    (production_rate_per_hour() / 60).to_i
  end
end
