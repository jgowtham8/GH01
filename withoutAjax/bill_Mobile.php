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

        var name = objCells.item(1).innerHTML;
        var price =  objCells.item(3).innerHTML;
        var qty = document.getElementsByName(qtyInput)[0].value;

        if(qty > 0){
            var lineTotal =  price*qty;
            var table = document.getElementById("billTable");

            var row = table.insertRow();
            var no_ = row.insertCell();
            var name_ = row.insertCell();
            var price_ = row.insertCell();
            var qty_ = row.insertCell();
            var lineTotal_= row.insertCell();
            var remove_= row.insertCell();

            no_.innerHTML = forNum;
            forNum++;
            name_.innerHTML = name;
            price_.innerHTML = price;
            qty_.innerHTML = qty;
            lineTotal_.innerHTML = lineTotal;

            var btnRem = document.createElement("BUTTON");
            btnRem.innerHTML = "Remove";
            btnRem.onclick = function() {removeRow(this);showBillTotal();reNumbering();};
            btnRem.className = "btnr";
            remove_.appendChild(btnRem);
        }
        else{
            window.alert("Please add the Qty..!");
        }

                                         
    }

    function removeRow(x){
        var i = x.parentNode.parentNode.rowIndex;
        document.getElementById("billTable").deleteRow(i);
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
</tr>
<tr>
    <td valign="top">
    <div class="tableContainer">
    <table border="1" cellpadding="0" cellspacing="0" align="left" width="100%" id="itemTable" style="background-color: bisque">
    <thead>
    <tr>
        <th width="5%">No.</th>
        <th width="25%">Name</th>
        <th width="5%">Type</th>
        <th width="25%">Price</th>
        <th width="10%">Qty</th>
        <th width="5%">+</th>
        <th width="5%">-</th>
        <th width="25%">Add</th>
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
                        
                        <td><input id="<?php echo $txtQty; ?>" type="number" name="<?php echo $txtQty; ?>" value="0" style="text-align: center;width: 100%"></td>
                        
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
    </tr>

    <tr>        
        <th>Billed Items/Services</th>
    </tr>

    <tr>
        <td valign="top">
        <div class="tableContainer" style="width: 100%;">
            <table border="1" cellpadding="0" cellspacing="0" align="right" width="100%" id="billTable" style="background-color: yellow">
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