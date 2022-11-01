<?php
session_start();
if (!isset($_SESSION['todo'])) {
    $_SESSION['todo'] = [];
}
?>
<html>

<head>
    <title>TODO List</title>
    <link href="style.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <h2>TODO LIST</h2>
        <h3>Add Item</h3>
        <p>
            <!-- edit function using php -->
            <?php
          
            if (isset($_POST["edit"])) {
                $m2 = $_POST["editing"];
                echo '<style>.n1{display:none;}.adds{display:none; }</style>';
                $v3 = $_SESSION['todo'][$m2]["name"];
                echo '<form action="" method="post"><input id="new-task" name="new1" value="' . $v3 . '" type="text"><button type="submit" class="update" value = ' . $m2 . '  name="update1">update</button></form>';
            }
            // update function updated the value into the array
            if (isset($_POST["update1"])) {
                $m5 = $_POST["new1"];
                $m4 = $_POST["update1"];
                foreach ($_SESSION['todo'] as $k5 => $v5) {
                    if ($k5 == $m4) {
                        $_SESSION['todo'][$k5]["name"] = $m5;
                    }
                }
            }
            // delete function using array splice
            if (isset($_POST["delete"])) {
                $m3 = $_POST["deleteing"];
                foreach ($_SESSION['todo'] as $k4 => $v4) {
                    if ($k4 == $m3) {
                        array_splice($_SESSION['todo'], $k4, 1);
                    }
                }
            }
            ?>

            <!-- form start -->
        <form action="" method="post">
            <input id="new-task" name="new1" class="n1" value="<?php echo $v3 ?>" type="text">
            <button type="submit" class="adds" name="add">Add</button>
        </form>
        </p>
        <h3>Todo</h3>
        <ul id="incomplete-tasks">
        </ul>
        <?php
        if (isset($_POST["add"])) {
            $new = $_POST["new1"];
            if($new == "")
            {
                echo '<script>alert("please fill this field")</script>';
            }
            else
            {
            array_push($_SESSION['todo'], array("name" => $new, "status" => "false", "val" => "unchecked"));
            }
        }
        echo "<table>";
        foreach ($_SESSION['todo'] as $k1 => $v1) {
            if ($v1['status'] == "false") {
                echo "<li><input type='checkbox' name='checkbox1' id=" . $k1 . " onclick='check(id)' class='checking1' value=" . $k1 . " " . $v1['val'] . "><label> " . $v1['name'] . "</label> <form action='' method='post'><input type='hidden'  value=" . $k1 . " name='editing'><button type='submit' name='edit' class='edit'>Edit</button><input type='hidden' value=" . $k1 . " name='deleteing'><button type='submit' name='delete' class='delete'>delete</button></form></li>";
            }
        }
        echo "</table>";
        ?>
        <h3>Completed</h3>
        <ul id="completed-tasks">
            <?php
            echo "<table>";
            foreach ($_SESSION['todo'] as $k1 => $v1) {
                if ($v1['status'] == "true") {
                    echo "<li><input checked type='checkbox' name='checkbox1' id=" . $k1 . " onclick='check(id)' class='checking1' value=" . $k1 . "" . $v1['val'] . "><label> " . $v1['name'] . "</label> <form action='' method='post'><input type='hidden'  value=" . $k1 . " name='editing'><button type='submit' name='edit' class='edit'>Edit</button><input type='hidden' value=" . $k1 . " name='deleteing'><button type='submit' name='delete' class='delete'>delete</button></form></li>";
                }
            }
            echo "</table>";
            ?>
        </ul>
    </div>
    <!-- script start -->
    <script>
        function check(x) {
            window.location.href = "statuscheck.php?index=" + x;
        }
    </script>
    <!-- script end  -->
</body>

</html>