<?php
include 'session.php';
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Billing</title>
    <link rel="stylesheet" type="text/css" href="css/billCSS.css">

<script type="text/javascript">
    function addQty(x) {
        var qty = document.getElementsByName(x)[0].value;
        qty++;

        if(qty<1){
            document.getElementsByName(x)[0].value = "0";
        }
        else{
            document.getElementsByName(x)[0].value = qty;
        }
                                      
    }

    function removeQty(x) {
        var qty = document.getElementsByName(x)[0].value;
        qty--;
        if(qty<1){
            document.getElementsByName(x)[0].value = "0";
        }
        else{
            document.getElementsByName(x)[0].value = qty;
        }
    }
    
    var forNum = 1;
    function addToBill(qtyInput,rowNo) {

        var myTab = document.getElementById("itemTable");
        var objCells = myTab.rows.item(rowNo).cells

        //getting data (name, price, qty) from from table
        var name = objCells.item(1).innerHTML;
        var price =  objCells.item(3).innerHTML;
        var qty = document.getElementsByName(qtyInput)[0].value;

        if(qty > 0){
            var lineTotal =  price*qty;
            var table = document.getElementById("billTable");

            var row = table.insertRow(); //inserting row to bill table
            //inserting cells to that inserted row
            var no_ = row.insertCell();
            var name_ = row.insertCell();
            var price_ = row.insertCell();
            var qty_ = row.insertCell();
            var lineTotal_= row.insertCell();
            var remove_= row.insertCell();

            //setting data to that inserted cells
            no_.innerHTML = forNum;
            forNum++;
            name_.innerHTML = name;
            price_.innerHTML = price;
            qty_.innerHTML = qty;
            lineTotal_.innerHTML = lineTotal;

            var btnRem = document.createElement("BUTTON"); //creating row remove button
            btnRem.innerHTML = "Remove";//setting name to that button
            btnRem.onclick = function() {removeRow(this);showBillTotal();reNumbering();};//setting function to that button
            btnRem.className = "btnr";//setting class for css
            remove_.appendChild(btnRem);//joining that button into cell of bill table's row
        }
        else{
            window.alert("Please add the Qty..!");
        }

                                         
    }

    function removeRow(x){
        if (confirm("Are you sure to DELETE?")) {
            var i = x.parentNode.parentNode.rowIndex;
            document.getElementById("billTable").deleteRow(i);
        }        
    }

    function reNumbering() {
        var myTab = document.getElementById('billTable');

        // LOOP THROUGH EACH ROW OF THE TABLE AFTER HEADER.
        for (i = 1; i < myTab.rows.length; i++) {
            
            var objCells = myTab.rows.item(i).cells;            
            objCells.item(0).innerHTML = i;
            
        }
    }
    
    function showBillTotal() {
        var myTab = document.getElementById('billTable');

        // LOOP THROUGH EACH ROW OF THE TABLE AFTER HEADER.
        var total = 0;
        for (i = 1; i < myTab.rows.length; i++) {
            
            var objCells = myTab.rows.item(i).cells;            
            var lineTotal = objCells.item(4).innerHTML;
            var lineTotal2 = Number(lineTotal);
            var total = total + lineTotal2;
            
        }
        
        info.innerHTML = "Total = Rs." + total;
    }
    
</script>

</head>

<body>
<h3 align="center">Billing</h3>
<table border="0" width="98%" align="center">
<tr>
    <th>Available Items/Services</th>
    <th>Billed Items/Services</th>
</tr>
<tr>
    <td valign="top">
    <div id="outPopUp" class="tableContainer">
    <table border="1" cellpadding="0" cellspacing="0" align="left" width="98%" id="itemTable" style="background-color: bisque">
    <thead>
    <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Type</th>
        <th>Price</th>
        <th>Qty</th>
        <th>+</th>
        <th>-</th>
        <th>Add</th>
    </tr>
    </thead>
    <tbody>
        <?php
            $sql = "select * from items";
            $res=$db->query($sql);
            if($res->num_rows>0){
                $res=$db->query($sql);

                $i=0;
                while($r = mysqli_fetch_array($res)){
                    ++$i;                 
                    $RecordID = $r[0];
                    $btnNameAdd = "btnAdd".$i;
                    $btnRemove = "btnRemove".$i;
                    $txtQty = "txtQty".$i;
                    $btnAddToBill = "btnBill".$i;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $r["Name"]; ?></td>
                        <td><?php echo $r["Type"]; ?></td>
                        <td><?php echo $r["price"]; ?></td>
                        
                        <td><input id="<?php echo $txtQty; ?>" type="number" name="<?php echo $txtQty; ?>" value="0" style="text-align: center;"></td>
                        
                        <td><button class="btnr" name="<?php echo $btnNameAdd; ?>" 
                            onclick="addQty('<?php echo $txtQty;?>')">+</button></td>
                        
                        <td><button class="btnr" name="<?php echo $btnRemove; ?>" 
                            onclick="removeQty('<?php echo $txtQty;?>')">-</button></td>
                        
                        <td><button class="btnr" name="<?php echo $btnAddToBill; ?>" 
                                    onclick="addToBill('<?php echo $txtQty;?>','<?php echo $i;?>');showBillTotal();">Add</button></td>
                    </tr>
            <?php
                }
            }
            ?>
                                
    </tbody>
    </table>
    </div>
    </td>
                <td valign="top">
                    <div id="outPopUp" class="tableContainer">
                        <table border="1" cellpadding="0" cellspacing="0" align="right" width="98%" id="billTable" style="background-color: yellow">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Line Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <label id="info" class="label">Total = Rs.0</label>
                </td>
            </tr>
        </table>

    </body>
</html>