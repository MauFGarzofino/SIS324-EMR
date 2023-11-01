<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        h1,h2 {
            text-align: center;
            margin-top: 20px;
            font-size: 2.5em;
            margin-bottom: 20px;
            color: white;
            padding: 10px 0;
            border-bottom: 3px solid #ddd;
        }

        a {
            text-decoration: none;
            margin-top: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #f2f2f2;
        }

        th,
        td {
            border: 1px solid #dddddd;
            padding: 8px 15px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body class="body">

    <h1>Historial de Paciente</h1>

    <?php
    include('conexion.php');

    $sql = "SELECT id, visit_date, bp, disease, patient_id FROM patient_visits";

    // echo $sql;
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
    ?>
        <div class="contaniner-alumnos">
            <h2>Lista</h2>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Fecha de consulta</th>
                    <th>Presión Arterial</a></th>
                    <th>Enfermedad</th>
                    <th>Id Paciente</th>

                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["visit_date"]; ?></td>
                        <td><?php echo $row["bp"]; ?></td>
                        <td><?php echo $row["disease"]; ?></td>
                        <td><?php echo $row["patient_id"]; ?></td>
                        <td class="operaciones">
                            <a class="btn btn-danger" href="javascript:editarAlumno(<?php echo $row['id']; ?>)">Editar</a>
                            <!--<a href="form_update_alumnos.php?id=<?php echo $row['id']; ?>"><button class="button1">Editar</button></a>-->
                            <a class="btn btn-primary" href="javascript:deleteAlumno(<?php echo $row['id']; ?>)">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>

        <?php
    } else {
        ?>
            <p>No existe registros que mostrar</p>
        <?php } ?>
        </div>
</body>

</html>