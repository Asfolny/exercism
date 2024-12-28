return function(phrase)
  output = ""
  
  for part in string.gmatch(phrase, "%S+") do    
    sa = string.find(part, "^[aeiou]")
    sb = string.find(part, "^xr")
    sc = string.find(part, "^yt")
    sd, _, sd_prefix, sd_suffix = string.find(part, "(.*qu)(.*)")
    se, _, se_prefix, se_suffix = string.find(part, "([b-df-hj-np-tv-z]+)([aeiou].*)")
    _, _, sf_prefix, sf_suffix = string.find(part, "([b-df-hj-np-tv-z]+)(y.*)")
    
    if sa ~= nil or sb ~= nil or sc ~= nil then
      output = output .. " " .. part .. "ay"
    elseif sd ~= nil then
      output = output .. " " .. sd_suffix .. sd_prefix .. "ay"
    elseif se ~= nil then
      output = output .. " " .. se_suffix .. se_prefix .. "ay"
    else
      output = output .. " " .. sf_suffix .. sf_prefix .. "ay"
    end
  end

  return output:gsub("^%s*(.-)%s*$", "%1")
end
