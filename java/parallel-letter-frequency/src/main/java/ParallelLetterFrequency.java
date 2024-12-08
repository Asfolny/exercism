import java.util.Map;
import java.util.HashMap;

class ParallelLetterFrequency {
    String[] texts;
    
    ParallelLetterFrequency(String[] texts) {
        this.texts = texts;
    }

    Map<Character, Integer> countLetters() {
        Map<Character, Integer> result = new HashMap<>();

        for (String text : texts) {
            var map = countLetters(text);
            map.forEach(
                (key, value)
                    -> result.merge(key, value, (v1, v2)
                                       -> v1 == null ? v2 : v1 + v2));
        }

        return result;
    }

    Map<Character, Integer> countLetters(String text) {
        Map<Character, Integer> result = new HashMap<>();

        for (char c : text.toCharArray()) {
            if (Character.isAlphabetic(c)) {
                var key = Character.toLowerCase(c);
                var val = result.getOrDefault(key, 0);
                result.put(key, val + 1);
            }
        }

        return result;
    }
}
