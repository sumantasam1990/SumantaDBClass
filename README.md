# SumantaDBClass
You can use this class for CRUD Operations.

Example: 
1. First you need to include the class.
2. extends DBClass into your child class.
3. $this->selectResults('table_name'); // for select query.

include 'dbClass.php';
class MyClass extends DBClass {

  public function getProduct() {

    $data = $this->selectResults('product');
	echo '<pre>';
	print_r($data);
  }
}

$myobj = new MyClass;
$myobj->getProduct();

