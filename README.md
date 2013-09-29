ci-users-lib
============

Librería sencilla en CodeIgniter para limitar acceso a usuarios a nivel controller/method incluyendo subdirectorios. No tiene base de datos de permisos, utiliza sintaxis json inclustada en la librería.

**Nota:** Esta librería no se encarga de la existencia de usuarios, solo de revisar que se tenga una sesión iniciada y de los permisos a nivel controlador/metodo de un id de usuario dado
Los permisos de guardan en formato JSON dentro la misma librería con la siguiente estructura:

    $this->data['access'] = json_decode('{
                "users": [
                    {
                        "id": 1,
                        "urls": [
                            "test/index",
                            "test/second"
                        ]
                    },
                    {
                        "id": 2,
                        "urls": [
                            "test/index",
                            "test/second"
                        ]
                    }
                ]
            }');

Las urls deberán tener el formato **controller/method** o en su caso **directorio/controller/method** 
Bastará con crear un nuevo controlador que herede de secure_controller

##Configuración

    define('LOGIN_CONTROLLER' , '/login');	
    define('DENIED_VIEW' , 'denied_view');	
    
*LOGIN_CONTROLLER* indica el controlador del login para el usuario que se usará para redirigirlo cuando no tenga una sesión abierta
*DEIED_VIEW* indica la vista que se cargará cuando el usuario no tenga acceso a la ruta actual
