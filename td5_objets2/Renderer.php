<?php
interface Renderer {

    //public function renderCompact() : string;
    //public function renderLong() : string;
    public function render(int $selector) : string;
}

?>