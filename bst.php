<?php
// bst.php — Binary Search Tree

class Node {
    public $data, $left, $right;
    function __construct($data) { $this->data = $data; }
}

class BinarySearchTree {
    private $root = null;

    public function insert($data) { $this->root = $this->insertNode($this->root, $data); }

    private function insertNode($node, $data) {
        if ($node === null) return new Node($data);
        $cmp = strcasecmp($data, $node->data);
        if ($cmp < 0) $node->left = $this->insertNode($node->left, $data);
        elseif ($cmp > 0) $node->right = $this->insertNode($node->right, $data);
        return $node;
    }

    public function search($data) { return $this->searchNode($this->root, $data); }

    private function searchNode($node, $data) {
        if ($node === null) return false;
        $cmp = strcasecmp($data, $node->data);
        if ($cmp === 0) return true;
        return ($cmp < 0)
            ? $this->searchNode($node->left, $data)
            : $this->searchNode($node->right, $data);
    }

    public function inorderTraversal() {
        $this->inorder($this->root);
    }

    private function inorder($node) {
        if ($node === null) return;
        $this->inorder($node->left);
        echo htmlspecialchars($node->data) . "<br>";
        $this->inorder($node->right);
    }
}
?>
