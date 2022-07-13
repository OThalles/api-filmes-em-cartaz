<?php

class Utilities {
    public $data = [];
    public $domNodeListGenre;
    public $domNodeListDesc;
    public $domNodeListName;

    public function scraper() {

        $websiteContent = file_get_contents('https://cinema10.com.br/cartaz');
        $document = new DOMDocument();
        $document->loadHTML($websiteContent);

        $xPath = new DOMXPath($document);

        return $xPath;

        
    }

    public function getData() {

        $this->domNodeListName = $this->scraper()->query('.//span[@class="movie-name"]'); // Pegando os nomes de todos os filmes em cartaz
        $this->domNodeListDesc = $this->scraper()->query('.//span[@class="movie-desc"]'); // Pegando as descriçoes de todos os filmes em cartaz
        $this->domNodeListGenre = $this->scraper()->query('.//span[@class="movie-metadata linksAzul"]'); // Pegando os gêneros de todos os filmes em cartaz

        foreach($this->domNodeListName as $elementName) {
            $this->data['name'][] = $elementName->textContent;
        }
        
        foreach($this->domNodeListDesc as $elementDesc) {
            $this->data['desc'][] = $elementDesc->textContent;
        }
        
        foreach($this->domNodeListGenre as $elementGenre) {
            $this->data['genre'][] = $elementGenre->textContent;
        }

        return $this->data;
    }

}

?>