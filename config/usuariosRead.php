<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información</title>
    <script src="./ajax/ajax.js" defer></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F2F2F2;
            color: #333;
        }

        a {
            text-decoration: none;
            margin-top: 5px;
            color: white;
        }

        table {
            width: 95%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #E0E0E0;
            margin-left: 70px;
        }

        th,
        td {
            border: 1px solid #B0B0B0;
            padding: 8px 15px;
            text-align: center;
        }

        th {
            background-color: #B0B0B0;
            color: #333;
        }

        tr:hover {
            background-color: #D0D0D0;
        }

        .contaniner {
            background-color: #E0E0E0;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h2 {
            font-size: 35px;
            text-align: center;
            color: #232423;
            margin-top: 10px;
        }
        h3{
            text-align: center;
            color: #555;
            margin-top: 10px;
        }

        .datos {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="file"] {
            width: 95%;
            padding: 8px;
            border: 1px solid #B0B0B0;
            border-radius: 4px;
            transition: border 0.3s;
        }

        input[type="text"]:focus,
        input[type="file"]:focus {
            border-color: #555;
        }

        button {
            display: block;
            background-color: #929D97;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            color: white;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #CCDFD4;
        }

        .btnE,
        .btnD {
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin: 5px;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btnE:hover,
        .btnD:hover {
            transform: scale(1.05);
        }

        .btnE {
            background-color: #4CAF50;
            color: white;
        }

        .btnD {
            background-color: #f44336;
            color: white;
        }
        .img-container img {
            max-width: 150px;
            max-height: 100px;
            transition: transform 0.3s;
        }

        .img-container:hover img {
            transform: scale(1.1);
        }
    </style>
</head>

<body class="body">

    <h2>Crear Usuario</h2>
    <div class="contaniner">
        <form id="formUsuario" enctype="multipart/form-data">
            <h3>Registrar Usuario</h3>

            <div class="datos">
                <label for="nombre">Display Name: </label>
                <input id="nombre" type="text" name="displayName" placeholder="Nombre">
            </div>
            <div class="datos">
                <label for="nCuenta">Nombre de la Cuenta: </label>
                <input id="ncuenta" type="text" name="name" placeholder="Nombre">
            </div>
            <div class="datos">
                <label for="pw">Contraseña: </label>
                <input id="pw" type="text" name="contraseña" placeholder="Contraseña">
            </div>
            <div class="datos">
                <label for="fotografia">Fotografía</label>
                <input type="file" name="fotografia" id="fotografia">
            </div>
        </form>
        <button type="submit"><a href="javascript:registrarUsuario()">Registrar</a></button>
    </div>
    <?php
    include('conexion.php');

    $sql = "SELECT id, display_name, user_name, password,profile_picture FROM users";

    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
    ?>
        <div class="contaniner-alumnos">
            <h2>Lista de Usuarios</h2>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>User Name</th>
                    <th>Contraseña</th>
                    <th>Fotografía</th>
                    <th>Operaciones</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["display_name"]; ?></td>
                        <td><?php echo $row["user_name"]; ?></td>
                        <td><?php echo $row["password"]; ?></td>
                        <td class="img-container">
                            <img src="./imágenes/<?php echo $row["profile_picture"]; ?>" alt="">
                        </td>
                        <td class="operaciones">
                            <a class="btnE" href="javascript:editarAlumno(<?php echo $row['id']; ?>)">Editar</a>
                            <a class="btnD" href="javascript:deleteAlumno(<?php echo $row['id']; ?>)">Eliminar</a>
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