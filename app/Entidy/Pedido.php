<?php 

namespace App\Entidy;

use \App\Db\Database;

use \PDO;


class Pedido{

    public $id;

    public $nome;

    public $qtd;

    public $valor;


    
    public function cadastar(){


        $obdataBase = new Database('pedidos');  
        
        $this->id = $obdataBase->insert([
          
            'nome'         => $this->nome, 
            'qtd'          => $this->qtd, 
            'valor'        => $this->valor 

        ]);

        return true;

    }

public static function getListar($where = null, $order = null, $limit = null){

    return (new Database ('pedidos'))->select($where,$order,$limit)
                                   ->fetchAll(PDO::FETCH_CLASS, self::class);

}

public static function getQtd($where = null){

    return (new Database ('pedidos'))->select($where,null,null,'COUNT(*) as qtd')
                                   ->fetchObject()
                                   ->qtd;

}


public static function getID($id){
    return (new Database ('pedidos'))->select('id = ' .$id)
                                   ->fetchObject(self::class);
 
}

public function atualizar(){
    return (new Database ('pedidos'))->update('id = ' .$this-> id, [

                                               
                                            'nome'         => $this->nome,
                                            'qtd'          => $this->qtd,  
                                            'valor'        => $this->valor 

    ]);
  
}

public function excluir(){
    return (new Database ('pedidos'))->delete('id = ' .$this->id);
  
}


public static function getUsuarioPorEmail($email){

    return (new Database ('pedidos'))->select('email = "'.$email.'"')-> fetchObject(self::class);

}

}