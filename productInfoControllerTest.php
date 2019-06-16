<?php

require_once "productInfoController.php";

class productInfoControllerTest extends \PHPUnit\Framework\TestCase
{

    public function testStoreImagePathInDatabase()
    {
        $expectedSql = "UPDATE `PRODUCTINFO` SET `IMG`= ? WHERE `Type` = ?";

        $pdoStatement = $this->getMockBuilder(PDOStatement::class)
            ->disableOriginalConstructor()
            ->setMethods(['execute'])
            ->getMock();

        $pdoStatement->expects($this->once())
            ->method('execute')
            ->with($this->equalTo(["testimg","testtype"]));

        $pdo = $this->getMockBuilder(PDO::class)
            ->disableOriginalConstructor()
            ->setMethods(['prepare'])
            ->getMock();

        $pdo->method('prepare')
            ->willReturn($pdoStatement);

        $pdo->expects($this->once())
            ->method('prepare')
            ->with($this->equalTo($expectedSql));

        $pic = new productInfoController($pdo);
        $pic->storeImagePathInDatabase("testtype", "testimg");
    }

    /**
     * @runInSeparateProcess
     */
    public function testProcessCsv() {

        $path = "pict.csv";
        $csvString = "Frikandel,Drosdfgne,Frikandelledrone,heeeeleleeeemooooiieee dron,Super swag Super snelle,999,/uploads/img/bier.jpg";
        file_put_contents($path, $csvString);

        $expectedSql = "INSERT INTO `PRODUCTINFO` (`Name`, `Type`, `Text`, `Infotext`, `Specs`, `Price`)
                values(?,?,?,?,?,?);";

        $pdoStatement = $this->getMockBuilder(PDOStatement::class)
            ->disableOriginalConstructor()
            ->setMethods(['execute'])
            ->getMock();

        $pdoStatement->expects($this->once())
            ->method('execute')
            ->with($this->equalTo(["Frikandel","Drosdfgne","Frikandelledrone","heeeeleleeeemooooiieee dron","Super swag Super snelle",999]));

        $pdo = $this->getMockBuilder(PDO::class)
            ->disableOriginalConstructor()
            ->setMethods(['prepare'])
            ->getMock();

        $pdo->method('prepare')
            ->willReturn($pdoStatement);

        $pdo->expects($this->once())
            ->method('prepare')
            ->with($this->equalTo($expectedSql));

        $pic = new productInfoController($pdo);
        $pic->processCsv($path);
    }
}
