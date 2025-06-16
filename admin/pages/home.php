<?php include './helper/order_list.php'?>

<nav id="navbar">
    <a href="">
        <h2>Online Food Ordering System</h2>
    </a>
    <button id="bugir-btn">
        <i class="gg-menu"></i>
    </button>
    <ul id="nav-menu" class="hidden">
        <li>
            <a
                class="<?= !isset($_GET['table']) ? 'active' : '' ?>" 
                href="index.php?page=home">Orders</a>
        </li>
        <li>
            <a 
                class="<?= isset($_GET['table']) && $_GET['table'] == 'toship' ? 'active' : '' ?>"
                href="index.php?page=home&table=toship">To Ship</a>
        </li>
        <li>
            <a 
                class="<?= isset($_GET['table']) && $_GET['table'] == 'toreceive' ? 'active' : '' ?>"
                href="index.php?page=home&table=toreceive">To Receive</a>
        </li>
        <li>
            <a 
                class="<?= isset($_GET['table']) && $_GET['table'] == 'completed' ? 'active' : '' ?>" 
                href="index.php?page=home&table=completed">Completed</a>
        </li>
        <li>
            <a
                class="<?= isset($_GET['table']) && $_GET['table'] == 'rejected' ? 'active' : '' ?>" 
                href="index.php?page=home&table=rejected">Rejected</a>
        </li>
        <li>
            <a href="index.php?page=logout">Logout</a>
        </li>
    </ul>
</nav>
<div class="home-page">
    <table>
        <tr>
            <th>Order ID</th>
            <th>Full Name</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th>Additional Info</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Order Date</th>
            <th><?= isset($_GET['table']) && $_GET['table'] == 'completed' ? 'Status':'Actions' ?></th>
        </tr>
        <?php if(empty($orders)){echo '<h1 class="no">Table Empty</h1>';}?>
        <?php foreach($orders as $item): ?>
            <!-- compute total price  -->
        <?php
            $total = floatval($item['price']);
            $total *= $item['quantity'];  
            //for date format
            $date = $item['ordered_at'];
            $date = strtotime($date);
            $date = date('d-M-Y', $date);
            
        ?>
        <tr>
            <td><?=$item['id']?></td>
            <td><?=$item['fullname']?></td>
            <td><?=$item['phone_number']?></td>
            <td><?=$item['address']?></td>
            <td><?=$item['additional_info']?></td>
            <td><?=$item['food_name']?></td>
            <td>₱<?=$item['price']?></td>
            <td><?=$item['quantity']?></td>
            <td>₱<?=$total?></td>
            <td><?=$date?></td>
            <!-- condition for actions button  -->
            <?php if($item['status'] == 'to ship'){?>
            <td class="actions">
                <a href="index.php?ship=<?=$item['id']?>">SHIP</a>
                <a href="index.php?reject=<?=$item['id']?>">CANCEL</a>
            </td>
            <?php }elseif($item['status'] == 'to receive'){ ?>
            <td class="actions">
                <a href="index.php?delivered=<?=$item['id']?>">DELIVERED</a>
            </td>
            <?php }elseif($item['status'] == 'received' || $item['status'] == 'completed'){ ?>
            <td class="actions">
                <span id="<?=$item['status']?>">Received</span>
            </td>
            <?php }elseif($item['status'] == 'rejected'){ ?>
            <td class="actions">
                
            </td>
            <?php }else{ ?>
            <td class="actions">
                <a href="index.php?approve=<?=$item['id']?>">APPROVE</a>
                <a href="index.php?reject=<?=$item['id']?>">REFUSE</a>
            </td>
            <?php } ?>
        </tr>
        <?php endforeach?>
    </table>
</div>