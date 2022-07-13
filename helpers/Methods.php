<?php
require '../config.php';
require 'Utilities.php';

class Methods {
    public $method;
    
    private function getMethod() {
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
        return $this->method;
    }

    public function getAll() {
        if($this->getMethod() === 'get') {
            $utilities = new Utilities();
            $data = $utilities->getData();
            for($i=0; $i < count($data['name']); $i++) {
                $result['result'][] = [
                    'name' => str_replace("\n", ' ', $data['name'][$i]),
                    'desc' => str_replace("\n", ' ', $data['desc'][$i]),
                    'genre' => str_replace("\n", ' ', $data['genre'][$i])
                ];
            }
        } else {
            $result['error'] = 'not allowed method';
        }

        return $result;
           
        }
    }


?>