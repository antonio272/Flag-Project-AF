
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Doctors</title>
        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
            integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600&display=swap" rel="stylesheet">

            
        <link rel="stylesheet" href="../css/styles.css">
        
    </head>

    <body>

            <header class="container-fluid sticky-top">
                <div class="row no-gutters">
                    <div class="col-4 text-right col-md-1 text-md-right mt-md-1 mb-1 mb-md-1">
                            <img src="images/icon.png" alt="icon" class="img-fluid"> 
                    </div>
                    <div class="col-8 mt-2 col-md-4 text-md-left mt-md-3">
                            <h1 class="logo-text"><span>FLAG</span>project</h1>
                    </div> 
               
                    <div class="col-md-7">
                        <nav class="text-center text-md-right mt-md-4">
                            <ul>
                                <li><a href="<?=BASE_PATH?>"><i class="fas fa-home"></i> Home</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>

            <section id="Doctorspage">
                <div class="col-md-12 text-center text-md-center mt-4 mb-4">
                    <div class="container">
                    <h1>Doctors</h1>
                    <ul>
<?php
    foreach($doctors as $doctor) {
        echo '
        <li>
            <a href="' .BASE_PATH. 'doctors/?doctor_id=' .$doctor["doctor_id"]. '">' .$doctor["name"]. '</a>
        </li>
        ';
    }
?>
                    </ul>
                    </div>                   
                </div>               
            </section> 

            <section id="prefooter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <h3>Service</h3>
                            <p>We are in tune with the needs of patients and medical staff and customize our service
                                 to always improve the treatment experience for patients and practitioners alike. </p>
                        </div>
                        <div class="col-md-4 mt-4 mt-md-0 mb-4 mb-md-0">
                            <h3>Talk to Us</h3>
                            <p>
                                <a href="tel:+351912345678">
                                    <i class="fas fa-phone"></i>+351 912 345 678</a>
                            </p>
                            <p>
                                <a href="mailto:info@afproject.com">
                                    <i class="fas fa-envelope"></i>info@afproject.com</a>
                            </p>
                        </div>
                        <div class="col-md-4">
                            <h3>Visit Us</h3>
                            <p>1050-047, Atrium Saldanha, 3th Floor,<br>
                                Lisbon, Portugal</p>

                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3112.331953849176!2d-9.146826484695655!3d38.73314407959636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd19339ff3d2e003%3A0x30801d02c31fc003!2sFLAG%20LISBOA!5e0!3m2!1spt-BR!2sdk!4v1607000755779!5m2!1spt-BR!2sdk" 
                                    width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" 
                                    aria-hidden="false" tabindex="0"></iframe>
                            </div>

                        </div>
                    </div>
                </div>
            </section> 

            <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-left">
                        <a href="#" class="btn-circle">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="btn-circle">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="btn-circle">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="btn-circle">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                    <div class="col-md-6 mt-3 mt-md-0 d-flex align-items-center">
                        <div class="text-center text-md-right w-100">
                            &copy; 2020 Copyright. All rights reserved.
                        </div>
                    </div>
                </div>
            </div>
            </footer>

        <!-- JQuery -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

        <!-- Slick Carousel -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        <!-- Custom Script -->
        <script src="../scripts/script.js"></script>
        <script src="../scripts/app.js"></script>

    </body>

</html>
        