<?php

namespace Mizz\Test;

use Exception;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class ProdukServiceTest extends TestCase {
    private ProdukRepository $repository;
    private ProdukService $service;

    protected function setUp():void 
    {
        $this->repository = $this->createStub(ProdukRepository::class);
        $this->service = new ProdukService($this->repository);
    }

    public function testStub() 
    {
        $produk = new Produk();
        $produk->setId("1");

        $this->repository->method("findById")->willReturn($produk);

        $result = $this->repository->findById("1");

        Assert::assertSame($produk, $result);
    }

    public function testStubMap()
    {
        $produk1 = new Produk();
        $produk1->setId("1");

        $produk2 = new Produk();
        $produk2->setId("2");

        $map = [
            ["1", $produk1],
            ["2", $produk2],
        ];

        $this->repository->method('findById')->willReturnMap($map);

        Assert::assertSame($produk1, $this->repository->findById("1"));
        Assert::assertSame($produk2, $this->repository->findById("2"));
    }

    public function testStubCallback() 
    {
        $this->repository->method('findById')->willReturnCallback(function (string $id){
            $produk = new Produk();
            $produk->setId($id);
            return $produk;
        }); 

        Assert::assertEquals("1", $this->repository->findById('1')->getId());
        Assert::assertEquals("2", $this->repository->findById('2')->getId());
        Assert::assertEquals("3", $this->repository->findById('3')->getId());
    }

    public function testStubRegisterSuccess() 
    {
        $this->repository->method('findById')->willReturn(null);
        $this->repository->method('save')->willReturnArgument(0);

        $produk = new Produk();
        $produk->setId('1');
        $produk->setName('Mizz');

        $result = $this->service->register($produk);

        Assert::assertEquals($produk->getId(), $result->getId());
        Assert::assertEquals($produk->getName(), $result->getName());
    }

    public function testStubRegisterException()
    {
        $this->expectException(Exception::class);

        $produkInDB = new Produk();
        $produkInDB->setId('1');

        $this->repository->method('findById')->willReturn($produkInDB);

        $produk = new Produk();
        $produk->setId('1');

        $this->service->register($produk);
    }

    public function testDeleteSuccess()
    {
        $produk = new Produk();
        $produk->setId('1');

        $this->repository->method('findById')->willReturn($produk);

        $this->service->delete('1');

        self::assertTrue(True, 'Produk has been Deleted');
    }
    public function testDeleteException()
    {
        $this->expectException(Exception::class);

        $this->repository->method('findById')->willReturn(null);

        $this->service->delete('1');
    }
}