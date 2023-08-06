<?php

namespace Mizz\Test;

interface ProdukRepository {
    function save(Produk $produk): Produk;

    function delete(?Produk $produk): void;

    function findById(string $id): ?Produk;
    
    function findAll(): array;
}