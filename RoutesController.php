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
 
    
    public function salvar()
    {
        $route           = new Route;
        $route->route_id     = $this->request->route_id;
        $route->route_long_name = $this->request->route_long_name;
        if ($route->save()) {
            return $this->listar();
        }
    }

}
?>