<?php

namespace iutnc\deefy\action;

class AddUserAction extends Action {

    public function execute(): string {

        // requête get
        if ($this->http_method === 'GET') {

            return <<<HTML
                <h2>Inscription</h2>

                <form method="post" action="?action=add-user">

                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" id="nom" required>

                    <br><br>

                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" required>

                    <br><br>

                    <label for="age">Âge :</label>
                    <input type="number" name="age" id="age" min="1" required>

                    <br><br>

                    <button type="submit">Connexion</button>

                </form>
            HTML;
        }

        //requête post
        if ($this->http_method === 'POST') {

            $nom = filter_var($_POST['nom'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

            $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);

            $age = filter_var($_POST['age'] ?? '', FILTER_VALIDATE_INT);

            if (trim($nom) === '' || $email === false || $age === false || $age < 1) {
                return '<p>Infos rentrées sont incorrectes</p>';
            }

            return '<h2>Inscription réussie, vous pouvez profiter à fond</h2>'
                . '<p>Nom : ' . $nom . '</p>'
                . '<p>Email : ' . $email . '</p>'
                . '<p>Age : ' . $age . ' ans</p>';
        }
        return '<p>Méthode HTTP non autorisée.</p>';
    }
}
