<?php 

namespace App\Entidy;

use \App\Db\Database;

use \PDO;


class Taxa{

    public $id;

    public $nome;

    public $valor;


    
    public function cadastar(){


        $obdataBase = new Database('taxas');  
        
        $this->id = $obdataBase->insert([
          
            'nome'         => $this->nome, 
            'valor'        => $this->valor 

        ]);

        return true;

    }

public static function getListar($where = null, $order = null, $limit = null){

    return (new Database ('taxas'))->select($where,$order,$limit)
                                   ->fetchAll(PDO::FETCH_CLASS, self::class);

}

public static function getQtd($where = null){

    return (new Database ('taxas'))->select($where,null,null,'COUNT(*) as qtd')
                                   ->fetchObject()
                                   ->qtd;

}


public static function getID($id){
    return (new Database ('taxas'))->select('id = ' .$id)
                                   ->fetchObject(self::class);
 
}

public function atualizar(){
    return (new Database ('taxas'))->update('id = ' .$this-> id, [

                                               
                                            'nome'         => $this->nome, 
                                            'valor'     => $this->valor 

    ]);
  
}

public function excluir(){
    return (new Database ('taxas'))->delete('id = ' .$this->id);
  
}


public static function getUsuarioPorEmail($email){

    return (new Database ('taxas'))->select('email = "'.$email.'"')-> fetchObject(self::class);

}

}