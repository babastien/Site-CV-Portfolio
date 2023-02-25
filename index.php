<?php

session_start();

$flash_message = null;

if(array_key_exists('flash', $_SESSION) && $_SESSION['flash']) {
    $flash_message = $_SESSION['flash'];
    $_SESSION['flash'] = null;
}

if(isset($_POST["mailForm"])) {

    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = $name.' ('.$email.') a envoyé un message via Contact : '.htmlspecialchars($_POST["message"]);

    // $header = "MIME-Version: 1.0 From:'.$name.'<'.$email.'> Content-Type:text/html; charset='utf_8' Content-Transfer-Encoding: 8bit";
    $header = 'MIME-Version: 1.0\r\n';
    $header.= 'From: '.$name.' <'.$email.'>'.'\n';
    $header.= 'Content-Type: text/html; charset="utf_8"'.'\n';
    $header.= 'Content-Transfer-Encoding: 8bit';

    mail('ballestero.bastien@gmail.com', "Message de $name via Contact", $message, $header);   
    $_SESSION['flash'] = "Message envoyé";
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PortFolio</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/7e78b09256.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="loading-screen">
        <div class="loader"></div>
        <p>BB</p>
        <?php if(isset($flash_message)): ?>
            <p class="message-sent" style="width: 150px; top: 100px;"><?= $flash_message ?></p>
        <?php endif; ?>
    </div>

    <nav>
        <a class="bb">Ballestero Bastien</a>
        <i class="fa-solid fa-bars burger"></i>
        <i class="fa-solid fa-xmark cross none-important"></i>

        <section id="menu">
            <div>
                <a class="link" href="#home">BALLESTERO BASTIEN</a>
                <a class="link" href="#about-me">ABOUT ME</a>
                <a class="link" href="#portfolio">PORTFOLIO</a>
                <a class="link" href="#contact">CONTACT</a>
            </div>
        </section>    
    </nav>

    <section id="home" class="sections">
        <div>
            <h1>BASTIEN BALLESTERO</h1>
            <h2>Développeur Web et Web Mobile</h2>
        </div>
    </section>

    <section id="about-me">
        <div class="about-left">
            <div class="picture"></div>
        </div>
        <div class="about-right">
            <div class="about-me">
                <div class="presentation">
                    <h2>ABOUT ME</h2>
                    <p>Je m'appelle Bastien, j'ai 29 ans. Je suis un jeune Web Développeur passionné. Très impatient d'apprendre de nouvelles compétences, j'aime la création de site, réfléchir à de nouvelles fonctionnalités et résoudre des problèmes.</p>
                    </br>
                    <p>Actuellement en formation avec l'école Simplon, je recherche un stage en entreprise non rémunéré de 5 semaines pour début mars.</p>
                </div>
                <div class="my-skills">
                    <p style="text-decoration:underline">Langages</p>
                    </br>
                    <div class="langages">
                        <div class="group">
                            <div class="circle"><img src="./icons/html.png" alt=""></div>
                            <p>HTML</p>
                        </div>
                        <div class="group">
                            <div class="circle"><img src="./icons/css.png" alt=""></div>
                            <p>CSS</p>
                        </div>
                        <div class="group">
                            <div class="circle"><img src="./icons/js.png" alt=""></div>
                            <p>JavaScript</p>
                        </div>
                        <div class="group">
                            <div class="circle"><img src="./icons/php.png" alt=""></div>
                            <p>PHP</p>
                        </div>
                        <div class="group">
                            <div class="circle"><img src="./icons/mysql.png" alt=""></div>
                            <p>MySQL</p>
                        </div>
                    </div>
                    </br>
                    <p style="text-decoration:underline">Outils</p>
                    </br>
                    <div class="tools">
                        <div class="group">
                            <div class="circle"><img src="./icons/git.png" alt=""></div>
                            <p>Git</p>
                        </div>
                        <div class="group">
                            <div class="circle"><img src="./icons/figma.png" alt=""></div>
                            <p>Figma</p>
                        </div>
                        <div class="group">
                            <div class="circle"><img src="./icons/jquery.png" alt=""></div>
                            <p>jQuery</p>
                        </div>
                        <div class="group">
                            <div class="circle"><img src="./icons/bootstrap.png" alt=""></div>
                            <p>Bootstrap</p>
                        </div>
                        <!-- <div class="group">
                            <div class="circle"><img src="./icons/wordpress.png" alt=""></div>
                            <p>WordPress</p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="portfolio">
        <div class="portfolio">
            <h2>PORTFOLIO</h2>
            <div class="carousel">
                <div><a href="https://github.com/babastien/Exercice-FlexBeach" target="_blank"><img src="./Carousel/flex-beach.png" alt=""></a></div>
                <div><a href="https://github.com/babastien/Industrious" target="_blank"><img src="./Carousel/industrious.png" alt=""></a></div>
                <div><a href="https://github.com/babastien/Oblivion-NewBeginning" target="_blank"><img src="./Carousel/oblivion.png" alt=""></a></div>
                <div><a href="https://github.com/babastien/BusinessCo" target="_blank"><img src="./Carousel/business-co.png" alt=""></a></div>
                <div><a href="https://github.com/babastien/Exercice-FormulaireJS" target="_blank"><img src="./Carousel/forumulaire-js.png" alt=""></a></div>
                <div><a href="https://babastien.github.io/Site-CV-Portfolio/" target="_blank"><img src="./Carousel/site-cv-portfolio.png" alt=""></a></div>
            </div>
        </div>
    </section>

    <section id="contact">
            <div class="contact-left">
                <div class="contact">
                    <h2>CONTACT</h2>
                    <div class="links">
                        <a href="mailto:ballestero.bastien@gmail.com"><i class="fa-solid fa-square-envelope"></i>ballestero.bastien@gmail.com</a>
                        <a href="https://www.linkedin.com/in/bastien-ballestero-809a7b250/" target="_blank"><i class="fa-brands fa-linkedin linkedin"></i>www.linkedin.com/in/bastienballestero</a>
                        <a href="https://github.com/babastien"><i class="fa-brands fa-square-github github" target="_blank"></i>https://github.com/babastien</a>
                    </div>
                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d185112.17053697945!2d5.247849702943494!3d43.53616884286224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c98da304b91259%3A0x5cb953bec8b688a3!2sAix-en-Provence!5e0!3m2!1sfr!2sfr!4v1673876010042!5m2!1sfr!2sfr" width="600" height="450" style="border:0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                    <!-- <button>Download CV</button> -->
                    <div class="form">
                        <form action="" method="post">
                            <label for="name">NOM</label>
                            <input type="text" id="name" name="name">

                            <label for="email">EMAIL</label>
                            <input type="email" id="email" name="email">

                            <label for="message">MESSAGE</label>
                            <textarea type="text" id="message" name="message"></textarea>

                            <button type="submit" name="mailForm">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="contact-right">
                <!-- <div class="api">
                    <div class="apod"></div>
                    <div class="apod-title"></div>
                </div> -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d185112.17053697945!2d5.247849702943494!3d43.53616884286224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c98da304b91259%3A0x5cb953bec8b688a3!2sAix-en-Provence!5e0!3m2!1sfr!2sfr!4v1673876010042!5m2!1sfr!2sfr" width="600" height="450" style="border:0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
    </section>

    <script src="app.js"></script>

</body>
</html>