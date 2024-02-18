<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Error 404 - Página no encontrada</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body {
                background-color: #f8f9fa;
            }
            .error-container {
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .error-heading {
                font-size: 8rem;
                font-weight: bold;
                color: #dc3545;
            }
            .error-message {
                font-size: 1.5rem;
                margin-top: 1rem;
            }
            .error-link {
                font-size: 1.25rem;
                margin-top: 1rem;
                color: #007bff;
            }
            .error-link:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="container error-container">
            <div class="row">
                <div class="col text-center">
                    <div class="error-heading">404</div>
                    <div class="error-message">¡Oops! La página que buscas no pudo ser encontrada.</div>
                    <a href="../index.php?controller=Usuarios&action=login" class="error-link">Volver a la página principal</a>
                </div>
            </div>
        </div>
    </body>
</html>


