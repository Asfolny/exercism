return function(config)
  if config.span > #config.digits then error("span may not be larger than digit length") end
  if config.span < 1 then error("span must be positive") end
  if string.find(config.digits, "%D") ~= nil then error("digit must contain only digits") end

  if config.span == 0 then return 1 end
  
  max = 0
  loop_max = #config.digits - config.span + 1

  for i = 1, loop_max
  do
    num = 1
    
    for p = 0, config.span - 1
    do
      num = num * tonumber(config.digits:sub(i+p, i+p))
    end
    
    if num > max then max = num end
  end

  return max
end
