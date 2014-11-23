<?php

session_start();

$page = 'index2.php';

$connect = mysql_connect("localhost","organis2_admin","dublin") or die("Could not connect to the database.");
mysql_selectdb("organis2_project") or die("Could not find the database.");

if (isset($_GET['add'])) {
$quantity = mysql_query('SELECT id, quantity FROM shoppingcart WHERE id='.mysql_real_escape_string((int)$_GET['add']));
while ($quantity_row = mysql_fetch_assoc($quantity)) {
if ($quantity_row['quantity']!=$_SESSION['quantity_'.(int)$_GET['add']]) {
$_SESSION['quantity_'.(int)$_GET['add']]+='1';
}
}
header('Location: '.$page);
}

if (isset($_GET['remove'])) {
$_SESSION['quantity_'.(int)$_GET['remove']]--;
header('Location:'.$page);
}

if (isset($_GET['delete'])) {
$_SESSION['quantity_'.(int)$_GET['delete']]='0';
header('Location:'.$page);
}

function products(){
$get = mysql_query('SELECT id, product, description, price FROM shoppingcart WHERE quantity > 0 AND id BETWEEN 1 AND 2 ORDER BY id DESC');
if (mysql_num_rows($get)==0){
echo "There are no products to display.";
}
else{
while($get_row = mysql_fetch_assoc($get)){
echo '<p>'.$get_row['product'].'<br />'.$get_row['description'].'<br />&euro;'.number_format($get_row['price'], 2).'<a href="shoppingcart.php?add='.$get_row['id'].'">Add</a></p>';

}
}
}





function products1(){
$get = mysql_query('SELECT id, product, description, price FROM shoppingcart WHERE quantity > 0 AND id BETWEEN 3 AND 5 ORDER BY id DESC');
if (mysql_num_rows($get)==0){
echo "There are no products to display.";
}
else{
while($get_row = mysql_fetch_assoc($get)){
echo '<p>'.$get_row['product'].'<br />'.$get_row['description'].'<br />&euro;'.number_format($get_row['price'], 2).'<a href="shoppingcart.php?add='.$get_row['id'].'">Add</a></p>';

}
}
}

function paypal_products() {
$num = 0;
foreach($_SESSION as $product => $value) {
if ($value!=0) {
if (substr($product, 0, 9)=='quantity_') {
$id = substr($product, 9, (strlen($product)-9));
$get = mysql_query('SELECT id, product, price FROM shoppingcart WHERE id='.mysql_real_escape_string((int)$id));
while ($get_row = mysql_fetch_assoc($get)) {
$num++;
echo '<input type="hidden" name="item_number_'.$num.'" value="'.$id.'">';
echo '<input type="hidden" name="item_name_'.$num.'" value="'.$get_row['product'].'">';
echo '<input type="hidden" name="amount_'.$num.'" value="'.$get_row['price'].'">';
echo '<input type="hidden" name="handling_'.$num.'" value="20">';
echo '<input type="hidden" name="quantity_'.$num.'" value="'.$value.'">';
}
}
}
}
}


function cart() {
$sub="";
$total="";
foreach($_SESSION as $product => $value) {
if ($value>0) {
if (substr($product, 0, 9)=='quantity_') {
$id = substr($product, 9, (strlen($product)-9));
$get = mysql_query('SELECT id, product, price FROM shoppingcart WHERE id='.mysql_real_escape_string((int)$id));
while ($get_row = mysql_fetch_assoc($get)) {
$sub = $get_row['price']*$value;
echo $get_row['product'].' x '.$value.' @ &euro;'.number_format($get_row['price'], 2).' = &euro;'.number_format($sub, 2).'<a href="shoppingcart.php?remove='.$id.'">[-]</a> <a href="shoppingcart.php?add='.$id.'">[+]</a> <a href="shoppingcart.php?delete='.$id.'">[Delete]</a><br />';
}
}
$total += $sub;
}
}
if ($total==0) {
echo "Your cart is empty.";
}
else {
echo 'Total: &euro;'.number_format($total, 2);
?>
<p>
<form action="https://www.paypal.c...cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="business" value="admin@organisemiparty.hostingspace.com">
<?php paypal_products(); ?>
<input type="hidden" name="currency_code" value="EUR">
<input type="hidden" name="amount" value="<?php echo $total; ?>">
<input type="image" src="http://www.paypal.co...lick-but03.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>
</p>

<?php

}
}

?>