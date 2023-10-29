<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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

        .contaniner {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 20px auto;
        }

        h1,
        h2 {
            text-align: center;
            color: white;
        }
        .contaniner h2{
            color: black;
        }

        .datos {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="file"] {
            width: 95%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            display: block;
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body class="body">

    <h1>Crear Usuario</h1>
    <div class="contaniner">
        <form id="formUsuario" enctype="multpart/form-data">
            <h2>Registrar Usuario</h2>

            <div class="datos">
                <label for="nombre">Display Name: </label>
                <input id="nombre" type="text" name="nombre" placeholder="Nombre">
            </div>
            <div class="datos">
                <label for="NCuenta">Nombre de la Cuenta: </label>
                <input id="NCuenta" type="text" name="nombre" placeholder="Nombre">
            </div>
            <div class="datos">
                <label for="fotografia">Fotografía</label>
                <input type="file" name="fotografia" id="fotografia">
            </div>
        </form>
        <button type="button" onclick="registrarUsuario()">Registrar</button>
    </div>
    <?php
    include('conexion.php');

    $sql = "SELECT id, display_name, user_name, profile_picture FROM users";

    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
    ?>
        <div class="contaniner-alumnos">
            <h2>Lista de Usuarios</h2>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Nombre de la Cuenta</th>
                    <th>Fotografía</a></th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["display_name"]; ?></td>
                        <td><?php echo $row["user_name"]; ?></td>
                        <td><img src="./imágenes/<?php echo $row["profile_picture"]; ?>" alt="" width="100px"></td>
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