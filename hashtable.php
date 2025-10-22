<?php
// hashtable.php — Book Info (Hash Table)

$bookInfo = [
    "Harry Potter" => ["author" => "J.K. Rowling", "year" => 1997, "genre" => "Fantasy"],
    "The Hobbit" => ["author" => "J.R.R. Tolkien", "year" => 1937, "genre" => "Fantasy"],
    "Sherlock Holmes" => ["author" => "Arthur Conan Doyle", "year" => 1892, "genre" => "Mystery"],
    "Gone Girl" => ["author" => "Gillian Flynn", "year" => 2012, "genre" => "Mystery"],
    "A Brief History of Time" => ["author" => "Stephen Hawking", "year" => 1988, "genre" => "Science"],
    "The Selfish Gene" => ["author" => "Richard Dawkins", "year" => 1976, "genre" => "Science"],
    "Steve Jobs" => ["author" => "Walter Isaacson", "year" => 2011, "genre" => "Biography"],
    "Becoming" => ["author" => "Michelle Obama", "year" => 2018, "genre" => "Biography"],
];

function getBookInfo($title, $bookInfo) {
    if (isset($bookInfo[$title])) {
        $info = $bookInfo[$title];
        echo "<div class='box'><h2>📘 Book Found</h2>";
        echo "<p><strong>Title:</strong> " . htmlspecialchars($title) . "<br>";
        echo "<strong>Author:</strong> " . htmlspecialchars($info['author']) . "<br>";
        echo "<strong>Year:</strong> " . htmlspecialchars($info['year']) . "<br>";
        echo "<strong>Genre:</strong> " . htmlspecialchars($info['genre']) . "</p></div>";
    } else {
        echo "<div class='box'><h2>❌ Book Not Found</h2><p>The title <strong>" . htmlspecialchars($title) . "</strong> is not in our records.</p></div>";
    }
}
?>
