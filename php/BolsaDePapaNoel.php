<?php

class Regalo {

    public function __construct(public string $name, public int $peso) {}
}

class BolsaDePapaNoel {

    private array $lista_regalos = [];
    private Regalo $peso_mayor;

    public function agregarRegalo(Regalo $regalo) {
        
        $this->comprobarPeso($regalo);

        if( !$this->yaExiste($regalo) )
        {
            $this->lista_regalos[] = $regalo;
        }

        else 
        {
            throw new Exception("El regalo ya fue agregado");
        }
        //throw new Exception("To be implemented");
    }

    public function yaExiste(Regalo $regalo) {
        
        return in_array($regalo, $this->lista_regalos);
        //throw new Exception("To be implemented");
    }

    public function pesoActual() {
        return array_reduce( $this->lista_regalos, fn ($carry, $item) => $carry + $item->peso, 0 );
        //throw new Exception("To be implemented");
    }

    public function regaloMasPesado() {
        return $this->peso_mayor->name;
        //throw new Exception("To be implemented");
    } 

    private function comprobarPeso(Regalo $regalo){
        if ( $regalo->peso >= 5000 ){
            throw new Exception("La bolsa no puede contener mas de 5000 gramos");
        }
        $this->definirPesoMayor($regalo);
    }

    private function definirPesoMayor(Regalo $regalo){
        if ( count( $this->lista_regalos ) === 0 || $this->peso_mayor->peso <= $regalo->peso ){
            $this->peso_mayor = $regalo; 
        }
    }
}