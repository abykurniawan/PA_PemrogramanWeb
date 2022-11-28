<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Belajar Dark Mode</title>
    <style>
        * {
        transition: background-color 1s;
    }
    body {
        height: 100vh;
        background-color: #f8f3e3;
    }
    body.dark-theme {
        background-color: #202945;
    }
    .card.dark-theme {
        background-color: #374368;
        color: #d4d4d4;
    }

    </style>
  </head>
  <body>
    <div class="container d-flex h-100 justify-content-center">
        <div class="row align-self-center w-100">
            <div class="col col-lg-7 mx-auto">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                    <h1 class="display-4 font-weight-bold">Light Mode</h1>
                        <p class="lead">Belajar Membuat Website Dark Mode Sederhana</p>
                        <p class="lead">
                            <button role="button" class="btn btn-block btn-lg btn-dark" id="theme_toggle">Toggle</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JQuery-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- JS Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
        $('#theme_toggle').on('click', function () {
            if ($('body').hasClass('dark-theme')) {
                $(this).toggleClass('btn-light');
                $(this).addClass('btn-dark');
                $('h1').html("Light Mode");
                $('body').toggleClass('dark-theme');
                $('.card').toggleClass('dark-theme');
                localStorage.setItem("mode", "light-theme");
            } else {
                $(this).toggleClass('btn-light');
                $(this).removeClass('btn-dark');
                $('h1').html("Dark Mode");
                $('body').toggleClass('dark-theme');
                $('.card').toggleClass('dark-theme');
                localStorage.setItem("mode", "dark-theme");
            }
        })
        //check for localStorage, add as browser preference if missing
        if (!localStorage.getItem("mode")) {
            if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
                localStorage.setItem("mode", "dark-theme");
            } else {
                localStorage.setItem("mode", "light-theme");
            }
        }
        //set interface to match localStorage
        if (localStorage.getItem("mode") == "dark-theme") {
            $('#theme_toggle').removeClass('btn-dark');
            $('#theme_toggle').addClass('btn-light');
            $('body').addClass('dark-theme');
            $('.card').addClass('dark-theme');
            $('h1').html("Dark Mode");
            document.getElementById("theme_toggle").checked = true;
        } else {
            $('#theme_toggle').addClass('btn-dark');
            $('#theme_toggle').removeClass('btn-light');
            $('body').removeClass('dark-theme');
            $('.card').removeClass('dark-theme');
            $('h1').html("Light Mode");
            document.getElementById("theme_toggle").checked = false;
        };
    });
    </script>
  </body>
</html>