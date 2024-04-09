<?php
// La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.
// Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los datos de los pasajeros). Utilice clases y arreglos  para   almacenar la información correspondiente a los pasajeros. Cada pasajero guarda  su “nombre”, “apellido” y “numero de documento”.
// Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos.

// Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono. El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido. La clase Viaje debe hacer referencia al responsable de realizar el viaje.
// Implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.

class Pasajero{
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;

    public function __construct($nombre, $apellido, $documento, $telefono){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->telefono = $telefono;
    }

    public function getNombre(){
        $nombre = $this->nombre;
        return $nombre;
    }
    public function setNombre($newNombre){
        $this->nombre = $newNombre;
    }
    public function getApellido(){
        $apellido = $this->apellido;
        return $apellido;
}
    public function setApellido($newApellido){
        $this->apellido = $newApellido;
    }
    public function getDocumento(){
        $documento = $this->documento;
        return $documento;
    }
    public function setDocumento($newDocumento){
        $this->documento = $newDocumento;
    }
    public function getTelefono(){
        $telefono = $this->telefono;
        return $telefono;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function __toString(){
        $nombre = "\nNombre: ".$this->nombre."\n";
        $apellido = "Apellido: ".$this->apellido."\n";
        $documento = "Documento: ".$this->documento."\n";
        $telefono = "Telefono: ".$this->telefono."\n";
        return $nombre . $apellido . $documento . $telefono;
    }
}


class ResponsableV {
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;

    public function __construct($numEmpleado, $numLicencia, $nombre, $apellido) {
        $this->numEmpleado = $numEmpleado;
        $this->numLicencia = $numLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    public function getNumEmpleado() {
        $numEmpleado = $this->numEmpleado;
        return $numEmpleado;
    }

    public function setNumEmpleado($numEmpleado) {
        $this->numEmpleado = $numEmpleado;
    }

    public function getNumLicencia() {
        $numLicencia =  $this->numLicencia;
        return $numLicencia;
    }

    public function setNumLicencia($numLicencia) {
        $this->numLicencia = $numLicencia;
    }

    public function getNombre() {
        $nombre = $this->nombre;
        return $nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        $apellido = $this->apellido;
        return $apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function __toString() {
        $empleado = "Responsable: " . $this->nombre . " " . $this->apellido." \n";
        $numEmpleado = "Empleado: " . $this->numEmpleado." \n";
        $licencia = "Licencia: " . $this->numLicencia." \n";
        return $empleado . $licencia . $numEmpleado;
    }
}

class Viaje{
    private $codigoDeViaje;
    private $destino;
    private $cantMaxDePasajeros;
    private $pasajeros = [];
    private $responsable;

    public function __construct($codigoDeViaje, $destino, $cantMaxDePasajeros, $responsable) {
        $this->codigoDeViaje = $codigoDeViaje;
        $this->destino = $destino;
        $this->cantMaxDePasajeros = $cantMaxDePasajeros;
        $this->responsable = $responsable;
    }
    public function getCodigoDeViaje(){
        $codigoDeViaje = $this->codigoDeViaje;
        return $codigoDeViaje;
    }
    public function setCodigoDeViaje($newCodigoDeViaje){
        $this->codigoDeViaje = $newCodigoDeViaje;
    }
    public function getDestino(){
        $destino = $this->destino;
        return $destino;
    }
    public function setDestino($newDestino){
        $this->destino = $newDestino;
    }
    public function getCantMaxDePasajeros(){
        $cantMaxDePasajeros = $this->cantMaxDePasajeros;
        return $cantMaxDePasajeros;
    }
    public function setCantMaxDePasajeros($newCantMaxDePasajeros){
        $this->cantMaxDePasajeros = $newCantMaxDePasajeros;
    }
    public function getResponsable() {
        $responsable = $this->responsable;
        return $responsable;
    }
    public function setResponsable($responsable) {
        $this->responsable = $responsable;
    }
    public function getPasajeros(){
        $pasajeros = $this->pasajeros;
        return $pasajeros;
    }
    public function agregarPasajero($pasajero) {
        if (count($this->pasajeros) < $this->cantMaxDePasajeros) {
            // Verificar que el pasajero no esté ya en la lista
            foreach ($this->pasajeros as $p) {
                if ($p->getDocumento() === $pasajero->getDocumento()) {
                    $mensaje = "El pasajero ya está en la lista.";
                }
            }
            $this->pasajeros[] = $pasajero;
            $mensaje = "Pasajero agregado correctamente.";
        } else {
            $mensaje = "No se puede agregar más pasajeros, se alcanzó la cantidad máxima.";
        }
        return $mensaje;
    }
    public function modificarPasajero($documento, $nombre, $apellido, $telefono) {
        foreach ($this->pasajeros as $pasajero) {
            if ($pasajero->getDocumento() === $documento) {
                $pasajero->setNombre($nombre);
                $pasajero->setApellido($apellido);
                $pasajero->setTelefono($telefono);
                $mensaje = "Pasajero modificado correctamente.";
            }
        }
        $mensaje = "Pasajero no encontrado.";
        return $mensaje;
    }
    public function __toString() {
        $codigoDeViajeStr = "Código de Viaje: " . $this->codigoDeViaje . "\n";
        $destinoStr = "Destino: " . $this->destino . "\n";
        $cantMaxDePasajerosStr = "Cantidad Máxima de Pasajeros: " . $this->cantMaxDePasajeros . "\n";
        $responsableStr = $this->responsable . "\n";

        $pasajerosStr = "Pasajeros del Viaje:\n";
        foreach ($this->pasajeros as $pasajero) {
            $pasajerosStr .= "- " . $pasajero . "\n";
        }

        return $codigoDeViajeStr . $destinoStr . $cantMaxDePasajerosStr . $responsableStr . $pasajerosStr;
    }
}