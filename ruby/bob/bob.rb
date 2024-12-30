class Bob
  def self.hey(remark)
    remark.strip!
    remark = remark.gsub(/\n/, " ")

    if remark.length == 0
      return "Fine. Be that way!"
    end

    if (/[A-Z]+\?$/ =~ remark) != nil && remark.upcase == remark
      return "Calm down, I know what I'm doing!"
    end

    if (/^.*\?$/ =~ remark) != nil
      return "Sure."
    end

    if (/[A-Z]+/ =~ remark) != nil && remark.upcase == remark
      return "Whoa, chill out!"
    end

    "Whatever."
  end
end
