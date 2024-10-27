
    <?php
    include_once 'libs/response.php';
    include_once 'controllers/controller.php';
    include_once 'controllers/controller.marcas.php';
    include_once 'controllers/controller.user.php';
    include_once 'middlewares/verifysession.php';
    
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    $response= new response();

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
            verify($response);
            $controller= new instrumentoscontroller($response);
            $controller->showinstrumento();
        break;
        case 'insertar':
            verify($response);
            $controller= new instrumentoscontroller($response);
            $controller->addinstrumentos();
        break;
        case 'borrar':
            verify($response);
            $controller= new instrumentoscontroller($response);
            $controller->deleteinstrumento($params[1]);
        break;
        case 'mostrarmas':
            verify($response);
            $controller= new instrumentoscontroller($response);
            $controller->detalle($params[1]);
        break;
        case 'update':
            verify($response);
                $controller= new instrumentoscontroller($response);
                $controller->updateinstrumento($params[1]);
        break;
        case 'update1':
            verify($response);
            $controller= new instrumentoscontroller($response);
            $controller->update1();
        break;
        case 'marcas':
            verify($response);
            $controller= new marcascontroller($response);
            $controller->getmarcas();
        break;
        case 'insertarmarcas':
            verify($response);
                $controller= new marcascontroller($response);
                $controller->insertarmarcas();
        break;
        case 'deletemarcas':
            verify($response);
            $controller= new marcascontroller($response);
            $controller->deletemarcas($params[1]);
        break;
        case 'updatemarcas':
            verify($response);
            if (isset($params[1])) { 
                $controller = new marcascontroller($response);
                $controller->updatemarcas($params[1]);
            } else {
                echo "ID de marca no encontrado.";
            }
            break;
            case 'updatemarcas1':
                verify($response);
                if (isset($params[1])) { 
                    $controller = new marcascontroller($response);
                    $controller->updatemarcas1($params[1]);
                } else {
                    echo "ID de marca no encontrado.";
                }
                break;
        case 'itembymarca':
            $controller= new marcascontroller($response);
            $controller->showitemspormarca($params[1]);
        break;
        case 'showlogin':
            $controller= new user($response);
            $controller->mostrarlogin();
        break;
        case 'login':
            $controller= new user($response);
            $controller->login();
        break;
        case 'logout':
            $controller= new user($response);
            $controller->logout();
        break;
}
?>
