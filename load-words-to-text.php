<?php
    $url;
    //loop to go through to deide what the links are
    for($i = 1, $j = 2; $j <= 30; $i += 2, $j += 2)
    {
        if($i < 9 && $j <= 8)
        {
            $url = "http://www.paulnoll.com/Books/Clear-English/words-0{$i}-0{$j}-hundred.html";
        }
        else if($i == 9)
        {
            $url = "http://www.paulnoll.com/Books/Clear-English/words-0{$i}-{$j}-hundred.html";
        }
        else
        {
            $url = "http://www.paulnoll.com/Books/Clear-English/words-{$i}-{$j}-hundred.html";
        }

        //getting the link as a string
        $contents = file_get_contents($url);

        //using DOM to get <li> tags
        $dom = new DOMDocument();

        //loading as html using the @ sign to suppress the DOM parse error
        @$dom->loadHTML($contents);

        $listitems = $dom->getElementsByTagName("li");
        $words = [];

        foreach($listitems as $li)
        {
            //adding trimmed off whitespace word into the array
            array_push($words, trim($li->nodeValue));
        }

        //opening file to write words in
        $fp = fopen("words.txt", "a");

        foreach($words as $word)
        {
            //adding an enter key with each word
            $stringword = $word . "\n";

            //writing to a text file using fwrite()
            fwrite($fp, $stringword);
        }

        //closing file
        fclose($fp);
    }
    /*$loadwords = [];
    $fp = fopen("words.txt", "r");

    while(($buffer = fgets($fp)) !== false)
    {
        array_push($loadwords, $buffer);
    }

    print_r($loadwords);
    print("count is ".count($loadwords));

    fclose($fp);*/
?>
