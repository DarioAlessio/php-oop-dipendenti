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
    <!-- step 2 -->
      <!-- GOAL: sulla base dell'esercizio di ieri (vedi correzione qui su slack) aggiungere i seguenti vincoli di integrita':
      - nomi e cognomi devono essere di >3 caratteri
      - i livelli di sicurezza devono essere [1;5] per i dipendenti e [6;10] per i boss
      - ral employee [10.000;100.000]
      - non puo' esistere boss senza dipendenti
      Durante la fase di test, utilizzare il costrutto try-catch per gestire l'errore e informare l'utente -->
    <?php


          class Person{
              private $name;
              private $lastname;

              public function __construct($name, $lastname) {
                          $this -> setName($name);
                          $this -> setLastname($lastname);
              }

               public function getName() {
                   return $this -> name;
               }
               public function setName($name) {
                   if (strlen($name) < 3) {
                        $d =  new checkName('caratteri più di 3');
                       throw $d;
                   }

                   $this -> name = $name;
               }
               public function getLastname() {
                   return $this -> lastname;
               }
               public function setLastname($lastname) {
                 if (strlen($lastname) < 3) {
                      $d = new checkLastName('caratteri più di 3');
                      throw $d;
                 }
                 $this -> lastname = $lastname;
               }

               public function __toString() {
                   return
                       'name: ' . $this -> getName() . '<br>'
                       . 'lastname: ' . $this -> getLastname();

               }

          }

          class Employee extends Person {
               private $ral;
               private $contract;
               private $benefit;
               private $securyLvl;

               public function __construct($name, $lastname,  $ral,
                                           $contract, $benefit, $securyLvl) {
                   parent::__construct($name, $lastname, $securyLvl);
                   $this -> setRal($ral);
                   $this -> setContract($contract);
                   $this -> setBenefit($benefit);
                   $this -> setSecuryLvl($securyLvl);
               }

               public function getRal() {
                   return $this -> ral;
               }
               public function setRal($ral) {
                   if ($ral < 10000 || $ral > 100000) {
                      $d = new checkRal ('deve essere compreso tra 10000 e 100000');
                      throw $d;
                   }

                   $this -> ral = $ral;
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
               public function getSecuryLvl() {
                   return $this -> securyLvl;
               }
               public function setSecuryLvl($securyLvl) {
                 if ($securyLvl < 1 || $securyLvl > 5) {
                  $d = new checkSecuryLvl('il valore deve essere compreso tra 1 e 5');
                  throw $d;
                }
                $this -> securyLvl = $securyLvl;
               }
               public function __toString() {
                   return parent::__toString() . '<br>'
                       . 'ral: ' . $this -> getRal() . '<br>'
                       . 'contract: ' . $this -> getContract(). '<br>'
                       . 'benefit: ' . $this -> getBenefit() . '<br>'
                       . 'securyLvl: ' . $this -> getSecuryLvl();
               }



          }

          class Boss extends Employee {
               private $profit;
               private $investment;
               private $employees;


               public function __construct($name, $lastname,
                                           $ral, $contract, $benefit,$securyLvl,
                                           $profit,$investment, $employees = []) {
                   parent::__construct($name, $lastname,  $ral, $contract, $benefit, $securyLvl);
                   $this -> setProfit($profit);
                   $this -> setInvestment($investment);
                   $this -> setEmployees($employees);
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
               public function getEmployees() {
                   return $this -> $employees;
               }
               public function setEmployees($employees) {

                  if ($employees === [] || !is_array($employees)) {
                    $d = new noEmployees('non può essere vuoto');
                    throw $d;
                  }
                   $this -> employees = $employees;
               }


               public function setSecuryLvl($securyLvl) {
          				if ($securyLvl < 6 || $securyLvl > 10) {
          					$f = new checkSecuryLvl('il valore deve essere compreso tra 6 e 10');
          					throw $f;
          				}
          				$this -> securyLvl = $securyLvl;
          		 }
               public function getEmployeesStr(){
                    $str = "";
                    for ($i=0; $i < count($this -> getEmployees()) ; $i++) {
                      $em = $this -> getEmployees()[$i];
                      $fullname = $em -> getName() . ' ' . $em -> getLastname();
                      $str .= ($i + 1) . ": " .  $fullname . "<br>" ;
                    }
                    return $str;
               }
               public function __toString() {
                 return parent::__toString().'<br>'
                     . 'profit: ' . $this -> getProfit() . '<br>'
                     . 'investment: ' . $this -> getInvestment(). '<br>'
                     . 'employees: ' . $this -> getEmployeesStr();

               }
          }

          class checkName extends Exception {}
      		class checkLastName extends Exception {}
      		class checkRal extends Exception {}
      		class checkSecuryLvl extends Exception {}
      		class noEmployees extends Exception {}

            try {//person
        			echo 'Person: <br>';
        			$person1 = new Person('Porto','fiore');
        			echo $person1;
        		} catch (checkName $d) {
        			echo 'Error: Name is not valid!<br>';
        		} catch (checkLastName $d) {
        			echo 'Error: Lastname is not valid!<br>';
        		} finally {
        			echo '<br><br>';
        		}

            try {//employee
        			echo 'Employee: <br>';
        			$employee1 = new Employee('Dario','Rossi',25000,'ind','alfa',4);
        			echo $employee1;
        		} catch (checkName $d) {
        			echo 'Error: ' . $d -> getMessage();
        		} catch (checkLastName $d) {
        			echo 'Error: ' . $d -> getMessage();
        		} catch (checkRal $d) {
        			echo 'Error: ' . $d -> getMessage();
        		} catch (checkSecuryLvl $d) {
        			echo 'Error: ' . $d -> getMessage();
        		} finally {
        			echo '<br><br>';
        		}

            try {//boss array non lo vedo e il livello di sicurezza neanche !!!
        			echo 'Boss: <br>';
        			$boss = new Boss('Mario','Rossi',70000,'infinito','aereo', 7 ,1000000,200000,[$employee1]);
        			echo $boss;
            } catch (checkName $d) {
        			echo 'Error: ' . $d -> getMessage();
        		} catch (checkLastName $d) {
        			echo 'Error: ' . $d -> getMessage();
        		} catch (checkRal $d) {
        			echo 'Error: ' . $d -> getMessage();
        		} catch (checkSecuryLvl $f) {
        			echo 'Error: ' . $f -> getMessage();
        		} finally {
        			echo '<br><br>';
        		}









     ?>

  </body>
</html>
