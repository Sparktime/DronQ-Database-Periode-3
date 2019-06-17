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
        $csvString = "TextA,TextB,TextC,TextD,TextE,999";
        file_put_contents($path, $csvString);

        $expectedSql = "INSERT INTO `PRODUCTINFO` (`Name`, `Type`, `Text`, `Infotext`, `Specs`, `Price`)
                values(?,?,?,?,?,?);";

        $pdoStatement = $this->getMockBuilder(PDOStatement::class)
            ->disableOriginalConstructor()
            ->setMethods(['execute'])
            ->getMock();

        $pdoStatement->expects($this->once())
            ->method('execute')
            ->with($this->equalTo(["TextA","TextB","TextC","TextD","TextE",999]));

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
