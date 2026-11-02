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

    private function renderPage(string $html) : void {
        echo '
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <title>DeefyApp</title>
        </head>
        <body>
            <header>
                <h1>DeefyApp</h1>
            </header>
            <main>
                ' . $html . '
            </main>
        </body>
        </html>
        ';
    }
}
