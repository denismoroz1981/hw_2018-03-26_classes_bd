

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Просмотр структур таблиц</title>
</head>
<body>

    <?php
    session_start();
    require_once "object_db.php";

    $formConnect=<<<TEXT
        <p>Детали соединия с БД:</p>
        <form name="connect" action="" method="post">
            <input name="host" type="text" placeholder="127.0.0.1">
            <input name="user" type="text" placeholder="root">
            <input name="password" type="text" placeholder="******">
            <input name="db" type="text" placeholder="DB name">
            <input hidden name="form" value="connect">
            <br><input type="submit" value="Подключиться">       
            
        
        </form>
TEXT;

    echo $formConnect;

       if (!empty($_POST)) {
            if ($_POST["form"]=="connect") {
            $_SESSION["HOST_ADDRESS"] = $_POST["host"];
            $_SESSION["USERNAME"] = $_POST["user"];
            $_SESSION["PASSWORD"] = $_POST["password"];
            $_SESSION["DATABASE"] = $_POST["db"];
            }}
        if (!empty($_SESSION)) {
            $instance = new Object_query($_SESSION["HOST_ADDRESS"], $_SESSION["USERNAME"],
                $_SESSION["PASSWORD"], $_SESSION["DATABASE"]);
            $instance->getSelect();
        }


        if (!empty($_SESSION)) {
            if ($_POST["form"]=="description") {

                $instance->table_desc($_POST["table"]);
            }

        }


    ?>


</body>
</html>