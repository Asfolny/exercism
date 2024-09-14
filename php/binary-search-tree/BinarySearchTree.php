<?php declare(strict_types=1);

class BinarySearchTree
{
    public function __construct(
        public int $data,
        public ?BinarySearchTree $left = null,
        public ?BinarySearchTree $right = null
    ) {}

    public function insert(int $data): void
    {
        if ($this->data >= $data) {
            if ($this->left) {
                $this->left->insert($data);
                return;
            }

            $this->left = new BinarySearchTree($data);
            return;
        }

        if ($this->data < $data) {
            if ($this->right) {
                $this->right->insert($data);
                return;
            }

            $this->right = new BinarySearchTree($data);
            return;
        }
    }

    public function getSortedData(): array
    {
        $r = [];
        if ($this->left) {
            $r = array_merge($r, $this->left->getSortedData());
        }

        $r[] = $this->data;

        if ($this->right) {
            $r = array_merge($r, $this->right->getSortedData());
        }

        return $r;
    }
}
