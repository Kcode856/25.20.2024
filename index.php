<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $wyjscie = [];
        $return = 0;
        exec('net use', $wyjscie);
        $mapowany = false;

        foreach($wyjscie as $item){
            if(strpos($item,'10.40.30.2'!== false)){
                echo 'dysk zmapowany <a href="?akcja=usun">Odmapuj</a>';
                $mapowany = true;
            };
        };
        if(!$mapowany){
            echo '<a href="?akcja=mapuj">mapuj</a>';
            header('location:./');
        };
        if(@$_GET['akcja']=='usun'){
            exec('net use Z: /delete/y', $wyjscie);
            header('location: ./');
        };
        if(@$_GET['akcja']=='mapuj'){
            exec('net use Z: \\\\10.40.30.2\pliki /user:uczen uczenpti ', $wyjscie);
            header('location: ./');
        }
    ?>
</body>
</html>