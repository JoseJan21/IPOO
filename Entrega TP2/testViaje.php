<?php
include 'entregaTP2.php';


echo "### Gestión de Viaje ###\n\n";

echo "Ingrese el código del viaje: ";
$codigo = trim(fgets(STDIN));

echo "Ingrese el destino del viaje: ";
$destino = trim(fgets(STDIN));

echo "Ingrese la cantidad máxima de pasajeros: ";
$maxPasajeros = intval(trim(fgets(STDIN)));

echo "### Información del Responsable del Viaje ###\n";
echo "Ingrese el número de empleado del responsable: ";
$numEmpleado = trim(fgets(STDIN));

echo "Ingrese el número de licencia del responsable: ";
$numLicencia = trim(fgets(STDIN));

echo "Ingrese el nombre del responsable: ";
$nombreResponsable = trim(fgets(STDIN));

echo "Ingrese el apellido del responsable: ";
$apellidoResponsable = trim(fgets(STDIN));

$responsable = new ResponsableV($numEmpleado, $numLicencia, $nombreResponsable, $apellidoResponsable);
$viaje = new Viaje($codigo, $destino, $maxPasajeros, $responsable);


while(true){
    echo "### Menu ###\n\n";
    echo "1. Agregar Pasajero\n";
    echo "2. Modificar Pasajero\n";
    echo "3. Ver Datos del Viaje\n";
    echo "4. Salir\n";
    echo "Ingrese la opción: ";

    $opcion = trim(fgets(STDIN));

    switch ($opcion){
        case 1:
            echo "\n### Agregar Pasajero ###\n";
            echo "Ingrese el nombre del pasajero: ";
            $nombrePasajero = trim(fgets(STDIN));
            
            echo "Ingrese el apellido del pasajero: ";
            $apellidoPasajero = trim(fgets(STDIN));
            
            echo "Ingrese el número de documento del pasajero: ";
            $documentoPasajero = trim(fgets(STDIN));
            
            echo "Ingrese el teléfono del pasajero: ";
            $telefonoPasajero = trim(fgets(STDIN));
            
            $pasajero = new Pasajero($nombrePasajero, $apellidoPasajero, $documentoPasajero, $telefonoPasajero);
            $mensaje = $viaje->agregarPasajero($pasajero);
            echo $mensaje . "\n";
            break;

            case 2:
                echo "\n### Modificar Pasajero ###\n";
                echo "Ingrese el número de documento del pasajero a modificar: ";
                $documentoMod = trim(fgets(STDIN));
                
                echo "Ingrese el nuevo nombre: ";
                $nuevoNombre = trim(fgets(STDIN));
                
                echo "Ingrese el nuevo apellido: ";
                $nuevoApellido = trim(fgets(STDIN));
                
                echo "Ingrese el nuevo teléfono: ";
                $nuevoTelefono = trim(fgets(STDIN));
                
                $mensaje = $viaje->modificarPasajero($documentoMod, $nuevoNombre, $nuevoApellido, $nuevoTelefono);
                echo $mensaje . "\n";
                break;
                
            case 3:
                echo "\n### Datos del Viaje ###\n";
                echo $viaje . "\n";
                break;
                
            case 4:
                exit;
                
            default:
                echo "Opción no válida.\n";
                break;
        
    }
}