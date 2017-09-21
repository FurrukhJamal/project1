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
                <h2>some text</h2>
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
                    <div>
                        <input type="submit" value="Generate password!">
                    </div>

                </fieldset>

            </form>

        </div>
    </body>
</html>
