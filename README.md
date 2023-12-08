# lab-debug-laravel
## Travail à faire
Calcule la somme de deux nombres et débogue la fonction de somme.
## Critère de validation
1. Installation de Xdebug.
2. Utilisation de Visual Studio Code (VSCode).
3. Création d'un contrôleur CalculeController et application de la logique de calcul.
## Référence
- [How to debug Laravel with XDebuger in VS Code](https://dev.to/snakepy/how-to-debug-laravel-apps-with-laravel-apps-with-xdebuger-in-vs-code-8cp)
## Installation
1. Install XDebug sur vscode
```bash

# Config --- php.ini --- 

[XDEBUG]
zend_extension="C:\Program Files\php\ext\php_xdebug.dll"
xdebug.mode=debug
xdebug.client_host = 127.0.0.1
xdebug.client_port = 9003

xdebug.start_with_request = yes
```
2. créer un fichier launch.json
```

{
    "version": "0.2.0",
    "configurations": [
        
        {
            "name": "Listen for Xdebug",
            "type": "php",
            "request": "launch",
            "port": 9003
        },
        {
            "name": "Launch currently open script",
            "type": "php",
            "request": "launch",
            "program": "${file}",
            "cwd": "${fileDirname}",
            "port": 0,
            "runtimeArgs": [
                "-dxdebug.start_with_request=yes"
            ],
            "env": {
                "XDEBUG_MODE": "debug,develop",
                "XDEBUG_CONFIG": "client_port=${port}"
            }
        },
        {
            "name": "Launch Built-in web server",
            "type": "php",
            "request": "launch",
            "runtimeArgs": [
                "-dxdebug.mode=debug",
                "-dxdebug.start_with_request=yes",
                "-S",
                "localhost:0"
            ],
            "program": "",
            "cwd": "${workspaceRoot}",
            "port": 9003,
            "serverReadyAction": {
                "pattern": "Development Server \\(http://localhost:([0-9]+)\\) started",
                "uriFormat": "http://localhost:%s",
                "action": "openExternally"
            }
        }
    ]
}
```
3. crée une projet de calcule avec laravel 
```bash
composer create-project laravel/laravel=10 calcule
```

4. crée un controller de calcule 
```bash
php artisan make:controller CalculeController
```
5. executer le code
```bash
php artisan serve
```