object RunLengthEncoding {

    fun encode(input: String): String {
        if (input == "") {
            return ""
        }
        
        var prev = input.first()
        var counter = 0
        var output = ""

        input.forEach { 
            if (prev != it) {
                if (counter > 1) {
                    output += counter
                    counter = 1
                }

                output += prev
                prev = it
            } else {
                counter++
            }
        };

        // Last letter
        if (counter > 1) {
            output += counter
            counter = 1
        }

        output += prev

        return output
    }

    fun decode(input: String): String {
        if (input == "") {
            return ""
        }

        var counter = 0
        val tenth = 10.0
        var output = ""

        input.forEach {
            val num = it.digitToIntOrNull()

            if (num != null) {
                counter *= 10
                counter += num
            } else {
                if (counter > 0) {
                    output += it.toString().repeat(counter)
                    counter = 0
                } else {
                    output += it
                }
            }
        }

        return output
    }
}
