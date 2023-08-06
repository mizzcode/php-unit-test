<?php

namespace Mizz\Test;

use Exception;

class ProdukService {
    public function __construct(private ProdukRepository $repository)
    {
        
    }

    public function register(Produk $produk): Produk {
        if ($this->repository->findById($produk->getId()) != null) {
            throw new Exception('produk is already exists');
        }
        return $this->repository->save($produk);
    }

    public function delete(string $id)
    {
        $produk = $this->repository->findById($id);
        if ($produk == null) {
            throw new Exception('Produk is not found');
        }
        $this->repository->delete($produk);
    }
}