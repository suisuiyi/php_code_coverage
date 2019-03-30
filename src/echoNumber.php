<?php
/**
 * Created by PhpStorm.
 * User: suisuiyi
 * Date: 2019/3/30
 * Time: 10:38
 */


require __DIR__ . '/../vendor/autoload.php';


$filter = new \SebastianBergmann\CodeCoverage\Filter();
$filter->addDirectoryToWhitelist(__FILE__);

$coverage = new \SebastianBergmann\CodeCoverage\CodeCoverage(null, $filter);
$coverage->start('<name of test>');




class echoNumber
{

    function add($a, $b)
    {
        echo $a + $b . PHP_EOL;
    }

    function minus($a, $b)
    {
        echo $a - $b . PHP_EOL;
    }

    function multiply($a, $b)
    {
        echo $a * $b . PHP_EOL;
    }

    function devide($a, $b)
    {
        echo $a / $b . PHP_EOL;
    }

    function call($a, $b)
    {
        $this->add($a, $b);
    }


}


$f = new echoNumber();
$f->add(3,4);
$f->multiply(2,3);
$f->call(5,6);
$f->minus(10, 9);
$f->devide(20, 5);


$coverage->stop();
$writer = new \SebastianBergmann\CodeCoverage\Report\Html\Facade();
$writer->process($coverage, __DIR__."/../code-coverage-report")
?>


