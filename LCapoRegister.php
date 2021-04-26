<?php
include_once './database.php';



if($_SERVER['REQUEST_METHOD']=='POST'){

    $fullname =$_POST['fullname'];
    $username =$_POST['username'];
    $password =$_POST['password'];
    $confirm =$_POST['confirm'];
    $gender =$_POST['gender'];
    $email =$_POST['email'];
    $location =$_POST['location'];
    $image =$_FILES['image']['name'];

    $hash = password_hash($password,$confirm, PASSWORD_DEFAULT);

    $image_name=$_FILES['image']['name'];
    $image_location=$_FILES['image']['tmp_name'];
    $image_path='C:\xampp2\htdocs\LCapoSoundLabs\ProfilePicture'.basename($image_name);

    if(empty($fullname)||empty($username)||empty($password)||empty($confirm)||empty($gender)||empty($email)||empty($location)||empty($image))
    {
        $status= "All input fields must be filled";
    }else{
        if(strlen($fullname)>=255||!preg_match("/^[a-zA-Z-'\s]+$/",$fullname))
        {
            $status = "Please enter a valid name";
        }else if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $status ="Please enter a valid email";

        }else{

            $sql = "INSERT INTO user (`fullname`, `username`, `password`, `confirm`, `gender`, `email`, `country`, `profilepic`) VALUES (':fullname', ':username', ':password', ':confirm', ':gender', ':email', ':location', ':image')";
            

            $statement = $pdo->prepare($sql);

            $statement->bindParam(':fullname', $fullname);
            $statement->bindParam(':username', $username);
            $statement->bindParam(':password', $password);
            $statement->bindParam(':confirm', $confirm);
            $statement->bindParam(':gender', $gender);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':country', $country);
            $statement->bindParam(':image', $image);

            
            
           if( $statement->execute()){
               echo "Record insertion was successful";
           }else{
               echo "Error in insertion";
           }

         


            
            $fullname = "";
            $username = "";
            $password = "";
            $confirm = "";
            $gender = "";
            $email = "";
            $location ="";
            $image = "";
        }
    }

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CapoStyleRegister.css">
    <title>L-Capo SoundLabs Register</title>
</head>
<body>
    <embed src="RichBless.mp3" loop="true" autostart="true" width="2" height="0">

        <section class="show">
            <header>
               <h2 class="logo">L-Capo SoundLabs</h2>
               <div class="toggle"></div>
            </header>
    
            <video src="TooBlessed.mp4" muted loop autoplay></video>
    
            <div class="overlay"></div>
    
            <div class="text">
                <h2>Littest Beats</h2>
                <p>Sign Up and listen to all the biggest names in the trap game
                   cook up insane beats as you share your own productions
                </p>
    
                <p2>Background Sound: Too Blessed: Prod by DJDurel(Instrumental)</p2>
                <br>
                <p2>Background Video: Rich the Kid X Quavo X Takeoff - Too Blessed: Created by Nick Belotti</p2>
                <br><br>
                <p3>*Warning* : Explicit Content</p3>
               
                
            </div>
    
            <ul class="social">
                <li><a href="#"><img src="facebook.png" alt=""></a></li>
                <li><a href="#"><img src="twitter.png" alt=""></a></li>
                <li><a href="#"><img src="instagram.png" alt=""></a></li>
            </ul>
    
    
        </section>
   
    <div class="register">
        <form action="LCapoRegister.php" method="post" enctype="multipart/form-data">
           
            
            <div class="input">
                <label>Full Name</label>
                <input type="text" name="fullname" placeholder="John Doe" value="<?php if($_SERVER['REQUEST_METHOD']=='POST')echo $fullname ?>">
               
            </div>
            <div class="input">
                <label>UserName</label>
                <input type="text" name="username" placeholder="John Doe" value="<?php if($_SERVER['REQUEST_METHOD']=='POST')echo $username ?>">
               
            </div>
            <div class="input">
                <label>Password</label>
                <input type="password" name="password" placeholder="Pass" value="<?php if($_SERVER['REQUEST_METHOD']=='POST')echo $password ?>">
                
            </div>
            <div class="input">
                <label>Confirm PassWord</label>
                <input type="password" name="confirm" placeholder="Pass" value="<?php if($_SERVER['REQUEST_METHOD']=='POST')echo $confirm ?>">
               
            </div>
            <div class="input">
                <label>Gender</label>
                <p>Male</p><input type="radio" name="gender" value="male">
                <p>Female</p><input type="radio" value="female" name="gender">
                
                
            </div>
            <div class="input">
                <label>Email</label>
                <input type="mail" name="email" placeholder="JohnDoe@gmail.com" value="<?php if($_SERVER['REQUEST_METHOD']=='POST')echo $email ?>">
               
            </div>
            <div class="input">
                <label>Country</label>
                <input type="text" name="location" placeholder="Kenya" value="<?php if($_SERVER['REQUEST_METHOD']=='POST')echo $location ?>">
                
            </div>
           <!-- <input type="hidden" name="size" value="100000">
            <div class="input">
                <label>Profile Picture</label>
                <input type="file" name="image" value="<?php if($_SERVER['REQUEST_METHOD']=='POST')echo $image ?>">
                
            </div> -->
           
            <input type="submit" class="submit" value="Register">
            
            
        </form>
      
    </div>

    
    <script>
        const registerInput = document.querySelectorAll('.register');
        const loginToggle = document.querySelector('.toggle');
        const show = document.querySelector('.show');

        for(let i=0; i < registerInput.length; i++){
            let currentLabel = registerInput[i]
            .parentElement.firstElementChild;

            if(registerInput[i].value !==""){
                currentLabel.classList.add("move-up");
            }
        };

        loginToggle.addEventListener('click', () =>{
            loginToggle.classList.toggle('active')
            show.classList.toggle('active')
        });
    $(document).ready(function(){
        $("#Submit_Button").on('click',function(event){

            event.preventDefault();
            $("#Submit_Button").arr("disabled","disabled");

            var fullname = $('#fullname').val();
            var username = $('#username').val();
            var password = $('#password').val();
            var confirm = $('#confirm').val();
            var gender = $('#gender').val();
            var email = $('#email').val();
            var country = $('#country').val();

            if(fullname ! = "" && username ! = "" && password ! = "" && confirm ! = "" && gender ! = "" && email ! = "" && country ! = ""){
                $.ajax({
                    url : "LCapoRegister.php",
                    type = "POST",
                    data: {
                        fullname : fullname,
                        username : username,
                        password : password,
                        confirm : confirm,
                        gender : gender,
                        email : email,
                        country : country,

                    },
                    cache: false,
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        if(dataResult.statusCode == 200){
                            echo "Submission was successful";
                        }else if(dataResult.statusCode == 201){
                            echo "Account with same credentials already exists";
                        }
                    }
                });
            }
        });

    });

       

    </script>
    
</body>
</html>