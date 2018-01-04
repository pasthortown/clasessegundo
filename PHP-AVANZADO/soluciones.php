<?php  

    echo resolverSistema([[4,8,2,8],[3,5,4,10],[5,7,1,8]]);

    function dadosJugador($ataca,$tropas){
        $Dados = array();
        if($ataca){
            if( $tropas>=3 ){
                for( $i = 1 ; $i <= 3 ; $i++ ) {
                    array_push( $Dados , rand(1,6) );
                }
                
            } else {
                for( $i = 1 ; $i <= $tropas ; $i++ ) {
                    array_push( $Dados , rand(1,6) );
                }
            }
        }else {
            if( $tropas>=2 ){
                for( $i = 1 ; $i <= 2 ; $i++ ) {
                    array_push( $Dados , rand(1,6) );
                }
            } else {
                for( $i = 1 ; $i <= $tropas ; $i++ ) {
                    array_push( $Dados , rand(1,6) );
                }
            }
        }
        rsort($Dados);
        return $Dados;
    }

    function jugada($tropas){
        $tropasAtaque = $tropas[0];
        $tropasDefensa = $tropas[1];
        $Ataque = dadosJugador(true,$tropasAtaque);
        $Defensa = dadosJugador(false,$tropasDefensa);
        $Resultado = array();
        if( count($Ataque) < count($Defensa) ){
            $DadosQueCuentan = count($Ataque);
        } else {
            $DadosQueCuentan = count($Defensa);
        }
        for( $i = 0 ; $i < $DadosQueCuentan ; $i++ ) {   
            if( $Ataque[$i] > $Defensa[$i] ) {
                $tropasDefensa--;
            }else{
                $tropasAtaque--;
            }
        }
        array_push($Resultado,$tropasAtaque);
        array_push($Resultado,$tropasDefensa);
        return $Resultado;
    }

    function resultadoFinal($tropas){
        $peleando = true;
        while($peleando){
            $tropas = jugada($tropas);
            if($tropas[0] == 0 || $tropas[1] == 0){
                $peleando = false;
                return $tropas;
            }
        }
    }

    function getPalabrasAleatorias(){
        $palabras = array();
        array_push($palabras, "Lunes");
        array_push($palabras, "Martes");
        array_push($palabras, "Miercoles");
        array_push($palabras, "Jueves");
        array_push($palabras, "Viernes");
        array_push($palabras, "Sabado");
        array_push($palabras, "Domingo");
        $palabraSeleccionada = $palabras[rand(0,count($palabras)-1)];
        $toShow = "";
        $letraAMotrar = rand(0,strlen($palabraSeleccionada)-1);
        for ($i = 0 ; $i<=strlen($palabraSeleccionada)-1;$i++){
            if($i == $letraAMotrar){
                $toShow = $toShow.$palabraSeleccionada[$i]." ";
            }else{
                $toShow = $toShow."_ ";
            }   
        }
        return trim($toShow," ");
    }
    
    function multiplicarArrayParaConstante($array, $constante){
        for( $i=0 ; $i <= count($array) - 1 ; $i++){
            $array[$i] = $array[$i] * $constante;
        }
        return $array;
    }

    function restarDosArrays($arrayA, $arrayB){
        $resultado = array();
        for( $i=0 ; $i <= count($arrayA) - 1 ; $i++){
            array_push($resultado, $arrayA[$i] - $arrayB[$i]);
        }
        return $resultado;
    }

    function mostrarFila($fila){
        $toShow = '';
        for( $i=0 ; $i<=count($fila)-1; $i++){
            $toShow = $toShow.$fila[$i].' ';
        }
        return trim($toShow,' ');
    }

    function mostrarSistema($sistema){
        $toShow = '';
        for( $i=0 ; $i<=count($sistema)-1; $i++){
            $toShow = $toShow.mostrarFila($sistema[$i]).'<br/>';
        }
        return $toShow;
    }

    function resolverSistema($sistema){
        $n = count($sistema);
        for($i = 0; $i <= $n-1 ; $i++){
            $sistema[$i] = multiplicarArrayParaConstante($sistema[$i],1/$sistema[$i][$i]);    
            for($j = 0; $j <= $n-1 ; $j++){
                if(!($i == $j)){
                    $sistema[$j]=restarDosArrays($sistema[$j],multiplicarArrayParaConstante($sistema[$j],$sistema[$i][$i]));    
                }
            }    
        }

        for($i = 0; $i <= $n-1 ; $i++){
            for($j = 0; $j <= $n-1 ; $j++){
                if($sistema[$i][$j]="NAN"){
                    return "No hay solucion";
                }
            }
        }
        
        return mostrarSistema($sistema);
    }
?>