<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .contact_container{
            width: 100%;
            background: #a0a0a0;
            position: relative; 
            text-align: center;
        }
        .contact_content{
            display: flex;
            justify-content: space-evenly;
        }
        
        .contact_address > p{
            margin: 5px 0;
            text-align: left;
            margin: 5px 5px;
        }
       
        .contact_pic{
            width: 30%;
            height: 150px;
            background: white;
        }
    </style>
</head>
<body>
    
    <div class="contact_container">
        <div class="contact_header"><h3>CONTACT OPNEMEN</h3></div>
        <div class="contact_content">
            <div class="contact_address">
                <p>Dorien Kotterman </p>
                <p>De Groene Reiger</p>
                <p>Dorpsstraat 617</p>
                <p>1723HC Noord-Scharwoude</p>
                <p>06-52022555</p>
                <p>info@degroenereiger.nl</p>             
            </div> <!-- contact_address -->
            <div class="contact_pic"><img src="" alt=""></div>    

            <div class="map" id="map"></div>

        </div> <!-- contact_content-->

    </div><!--contact_container -->
</body>
</html>