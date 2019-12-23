<?php
require_once("./autoload.php");
include ("battleship.php");
use PHPUnit\Framework\TestCase;
final class AhorcadoTest extends TestCase
{
    function testExisteClaseBattleship(){
        
        $this->assertTrue(class_exists("battleship"));
    }
    function testNoEstaVacio(){
        $batalla=new Battleship(20,20,10);
        $this->assertTrue(!empty($batalla));
    }
    
    function testMostrarJugador1(){
        $batalla=new Battleship(20,20,10);
        $batalla->colocarNaveJugador1(10,10);
        $aux=$batalla->mostrarJugador1();
        $this->assertEquals(1,$aux[10][10]);
    }
    function testColocar11BarcosJugador2(){
        $batalla=new Battleship(20,20,10);
        $batalla->colocarNaveJugador2(10,10);
        $batalla->colocarNaveJugador2(3,16);
        $batalla->colocarNaveJugador2(4,16);
        $batalla->colocarNaveJugador2(5,16);
        $batalla->colocarNaveJugador2(6,16);
        $batalla->colocarNaveJugador2(7,16);
        $batalla->colocarNaveJugador2(8,16);
        $batalla->colocarNaveJugador2(9,16);
        $batalla->colocarNaveJugador2(10,17);    
        $batalla->colocarNaveJugador2(11,13);
        $batalla->colocarNaveJugador2(12,13);
        $this->assertEquals(10,$batalla->mostrarCantBarcos(2));
    }
    function testTurnoJugador1(){
        $batalla=new Battleship(20,20,10);
        $batalla->colocarNaveJugador2(10,10);
        $batalla->colocarNaveJUgador1(9,9);
        $batalla->turnoJugador1(10,10);
        $this->assertEquals(2,$batalla->mostrarJugador2()[10][10]);
    }
    function testGanaJugador1(){
        $batalla=new Battleship(20,20,10);
        $batalla->colocarNaveJugador2(10,10);
        $batalla->colocarNaveJugador1(9,9);
        $batalla->turnoJugador1(10,10);
        $this->assertTrue($batalla->ganaJugador1());
        
    }
    function testTerminaElJuego(){
        $batalla=new Battleship(20,20,10);
        $batalla->colocarNaveJugador2(10,10);
        $batalla->colocarNaveJugador1(9,9);
        $batalla->turnoJugador1(10,10);
        $this->assertTrue($batalla->terminoElJuego());
    }
    function testJuegarMasDeUnaVez(){
        $batalla=new Battleship(20,20,10);
        $batalla->colocarNaveJugador2(10,10);
        $batalla->colocarNaveJugador2(5,5);
        $batalla->colocarNaveJugador1(9,9);
        $batalla->turnoJugador1(10,10);
        $batalla->turnoJugador1(5,5);
        $this->assertFalse($batalla->terminoElJuego());
    }
    function testCantidadDeTurnos(){
        $batalla=new Battleship(20,20,10);
        $batalla->colocarNaveJugador2(10,10);
        $batalla->colocarNaveJugador2(5,5);
        $batalla->colocarNaveJugador1(9,9);
        $batalla->turnoJugador1(10,10);
        $batalla->turnoJugador2(9,9);
        $this->assertEquals(2,$batalla->cuantosTurnosPasaron());
    }
    function testJugarConTableroVacio(){
        $batalla=new Battleship(20,20,10);
        $batalla->colocarNaveJugador2(10,10);
        $batalla->colocarNaveJugador2(5,5);
        $batalla->turnoJugador1(5,5);
        $contador=0;
        for($i=0;$i<20;$i++){
            for($j=0;$j<20;$j++){
                $aux=$batalla->mostrarJugador2();
                if($aux[$i][$j]==1){
                    $contador++;
                }
            }
        }
        $this->assertEquals(2,$contador);  
    }
} 