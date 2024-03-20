<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación de Notas</title>
</head>
<style>body {
 body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

.container {
    max-width: 40px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
}

#note {
    width: 50%;
    height: 50px;
    margin-bottom: 10px;
}

button {
    display: block;
    margin: 0 auto;
}

}
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
