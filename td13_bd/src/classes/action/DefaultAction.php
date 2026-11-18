<?php

namespace iutnc\deefy\action;

class DefaultAction extends Action {

    public function execute() : string {
        return '<h1>Bienvenue sur mon app de streaming de musiques</h1>
            <p>Mettez vous bien et profitez.</p>';
    }
}
