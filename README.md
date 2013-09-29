ci-users-lib
============

Librería sencilla en CodeIgniter para limitar acceso a usuarios a nivel controller/method incluyendo subdirectorios. No tiene base de datos de permisos, utiliza sintaxis json inclustada en la librería.

Nota: Esta librería no se encarga de la existencia de usuarios, solo de revisar que se tenga una sesión iniciada y de los permisos a nivel controlador/metodo de un id de usuario dado
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

Bastará con crear un nuevo controlador que herede de secure_controller
