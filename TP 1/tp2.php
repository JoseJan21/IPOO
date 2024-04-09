<?php
include "tp1.php";
// include "tp1Libro.php";

// 1. Implementar una clase Persona con los atributos: nombre, apellido, tipo y número de documento.
// a) Defina en la clase los siguientes métodos:
// 1. Método constructor _ _construct() que recibe como parámetros los valores iniciales para los
// atributos de la clase.
// 2. Los métodos de acceso de cada uno de los atributos de la clase.
// 3. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
// 4. Crear un script Test_Persona que cree un objeto Persona e invoque a cada uno de los
// métodos implementados.

Class Persona{
    private $nombre;
    private $apellido;
    private $tipo;
    private $dni;

    public function __construct($nombre, $apellido, $tipo, $dni){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipo = $tipo;
        $this->dni = $dni;
    }

    public function getNombre(){
        $nombre = $this->nombre;
        return $nombre;
    }
    public function getApellido(){
        $apellido = $this->apellido;
        return $apellido;
    }
    public function getTipo(){
        $tipo = $this->tipo;
        return $tipo;
    }
    public function getDni(){
        $dni = $this->dni;
        return $dni;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }	
    public function setTipo($tipo){
        $this->tipo = $tipo;
    }
    public function setDni($dni){
        $this->dni = $dni;
    }
    public function __toString(){
        $nombre = "Nombre: " . $this->nombre . " \n";
        $apellido = "Apellido: " . $this->apellido . " \n";
        $tipo = "Tipo: " . $this->tipo . " \n";
        $dni = "Dni: " . $this->dni . " \n";
        return $nombre . $apellido . $tipo . $dni;
    }

    
}

$persona = new Persona("Jose","Jan", "Dni", "2314342134");
//LLamar a Nombre
$persona->getNombre();
//LLamar a Apellido
$persona->getApellido();
//LLamar a Tipo
$persona->getTipo();
//LLamar a Dni
$persona->getDni();

// echo "\nAtributos:\n" . $persona->__toString();

// b) Realizar las modificaciones necesarias en la clase CuentaBancaria (Ejercicio 14 del TP1) para que en
// vez de contener como atributo el DNI del dueño de la cuenta tenga una referencia a las clase Persona.
//HECHO

// 2. Implementar una clase Disquera con los atributos: hora_desde y hora_hasta (que indican el horario de
// atención de la tienda), estado (abierta o cerrada), dirección y dueño. El atributo dueño debe referenciar a un
// objeto de la clase Persona implementada en el punto 1. Defina en la clase los siguientes métodos:
// a) Método constructor _ _construct () que recibe como parámetros los valores iniciales para los atributos
// de la clase.
// b) Los métodos de acceso de cada uno de los atributos de la clase.
// c) dentroHorarioAtencion($hora,$minutos): que dada una hora y minutos retorna true si la tienda debe
// encontrarse abierta en ese horario y false en caso contrario.
// d) abrirDisquera($hora,$minutos): que dada una hora y minutos corrobora que se encuentra dentro del
// horario de atención y cambia el estado de la disquera solo si es un horario válido para su apertura.
// e) cerrarDisquera($hora,$minutos): que dada una hora y minutos corrobora que se encuentra fuera del
// horario de atención y cambia el estado de la disquera solo si es un horario válido para su cierre.
// f) Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
// g) Crear un script Test_Disquera que cree un objeto Disquera e invoque a cada uno de los métodos
// implementados.

class Disquera{
    private $hora_desde;
    private $hora_hasta;
    private $estado; //(abierta o cerrada)
    private $dirección;
    private $duenio; //El atributo dueño debe referenciar a un objeto de la clase Persona implementada en el punto 1

    public function __construct($hora_desde, $hora_hasta, $estado, $direccion, $duenio){
        $this->horaDesde = $hora_desde;
        $this->horaHasta = $hora_hasta;
        $this->estado = $estado;
        $this->direccion = $direccion;
        $this->duenio = $duenio;
    }

    public function getHoraDesde(){
        $horaDesde = $this->horaDesde;
        return $horaDesde;
    }
    public function setHoraDesde($horaDesde){
        $this->horaDesde = $horaDesde;
    }
    public function getHoraHasta(){
        $horaHasta = $this->horaHasta;
        return $horaHasta;
    }
    public function setHoraHasta($horaHasta){
        $this->horaHasta = $horaHasta;
    }
    public function getEstado(){
        $estado = $this->estado;
        return $estado;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }
    public function getDireccion(){
        $direccion = $this->direccion;
        return $direccion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function getDuenio(){
        $duenio = $this->duenio;
        return $duenio;
    }
    public function setDuenio($duenio){
        $this->duenio = $duenio;
    }
    //desde 8:30
    //hasta 22:30
    // c) dentroHorarioAtencion($hora,$minutos): que dada una hora y minutos retorna true si la tienda debe
    // encontrarse abierta en ese horario y false en caso contrario.
    public function dentroHorarioAtencion($hora,$minutos){
        if($hora >= $this->horaDesde["hora"] && $minutos >= $this->horaDesde["minutos"]){
            if($hora <= $this->horaHasta["hora"] && $minutos <= $this->horahasta["minutos"]){
                $dentroDeLaHora = true;
            }else{
                $dentroDeLaHora = false;
            }
        }else{
            $dentroDeLaHora = false;
        }
        return $dentroDeLaHora;
    }
    // d) abrirDisquera($hora,$minutos): que dada una hora y minutos corrobora que se encuentra dentro del
    // horario de atención y cambia el estado de la disquera solo si es un horario válido para su apertura. 

    public function abrirDisquera($hora,$minutos){
        $dentroHorarioAtencion = dentroHorarioAtencion($hora,$minutos);
        if($dentroHorarioAtencion = true){
            $this->setEstado("Abierto");
        }else{
            $estadoDisquera = "La disquera no puede habrir en este momento.";
        }
        return $estadoDisquera;
    }

    // e) cerrarDisquera($hora,$minutos): que dada una hora y minutos corrobora que se encuentra fuera del
    // horario de atención y cambia el estado de la disquera solo si es un horario válido para su cierre.

    public function cerrarDisquera($hora,$minutos){
        $dentroHorarioAtencion = dentroHorarioAtencion($hora,$minutos);
        if($dentroHorarioAtencion = false){
            $this->setEstado("Cerrado");
        }else{
            $estadoDisquera = "La disquera no puede cerrar en este momento.";
        }
        return $estadoDisquera;
    }
    // f) Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
    public function __toString(){
        $horaDesde = "Hora apertura(desde): ".$this->horaDesde['hora']. ":".$this->horaDesde['minutos']."\n";
        $horaHasta = "Hora cierre(hasta): "  .$this->horaHasta['hora'].":".$this->horaHasta['minutos']."\n";
        $estado = "Estado: ".$this->estado."\n";
        $direccion = "Dirección: ".$this->direccion."\n";
        $duenio = "Dueño: \n".$this->duenio."\n";
        return $horaDesde . $horaHasta . $estado . $direccion . $duenio;
    }
}
$horaDesde = array(
    'hora'=> 8,
    'minutos'=> 33
);
$horaHasta = array(
    'hora'=> 22,
    'minutos'=> 20
);
$duenio = new Persona("Jose", "Jan", "Dni", 43793421);

$disquera = new Disquera($horaDesde, $horaHasta, "Abierto", "colonia san francisco oeste", $duenio);

echo "Inicio disquera: ";
$disquera->getHoraDesde();
$disquera->getHoraHasta();
$disquera->getEstado();
$disquera->getDireccion();
$disquera->getDuenio();

// echo "\nAtributos:\n" . $disquera->__toString();
// print_r($hora);

// 3. Realizar las modificaciones necesarias en la clase Libro (Ejercicio 16 del TP1) para que en vez de contener
// como atributos nombre y apellido del autor del libro, tenga una referencia a las clase Persona. Además
// agregue como variables instancias de la clase la cantidad de páginas y sinopsis del libro.3
// a) Método constructor _ _construct () que recibe como parámetros los valores iniciales para los atributos
// de la clase.
// b) Los métodos de acceso de cada uno de los atributos de la clase.
// c) Redefinir el método _ _toString() para que retorne la información de los atributos de la clase
// d) Crear un script Test_Libro que cree un objeto Libro e invoque a cada uno de los métodos
// implementados.
//HECHO

// 4. Se desea implementar una clase Lectura que almacena información sobre la lectura de un determinado libro.
// Esta clase tiene como variable instancia un referencia a un objeto Libro y el número de la página que se esta
// leyendo. Por otro lado la clase contiene los siguientes métodos:
// a) Método constructor _ _construct() que recibe como parámetros los valores iniciales para los atributos
// de la clase.
// b) Los métodos de acceso de cada uno de los atributos de la clase.
// c) siguientePagina(): método que retorna la página del libro y actualiza la variable que contiene la
// pagina actual.
// d) retrocederPagina(): método que retorna la página anterior a la actual del libro y actualiza su valor.
// e) irPagina(x): método que retorna la página actual y setea como página actual al valor recibido por
// parámetro.
// f) Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
// g) Crear un script Test_Lectura que cree un objeto Lectura e invoque a cada uno de los métodos
// implementados.

class Lectura{
    private $libro;
    private $paginaLecturaActual;
    private $librosLeidos = [];

    public function __construct( $libro, $paginaLecturaActual, $librosLeidos){
        $this->libro = $libro;
        $this->paginaLecturaActual = $paginaLecturaActual;
        $this->librosLeidos = [];        
    }

    public function getLibro(){
        $libro = $this->libro;
        return $libro;
    }
    public function setLibro($libro){
        $this->libro = $libro;
    }
    public function getPaginaLecturaActual(){
        $pagina = $this->paginaLecturaActual;
        return $pagina;
    }
    public function setPaginaLecturaActual($pagina){
        $this->paginaLecturaActual = $pagina;
    }
    public function getLibrosLeidos(){
        $libros = $this->librosLeidos;
        return $libros;
    }
    // c) siguientePagina(): método que retorna la página del libro y actualiza la variable que contiene la
    // pagina actual.
    public function siguientePagina(){
        $pagina = $this->paginaLecturaActual += 1;
        return $pagina;
    }

    // d) retrocederPagina(): método que retorna la página anterior a la actual del libro y actualiza su valor.
    public function retrocederPagina(){
        $pagina = $this->paginaLecturaActual -= 1;
        return $pagina;
    }
    // e) irPagina(x): método que retorna la página actual y setea como página actual al valor recibido por
    // parámetro.
    public function irPagina($x){
        $pagina = $this->paginaLecturaActual = $x;
        return $pagina;
    }
    public function libroLeido($titulo){
        foreach($this->librosLeidos as $libroLeido){
            if($libroLeido->getTitulo() === $titulo){
                $libro = true;
            }else{
                $libro = false;
            }
        }
        return $libro;
    }
    public function darSinopsis($titulo){
        foreach($this->librosLeidos as $libroLeido){
            if($libroLeido->getTitulo() === $titulo){
                $libro = $libroLeido->getSinopsis();
            }else{
                $libro = "Sinopsis no encontrada.";
            }
        }
        return $libro;
    }
    public function leidosAnioEdicion($x){
        $librosFiltrados = [];
        foreach($this->librosLeidos as $libroLeido){
            if($libroLeido->getAnioEdicion() === $x){
                $librosFiltrados[] = $libroLeido;
            }
        }
        return $librosFiltrados;
    }
    public function darLibrosPorAutor($nombreAutor){
        $librosAutor = [];
        foreach($this->librosLeidos as $libroLeido){
            if($libroLeido->getAutorNombre() === $nombreAutor){
                $librosAutor[] = $libroLeido;
            }
        }
        return $librosAutor;
    }
    public function agregarLibroLeido($libro){
        $this->librosLeidos[] = $libro;
    }

    // f) Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
    public function __toString(){
        $libro = "\nDatos del libro:\n" . $this->libro->__toString() . "\n";
        $paginaActual = "Pagina actual: " . $this->paginaLecturaActual . "\n";
        $librosLeidosInfo = "Libros Leídos:\n";
        foreach($this->librosLeidos as $libroLeido){
            $librosLeidosInfo .= $libroLeido->__toString() . "\n";
        }
        return $libro . $paginaActual . $librosLeidosInfo;
    }

}
$datosDelAutor =  new Persona("Jose","Jan", "Dni", "2314342134");
$libroActual = new Libro("9780143120933", "19sasa84", "titulo libro", "Penguin Books", $datosDelAutor, 323, "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum");

$librosLeidosInicial = [$libro2, $libro3];
$lectura = new Lectura($libro1, 33, $librosLeidosInicial);

// Agregar libros leídos
$lectura->agregarLibroLeido($libro2);
$lectura->agregarLibroLeido($libro3);

// Imprimir información de la Lectura
echo "Información de la Lectura:\n";
echo $lectura->__toString();

// Probar los métodos agregados
echo "\n¿El libro '1984' está en los libros leídos? " . ($lectura->libroLeido("1984") ? "Sí" : "No") . "\n";
echo "Sinopsis de 'The Catcher in the Rye':\n" . $lectura->darSinopsis("The Catcher in the Rye") . "\n";
echo "Libros leídos en 1988:\n";
$libros1988 = $lectura->leidosAnioEdicion(1988);
foreach ($libros1988 as $libro) {
    echo $libro->__toString() . "\n";
}
echo "Libros leídos por 'Jose Jan':\n";
$librosAutor = $lectura->darLibrosPorAutor("Jose Jan");
foreach ($librosAutor as $libro) {
    echo $libro->__toString() . "\n";
}

// 5. Realizar las modificaciones que crea necesaria en la clase implementada en el punto 4 para poder almacenar
// información de los libros que va leyendo una persona. Implementar los siguientes métodos:
// a) libroLeido($titulo): retorna true si el libro cuyo título recibido por parámetro se encuentra dentro del
// conjunto de libros leídos y false en caso contrario.
// b) darSinopsis($titulo): retorna la sinopsis del libro cuyo título se recibe por parámetro.
// c) leidosAnioEdicion($x): que retorne todos aquellos libros que fueron leídos y su año de edición es un
// año X recibido por parámetro.
// d) darLibrosPorAutor($nombreAutor): retorna todos aquellos libros que fueron leídos y el nombre de su
// autor coincide con el recibido por parámetro.
//Hecho


// 6. En un banco existen varios mostradores. Cada mostrador puede atender cierto tipo de trámites y tiene una cola
// de clientes, que no puede superar un número determinado para cada cola, de cada cola se conoce el número
// actual de personas que hay en ella. Cada cliente concurre al banco para realizar un solo trámite. Un trámite
// tiene un horario de creación y un horario de resolución. Implemente los siguientes métodos:
// a) Método constructor _ _construct() que recibe como parámetros los valores iniciales para los atributos
// de las clases.
// b) Los métodos de acceso de cada uno de los atributos de las clases.
// c) Redefinir el método _ _toString() para que retorne la información de los atributos de las clases.
// d) mostrador–>atiende($unTramite): devuelve true o false indicando si el tramite se puede atender o no
// en el mostrador; note que el tipo de trámite correspondiente a unTramite tiene que coincidir con
// alguno de los tipos de trámite que atiende el mostrador.
// e) banco–>mostradoresQueAtienden($unTramite): retorna la colección de todos los mostradores que
// atienden ese trámite.
// f) banco–>mejorMostradorPara($unTramite): retorna el mostrador con la cola más corta con espacio
// para al menos una persona más y que atienda ese trámite; si ningun mostrador tiene espacio, retorna
// null.
// g) banco–>atender($unCliente): cuando llega un cliente al banco se lo ubica en el mostrador que atienda
// el trámite que el cliente requiere, que tenga espacio y la menor cantidad de clientes esperando; si no
// hay lugar en ningún mostrador debe retornar un mensaje que diga al cliente que “será antendido en
// cuanto haya lugar en un mostrador”.

class Banco{
    private $cliente;
    private $tipoTramite = [];
    private $colaClientes;


}