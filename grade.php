
<h1 style="text-align: center; margin-top: 20px; background: ">Ônibus de Porto Alegre - Rotas</h1>
<hr>

<div class="container">
    <select class="form-control" onChange="select()" id="selectOpt">
        <?php
        if ($routes) {
            foreach ($routes as $route) {
                ?>
                    <option <?php if ($route->route_id == $selectedRouteId) echo "selected"?> 
                    value=<?php echo $route->route_id; ?>><?php echo $route->route_id." - ".$route->route_long_name; ?></option>
                    <?php
            }
        }
        ?>
            </select>
        <a href=<?php echo "?controller=RoutesController&method=excluir&id=".$selectedRouteId ?> class="btn btn-success">Vamos Começar!</a></div>

    <table class="table table-bordered table-striped" style="top:40px;">

        <thead>
            <tr>
                <th>Logradouro</th>
            </tr>
        </thead>
        <tbody class="routes-list">    
        <?php
        if($routeId){
            foreach($routeId as $r){
        ?>
        <tr>
            <td><?php echo $r->stop_name; ?></td>
        </tr>
       <?php } 
    
        }?>
        </tbody>
    </table>
    <script>
        function select() {
            var myselect = document.getElementById("selectOpt");
            var selectedId = myselect.options[myselect.selectedIndex].value
            window.location.href = "http://localhost/go_horse/index.php?controller=RoutesController&method=listarById&id=" + selectedId
        }    
        </script>
</div>
