<?php declare(strict_types=1);

class Alphametics
{
    protected string $puzzle;
    protected array $alphabets;
    protected array $candidates;
    protected string $functionName;

    public function solve(string $puzzle): ?array
    {
        $this->puzzle = $puzzle;
        preg_match_all("([^+= ]+)", $puzzle, $matches);
        $this->alphabets = array_values(array_unique(
            array_reduce(
                array_reverse($matches[0]),
                fn ($alphabets, $word) => [...$alphabets, ...str_split($word)],
                []
            )
        ));

        $noZero = array_unique(array_map(fn ($word) => $word[0], $matches[0]));
        foreach ($this->alphabets as $a) {
            $this->candidates[$a] = range(in_array($a, $noZero) ? 1 : 0, 9);
        }

        $this->createPuzzleFunction();

        return $this->dfs([]);
    }

    protected function createPuzzleFunction(): void
    {
        $expr = join(' ', array_map(
            fn ($word) => !preg_match("/\\w+/", $word) ? $word :
                join('+', array_map(
                    fn ($i, $c) => "\${$c} * 10 ** {$i}",
                    range(0, strlen($word) - 1),
                    str_split(strrev($word))
                )),
            explode(' ', $this->puzzle)
        ));

        $this->functionName = 'puzzle' . hrtime(true);

        eval("function {$this->functionName}($" . join(',$', $this->alphabets) . ") {"
            . " return {$expr};"
            . "}");
    }

    protected function dfs(array $candidate): ?array
    {
        if (count($candidate) === count($this->alphabets)) {
            return ($this->functionName)(...$candidate) ? array_combine($this->alphabets, $candidate) : null;
        }

        $a = $this->alphabets[count($candidate)];
        foreach ($this->candidates[$a] as $n) {
            if (in_array($n, $candidate)) {
                continue;
            }

            $result = $this->dfs([...$candidate, $n]);
            if ($result) {
                return $result;
            }
        }

        return null;
    }
}