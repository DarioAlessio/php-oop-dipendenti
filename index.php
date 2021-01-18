<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dipendenti</title>
  </head>
  <body>

    <!-- REPO:
    creare 3 classi per rappresentare la seguente realta':
    - persona
    - dipendente
    - boss
    cercare inoltre di sciegliere alcune variabili di istanza (max 3 o 4 per classe) che possono avere senso in questa realta'
     e decidere le relazione di parantela (chi estende chi);
    per ogni classe definire eventuale classe padre, variabili di istanza, costruttore, proprieta' e toString;
    instanziando le varie classi provare a stampare cercando di ottenere un log sensato -->
    <?php


          class Person{
              private $name;
              private $lastname;
              private $gender;

              public function __construct($name, $lastname, $gender) {
                          $this -> setName($name);
                          $this -> setLastname($lastname);
                          $this -> setGender($gender);
              }

               public function getName() {
                   return $this -> name;
               }
               public function setName($name) {
                   $this -> name = $name;
               }
               public function getLastname() {
                   return $this -> lastname;
               }
               public function setLastname($lastname) {
                   $this -> lastname = $lastname;
               }
               public function getGender() {
                   return $this -> gender;
               }
               public function setGender($gender) {
                   $this -> gender = $gender;
               }
               public function __toString() {
                   return
                       'name: ' . $this -> getName() . '<br>'
                       . 'lastname: ' . $this -> getLastname() . '<br>'
                       . 'gender: ' . $this -> getGender();

               }

          }

          class Employee extends Person {
               private $salary;
               private $contract;
               private $benefit;
               public function __construct($name, $lastname, $gender, $salary,
                                           $contract, $benefit) {
                   parent::__construct($name, $lastname, $gender);
                   $this -> setSalary($salary);
                   $this -> setContract($contract);
                   $this -> setBenefit($benefit);
               }

               public function getSalary() {
                   return $this -> salary;
               }
               public function setSalary($salary) {
                   $this -> salary = $salary;
               }
               public function getContract() {
                   return $this -> contract;
               }
               public function setContract($contract) {
                   $this -> contract = $contract;
               }
               public function getBenefit() {
                   return $this -> benefit;
               }
               public function setBenefit($benefit) {
                   $this -> benefit = $benefit;
               }
               public function __toString() {
                   return parent::__toString() . '<br>'
                       . 'salary: ' . $this -> getSalary() . '<br>'
                       . 'contract: ' . $this -> getContract(). '<br>'
                       . 'benefit: ' . $this -> getBenefit();
               }

          }

          class Boss extends Person {
               private $profit;
               private $investment;
               private $slogan;
               public function __construct($name, $lastname, $gender, $profit,
                                           $investment, $slogan) {
                   parent::__construct($name, $lastname, $gender);
                   $this -> setProfit($profit);
                   $this -> setInvestment($investment);
                   $this -> setSlogan($slogan);
               }

               public function getProfit() {
                   return $this -> profit;
               }
               public function setProfit($profit) {
                   $this -> profit = $profit;
               }
               public function getInvestment() {
                   return $this -> investment;
               }
               public function setInvestment($investment) {
                   $this -> investment = $investment;
               }
               public function getSlogan() {
                   return $this -> slogan;
               }
               public function setSlogan($slogan) {
                   $this -> slogan = $slogan;
               }

               public function __toString() {

                   return parent::__toString() . '<br>'
                       . 'profit: ' . $this -> getProfit() . '<br>'
                       . 'investment: ' . $this -> getInvestment(). '<br>'
                       . 'material: ' . $this -> getSlogan();
               }

          }

          $person = new Person('Silvano','Rogi','M');
          $employee = new Employee('Paolo', 'Bitta', 'M', 'Infinito', 'Uomo chiamato contratto', 'Alfa');
          $boss = new Boss('Augusto', 'De Marinis', 'M', 'Pochi causa dipendenti!! ', 'Fusione', 'lei è un cretino...');
          echo '<h1>Person</h1><br>' . $person . '<br><br>'
               . '<h1>Employee</h1><br>' . $employee . '<br><br>'
               . '<h1>Boss</h1><br>' . $boss;

     ?>

  </body>
</html>
