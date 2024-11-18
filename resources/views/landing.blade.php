<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Page with Header Image</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Header section with background image */
        .header-section {
            background-image: url('{{ asset('images/header.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 90vh;
            position: relative;
            color: white;
        }

        .login-button {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 10;
        }

        .logo-text-section {
            width: 300px;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            position: absolute;
            left: 20%;
            top: 50%;
            transform: translateY(-50%);
        }

        .logo-text-section img {
            max-width: 100px;
            margin-bottom: 15px;
        }

        .logo-text-section h1 {
            font-size: 1.8rem;
            text-align: center;
            margin-bottom: 15px;
            color: white;
            text-align: left;
            font-weight: bold;
        }

        .logo-text-section p {
            font-size: 1rem;
            margin-bottom: 15px;
            color: #555;
        }

        .aqua-button {
            background-color: #00d1b2;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 100px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            text-align: center;
        }

        .aqua-button:hover {
            background-color: #00bfa5;
        }

        .first-text{
            font-weight: bold;
        }

        .rounded-box {
            background-color: lightgrey;
            color: white;
            padding: 30px;
            border-radius: 15px;
            min-height: 200px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .flex-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-bottom: 32px;
        }

        @media (max-width: 768px) {
            .flex-container {
                flex-direction: column; /* Stack the boxes on smaller screens */
                align-items: center;    /* Center the items horizontally when stacked */
            }
        }

        .title-red{
            color: red;
            padding: 8px;
            text-align: left;
        }

        ul {
            list-style-type: none; 
            padding-left: 0;       
            margin: 0;            
        }

        li {
            display: flex;         
            align-items: center;  
            font-size: 18px;       
            margin-bottom: 8px;
            color: black;
            font-size: 12px;
            margin-left: 8px;
            text-align:left;
        }

        li::before {
            content: ">";        
            color: red;          
            font-size: 20px;      
            margin-right: 10px;  
           
        }
        
        .background-container {
            background-image: url('{{ asset('images/image.jpg') }}');/* Your background image URL */
            position: relative; /* Positioning context for the background */
            width: 100%; /* Full width */
            padding-bottom: 56.25%;
            background-size: cover; /* Cover the div completely */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Prevent tiling */
        }
        
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="header-section">
        <!-- Login Button -->
        <div class="login-button">
            <a href="/login" class="btn btn-outline-light">Login</a>
        </div>

        <div class="logo-text-section">
            <img src="{{ asset('images/white_logo_transparent_background.png') }}" alt="Logo" class="img-fluid"> <!-- Replace with your logo -->
            <h1>Impulsa tu Estrategia de Inversion con Matias Mauccione</h1>
            <a href="#" class="aqua-button">Unete al Grupo Exclusivo en Telegram</a>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-12 m-5">
                <div class="line text-center">
                    <h2 class="first-text">Quieres estar al tanto de las mejores oportunidades en el marcado financier? Maris Mauccione, un innovado trader
                        con un enfoque fresco y efectivo, te invita a formar parte de su grypo exclusivo en Telegram.
                    </h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-12 m-2">
                <div class="text-center">
                    <h2 class="first-text">No pierdas la oportunidad de obtener informacion valiosa y actualizaciones en tiempo real!</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-12 m-5">
                <div class="text-center">
                    <a href="#" class="aqua-button">Unete al Grupo Exclusivo en Telegram</a>
                </div>
            </div>
        </div>


        <div class="flex-container">
            <div class="rounded-box">
                <h3 class="title-red">Por que unirte?</h3>
                <ul>
                    <li>Acceso Exclusivo a Analisis de Expertos: Obten informes y perspectivas que no encontraras en ninhun otro lugar.</li>
                    <li>Opoortunidades de Inversion: Descubre las mejores oportunidades en el mercado antes que nadie.</li>
                    <li>Actualizaciones en Tiempo Real: Mantante al dia con el desarrollo de operaciones y oportunidades.</li>
                    <li>Contenidos Premium Gratis: Disfuta de materiales educativos y analisis que te ayudaran a mejorar tus estrategias des inversion.</li>
                </ul>
            </div>
            <div class="rounded-box">
                <h3 class="title-red">Por que unirte?</h3>
                <ul>
                    <li>Analisis Diario de Divisas: Perspectivas detallades para tomar desciniones informades</li>
                    <li>Desarrollo de Operaciones en Vivo: Estrategias y tacticas mientras el mercado se mueve.</li>
                    <li>Calendario Economico Actua;izado: Informacion clave sobre eventos economicos que pueden impactar tus inversiones</li>
                    <li>Resultados de la Bolsa de Nueva York: Resumenes y analisis de las principales sessiones bursatilles</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="background-container">
    </div>

    <!-- Bootstrap 5 JS (Optional for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
