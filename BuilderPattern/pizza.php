<?php
 
class Pizza {
 
    private $sDough;
    private $sSauce;
    private $sTopping;
 
    public function setDough($sDough) {
        $this->sDough = $sDough;
    }
 
    public function setSauce($sSauce) {
        $this->sSauce = $sSauce;
    }
 
    public function setTopping($sTopping) {
        $this->sTopping = $sTopping;
    }
 
    public function echoIngredient() {
 
        echo "Dough   : ".$this->sDough."<br/>";
        echo "Sauce   : ".$this->sSauce."<br/>";
        echo "Topping : ".$this->sTopping."<br/>";
    }
}
 
abstract class PizzaBuilder {
 
    protected $oPizza;
 
    public function getPizza() {
 
        return $this->oPizza;
    }
 
    public function createNewPizzaProduct() {
 
        $this->oPizza = new Pizza();
    }
 
    public abstract function buildDough();
    public abstract function buildSauce();
    public abstract function buildTopping();
}
 
class HawaiianPizzaBuilder extends PizzaBuilder {
 
    public function buildDough() {
 
        $this->oPizza->setDough("cross");
    }
 
    public function buildSauce() {
 
        $this->oPizza->setSauce("mild");
    }
 
    public function buildTopping() {
 
        $this->oPizza->setTopping("ham+pineapple");
    }
}
 
class SpicyPizzaBuilder extends PizzaBuilder {
 
    public function buildDough() {
 
        $this->oPizza->setDough("pan baked");
    }
 
    public function buildSauce() {
 
        $this->oPizza->setSauce("hot");
    }
 
    public function buildTopping() {
 
        $this->oPizza->setTopping("pepperoni+salami");
    }
}
 
class Waiter {
 
    private $oPizzaBuilder;
 
    public function setPizzaBuilder(PizzaBuilder $oPizzaBuilder) {
 
        $this->oPizzaBuilder = $oPizzaBuilder;
    }
 
    public function getPizza() {
 
        return $this->oPizzaBuilder->getPizza();
    }
 
    public function constructPizza() {
 
        $this->oPizzaBuilder->createNewPizzaProduct();
        $this->oPizzaBuilder->buildDough();
        $this->oPizzaBuilder->buildSauce();
        $this->oPizzaBuilder->buildTopping();
    }
}
 
class Tester {
 
    public static function main() {
 
        $oWaiter               = new Waiter();
        $oHawaiianPizzaBuilder = new HawaiianPizzaBuilder();
        $oSpicyPizzaBuilder    = new SpicyPizzaBuilder();
 
        $oWaiter->setPizzaBuilder($oHawaiianPizzaBuilder);
        $oWaiter->constructPizza();
 
        $oPizza = $oWaiter->getPizza();
        $oPizza->echoIngredient();
 
        echo "<br/>";
 
        $oWaiter->setPizzaBuilder($oSpicyPizzaBuilder);
        $oWaiter->constructPizza();
 
        $oPizza = $oWaiter->getPizza();
        $oPizza->echoIngredient();
    }
}
 
Tester::main();