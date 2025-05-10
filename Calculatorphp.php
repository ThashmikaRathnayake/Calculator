<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Calculatorphp.css">
    <title>Calculator</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <input type="number" name="firstnumber" placeholder="Number One">
        <select name="operator">
            <option value="add">+</option>
            <option value="substract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select>
        <input type="number" name="secondnumber" placeholder="Number Two">
        <button>Calculate</button>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Grab data from inputs
            $num01 = htmlspecialchars($_POST["firstnumber"]);
            $num02 = htmlspecialchars($_POST["secondnumber"]);
            $operator = htmlspecialchars($_POST["operator"]);

            //Error handeling
            $error = false;
                //Check if any input is not selected
                if (empty($num01) || empty($num02) || empty($operator)){
                    echo "<p>Fill in all the fields</p>";
                    $error = true;
                }
                //check if the imput are not numeric
                if (!is_numeric($num01) || !is_numeric($num02)){
                    echo "<p>Accept only numbers</p>";
                    $error = true;
                }

            //calculates the numbers if no errors
            if (!$error) {
                $value = 0;
                switch ($operator) {
                    case "add" :
                        $value = $num01 + $num02;
                        break;
                    case "susbstract" :
                        $value = $num01 - $num02;
                        break;
                    case "multiply" :
                        $value = $num01 * $num02;
                        break;
                    case "divide" :
                        $value = $num01 / $num02;
                        break;
                    default:
                    echo "<p>Something went wrong</p>";

                }
            }
            echo "<p>Result = " . $value . "</p>";
        }
    ?>
</body>
</html>