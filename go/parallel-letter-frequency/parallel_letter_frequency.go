package letter

import "sync"
// FreqMap records the frequency of each rune in a given text.
type FreqMap map[rune]int

// Frequency counts the frequency of each rune in a given text and returns this
// data as a FreqMap.
func Frequency(text string) FreqMap {
	frequencies := FreqMap{}
	for _, r := range text {
		frequencies[r]++
	}
	return frequencies
}

// ConcurrentFrequency counts the frequency of each rune in the given strings,
// by making use of concurrency.
func ConcurrentFrequency(texts []string) FreqMap {
	m := FreqMap{}
    ch := make(chan FreqMap, len(texts))
    var wg sync.WaitGroup

    for _, text := range texts {
        wg.Add(1)
        go GoFrequency(text, ch, &wg)
    }
    
    wg.Wait()
    close(ch)

    for freq := range ch {
        for k, v := range freq {
            m[k] += v
        }
    }

    return m
}

func GoFrequency(text string, ch chan FreqMap, wg *sync.WaitGroup) {
    defer wg.Done()
    frequencies := FreqMap{}
	for _, r := range text {
		frequencies[r]++
	}
    ch <- frequencies
}