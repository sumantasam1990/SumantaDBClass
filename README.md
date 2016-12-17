# SumantaDBClass
You can use dbClass for CRUD Operations.

Example: 

1. First you need to include the class.
2. use \DBClassNamespace\DBClass; // Call the namespace for preventing naming collisons.
3. extends DBClass into your child class.
4. $this->selectResults('table_name'); // for select query.



include 'dbClass.php';
use \DBClassNamespace\DBClass;

class MyClass extends DBClass {

  public function getProduct() {

    $data = $this->selectResults('product');
	echo '<pre>';
	print_r($data);
  }
}

$myobj = new MyClass;
$myobj->getProduct();


In Progress...
