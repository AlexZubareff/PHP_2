<?php

/*
 1.оздать структуру классов ведения товарной номенклатуры.
*/

abstract class Product
{

    public $id;
    public $title;
    public $describe;
    public $price;
    public $count;

    // метод подсчета стоимости товара
    public function totalPrice()
    {
        $price = $this->price;
        $count = $this->count;
        $totalPrice = $price * $count;
        echo $totalPrice . '<br>';
    }
}

class digitProduct extends Product
{
    // переопределили метод подсчета товара. Просто выводит стоимость.
    public function totalPrice()
    {
        echo $this->price . '<br>';
    }
}

class itemProduct extends Product
{
}

class weightProduct extends Product
{
}

$newDigit = new digitProduct;
$newDigit->price = 35000;
$newDigit->totalPrice();

$newItem = new itemProduct;
$newItem->price = 15000;
$newItem->count = 10;
$newItem->totalPrice();

$newWeight = new itemProduct;
$newWeight->price = 7000;
$newWeight->count = 15;
$newWeight->totalPrice();

// в абстрактный класс можно вынести общие для всех наследников свойства и методы.



/* 
2. Реализовать паттерн Singleton при помощи traits. 
*/

trait SingletonDbConnect
{
    private static $instance;
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    private function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "Qas6932";
        $dbname = "php_gb";

        // Создаем соединение
        $connect = mysqli_connect($servername, $username, $password, $dbname);
        mysqli_set_charset($connect, "utf8");

        // ПРоверяем соединение
        if (!$connect) {
            die("Соединение с Базой данных не установлено!");
        }
    }
}

class dbConnect
{
    use SingletonDbConnect;
}

$a = dbConnect::getInstance();
var_dump($a);