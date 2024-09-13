<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   window.onload = function() {
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Correo electronico ya registrado!"
    }).then(() => {
        window.location.href = 'registro-admin.php';
    });
};
</script>
</html>