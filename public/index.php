<?php
include_once "header.php";
include_once "../SRC/model/dbContext.php";
include_once "../SRC/model/item.php";
include_once  "../SRC/model/users.php";
include_once  "../SRC/model/order_details.php";
include_once  "../SRC/model/orders.php";

if(!isset($db)) {
    $db = new dbContext();
}
if (isset($_POST['submit'])) {

    $orderNo = $db->getNextOrderNo();
    $userNo = $db ->getNextUserNo();


    $submitOrder = new orders($orderNo, $userNo,$_POST["tableNo"]);
    $submitUser = new user($userNo,$_POST['name'],$_POST['email']);
    $success = $db->enterUserRequest($submitUser);
    $success = $db->enterOrderRequest($submitOrder);

    $submitItem = new orderDetails($_POST['itemTable'],$orderNo,$_POST['quantity']);
    $db->enterOrder_Details($submitItem);
}

?>
<!doctype HTML>
<!-- Page content -->
<!--see readme document for template references-->
<div class="w3-content" style="max-width:1100px">

  <!-- About Section -->
  <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small"
    </div>

    <div class="w3-col m16 w3-padding-large">
      <h1 class="w3-center">About Le Pub</h1><br>
      <h5 class="w3-center">Tradition since 1889</h5>
      <p class="w3-large">Le Pub was founded to share the smaller local beers and ciders with the community as well as showcasing classic english pub food along with groundbreaking dishes from the continent.</p>
        <p class="w3-large">To lower our waiting times and allow our chefs and bartenders to make use of the absolute best selection of ingredients in our meals and cocktails we recommend that you book either your meal or your drinks such as bottles of wine or exclusive cocktails in a week in advance.  </p>
    </div>
  </div>

  <hr>

  <!-- Menu Section -->
  <div class="w3-row w3-padding-64" id="menu">
    <div class="w3-col l6 w3-padding-large">
      <h1 class="w3-center">Our Menu</h1><br>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <label for="food">Food</label>
            <br>
            <select id="itemTable" class="form-control" name="itemTable">
                <option>--Select Item--</option>
                <?php
                $optionString = "";
                $items = $db->items();
                if ($items) {
                    foreach ($items as $item)
                    {
                        $listItem.= "<option value=".$item->getId().">".$item->getItemName()." - ". $item->getPrice()."</option>";
                    }
                }
                echo $listItem;
                ?>
                <input type="text" name="quantity">
            </select>



    </div>

    <div class="w3-col l6 w3-padding-large">

    </div>
  </div>

  <hr>
<div>
        Table Number: <input type="text" name="tableNo">
        Name: <input type="text" name="name">
        Email: <input type="text" name="email">
        <input name="submit" id="submit" onclick="" type="submit" value="Order">

    </form>
</div>

  <div class="w3-container w3-padding-64" id="contact">
    <h1>Contact</h1><br>
    <p>If you have issues with the website or your order do not hesitated to contact us on phone 00553123-2323 or email lepub@pub.com</p>
  </div>
<?php
include_once "footer.php";
?>


