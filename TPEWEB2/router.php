<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>MELOMANO</title>
</head>
</html>
    <?php
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
    include_once 'controllers/controller.php';
    include_once 'controllers/controller.marcas.php';
$action = 'instrumentos'; // acción por defecto
if (!empty($_GET['action'])) { // si viene definida la reemplazamos
    $action = $_GET['action'];
}
else{
    $action='instrumentos';
}
$params = explode('/', $action);
switch ($params[0]) {
        case 'instrumentos':
            $controller= new instrumentoscontroller();
            $controller->showinstrumento();
        break;
        case 'insertar':
            $controller= new instrumentoscontroller();
            $controller->addinstrumentos();
        break;
        case 'borrar':
            $controller= new instrumentoscontroller();
            $controller->deleteinstrumento($params[1]);
        break;
        case 'mostrarmas':
            $controller= new instrumentoscontroller();
            $controller->detalle($params[1]);
        break;
        case 'update':
                $controller= new instrumentoscontroller();
                $controller->updateinstrumento($params[1]);
        break;
        case 'update1':
            $controller= new instrumentoscontroller();
            $controller->update1();
    break;
        case 'marcas':
            $controller= new marcascontroller();
            $controller->getmarcas();
        break;
        case 'insertarmarcas':
                $controller= new marcascontroller();
                $controller->insertarmarcas();
        break;
        case 'deletemarcas':
            $controller= new marcascontroller();
            $controller->deletemarcas($params[1]);
        break;
        case 'updatemarcas':
            if (isset($params[1])) { 
                $controller = new marcascontroller();
                $controller->updatemarcas($params[1]);
            } else {
                echo "ID de marca no encontrado.";
            }
            break;
            case 'updatemarcas1':
                if (isset($params[1])) { 
                    $controller = new marcascontroller();
                    $controller->updatemarcas1($params[1]);
                } else {
                    echo "ID de marca no encontrado.";
                }
                break;
        case 'itembymarca':
            $controller= new marcascontroller();
            $controller->showitemspormarca($params[1]);
        break;
}
?>
