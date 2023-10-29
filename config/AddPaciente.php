<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Paciente</title>

    <!-- Agrega las bibliotecas de Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Agrega las bibliotecas de Bootstrap JS y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        <style>body {
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

        .contaniner h2 {
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
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Agregar Paciente</h1>
        <form method="post" action="addPacientes.php" id="formPaciente">
            <div class="form-group">
                <label for="patient_name">Nombre del Paciente:</label>
                <input type="text" id="patient_name" name="patient_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="address">Dirección:</label>
                <input type="text" id="address" name "address" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="cnic">CNIC:</label>
                <input type="number" id="cnic" name="cnic" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="date_of_birth">Fecha de Nacimiento:</label>
                <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="phone_number">Número de Teléfono:</label>
                <input type="text" id="phone_number" name="phone_number" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="gender">Género:</label>
                <select id="gender" name="gender" class="form-control">
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>

            <button type="button" onclick="registrarPaciente()" class="btn btn-primary">Registrar</button>
        </form>
    </div>
    <?php
    include 'conexion.php';
    $sql = "SELECT id, patient_name, address, cnic, date_of_birth, phone_number, gender FROM patients";

    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
    ?>
        <div class="contaniner-alumnos">
            <h2>Todos los pacientes</h2>
            <table>
                <tr>
                    <th>id</th>
                    <th>patient_name</a></th>
                    <th>address</th>
                    <th>cnic</th>
                    <th>date_of_birth</th>
                    <th>phone_number</th>
                    <th>gender</th>
                    <th>operaciones</th>

                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["patient_name"]; ?></td>
                        <td><?php echo $row["address"]; ?></td>
                        <td><?php echo $row["cnic"]; ?></td>
                        <td><?php echo $row["date_of_birth"]; ?></td>
                        <td><?php echo $row["phone_number"]; ?></td>
                        <td><?php echo $row["gender"]; ?></td>

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