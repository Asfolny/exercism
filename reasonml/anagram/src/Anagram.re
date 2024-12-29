open Js.String;

let sortLetters = (s) => {
  s
    |> split("")
    |> Js.Array.sortInPlace
    |> Js.Array.join
}

let isAnagram = (word1, word2) => {
  let word1Lower = word1 |> toLowerCase;
  let word2Lower = word2 |> toLowerCase;
  (word1Lower != word2Lower) && (sortLetters(word1Lower) == sortLetters(word2Lower))
}

let anagrams = (word, candidates) => {
  List.filter(isAnagram(word), candidates)
}