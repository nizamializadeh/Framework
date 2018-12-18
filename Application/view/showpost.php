<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h2>HTML Table</h2>

<table>
    <tr>
        <th>TITLE</th>
        <th>DESC</th>
        <th>USERNAME</th>
        <th>Action</th>
        <th>Rating</th>
    </tr>
    <?php if(isset($_SESSION['statu'])) {  ?> <p class="login-box-msg"><?=$_SESSION['statu'];?></p>  <?php } ?>
    <?php
    if(isset($data)!=0)
    {
        foreach($data as $key => $value)
        {
            ?>
            <tr>
                <td><?=$value['title'];?></td>
                <td><?=$value['description'];?></td>
                <td><?=$_SESSION['email'];?></td>
                <th><a href="<?=SITE_URL;?>/posts/delete/<?=$value['id'];?>">Delete</a></th>
                <th><a href="<?=SITE_URL;?>/posts/getrating/<?=$value['id'];?>">Rating ver</a></th>
            </tr>
            <?php
        }
    }

    ?>
</table>

</body>
</html>
