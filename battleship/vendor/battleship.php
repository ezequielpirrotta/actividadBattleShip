<?php
class Battleship{
    
    private $raws;
    private $cols;
    private $ships;
    private $jugador1;
    private $jugador2;
    private $count1;
    private $count2;
    private $turnsQuantity;
    private $turn;
    public function __construct($raws,$cols,$ships){
        $this->count1=0;
        $this->count2=0;
        $this->turnsQuantity=0;
        $this->turn=1;
        $this->raws=$raws;
        $this->cols=$cols;
        $this->ships=$ships;
        $i=0;
        while($i<$raws){
            $this->jugador1[$i]=array();
            $j=0;
            while($j<$cols){
                $this->jugador1[$i][$j]=0;
                $j+=1;
            }
            $i+=1;
        }
        $i=0;
        while($i<$raws){
            $this->jugador2[$i]=array();
            $j=0;
            while($j<$cols){
                $this->jugador2[$i][$j]=0;
                $j+=1;
            }
            $i+=1;
        }
    }
    function mostrarCantBarcos($jugador){
        $contador=0;
        $aux;
        if($jugador==1){
            $aux=$this->mostrarJugador1();
        }
        else{
            $aux=$this->mostrarJugador2();
        }
        for($i=0;$i<20;$i+=1){
            for($j=0;$j<20;$j+=1){
                if($aux[$i][$j]==1){
                    $contador+=1;
                }
            }
        }
        return $contador;
    }
    function mostrarJugador1(){
        return $this->jugador1;
    }
    function mostrarJugador2(){
        return $this->jugador2;
    }
    function colocarNaveJugador1($raw,$col){
        if($this->count1<$this->ships and $this->jugador1[$raw][$col]===0){
           $this->jugador1[$raw][$col]=1;
           $this->count1+=1; 
        }
    }
    function colocarNaveJugador2($raw,$col){
        if($this->count2<$this->ships and $this->jugador2[$raw][$col]===0){
            $this->jugador2[$raw][$col]=1;
            $this->count2+=1;
        }
    }
    
    function turnoJugador1($raw,$col){
        if(!$this->estaVacioJugador1()){
            if($this->jugador2[$raw][$col]==1 and $this->turn==1){
                $this->jugador2[$raw][$col]=2;
                $this->turn=2;
            }
        }
        
        $this->turnsQuantity+=1;
    }
    function turnoJugador2($raw,$col){
        if(!$this->estaVacioJugador2()){
            if($this->jugador1[$raw][$col]==1 and $this->turn==2){
                $this->jugador1[$raw][$col]=2;
                $this->turn=1;
            }
        }
        
        $this->turnsQuantity+=1;
    }
    function ganaJugador1(){
        for($i=0;$i<$this->raws;$i+=1){
            for($j=0;$j<$this->cols;$j+=1){
                if($this->jugador2[$i][$j]==1){
                    return false;
                }
            }
        }
        return true;
    }
    function ganaJugador2(){
        for($i=0;$i<$this->raws;$i+=1){
            for($j=0;$j<$this->cols;$j+=1){
                if($this->jugador1[$i][$j]==1){
                    return false;
                }
            }
        }
        return true;
    }
    function terminoElJuego(){
        $aux1=$this->ganaJugador1();
        $aux2=$this->ganaJugador2();
        if($aux1 or $aux2){
            return true;
        }
        return false;
    }
    function cuantosTurnosPasaron(){
        return $this->turnsQuantity;
    }
#       Agregados personales:
#          Verifico que alguno de los jugadores
#           no pueda hacer trampa(jugar sin ningun barco)
#
    function estaVacioJugador1(){
        $contador=0;
        for($i=0;$i<20;$i+=1){
            for($j=0;$j<20;$j+=1){
                if($this->jugador1[$i][$j]==1){
                    $contador+=1;
                }
            }
        }
        return $contador==0;
    }
    function estaVacioJugador2(){
        $contador=0;
        for($i=0;$i<20;$i+=1){
            for($j=0;$j<20;$j+=1){
                if($this->jugador2[$i][$j]==1){
                    $contador+=1;
                }
            }
        }
        return $contador==0;
    }
    
    

}