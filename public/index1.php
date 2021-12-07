<?php
/*
1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: продукт, ценник, посылка и т.п.
2. Описать свойства класса из п.1 (состояние).
3. Описать поведение класса из п.1 (методы).
*/

class Product
{
    public $id;
    public $title;
    public $describe;
    public $price;

    public function getId()
    {
        echo "<p>$this->id</p>";
    }

    public function getDescribe()
    {
        echo "<p>$this->describe</p>";
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function view()
    {
        echo "<h1>$this->title</h1><p>$this->describe</p><p>$this->price</p>";
    }
}

$productItem = new Product();
$productItem->id = 1;
$productItem->title = 'Phone';
$productItem->describe = 'Some describe of product';
$productItem->price = 10500;
$productItem->view();

$productPrice = $productItem->getPrice();
echo $productPrice . '<br>';

// Класс Product  у которого есть свойства: id, Название, Описание, цена. 
// Так же у этого класса есть методы: 
// getId - выводит id продукта, 
// getDescribe - выводит описание продукта,
// getPrise - возвращает цену продукта, 
// view - выводит одновременно название продукта, описание продукта и цену продукта


/* 
4. Придумать наследников класса из п.1. Чем они будут отличаться?
*/

class orderedProduct extends Product {
    public $count;

    public function getCountProduct (){
        return $this->count;
    }
}

$newOderedProd = new orderedProduct();
$newOderedProd->count = 113568;
$countProd = $newOderedProd->getCountProduct();
echo $countProd . '<br>';
$newOderedProd->id = 2;
$newOderedProd->title = 'TV';
$newOderedProd->describe = 'Some TV';
$newOderedProd->price = 12450;
$newOderedProd->view();

// Класс orderedProduct является наследником класса Product и имеет все его доступные свойства и методы, 
// а также свой метод getCountProduct, который возвращает количество заказанного товара.


/* 
5. Дан код. Что он выведет на каждом шаге? Почему?
*/

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A(); // 
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();
// Выводит 1234 - так как мы создали 2 объекта одного класса,
// переменная в функции статичная поэтому каждый следующий вызов работает с предыдущимми изменениями 


/*
6. Немного изменим п.5ю Объясните результаты в этом случае.
*/

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {               
}
$a1 = new A();
$b1 = new B();
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo();
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo();

// Выводит 1122 - так как создали новый класс B наследник класса A. 
// Поскольку, переменная $x статичная,а объекты a1 и b1 созданы от разных классов, то выводятся изменения в каждом объекте отдельно


/*
7. *Дан код. Что он выведет на каждом шаге? Почему?
*/

class A {
    public function foo() {
    static $x = 0;
    echo ++$x;
    }
    }
    class B extends A {
    }
    $a1 = new A;
    $b1 = new B;
    $a1->foo(); 
    $b1->foo(); 
    $a1->foo(); 
    $b1->foo(); 

// Выводит 1122 - так как создали новый класс B наследник класса A. 
// Поскольку, переменная $x статичная,а объекты a1 и b1 созданы от разных классов, то выводятся изменения в каждом объекте отдельно.
// Поскольку нет конструктора и передавать параметры ненадо, то при создании нового объекта не указываются скобки.