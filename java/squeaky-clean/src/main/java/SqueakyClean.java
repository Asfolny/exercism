class SqueakyClean {
    static String clean(String identifier) {
        var sb = new StringBuilder();
        char[] leetspeak = {'4', '3', '0', '1', '7'};
        char[] normspeak = {'a', 'e', 'o', 'l', 't'};

        for (int i = 0; i < identifier.length(); i++) {
            var c = identifier.charAt(i);
            if (c == ' ') {
                c = '_';
            }

            if (c == '-') {
                i++;
                if (i >= identifier.length()) {
                    break;
                }
                c = Character.toUpperCase(identifier.charAt(i));
            }

            for (int j = 0; j < 5 ; j++) {
                if (leetspeak[j] == c) {
                    c = normspeak[j];
                }
            }

            if (!Character.isLetter(c) && c != '_') {
                continue;
            }

            sb.append(c);
        }

        return sb.toString();
    }
}
