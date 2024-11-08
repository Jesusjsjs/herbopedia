<script src="../js/Chart.min.js"></script>
<script src="../js/math.js"></script>
<script src="../js/plotly-1.35.2.min.js"></script>

<main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Panel de Control</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Panel de Control</li>
                    </ol>

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-pie me-1"></i>
                                    Cantidad de registros
                                </div>
                                <div class="card-body"><canvas id="registros" width="100%" height="40"></canvas></div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Ganancias Enero - Febrero
                                </div>
                                <div class="card-body"><canvas id="ganancias" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                <i class="fa-solid fa-chart-line"></i>
                                    Modelo de Ventas        
                                    <a class="" style="color: white; cursor: pointer" data-bs-toggle="modal" data-bs-target="#detalles">(Ver Detalles)</a>
                                </div>
                                <div class="card-body">
                                    <form id="form">
                                    </form>
                                    <div id="plot"  style="width: 100%; height: 400px"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Registro de Usuarios
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre(s)</th>
                                        <th>Apellido(s)</th>
                                        <th>Fecha de nacimiento</th>
                                        <th>Correo</th>
                                        <th>Tipo de usuario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($query as $data) : ?>
                                        <tr>
                                            <td><?php echo $data['ID']; ?></td>
                                            <td><?php echo $data['Nombres']; ?></td>
                                            <td><?php echo $data['Apellido']; ?></td>
                                            <td><?php echo $data['FechaNac']; ?></td>
                                            <td><?php echo $data['Correo']; ?></td>
                                            <td><?php echo $data['Tipo']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            
            <?php include_once('modal/detalles_modal.php')?>

            <script>
                let registros=document.getElementById("registros").getContext("2d");
                <?php
                    $c=1;
                    foreach ($registros as $r):
                        echo 'var v'.$c .' = ' .$r['r'].';';
                        $c = $c + 1;
                    endforeach;
                ?>
                var chart = new Chart(registros,{
                    type: "pie",
                    data:{
                        labels:["Plantas", "Recetas", "Descubridores"],
                        datasets:[
                            {
                                backgroundColor: ["rgba(114, 171, 218, 1)", "rgba(2,117,216,255)", "rgba(70, 134, 195, 1)"],
                                borderColor: "rgb(255,255,255)",
                                data:[v2,v3,v1]
                            }
                        ]
                    }
                })
            </script>
            
<script src="../js/graph.js"></script>



<script>
    function draw() {
    try {
        var p = document.getElementById('premium').value;
        var u = document.getElementById('usuarios').value;
        var c = document.getElementById('coste').value;
        var cu = document.getElementById('cada').value;
        var a = document.getElementById('aumenta').value;
        var x = document.getElementById('x').value;
        var b = document.getElementById('base').value
        
        var v = 0;
        if ((u-b) > 0) {
            v = (u-b)/cu;
            if (Math.trunc(v)!=v) {
                v = Math.trunc(v)+1;
            }
        }    

        document.getElementById('v').value = v;

        var ecua = "("+p+"*"+x+")-("+v+"*"+a+"+"+c+")";

        document.getElementById("eq").value = ecua;
        document.getElementById("eq").value = "("+p+"*"+x+") - (("+u+"-"+b+")/"+cu+" * "+a+" + "+c+")";
        
        const expression = ecua
        const expr = math.compile(expression)

        const xValues = math.range(-10, 850, 1).toArray()
        const yValues = xValues.map(function (x) {
        return expr.evaluate({x: x})
        })

        const trace1 = {
        x: xValues,
        y: yValues,
        type: 'scatter'
        }
        const data = [trace1]
        Plotly.newPlot('plot', data)
    }
    catch (err) {
        console.error(err)
        alert(err)
    }
    }

document.getElementById('dt').onsubmit = function (event) {
    event.preventDefault()
    draw()
}

draw()
</script>





