<?php
    if(isset($_POST['mask']) && isset($_POST['text']) && isset($_POST['tleft']) && isset($_POST['tright'])){
        $string = $_POST['text'];
        $hablon = $_POST['mask'];
        $tagsleft = $_POST['tleft'];
        $tagsright = $_POST['tright'];
        
        preg_match('/'.$tagsleft.'(.*?)'.$tagsright.'/', $hablon, $match);
        $tg = $match[1];
        
        $doname = stristr($hablon, $tagsleft, true); 
        preg_match('/(?<='.$doname.')\S+/i', $string, $match);
        $vl =  trim($match[0],'.');
        $array = array(
            $tg => $vl,
        );
        
    }

?>
<html>
    <head>
        
    </head>
    <body>
        <form method="POST" action="">
            <input type="text" name="mask" placeholder="Шаблон" value = "My name is {{name}}." required>
            <input type="text" name="text" placeholder="Текст" value = "My name is Vlad." required>
            <input type="text" name="tleft" placeholder="токен левый" value="{{" required>
            <input type="text" name="tright" placeholder="токен правый" value="}}" required>
            <button type="submit">Send</button>
        </form>
        <br><br>
        <?php if (isset($array)): ?>
             <hr>
            Результат: <?print_r($array)?>
        <?php endif; ?>
        
        
    </body>
</html>