<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación de Notas</title>
</head>
<style>
         body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #db9f9f;
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #c3408b;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 153, 174, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="number"],
        select,
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: none;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #af4c4c;
            color: rgb(255, 255, 255);
            padding: 10px 15px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            font-size: 18px;
            font-weight: bold;
            color: #d6d600;
            margin-top: 20px;
        }

        .error {
            color: red;
            margin-top: 5px;
        }

        /* Estilos adicionales para la aplicación de notas */
        .container {
            max-width: 40px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,120, 30, 0.1);
        }

        #note {
            width: 100%;
            height: 50px;
            margin-bottom: 10px;
        }

        button {
            display: block;
            margin: 0 auto;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        #notesContainer {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 8px;
            margin-top: 20px;
        }

        #notesTitle {
            text-align: center;
            margin-bottom: 10px;
            color: #007bff;
        }

        .note {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;}
    </style>
<body>
    <h1>Aplicación de Notas</h1>
    <form id="noteForm">
        <textarea name="note" id="note" placeholder="Escribe tu nota aquí"></textarea>
        <button type="submit">Guardar Nota</button>
    </form>
 <h2>notas guardadas</h2>
    <div id="notesContainer">
        <!-- Aquí se cargarán las notas -->
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            // Cargar notas al cargar la página
            loadNotes();

            // Enviar nota al formulario
            $("#noteForm").submit(function(e){
                e.preventDefault();
                var note = $("#note").val();
                $.ajax({
                    type: "POST",
                    url: "notas.php",
                    data: {note: note},
                    success: function(){
                        $("#note").val('');
                        loadNotes(); // Recargar las notas después de guardar una nueva
                    }
                });
            });

            // Función para cargar las notas
            function loadNotes(){
                $.ajax({
                    url: "notas.php",
                    success: function(data){
                        $("#notesContainer").html(data);
                    }
                });
            }
        });
    </script>
</body>
</html>
