<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CapoStyleLogin.css">
    <title>L-Capo SoundLabs Login</title>
</head>
<body>
    <embed src="Butterfly.mp3" loop="infinite" autostart="true" width="2" height="0">

        <section class="show">
            <header>
               <h2 class="logo">L-Capo SoundLabs</h2>
               <div class="toggle"></div>
            </header>
    
            <video src="FlyEfffect.mp4" muted loop autoplay></video>
    
            <div class="overlay"></div>
    
            <div class="text">
                <h2>Jump In</h2>
                <p>Get back in the zone and enjoy bangers from talented artists worldwide
                    or post some of your own here instead
                </p>
                <p2>Background Sound: Butterfly Effect: Prod by Murda Beatz(Instrumental)</p2>
                <br>
                <p2>Background Video: Travis Scott - Butterfly Effect(Official Video)</p2>
                <br><br>
                <p3>*Warning* : Explicit Content</p3>
               
                
            </div>
    
            <ul class="social">
                <li><a href="#"><img src="facebook.png" alt=""></a></li>
                <li><a href="#"><img src="twitter.png" alt=""></a></li>
                <li><a href="#"><img src="instagram.png" alt=""></a></li>
            </ul>
    
    
        </section>
   
    <div class="login">
        <form action="LCapoLogin.html" method="post" enctype="multipart/form-data">
            
            <div class="input">
                <label>UserName</label>
                <input type="text" name="username" placeholder="John Doe" value="">
               
            </div>
            <div class="input">
                <label>Password</label>
                <input type="password" name="username" placeholder="Pass" value="">
                
            </div>

            <br>
            <input type="submit" class=submit value="Login">
            <a href="#">Forgotten Password?</a>
            
        </form>
      
    </div>

    
    <script>
        const loginToggle = document.querySelector('.toggle')
        const show = document.querySelector('.show')

        loginToggle.addEventListener('click', () =>{
            loginToggle.classList.toggle('active')
            show.classList.toggle('active')
        })
    </script>
    
</body>
</html>


