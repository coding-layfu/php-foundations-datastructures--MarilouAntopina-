<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include modules
require_once "recursion.php";
require_once "hashtable.php";
require_once "bst.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Digital Library Organizer</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f5f5f5; margin: 40px; color: #222; }
    h1, h2 { color: #333; }
    .box { background: white; padding: 20px; border-radius: 12px; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-bottom: 20px; }
    pre { background: #f0f0f0; padding: 10px; border-radius: 6px; overflow-x: auto; }
    input[type=text] { padding: 8px; width: 300px; border: 1px solid #ccc; border-radius: 6px; }
    input[type=submit] { padding: 8px 15px; background: #007bff; border: none; color: white; border-radius: 6px; cursor: pointer; }
    input[type=submit]:hover { background: #0056b3; }
  </style>
</head>
<body>

<h1>📚 Digital Library Organizer</h1>

<div class="box">
  <h2>🔎 Search for a Book</h2>
  <form method="POST">
    <input type="text" name="searchTitle" placeholder="Enter book title..." required>
    <input type="submit" value="Search">
  </form>
</div>

<div class="box">
  <h2>📂 Library Structure</h2>
  <?php displayLibrary($library); ?>
</div>

<?php
// Build BST from recursion.php data
$titles = [];
collectTitles($library, $titles);

$bst = new BinarySearchTree();
foreach ($titles as $t) $bst->insert($t);

echo "<div class='box'><h2>📋 All Books (Alphabetical)</h2><pre>";
$bst->inorderTraversal();
echo "</pre></div>";

// Handle user search
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['searchTitle'])) {
    $title = trim($_POST['searchTitle']);
    echo "<a id='searchResult'></a>"; // 👈 anchor to scroll to

    if ($bst->search($title)) {
        getBookInfo($title, $bookInfo);
    } else {
        echo "<div class='box'><h2>❌ Not Found in Library</h2><p>No match for <strong>" . htmlspecialchars($title) . "</strong> in the BST.</p></div>";
    }

    // 👇 Add this small JS block
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            const result = document.getElementById('searchResult');
            if (result) {
                result.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    </script>";
}
?>

</body>
</html>
