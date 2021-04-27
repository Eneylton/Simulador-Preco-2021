<?php 

namespace App\Entidy;

use \App\Db\Database;

use \PDO;


class Fatura{

    public $id;

    public $valor;
    public $fatura;


    
    public function cadastar(){


        $obdataBase = new Database('faturamento');  
        
        $this->id = $obdataBase->insert([
          
           
            'valor'        => $this->valor, 
            'fatura'        => $this->fatura 

        ]);

        return true;

    }

public static function getListar($where = null, $order = null, $limit = null){

    return (new Database ('faturamento'))->select($where,$order,$limit)
                                   ->fetchAll(PDO::FETCH_CLASS, self::class);

}

public static function getQtd($where = null){

    return (new Database ('faturamento'))->select($where,null,null,'COUNT(*) as qtd')
                                   ->fetchObject()
                                   ->qtd;

}


public static function getID($id){
    return (new Database ('faturamento'))->select('id = ' .$id)
                                   ->fetchObject(self::class);
 
}

public function atualizar(){
    return (new Database ('faturamento'))->update('id = ' .$this-> id, [

                                            
            'valor'        => $this->valor, 
            'fatura'        => $this->fatura 

    ]);
  
}

public function excluir(){
    return (new Database ('faturamento'))->delete('id = ' .$this->id);
  
}


public static function getFatura($valor){

    return (new Database ('faturamento'))->select('valor = "'.$valor.'"')-> fetchObject(self::class);

}

}