<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <title>Ajax Open weather API assignment</title>
    <style>
        body {
            background:url('<?= base_url()?>assets/img/cloud-1.jpg');
            font-family: 'Montserrat', cursive;
        }
        form{
            margin: 7% auto;
            width:500px;
            text-align:center;
        }

        form input[type="text"] {
            outline: none;
            padding: 20px 7%;
            border-radius: 20px;
            border: none;
            margin-bottom: 5%;
            background: hsla(0,0%,98%,.85);
            height: auto;
        }
        h1 {
            color:#fff;
        }

        p {
            text-transform: uppercase;
            letter-spacing: .05em;
        }

        .city {
            display: none;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 40px 8%;
            border-radius: 20px;
            box-shadow: 10px 10px 5px 0 rgb(15 15 15 / 40%);
            background: hsla(0,0%,98%,.85);
            width: 50%;
            margin: 0 auto;
        }

        .city sup {
            font-size: .5em;
        }

        .city-name sup {
            padding: .2em .6em;
            margin-left: .2em;
            border-radius: 30px;
            color: #fff;
            background: #ff8c00;
        }

        .city-name {
            font-size: 2em;
        }
        .city-temp {
            font-size: 5rem;
            font-weight: 700;
            color: #1e2432;
            text-align: center;
        }

        .info {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .city-icon {
            margin-top: 10px;
            width: 100px;
            height: 100px;
        }

        .city-temp, p {
            margin-top: 10px;
        }


    </style>
  </head>
  <body>
   
    <div class="container">
        <form action="">
            <div class="form-group">
                <h1>Weather Forecaster Application</h1>
                <input type="text" class="form-control mt-5" id="forecast" aria-describedby="forecast">
            </div>
        </form>

        <div class="city">
            <h2 class="city-name">
                <span>Makati</span>
                <sup>PH</sup>
            </h2>
            <div class="city-temp">
                <span>27</span>
                <sup>°C</sup>
            </div>
            <div class="info">
                <img class="city-icon" src="https://openweathermap.org/img/wn/04n@2x.png" alt="broken clouds">
                <p>broken clouds</p>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            const URL = "https://api.openweathermap.org/data/2.5/weather";
            const API_KEY = "b2f4e668ba7cc97ab8b2ac8f0f1c6efc";

            $(this).keydown(function(event){
                console.log(event.keyCode);
                if(event.keyCode == 13){
                    let forecast = $("#forecast").val();
                    // alert(forecast);
                    $.get( `https://api.openweathermap.org/data/2.5/weather?q=${forecast}&units=metric&appid=${API_KEY}`, function( data ) {

                        console.log(data);
                        $(".city").css("display","flex");
                        $(".city-name span").html(data.name);
                        $(".city-name sup").html(data.sys.country);
                        $(".city-temp span").html(data.main.temp);
                        $(".city-icon").attr("src",`https://openweathermap.org/img/wn/${data.weather[0].icon}.png`);
                        $(".city-icon").attr("alt",data.weather[0].description);
                        $(".info p").html(data.weather[0].description);
                        // https://openweathermap.org/weather-conditions
                        // src={`https://openweathermap.org/img/wn/${weather.weather[0].icon}@2x.png`}
						// 		alt={weather.weather[0].description}
                    });
                    return false;
                }
            });
               
            
        })
    </script>
  </body>
</html>