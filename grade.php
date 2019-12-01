
<style> 
    body{
        background: goldenrod;
    }

    h1 {
        text-align: center;
        color: white;
        margin-top: 20px;
    }

    th {
        background: white;
    }

    .table{
        background: white;
    }

</style>

<h1> Ônibus de Porto Alegre - Rotas </h1>

<div class="container">
<div style="display: flex;">
    <select class="form-control" onChange="select()" id="selectOpt">
        <?php
        session_start();
        
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
        <a href=<?php echo "?controller=RoutesController&method=excluir&id=".$selectedRouteId ?> class="btn btn-danger">excluir</a>
</div>
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
        <?php echo $_SESSION['aula'];?>
    </div>
