<?php require("logic.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
        <link rel= "icon" href="favicon.ico" type="image/icon">
        <title>Password generator</title>

    </head>
    <body>
        <div class="main">
            <h1>password generator</h1>
            <div class="password">
                <!-- display this h2 tag when password is set -->
                <?php if($passwordflag): ?>
                <h2><?= $password ?></h2>
                <?php endif; ?>
            </div>
            <form action="index.php" method="GET">
                <fieldset>
                    <legend>Options for password</legend>
                    <div class="words">
                        <label for="words" >Number of words:</label>
                        <input type="text" name="words" class = "words">

                    </div>
                    <div class = "wordslimit">
                        <p>(max words limit is 10)</p>
                    </div>
                    <div>
                        <label for="Number">include a number:</label>
                        <input type="checkbox" name="number" >
                    </div>
                    <div>
                        <label for="symbol">include symbol(&#64):</label>
                        <input type="checkbox" name="symbol" >

                    </div>
                    <div id = "button">
                        <input type="submit" value="Generate password!" >

                    </div>
                    <!--display this div only when there is an error in form input -->
                    <?php if($errorflag): ?>
                    <div class="error">
                        <p>*<?= $errormsg ?></p>

                    </div>
                    <?php endif;?>

                </fieldset>

            </form>

        </div>
    </body>
</html>
