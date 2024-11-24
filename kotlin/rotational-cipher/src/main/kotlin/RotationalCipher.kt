class RotationalCipher(private val rotation: Int) {
    fun encode(input: String): String = input.map { it.transpose() }.joinToString("")

    private fun Char.transpose(): Char = when {
        this.isLowerCase() -> this.shift(ALPHABET_LOWERCASE)
        this.isUpperCase() -> this.shift(ALPHABET_UPPERCASE)
        else -> this
    }

    private fun Char.shift(alphabet: List<Char>): Char = alphabet[(alphabet.indexOf(this) + rotation) % 26]

    companion object {
        val ALPHABET_LOWERCASE = ('a'..'z').toList()
        val ALPHABET_UPPERCASE = ('A'..'Z').toList()
    }
}


