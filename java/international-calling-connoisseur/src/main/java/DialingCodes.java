import java.util.Map;
import java.util.HashMap;

public class DialingCodes {
    private Map<Integer, String> dict = new HashMap<>();

    public Map<Integer, String> getCodes() {
        return dict;
    }

    public void setDialingCode(Integer code, String country) {
        dict.put(code, country);
    }

    public String getCountry(Integer code) {
        return dict.get(code);
    }

    public void addNewDialingCode(Integer code, String country) {
        if (dict.containsKey(code) || findDialingCode(country) != null) {
            return;
        }

        dict.put(code, country);
    }

    public Integer findDialingCode(String country) {
        for(Integer k: dict.keySet()) {
            if (dict.get(k).equals(country)) {
                return k;
            }
        }

        return null;
    }

    public void updateCountryDialingCode(Integer code, String country) {
        var currentCode = findDialingCode(country);
        
        if (currentCode == null) {
            return;
        }

        dict.remove(currentCode);
        dict.put(code, country);
    }
}
