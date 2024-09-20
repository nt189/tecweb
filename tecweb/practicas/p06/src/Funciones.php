<?php 
    function Ejercicio1(){
        if(isset($_GET['numero'])){
            $num = $_GET['numero'];
            if ($num%5==0 && $num%7==0)
            {
                echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
            }
            else
            {
                echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
            }
        }
    }


    function Ejercicio2(){
        $ite = 0;
        $itecont = 1;
        $numr[$ite][0]=rand(0,1000);
        $numr[$ite][1]=rand(0,1000);
        $numr[$ite][2]=rand(0,1000);
        echo '<p>'. $numr[$ite][0]. ', '.$numr[$ite][1]. ', '.$numr[$ite][2].'</p>';
        while ($numr[$ite][0] % 2 == 0 || $numr[$ite][1] % 2 != 0 || $numr[$ite][2] % 2 == 0) {
            $ite++;
            $numr[$ite][0] = rand(0, 1000);
            $numr[$ite][1] = rand(0, 1000);
            $numr[$ite][2] = rand(0, 1000);
            $itecont++;
            echo '<p>'. $numr[$ite][0]. ', '.$numr[$ite][1]. ', '.$numr[$ite][2].'</p>';
        }
        echo '<p>'.($itecont*3). ' numeros obtenidos en '. $itecont.' iteraciones</p>';
    }


    function Ejercicio3(){
        if(isset($_GET['numero1'])){
            $num = $_GET['numero1'];
            
            do{
                $x = rand(0, 1000);
                // echo $x.'/'.$num.'<br>';
                // echo $x%$num.'<br>';
                // echo $x%(1).'<br>';
            }while($x%$num != 0 || $x%1 != 0);
            echo "El número aleatorio es: ". $x;
        }
    }

    
    function Ejercicio4(){
        $arreglo = array();
        for ($i = 97; $i <= 122; $i++) {
            $arreglo[$i] = chr($i);
        }
        print_r($arreglo);

        echo '<table border="black">';
        foreach ($arreglo as $key => $value) {
            echo '<tr>';
            echo '<td>' . $key . '</td>';
            echo '<td>' . $value . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
?>