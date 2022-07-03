<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

        body {
        font-family: 'Montserrat';
        font-style: Italic;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        padding:20px;
        }

        .header {
        text-align: center;
        padding: 20px;
        font-size:20px;
        }

        /* Responsive layout - makes a two column-layout instead of four columns */
        @media (max-width: 800px) {
        .column {
            flex: 46%;
            max-width: 46%;
        }
        }

        .card {
        opacity: 0.8;
        filter: alpha(opacity=60);
        }
        .card-title {
        font-weight:bold;
        text-align: center;
        }

        #left-panel-link {
        position: relative;
        left: 5%;
        background-color: #555;
        color: white;
        font-size: 16px;
        padding: 12px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        }
        #right-panel-link {
        position: absolute;
        right: 10%;
        background-color: #555;
        color: white;
        font-size: 16px;
        padding: 12px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        }
    </style>
  </head>
  <body>
