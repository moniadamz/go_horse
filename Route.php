<?php
/**
 * Classe Route - baseado no modelo Active Record (Simplificado) 
 * @author Mônica Adamski - nariz de batata
 */
class Route
{
    private $atributos;
 
    public function __construct()
    {
 
    }
 
    public function __set(string $atributo, $valor)
    {
        $this->atributos[$atributo] = $valor;
        return $this;
    }
 
    public function __get(string $atributo)
    {
        return $this->atributos[$atributo];
    }
 
    public function __isset($atributo)
    {
        return isset($this->atributos[$atributo]);
    }
 
    // /**
    //  * Salvar o contato
    //  * @return boolean
    //  */
    // public function save()
    // {
    //     $colunas = $this->preparar($this->atributos);
    //     if (!isset($this->id)) {
    //         $query = "INSERT INTO contatos (".
    //             implode(', ', array_keys($colunas)).
    //             ") VALUES (".
    //             implode(', ', array_values($colunas)).");";
    //     } else {
    //         foreach ($colunas as $key => $value) {
    //             if ($key !== 'id') {
    //                 $definir[] = "{$key}={$value}";
    //             }
    //         }
    //         $query = "UPDATE contatos SET ".implode(', ', $definir)." WHERE id='{$this->id}';";
    //     }
    //     if ($conexao = Conexao::getInstance()) {
    //         $stmt = $conexao->prepare($query);
    //         if ($stmt->execute()) {
    //             return $stmt->rowCount();
    //         }
    //     }
    //     return false;
    // }
 
    /**
     * Tornar valores aceitos para sintaxe SQL
     * @param type $dados
     * @return string
     */
    private function escapar($dados)
    {
        if (is_string($dados) & !empty($dados)) {
            return "'".addslashes($dados)."'";
        } elseif (is_bool($dados)) {
            return $dados ? 'TRUE' : 'FALSE';
        } elseif ($dados !== '') {
            return $dados;
        } else {
            return 'NULL';
        }
    }
 
    /**
     * Verifica se dados são próprios para ser salvos
     * @param array $dados
     * @return array
     */
    private function preparar($dados)
    {
        $resultado = array();
        foreach ($dados as $k => $v) {
            if (is_scalar($v)) {
                $resultado[$k] = $this->escapar($v);
            }
        }
        return $resultado;
    }
 
    /**
     * Retorna uma lista de contatos
     * @return array/boolean
     */
    public static function all()
    {
        $conexao = Conexao::getInstance();
        $stmt    = $conexao->prepare("SELECT * FROM routes;");
        $result  = array();
        if ($stmt->execute()) {
            while ($rs = $stmt->fetchObject(Route::class)) {
                $result[] = $rs;
            }
        }
        if (count($result) > 0) {
            return $result;
        }
        return false;
    }
 
    /**
     * Retornar o número de registros
     * @return int/boolean
     */
    public static function count()
    {
        $conexao = Conexao::getInstance();
        $count   = $conexao->exec("SELECT count(*) FROM routes;");
        if ($count) {
            return (int) $count;
        }
        return false;
    }
 
    /**
     * Encontra um recurso pelo id
     * @param type $id
     * @return type
     */
    public static function find($id)
    {
        $conexao = Conexao::getInstance();
        $stmt    = $conexao->prepare("SELECT distinct trips.service_id, trips.route_id, stop_times.departure_time, stops.stop_name from stop_times join trips on trips.trip_id = stop_times.trip_id join stops on stops.stop_id = stop_times.stop_id 
        where trips.route_id = '{$id}'
        group by stops.stop_name
        order by trips.service_id, stop_times.departure_time;");

        $result  = array();
        if ($stmt->execute()) {
            while ($rs = $stmt->fetchObject(Route::class)) {
                $result[] = $rs;
            }
        }
        if (count($result) > 0) {
            return $result;
        }
        return false;
    }
 
    public static function destroy($id)
    {
        $conexao = Conexao::getInstance();
        if ($conexao->exec("DELETE FROM routes WHERE route_id='{$id}';")) {
            return true;
        }
        return false;
    }
}
?>