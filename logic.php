<?php
    //print_r($_GET);
    //validation and setting up error flag
    $errorflag = false;
    $errormsg;
    $passwordflag = false;

    if(isset($_GET["words"]))
    {
        if(empty($_GET["words"]) || !is_numeric($_GET["words"]))
        {
            $errorflag = true;
            $errormsg = "invalid or no number for words was selected";
        }
        else if($_GET["words"] > 10)
        {
            $errorflag = true;
            $errormsg = "selected number of words out of max limit";
        }
        else
        {
            /*in this block means validation passed*/
            $number = $_GET["words"];
            //loading the words from words.txt
            $loadwords = [];
            $fp = fopen("words.txt", "r");

            while(($buffer = fgets($fp)) !== false)
            {
                array_push($loadwords, $buffer);
            }

            fclose($fp);
            //shuffling the array for words
            shuffle($loadwords);

            //to store the password as a string
            $password = "";
            for($i = 0; $i < $number; $i++)
            {
                $password = $password . $loadwords[$i];
            }

            //if no checkbox was checked
            if(!isset($_GET["number"]) && !isset($_GET["symbol"]))
            {
                //removing whitespace(newline tab) in string
                $password = preg_replace('/\s+/', '', $password);
                $passwordflag = true;
            }
            //if either of the checkbox was checked
            if(isset($_GET["number"]) || isset($_GET["symbol"]))
            {
                if(isset($_GET["symbol"]) && !isset($_GET["number"]))
                {
                    //add a symbol bw words
                    $password = preg_replace('/\s+/', '@', $password);
                    $passwordflag = true;
                }
                else if(!isset($_GET["symbol"]) && isset($_GET["number"]))
                {
                    //add a number at the end
                    $password = preg_replace('/\s+/', '', $password);
                    $randomnumber = rand(0,100);
                    $password .= $randomnumber;
                    $passwordflag = true;
                }
                else
                {
                    $password = preg_replace('/\s+/', '@', $password);
                    $randomnumber = rand(0,100);
                    $password .= $randomnumber;
                    $passwordflag = true;
                }
            }



        }
    }
 ?>
