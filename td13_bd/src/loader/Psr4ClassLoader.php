<?php
class Psr4ClassLoader {

    private string $prefixe;
    private string $repertoireBase;

    public function __construct(string $prefix, string $repBase){
        $this->prefixe = $prefix;
        $this->repertoireBase = $repBase;
    }

    public function loadClass(string $nomClasse) : void {
        if (strpos($nomClasse, $this->prefixe) !== 0) {
            return;
        }
        $nNomClasse = substr($nomClasse, strlen($this->prefixe));
        $fichier = $this->repertoireBase . '/' . str_replace('\\', '/', $nNomClasse) . '.php';
        if (is_file($fichier)) {
            require_once $fichier;
        }
    }

    public function register() : void {
        spl_autoload_register([$this, 'loadClass']);
    }
}
?>