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
        $selectedRouteId = null;
        return $this->view('grade', ['selectedRouteId' => $selectedRouteId, 'routes' => $routes,  'routeId' => $routeId]);
    }

    public function listarById($dados)
    {
        $id      = (string) $dados['id'];
        $routeId = Route::find($id);
 
        return $this->view('grade', ['selectedRouteId' => $id, 'routeId' => $routeId, 'routes' => Route::all()]);
    }

    public function excluir($dados)
    {
        $id      = (string) $dados['id'];
        $route = Route::destroy($id);
        header( "Location: http://localhost/go_horse/index.php?controller=RoutesController&method=listar" );
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
 


}
?>