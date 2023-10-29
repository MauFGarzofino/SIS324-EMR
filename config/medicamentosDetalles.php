<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        h1 {
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

        .contaniner-alumnos {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
        }

        .operaciones {
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            text-align: center;
            text-decoration: none;
            background-color: #007BFF;
            color: white;
            border: none;
        }

        .btn.btn-danger {
            background-color: #DC3545;
        }
    </style>
</head>

<body class="body">

    <h1>Medicine Details</h1>

    <?php
    include('conexion.php');

    $sql = "SELECT id, medicine_id, packing FROM medicine_details";
    $sql = "SELECT md.id, md.medicine_id, md.packing, m.medicine_name 
        FROM medicine_details AS md
        INNER JOIN medicines AS m ON md.medicine_id = m.id";



    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
    ?>
        <div class="contaniner-alumnos">
            <h2>Lista</h2>
            <table>
                <tr>
                    <th>id</th>
                    <th>medicine_id</th>
                    <th>medicine_name</th>
                    <th>packing</th>
                    <th>operaciones</th>

                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["medicine_id"]; ?></td>
                        <td><?php echo $row["medicine_name"]; ?></td>
                        <td><?php echo $row["packing"]; ?></td>
                        <td class="operaciones">
                            <a class="btn btn-danger" href="javascript:editarAlumno(<?php echo $row['id']; ?>)">Editar</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php
    } else {
    ?>
        <p>No existen registros que mostrar.</p>
    <?php } ?>
</body>

</html>