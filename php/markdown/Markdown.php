<?php declare(strict_types=1);

const PATTERNS = [
    '/__(.*)__/U' => '<em>$1</em>', // bold
    '/_(.*)_/U' => '<i>$1</i>',  // italic
    '/\*\s*(.*)/' => '<li>$1</li>', // list item
    '/^(?!<h|<li|<ul)(.*)$/' => '<p>$1</p>', // paragraph
    '/(<li>)(?!<em|<i)(.*)(<\/li>)/' => '$1<p>$2</p>$3', // nested paragraph
];

function parseMarkdown(string $markdown): string
{
    $lines = explode(PHP_EOL, $markdown);

    foreach ($lines as &$line) {
        if (preg_match('/^(#{1,6})\s*(.*)/', $line, $matches)) {
            $n = strlen($matches[1]);
            $line = "<h$n>$matches[2]</h$n>";
        }

        $line = preg_replace(array_keys(PATTERNS), array_values(PATTERNS), $line);
    }

    return preg_replace('/(<li.*li>(\n|$))+/', '<ul>$0</ul>', implode('', $lines));
}