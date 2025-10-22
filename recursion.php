<?php
// recursion.php — Recursive Library Display

$library = [
    "Fiction" => [
        "Fantasy" => ["Harry Potter", "The Hobbit"],
        "Mystery" => ["Sherlock Holmes", "Gone Girl"],
    ],
    "Non-Fiction" => [
        "Science" => ["A Brief History of Time", "The Selfish Gene"],
        "Biography" => ["Steve Jobs", "Becoming"],
    ],
];

function displayLibrary($library, $indent = 0) {
    $pad = str_repeat("&nbsp;&nbsp;", $indent);
    foreach ($library as $key => $value) {
        if (is_array($value)) {
            $isList = array_values($value) === $value;
            if (!is_int($key)) echo $pad . "<strong>$key</strong><br>";
            if ($isList) {
                foreach ($value as $book) {
                    echo $pad . "&nbsp;&nbsp;📖 " . htmlspecialchars($book) . "<br>";
                }
            } else {
                displayLibrary($value, $indent + 1);
            }
        } else {
            echo $pad . htmlspecialchars($value) . "<br>";
        }
    }
}

function collectTitles($library, &$titles) {
    foreach ($library as $key => $value) {
        if (is_array($value)) {
            $isList = array_values($value) === $value;
            if ($isList) foreach ($value as $book) $titles[] = $book;
            else collectTitles($value, $titles);
        }
    }
}
?>
