<?php
    session_start();
    $sesion = $_SESSION['usuario'];
    
    if ($sesion == null || $sesion == '') {
        header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../blocks/metadata.php'; ?>
    <title>Inicio</title>
</head>

<body>
    <header class="banner" id="bannerHome">
        <div id="banner_content">
            <div class="logo">
                <a href="#">
                    <img src="../assets/logo.png" alt="logo.png">
                </a>
            </div>

            <nav>
                <div class="link" id="index">

                    <a href="home.php">
                        <i class="fa-solid fa-home"></i>
                        Inicio
                    </a>
                    <span></span>
                </div>

                <div class="link">

                    <a href="asistencia.php">
                        <i class="fa-solid fa-stopwatch"></i>
                        Asistencia
                    </a>
                    <span></span>
                </div>

                <div class="link">

                    <a href="secciones.php">
                        <i class="fa-solid fa-chalkboard"></i>
                        Secciones
                    </a>
                    <span></span>
                </div>

                <div class="link">

                    <a href="usuarios.php">
                        <i class="fa-solid fa-users"></i>
                        Usuarios
                    </a>
                    <span></span>
                </div>

                <div class="link">

                    <a href="info.php">
                        <i class="fa-solid fa-info-circle"></i>
                        Info
                    </a>
                    <span></span>
                </div>
            </nav>

            <div class="user">
                <div href="#" class="profile">
                    <div class="profile_img">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>

                <div class="username">
                    <p>Administrador</p>

                    <ul>
                        <li>
                            <a href="../php/sesion.php">
                                Cerrar sesión
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="desc">
            <h1>
                Bienvenido/a al primer sistema creado por jóvenes estudiantes de Desarrollo de Software.
            </h1>
            <br>

            <p>
                Creado con el propósito de ayudar y mejorar el sistema obsoleto en el control de la asistencia
                estudiantil.
            </p>

            <div id="btnScroll">
                <i class="fa-solid fa-chevron-down"></i>
            </div>
        </div>
    </header>
    <span class="content_bg"></span>

    <section id="home">
        <div class="facts">
            <article class="fact1">
                <div class="icon" data-aos="fade-up" data-aos-duration="500">
                    <i class="fa-solid fa-lightbulb"></i>
                </div>

                <span class="divider"></span>

                <div class="desc" data-aos="fade-right" data-aos-duration="800">
                    <h1>Innovadora</h1>
                    <p>
                        O'clock ha sido creada con la finalidad de apoyar al personal administrativo y docente en el
                        control
                        de la asistencia de los estudiantes dentro de un centro escolar, integrando el sistema de
                        escanear
                        códigos QR por medio de carnets con los datos del estudiante.
                    </p>
                </div>
            </article>
            <hr>

            <article class="help">
                <div class="desc" data-aos="flip-up" >
                    <h1>¿Primera vez?</h1>
                    <p>
                        No se preocupe, puede consultar nuestro <a href="#">manual de usuario</a> para aprender y
                        entender
                        cómo funciona nuestro sistema, solo tomará un poco de tiempo y podrá empezar a trabajr sin
                        ningún
                        problema.
                    </p>
                </div>
            </article>
            <hr>

            <article class="fact2">
                <div class="icon" data-aos="fade-left" >
                    <i class="fa-solid fa-chart-line"></i>
                </div>

                <span class="divider"></span>

                <div class="desc" data-aos="fade-right" data-aos-duration="800">
                    <h1>Eficiente</h1>
                    <p>
                        Gracias a su sistema integrado de creación de códigos QR automáticos por cada nuevo estudiante
                        que se
                        agrega al sistema, fácilita el proceso del control de la creación de perfiles estudiantiles sin
                        tener
                        que preocuparse por procedimientos complejos o extensos.
                    </p>
                </div>
            </article>
            <hr>

            <article class="fact3">
                <div class="icon" data-aos="flip-up" >
                    <i class="fa-solid fa-smile-beam"></i>
                </div>

                <span class="divider"></span>

                <div class="desc" data-aos="fade-right" data-aos-duration="800">
                    <h1>Amigable</h1>
                    <p>
                        Debido a que cuenta con una interfaz sencilla y fácil de usar hace que poder dominar el sistema
                        no
                        requiera un mayor esfuerzo por parte del usuario, logrando que con un poco de tiempo y estudio,
                        cualquier persona sea capaz de utilizarlo de manera óptima.
                    </p>
                </div>
            </article>
            <hr>

            <article class="help-questions">
                <div class="desc">
                    <h1>¿Tiene alguna idea de cómo podemos mejorar?</h1>

                    <p>
                        Haganos saber sus ideas en el siguiente formulario.
                    </p>
                </div>

                <span class="divider" data-aos="fade-up" ></span>

                <div class="formOpinionContainer" data-aos="fade-right" data-aos-delay="300" data-aos-duration="800">
                    <form action="" method="post" autocomplete="off">
                        <div class="inputBox">
                            <input type="email" name="email" id="email" required>
                            <label for="email">E-mail</label>
                        </div>
                        <br>

                        <div class="inputBox">
                            <input type="text" name="name" id="name" required>
                            <label for="name">Nombre</label>
                        </div>
                        <br>

                        <textarea name="opinion" id="opinion" cols="40" rows="6" placeholder="Recomendación" required></textarea>
                        <br>

                        <div class="btns">
                            <button type="submit" title="Enviar recomendación">
                                <i class="fa-solid fa-paper-plane"></i>
                            </button>

                            <button type="reset">Borrar</button>
                        </div>
                    </form>
                </div>
            </article>
        </div>
    </section>

    <footer>
        <p>
            IMTECH &copy; 2022
            &boxv;
            Todos los derechos reservados

        </p>

        <div class="legal">
            <a href="#">Términos y condiciones</a>
            &ThinSpace;
            &bull;
            &ThinSpace;
            <a href="#">Política de privacidad</a>
        </div>

        <a href="https://www.facebook.com/INCAS-Desarrollo-de-Software-102217235916587/" class="fb">
            <i class="fab fa-facebook-square"></i>
        </a>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="../js/scrollAnimations.js"></script>
</body>


</html>