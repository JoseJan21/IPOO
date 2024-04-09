<?php
// include "tp2.php";
// 10.a. Diseñar e implementar la clase Calculadora que permite realizar las operaciones básicas: + , - , *, /
class Calculadora{

    private $numero1;
    private $numero2;


    public function __construct($numero1, $numero2){
        $this->num1 = $numero1;
        $this->num2 = $numero2;
    }

    public function sumar(){
        $suma = $this->num1 + $this->num2;
        return $suma;
    }

    public function restar(){
        $resta = $this->num1 - $this->num2;
        return $resta;
    }

    public function multiplicacion(){
        $multiplicacion = $this->num1 * $this->num2;
        return $multiplicacion;
    }

    public function division(){
        if ($this->num1 == 0 or $this->num2 == 0){
            $division = "No se puede dividir por cero.";
        }else{
            $division = $this->num1 / $this->num2;
        }
        
        return $division;
    }
}

$calculadora = new Calculadora(10, 0);

// echo "Suma: " . $calculadora->sumar() . "\n";
// echo "Resta: " . $calculadora->restar() . "\n";
// echo "Multiplicación: " . $calculadora->multiplicacion() . "\n"; 
// echo "División: " . $calculadora->division() . "\n";  
///////////////////////////////////////////////////////////////////////////////////////////////

// 10.b. Diseñar e implementar la clase Reloj que simule el comportamiento de un cronómetro digital
// (con los comportamientos: puesta_a_cero, incremento, etc.). Cuando el contador llegue a 23:59:59 y
// reciba el mensaje de incremento deberá pasar a 00:00:00.
// $horas = 0;
// $minutos = 0;
// $segundos = 0;

class Reloj{
    private $horas;
    private $minutos;
    private $segundos;

    public function __construct($horas, $minutos, $segundos){
        $this->hs = $horas;
        $this->min = $minutos;
        $this->seg = $segundos;
    } 

    public function puesta_a_cero(){
        $this->hs = 0;
        $this->min = 0;
        $this->seg = 0;
    }

    public function incrementar(){
        $this->seg++;

        if ($this->seg == 60){
            $this->min++;
            $this->seg = 0;
            if ($this->min == 60){
                $this->hs++;
                $this->min = 0;
                if($this->hs == 24){
                    $this->puesta_a_cero();
                }
            }
        }    
    }

    public function mostrar_hora() {
        return sprintf("%02d:%02d:%02d", $this->hs, $this->min, $this->seg);
    }
    // sprintf: Es una función en PHP utilizada para formatear una cadena de texto. La sintaxis básica de sprintf es sprintf(formato, argumento1, argumento2, ...). En este caso, el formato %02d:%02d:%02d se utiliza para formatear los argumentos siguientes como valores enteros (%d), con un ancho mínimo de 2 caracteres (2), y rellenando con ceros a la izquierda si es necesario (0). Entonces, %02d significa que el número será representado con al menos dos dígitos, rellenando con ceros a la izquierda si tiene menos de dos dígitos.
}

// $reloj = new Reloj(0,0,0);

// $reloj->puesta_a_cero();
// echo "Puesta a cero: " . $reloj->mostrar_hora() . "\n";

// $reloj->incrementar();
// echo "Incrementar: " . $reloj->mostrar_hora() . "\n";

// for($i = 0; $i < 86399; $i++) {
//     $reloj->incrementar();

// }
// echo "Incrementar de 23:59:59 a 00:00:00: " . $reloj->mostrar_hora() . "\n"; 

// $reloj->incrementar();
// echo "Incrementar: " . $reloj->mostrar_hora() . "\n"; 

/////////////////////////////////////////////////////////////////////////////////////////////////////
// 10.c. Diseñar e implementar la clase Fecha. La clase deberá disponer de los atributos mínimos y
// necesarios para almacenar el día, el mes y el año, además de métodos que devuelvan un String con la
// fecha en forma abreviada (16/02/2000) y extendida (16 de febrero de 2000) . Implementar una función
// incremento, que reciba como parámetros un entero y una fecha, que retorne una nueva fecha, resultado
// de incrementar la fecha recibida por parámetro en el numero de días definido por el parámetro entero.

// Nota 1: Son años bisiestos los múltiplos de cuatro que no lo son de cien, salvo que lo sean de
// cuatrocientos, en cuyo caso si son bisiestos.
// Nota 2: Para la solución de este problema puede ser útil definir un método incrementa_un_dia.
class Fecha{
    private $dia;
    private $mes;
    private $anio;

    public function __construct($dia, $mes, $anio) {
        $this->dia = $dia;
        $this->mes = $mes;
        $this->anio = $anio;
    }

    public function esBisiesto(){
        $bisiesto = ($this->anio / 4 == 0 and $this->anio / 100 != 0 or $this->anio / 400 == 0);
        return $bisiesto;
    }

    public function incrementarDia(){
        $this->dia++;

        $diasPorMes = [
            1 => 31, 2 => 28, 3 => 31, 4 => 30,
            5 => 31, 6 => 30, 7 => 31, 8 => 31,
            9 => 30, 10 => 31, 11 => 30, 12 => 31
        ];
        
        if ($this->esBisiesto() && $this->mes == 2) {
            $diasPorMes[2] = 29;
        }        
         
        if ($this->dia > $diasPorMes[$this->mes]) {
            $this->dia = 1;
            $this->mes++;
            if ($this->mes > 12) {
                $this->mes = 1;
                $this->anio++;
            }
        }
    }

    public function fechaAbreviada(){
        $fecha = sprintf("%02d/%02d/%04d", $this->dia, $this->mes, $this->anio);
        return $fecha;
    }
    
    public function fechaExtendida(){
        $meses = [
            1 => "enero", 2 => "febrero", 3 => "marzo", 4 => "abril",
            5 => "mayo", 6 => "junio", 7 => "julio", 8 => "agosto",
            9 => "septiembre", 10 => "octubre", 11 => "noviembre", 12 => "diciembre"
        ];
        $fechaExtendida = sprintf("%02d de %s de %04d", $this->dia, $meses[$this->mes], $this->anio);
        return $fechaExtendida;
    }

    public function incremento($dias) {
        for ($i = 0; $i < $dias; $i++) {
            $this->incrementarDia();
        }
        return $this->fechaExtendida();
    }    

}

// $miFecha = new Fecha(22, 3, 2024);

// echo "Fecha Abreviada: " . $miFecha->fechaAbreviada() . "\n";  // Salida: 20/03/2022
// echo "Fecha Extendida: " . $miFecha->fechaExtendida() . "\n";  // Salida: 20 de marzo de 2022

// $nuevaFecha = $miFecha->incremento(5);
// echo "Nueva Fecha (incrementada por 5 días): " . $nuevaFecha . "\n";  // Salida: Nueva Fecha (incrementada por 5 días): 25 de marzo de 2022

// //////////////////////////////////////////////////////////////////////////////////////////////////////

// 10.d. Implementar una clase Login que almacene el nombreUsuario, contraseña, frase que permite
// recordar la contraseña ingresada y las ultimas 4 contraseñas utilizadas. Implementar un método que
// permita validar una contraseña con la almacenada y un método para cambiar la contraseña actual por otra
// nueva, el sistema deja cambiar la contraseña siempre y cuando esta no haya sido usada recientemente (es
// decir no se encuentra dentro de las cuatro almacenadas). Implementar el método recordar que dado el
// usuario, muestra la frase que permite recordar su contraseña

class Login {
    private $username;
    private $password;
    private $recordarPass;
    private $ultimasPass = [];

    public function __construct($username, $password, $recordarPass) {
        $this->username = $username;
        $this->password = $password;
        $this->recordarPass = $recordarPass;
        $this->ultimasPass[] = $password;
    }

    public function validarPassword($password) {
        $validar = in_array($password, $this->ultimasPass);
        return $validar;
    }

    public function cambiarPassword($newPassword) {
        if (!$this->validarPassword($newPassword)) {
            // Agregar la nueva contraseña al principio
            array_unshift($this->ultimasPass, $newPassword);

            // Limitar el array a 4 elementos
            if (count($this->ultimasPass) > 4) {
                array_pop($this->ultimasPass);
            }
            $this->password = $newPassword;
            $cambiar = "Contraseña cambiada con exito.";

        } else {
            $cambiar = "La contraseña no puede ser cambiada.";
        }
        return $cambiar;
    }
    public function recordarPassword($recordarPassword) {
        $recordar = null;
        if ($recordarPassword == $this->recordarPass) {
            $recordar = $this->password; // Corrección: $this->password en lugar de $this->Password
        }
        return $recordar;
    }    
}

// // Crear una instancia de Login
// $login = new Login("usuario123", "password123", "Mi perro se llama Max");

// // Validar una contraseña
// echo $login->validarPassword("password123") ? "Contraseña válida.\n" : "Contraseña inválida.\n";

// // Cambiar la contraseña
// echo $login->cambiarPassword("nuevaPassword") . "\n";

// // Intentar cambiar a una contraseña recientemente utilizada
// echo $login->cambiarPassword("password123") . "\n";

// // Intentar recordar la contraseña con una frase
// $contrasenaRecordada = $login->recordarPassword("Mi perro se llama Max");

// if ($contrasenaRecordada !== null) {
//     echo "La contraseña es: " . $contrasenaRecordada . "\n";
// } else {
//     echo "La frase de recordatorio no coincide.\n";
// }


// 11. Crear una clase Cuadrado que modele cuadrados por medio de cuatro puntos (los vértices). Puede utilizar
// arreglos asociativos para implementar cada uno de los vértices. La clase dispondrá de los siguientes métodos:
// 11.a. Método constructor _ _construct () que recibe como parámetros las coordenadas de los puntos.
// 11.b. Los métodos de acceso de cada uno de los atributos de la clase.
// 11.c. area(): método que calcula el área del cuadrado.
// 11.d.*** desplazar($d): método que recibe por parámetro un punto y desplaza el cuadrado en el plano
// desde su punto mas inferior izquierdo.
// 11.e.*** aumentarTamaño($t): método que recibe por parámetro el tamaño que debe aumentar el cuadrado.
// 11.f.*** Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
// 11.g. Crear un script Test_Cuadrado que cree un objeto Cuadrado e invoque a cada uno de los
// métodos implementados.

class Cuadrado{
    private $punto1;
    private $punto2;
    private $punto3;
    private $punto4;

    public function __construct( $punto1, $punto2, $punto3, $punto4){
        $this->punto1 = $punto1;
        $this->punto2 = $punto2;
        $this->punto3 = $punto3;
        $this->punto4 = $punto4;
    }

    public function area(){
        $lado = $this->distancia($this->punto1, $this->punto2);
        $area = $lado * $lado;
        return $area;
    }

    public function distancia($punto1, $punto2){
        $distanciaX = $punto1['x'] - $punto2['x'];
        $distanciaY = $punto1['y'] - $punto2['y'];
        $distancia = sqrt($distanciaX * $distanciaX + $distanciaY * $distanciaY);
        return $distancia;
    }

    public function desplazar($distancia){
        $this->punto1['x'] += $distancia['x'];
        $this->punto1['y'] += $distancia['y'];

        $this->punto2['x'] += $distancia['x'];
        $this->punto2['y'] += $distancia['y'];

        $this->punto3['x'] += $distancia['x'];
        $this->punto3['y'] += $distancia['y'];

        $this->punto4['x'] += $distancia['x'];
        $this->punto4['y'] += $distancia['y'];
    }
    public function aumentarTamanio($tamanio){
        $this->punto2['x'] += $tamanio;
        $this->punto3['x'] += $tamanio;
        $this->punto3['y'] += $tamanio;
        $this->punto4['y'] += $tamanio;
    }
    // Redefinición del método __toString()
    public function __toString(){
        $p1= 'Punto 1: ' . $this->punto1['x'] . ',' . $this->punto1['y'] . "\n";
        $p2= 'Punto 2: ' . $this->punto2['x'] . ',' . $this->punto2['y'] . "\n";
        $p3= 'Punto 3: ' . $this->punto3['x'] . ',' . $this->punto3['y'] . "\n";
        $p4= 'Punto 4: ' . $this->punto4['x'] . ',' . $this->punto4['y'] . "\n";
        return $p1 . $p2 . $p3 . $p4;
    }
}

// // Crear un objeto Cuadrado y probar los métodos
// $p1 = ['x' => 0, 'y' => 0];
// $p2 = ['x' => 2, 'y' => 0];
// $p3 = ['x' => 2, 'y' => 2];
// $p4 = ['x' => 0, 'y' => 2];

// $cuadrado = new Cuadrado($p1, $p2, $p3, $p4);

// echo "Cuadrado inicial:\n";
// echo $cuadrado;

// echo "Área del cuadrado: " . $cuadrado->area() . "\n";

// $desplazamiento = ['x' => 3, 'y' => 4];
// $cuadrado->desplazar($desplazamiento);
// echo "Cuadrado desplazado:\n";
// echo $cuadrado;

// $tamanio = 2;
// $cuadrado->aumentarTamanio($tamanio);
// echo "Cuadrado con tamaño aumentado:\n";
// echo $cuadrado;

// 12. Definir una clase Linea con cuatro atributos: pA , pB, pC y pD donde (pA, pB) y ( pC,pD ) son 2 puntos
// por los que pasa la línea en un espacio de dos dimensiones. La clase dispondrá de los siguientes métodos:
// 12.a.*** Método constructor _ _construct() que recibe como parámetros las coordenadas de los puntos.
// 12.b. Los métodos de acceso de cada uno de los atributos de la clase.
// 12.c. mueveDerecha($d): Desplaza la línea a la derecha la distancia(d) que se recibe por parámetro.
// 12.d. mueveIzquierda($d): Desplaza la línea a la izquierda la distancia(d) que se recibe por parámetro.
// 12.e. mueveArriba($d): Desplaza la línea hacia arriba la distancia que se recibe por parámetro.
// 12.f.*** mueveAbajo($d): Desplaza la línea hacia abajo la distancia que se recibe por parámetro.
// 12.g. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
// 12.h. Crear un script Test_Linea que cree un objeto Linea e invoque a cada uno de los
// métodos implementados.

class Linea{
    private $lineaPto1;
    private $lineaPto2;

    public function __construct($lineaPto1, $lineaPto2){
        $this->lineaPto1 = $lineaPto1;
        $this->lineaPto2 = $lineaPto2;
    }
    public function mueveDerecha($distancia){
        $this->lineaPto1['x'] += $distancia;
        $this->lineaPto2['x'] += $distancia;
    }
    public function mueveIzquierda($distancia){
        $this->lineaPto1['x'] -= $distancia;
        $this->lineaPto2['x'] -= $distancia;
    }
    public function mueveArriba($distancia){
        $this->lineaPto1['y'] += $distancia;
        $this->lineaPto2['y'] += $distancia;
    }
    public function mueveAbajo($distancia){
        $this->lineaPto1['y'] -= $distancia;
        $this->lineaPto2['y'] -= $distancia;
    }
    public function __toString(){
        $lineaPto1 = 'Linea punto 1: (' . $this->lineaPto1['x'] .','. $this->lineaPto1['y'] . ')' . "\n"; 
        $lineaPto2 = 'Linea punto 2: (' . $this->lineaPto2['x'] .','. $this->lineaPto2['y'] . ')' . "\n"; 
        return $lineaPto1 . $lineaPto2;
    }
}

// // Crear linea y probar los métodos
// $p1 = ['x' => 4, 'y' => 4];
// $p2 = ['x' => 8, 'y' => 4];

// $linea = new Linea($p1, $p2);

// echo "Comenzando linea: \n";
// echo $linea;

// $linea->mueveDerecha(2);
// echo "Mover linea a la derecha: \n";
// echo $linea;

// $linea->mueveIzquierda(2);
// echo "Mover linea a la izquierda: \n";
// echo $linea;

// $linea->mueveArriba(2);
// echo "Mover linea arriba: \n";
// echo $linea;

// $linea->mueveAbajo(2);
// echo "Mover linea abajo: \n";
// echo $linea;


// 13. Desarrollar una clase Cafetera con los atributos capacidadMaxima (la cantidad máxima de café que puede
// contener la cafetera) y cantidadActual (la cantidad actual de café que hay en la cafetera). Implementar los
// siguientes métodos:
// 13.a. Método constructor _ _construct() que recibe como parámetros los valores iniciales para los
// atributos de la clase.
// 13.b. Los método de acceso de cada uno de los atributos de la clase.
// 13.c.*** llenarCafetera(): la cantidad actual debe ser igual a la capacidad de la cafetera.
// 13.d. servirTaza($cantidad): simula la acción de servir una taza con la capacidad indicada. Si la
// cantidad actual de café “no alcanza” para llenar la taza, se sirve lo que quede y se envía un mensaje
// al consumidor para que sepa porque no se le sirvió un taza completa.

// 13.e. ***vaciarCafetera(): pone la cantidad de café actual en cero.
// 13.f. ***agregarCafe($cantidad): añade a la cafetera la cantidad de café indicada.
// 13.g. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
// 13.h. Crear un script Test_Cafetera que cree un objeto Cafetera e invoque a cada uno de los
// métodos implementados.

class Cafetera{

    private $capacidadMaxima;
    private $cantidadActual;

    public function __construct($capacidadMaxima, $cantidadActual){
        $this->capacidadMaxima = $capacidadMaxima;
        $this->cantidadActual = $cantidadActual;
    }
    public function getCapacidadMaxima() {
        return $this->capacidadMaxima;
    }
    public function getCantidadActual() {
        return $this->cantidadActual;
    }
    public function llenarCafetera(){
        $llenarCafetera = $this->capacidadMaxima == $this->cantidadActual;
        return $llenarCafetera;
    }
    public function servirTaza($cantActual){
        if ($cantActual <= $this->cantidadActual) {
            $this->cantidadActual -= $cantActual;
            echo "Se ha servido una taza de café.\n";
        } else {
            echo "No se puede servir la taza completa. Se sirvió lo que quedaba en la cafetera.\n";
            $this->cantidadActual = 0;
        }
    }
    public function vaciarCafetera(){
        $vaciarCafetera = $this->cantidadActual = 0;
        return $vaciarCafetera;
    }
    public function agregarCafe($cantidad){
        if($this->cantidadActual += $cantidad <= $this->capacidadMaxima){
            $agregar = $this->cantidadActual += $cantidad;
        }
        return $agregar;
    }
    public function __toString(){
        $cantMax = "Cantidad maxima: " . $this->capacidadMaxima . "\n";
        $cantActual = "Cantidad actual: " . $this->cantidadActual . "\n";
        return $cantMax . $cantActual;
    }

}


// // Script de prueba
// $cafetera = new Cafetera(1000, 500); // Capacidad máxima de 1000 ml, con 500 ml de café actual

// echo "Estado inicial de la cafetera:\n";
// echo $cafetera;

// $cafetera->llenarCafetera();
// echo "Después de llenar la cafetera:\n";
// echo $cafetera;

// $cafetera->servirTaza(200); // Servir una taza de 200 ml
// echo "Después de servir una taza:\n";
// echo $cafetera;

// $cafetera->vaciarCafetera();
// echo "Después de vaciar la cafetera:\n";
// echo $cafetera;

// $cafetera->agregarCafe(300); // Agregar 300 ml de café
// echo "Después de agregar café:\n";
// echo $cafetera;


// 14. Crea una clase CuentaBancaria con los siguientes atributos: número de cuenta, el DNI del cliente, el
// saldo actual y el interés anual que se aplica a la cuenta. Define en la clase los siguientes métodos:
// 14.a. Método constructor _ _construct() que recibe como parámetros los valores iniciales para los
// atributos de la clase.
// 14.b. Los método de acceso de cada uno de los atributos de la clase.
// 14.c. actualizarSaldo(): actualizará el saldo de la cuenta aplicándole el interés diario (interés anual
// dividido entre 365 aplicado al saldo actual).
// 14.d. depositar($cant): permitirá ingresar una cantidad de dinero en la cuenta.
// 14.e. retirar($cant): permitirá sacar una cantidad de dinero de la cuenta (si hay saldo).
// 14.f. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
// 14.g. Crear un script Test_CuentaBancaria que cree un objeto CuentaBancaria e invoque a cada
// uno de los métodos implementados.
/////////////////////////////////////////
//Modificado por el ejercicio 1.b del tp 2

class CuentaBancaria{
    private $numeroDeCuenta;
    private $cliente;
    private $saldoAnual;
    private $interesAnual;

    public function __construct($numeroDeCuenta, $cliente, $saldoAnual, $interesAnual){
        $this->numeroDeCuenta = $numeroDeCuenta;
        $this->cliente = $cliente;
        $this->saldoAnual = $saldoAnual;
        $this->interesAnual = $interesAnual;
    }
    // 14.c. actualizarSaldo(): actualizará el saldo de la cuenta aplicándole el interés diario (interés anual
    // dividido entre 365 aplicado al saldo actual). 
    public function actualizarSaldo(){
        $interesDiario = ($this->interesAnual/365);
        $actualizarSaldo = $this->saldoAnual += $interesDiario;
        return $actualizarSaldo;
    }
    // 14.d. depositar($cant): permitirá ingresar una cantidad de dinero en la cuenta.
    public function depositar($cantADepositar){
        $depositar = ($this->saldoAnual += $cantADepositar);
        return $depositar;
    }
    // 14.e. retirar($cant): permitirá sacar una cantidad de dinero de la cuenta (si hay saldo).
    public function retirar($cantARetirar){
        if($this->saldoAnual >= $cantARetirar){
            $retirar = ($this->saldoAnual -= $cantARetirar);
        }else{
            $retirar = "Dinero insuficiene en la cuenta.";
        }
        return $retirar;
    }
    // 14.f. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
    public function __toString(){
        $numeroDeCuenta = "Numero de cuenta: ". $this->numeroDeCuenta . "\n";
        $cliente = "Cliente:\n". $this->cliente . "\n";
        $saldoAnual = "Saldo del cliente: " . $this->saldoAnual . "\n";
        $interesAnual = "Interes anual: " .  $this->interesAnual . "\n";

        return $numeroDeCuenta . $cliente . $saldoAnual . $interesAnual;
    }
}

$cliente = new Persona("Jose", "Jan", "Dni", 43793421);

$cuentaBancaria = new CuentaBancaria("123456789", $cliente, 12000, 5.2);
// echo "Inicio cuenta bancaria: \n";
// echo $cuentaBancaria;

// echo "\nCuenta bancaria con saldo actualizado: \n";
// $cuentaBancaria->actualizarSaldo();
// echo $cuentaBancaria;

// echo "\nCuenta bancaria con deposito: \n";
// $cuentaBancaria->depositar(2000);
// echo $cuentaBancaria;

// echo "\nCuenta bancaria menos retiro: \n";
// $cuentaBancaria->retirar(6000);
// echo $cuentaBancaria;

// 15. Un teatro se caracteriza por su nombre y su dirección y en él se realizan 4 funciones al día. Cada función tiene
// un nombre y un precio.
//Realice el diseño de la clase Teatro e indique qué métodos tendría que tener la clase,
// teniendo en cuenta que se pueda cambiar el nombre del teatro y la dirección, el nombre de una función y el
// precio. 
//Implementar las 4 funciones usando array de array asociativo. Cada función es un array asociativo con las claves “nombre” y “precio”.

class Teatro{
    private $nombreTeatro ;
    private $direccion;
    private $funciones = [];

    public function __construct($nombreTeatro, $direccion, $funciones){
        $this->nombreTeatro= $nombreTeatro;
        $this->direccion= $direccion;
        $this->funciones= $funciones;
    }

    public function cambiarNombreTeatro($nuevoNombreTeatro){
        $this->nombreTeatro = $nuevoNombreTeatro;
    }
    public function cambiarDireccionTeatro($nuevoDireccionTeatro){
        $this->direccion = $nuevoDireccionTeatro;
    }

    public function cambiarNombreFuncion($indiceFuncion, $nuevoNombre) {
        if (array_key_exists($indiceFuncion, $this->funciones)) {
            $this->funciones[$indiceFuncion]['nombre'] = $nuevoNombre;
        }
    }
    public function cambiarPrecioFuncion($indiceFuncion, $nuevoPrecio) {
        if (array_key_exists($indiceFuncion, $this->funciones)) {
            $this->funciones[$indiceFuncion]['precio'] = $nuevoPrecio;
        }
    }

    public function mostrarInformacion(){
        $teatroNombre = "Nombre teatro: " . $this->nombreTeatro . "\n";
        $teatroDireccion = "Dirección teatro: " . $this->direccion . "\n";

        $infoFunciones = "Funciones:\n";
        foreach ($this->funciones as $indice => $funcion) {
            $infoFunciones .= "Función " . ($indice + 1) . ":\n";
            $infoFunciones .= "   Nombre: " . $funcion['nombre'] . "\n";
            $infoFunciones .= "   Precio: $" . $funcion['precio'] . "\n";
        }
        return $teatroNombre . $teatroDireccion . $infoFunciones;
    }

}

// $funciones = [
//     ['nombre' => 'Funcion 1', 'precio' => 100],
//     ['nombre' => 'Funcion 2', 'precio' => 120],
//     ['nombre' => 'Funcion 3', 'precio' => 150],
//     ['nombre' => 'Funcion 4', 'precio' => 80]
// ];

// $teatro = new Teatro("Teatro fultes", "Calle Ejemplo 123", $funciones);

// echo "Información del Teatro:\n";
// echo $teatro->mostrarInformacion() . "\n";

// // Cambiar el nombre del teatro y dirección
// $teatro->cambiarNombreTeatro("Nuevo Teatro");
// $teatro->cambiarDireccionTeatro("Nueva Dirección 456");

// // Cambiar el nombre y precio de una función
// $teatro->cambiarNombreFuncion(1, "Funcion Modificada");
// $teatro->cambiarPrecioFuncion(2, 200);

// echo "Información del Teatro Modificada:\n";
// echo $teatro->mostrarInformacion() . "\n";

// 16. Cree una clase Libro que tenga los atributos ISBN, titulo, año de edición, editorial, nombre y apellido
// del autor. Defina en la clase los siguientes métodos
// a) Método constructor _ _construct() que recibe como parámetros los valores iniciales para los atributos de la
// clase.
// b) Los método de acceso de cada uno de los atributos de la clase.
// c) Método toString() que retorne la información de los atributos de la clase.
// d) ***perteneceEditorial($peditorial): indica si el libro pertenece a una editorial dada. Recibe como parámetro
// una editorial y devuelve un valor verdadero/falso.
// e) aniosdesdeEdicion(): método que retorna los años que han pasado desde que el libro fue editado.

// f) Cree un script TestLibro que:
// 1) defina el método iguales($plibro,$parreglo): dada una colección de libros, indica si el libro pasado por
// parámetro ya se encuentra en dicha colección.
// 2) defina el método librodeEditoriales($arreglolibros, $peditorial): método que retorna un arreglo asociativo
// con todos los libros publicados por la editorial dada.
// 3) cree al menos tres objetos libros e invoque a cada uno de los métodos implementados en la clase Libro. 

class Libro{
    private $ISBN;
    private $titulo;
    private $anioDeEdicion;
    private $editorial;
    private $nombreAutor;
    private $cantPaginas;
    Private $sinopsis;

    public function __construct($ISBN, $titulo, $anioDeEdicion, $editorial, $nombreAutor, $cantPaginas, $sinopsis){
        $this->ISBN = $ISBN;
        $this->titulo = $titulo;
        $this->anioDeEdicion = $anioDeEdicion;
        $this->editorial = $editorial;
        $this->nombreAutor = $nombreAutor;
        $this->cantPaginas = $cantPaginas;
        $this->sinopsis = $sinopsis;

    }
    // Métodos de acceso
    public function getISBN() {
        return $this->ISBN;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAnioEdicion() {
        return $this->anioDeEdicion;
    }

    public function getEditorial() {
        return $this->editorial;
    }

    public function getAutorNombre() {
        return $this->nombreAutor;
    }

    public function getAutorApellido() {
        return $this->autorApellido;
    }
    public function getCantPaginas() {
        return $this->cantPaginas;
    }
    public function getSinopsis() {
        return $this->sinopsis;
    }

    public function __toString(){
        $titulo = "Titulo del libro: " . $this->titulo."\n";
        $anioDeEdicion = "Año de edicion: " . $this->anioDeEdicion."\n";
        $editorial = "Editorial: ".$this->editorial."\n";
        $nombreAutor = "Nombre del autor: ".$this->nombreAutor."\n";

        $cantPaginas = "Cantidad de paginas: ".$this->cantPaginas."\n";
        $sinopsis = "Sinopsis: ".$this->sinopsis."\n";

        return $titulo . $anioDeEdicion . $editorial . $nombreAutor . $cantPaginas . $sinopsis;
    }
    public function perteneceEditorial($editorial){
        if($this->editorial == $editorial){
            $perteneceEditorial = true;
        }else{
            $perteneceEditorial = false;
        }
        return $perteneceEditorial;
    }
    public function aniosdesdeEdicion($anioActual){
        $aniosdesdeEdicion = $anioActual - $this->anioDeEdicion;
        return $aniosdesdeEdicion;
    }
}
// El motivo principal de definir los métodos iguales y librosDeEditorial como estáticos en la clase TestLibro es porque estos métodos no necesitan depender de una instancia específica de la clase TestLibro para funcionar. 

class TestLibro {
    public static function iguales($plibro, $parreglo) {
        foreach ($parreglo as $libro) {
            if ($plibro->getISBN() === $libro->getISBN()) {
                return true;
            }
        }
        return false;
    }

    public static function librosDeEditorial($arregloLibros, $peditorial) {
        $librosEditorial = [];
        foreach ($arregloLibros as $libro) {
            if ($libro->getEditorial() === $peditorial) {
                $librosEditorial[] = $libro;
            }
        }
        return $librosEditorial;
    }
}

// Crear libros
$datosDelAutor =  new Persona("Jose","Jan", "Dni", "2314342134");

$libro1 = new Libro("9780143120933", "1984", 1949, "Penguin Books", $datosDelAutor, 323, "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum");
$libro2 = new Libro("9780307264888", "The Catcher in the Rye", 1951, "Little, Brown and Company", $datosDelAutor, 100, "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum");
$libro3 = new Libro("9788416588198", "El Alquimista", 1988, "HarperCollins", $datosDelAutor, 720, "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum");

// Invocar métodos de la clase Libro
// echo "Información de los Libros:\n";
// echo "Libro 1:\n" . $libro1->__toString() . "\n";
// echo "Años desde Edición del Libro 2: " . $libro2->aniosdesdeEdicion(2024) . "\n";
// echo "¿El Libro 3 pertenece a HarperCollins? " . ($libro3->perteneceEditorial("HarperCollins") ? "Sí" : "No") . "\n\n";

// // Test de métodos de TestLibro
// $coleccionLibros = [$libro1, $libro2, $libro3];
// echo "¿El Libro 1 ya se encuentra en la colección de libros? " . (TestLibro::iguales($libro1, $coleccionLibros) ? "Sí" : "No") . "\n";

// $editorial = "Penguin Books";
// echo "\nLibros de la editorial '$editorial':\n";
// $librosEditorial = TestLibro::librosDeEditorial($coleccionLibros, $editorial);
// foreach ($librosEditorial as $libro) {
//     echo $libro->__toString() . "\n";
// }