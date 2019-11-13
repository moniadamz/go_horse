<?php
class RoutesController extends Controller
{
 
    /**
     * Lista as routes
     */
    public function listar()
    {
        $routes = Route::all();
        $routeId = null;
        return $this->view('grade', ['routes' => $routes,  'routeId' => $routeId]);
    }

    public function listarById($dados)
    {
        $id      = (int) $dados['id'];
        $routeId = Route::find($id);
 
        return $this->view('grade', ['routeId' => $routeId, 'routes' => Route::all()]);
    }
 
    // /**
    //  * Mostrar formulario para criar um novo contato
    //  */
    // public function criar()
    // {
    //     return $this->view('form');
    // }
 
    // /**
    //  * Mostrar formulário para editar um contato
    //  */
    // public function editar($dados)
    // {
    //     $id      = (int) $dados['id'];
    //     $contato = Contato::find($id);
 
    //     return $this->view('form', ['contato' => $contato]);
    // }
 
    // /**
    //  * Salvar o contato submetido pelo formulário
    //  */
    // public function salvar()
    // {
    //     $contato           = new Contato;
    //     $contato->nome     = $this->request->nome;
    //     $contato->telefone = $this->request->telefone;
    //     $contato->email    = $this->request->email;
    //     if ($contato->save()) {
    //         return $this->listar();
    //     }
    // }
 
    // /**
    //  * Atualizar o contato conforme dados submetidos
    //  */
    // public function atualizar($dados)
    // {
    //     $id                = (int) $dados['id'];
    //     $contato           = Contato::find($id);
    //     $contato->nome     = $this->request->nome;
    //     $contato->telefone = $this->request->telefone;
    //     $contato->email    = $this->request->email;
    //     $contato->save();
 
    //     return $this->listar();
    // }
 
    /**
     * Apagar um contato conforme o id informado
     */
    // public function excluir($dados)
    // {
    //     $id      = (int) $dados['id'];
    //     $contato = Contato::destroy($id);
    //     return $this->listar();
    // }
}
?>