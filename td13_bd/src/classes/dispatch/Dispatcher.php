<?php

namespace iutnc\deefy\dispatch;
use iutnc\deefy\action\DefaultAction;

class Dispatcher {

    private string $action;
    private array $routes = [];

    public function __construct(){
        $this->action = $_GET['action'] ?? 'default';
    }

    public function addRoute(string $action, string $class) : self {
        $this->routes[$action] = $class;
        return $this;
    }

    public function run() : void {
        $class = $this->routes[$this->action] ?? $this->routes['default'] ?? DefaultAction::class;

        $action = new $class();
        $html = $action->execute();
        $this->renderPage($html);
    }

    
    private function renderPage(string $html): void {

        echo <<<HTML
        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <title>Deefy JRPGs</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    background-color: #f4f4f4;
                }

                header {
                    background-color: #222;
                    color: white;
                    padding: 20px;
                    text-align: center;
                }

                nav {
                    background-color: #444;
                    padding: 15px;
                    text-align: center;
                }

                nav a {
                    color: white;
                    text-decoration: none;
                    margin: 15px;
                }

                nav a:hover {
                    text-decoration: underline;
                }

                main {
                    padding: 30px;
                }
            </style>
        </head>

        <body>

            <header>
                <h1>Deefy JRPG</h1>
                <p>LA plateforme de streaming de musiques de JRPGs</p>
            </header>

            <nav>
                <a href="?action=default">Accueil</a>
                <a href="?action=add-user">Inscription</a>
                <a href="?action=add-playlist">Créer une playlist</a>
            </nav>

            <main>
                $html
            </main>

        </body>
        </html>
        HTML;
    }

}
