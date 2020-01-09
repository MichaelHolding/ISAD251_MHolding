<?php
include_once "header.php"
include_once '../src/model/dbContext.php';
include_once '../src/model/item.php';
?>
<!doctype html>
<div class="w3-row w3-padding-64" id="basket">
<h2>User ID</h2>
<textarea style="height: 24px"></textarea>
<br>
<h2>Table Number</h2><textarea style="height: 24px"></textarea>
<br>
    <h2>Order Content</h2>

    <!--section to show the contents of the particular order-->
<button class = "w3-btn" id="submit order">Submit</button>
</div>
</html>

<?php
include_once "footer.php"
?>

