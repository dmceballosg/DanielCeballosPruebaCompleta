<?php
namespace Phppot;

use \Phppot\DataSource;

class ProductsOptional
{

    private $dbConn;

    private $ds;

    function __construct()
    {
        require_once "DataSource.php";
        $this->ds = new DataSource();
    }

    function editProducts($id, $stock)
    {  
        $dateupdate = date("Y-m-d h:i:s"); 
        $query = " UPDATE products SET stock = ?, sell_date = ? WHERE id = ? ";
        $paramType = "isi";
        $paramArray = array($stock, $dateupdate, $id);
        $ProductsResult = $this->ds->update($query, $paramType, $paramArray);
        return $ProductsResult;
    }

}

$information = json_decode($_POST["information"]);
$product_optional = new ProductsOptional();
echo $product_optional->editProducts($information->id, $information->stock);
 