<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/styleLogin.css">
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'nunito', sans-serif;
    font-weight: 600;
}
body{
    background: url('../resources/img/bg.jpg');
    background-size: cover;
}
.container{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    position: relative;
}
.box{
    width: 450px;
    height: 500px;
    background:#fff;
    backdrop-filter: blur(20px);
    border-radius: 30px;
    padding: 40px;
    box-shadow: 2px 2px 15px 2px rgba(0,0,0,0.1),
                -2px -0px 15px 2px rgba(0,0,0,0.1);
    z-index: 10;
}
.wrapper{
    position: absolute;
    width: 455px;
    height: 500px;
    border-radius: 30px;
    background: #2739DC;
    box-shadow: 2px 2px 15px 2px rgba(0,0,0,0.115),
                -2px -0px 15px 2px rgba(0,0,0,0.054);
    transform: rotate(5deg);
}
.header{
    margin-bottom: 50px;
}
.header header{
    display: flex;
    justify-content: right;
}
header img{
    width: 100px;
}
.header h4{
    font-size: 25px;
    font-weight: 800;
    margin-top: 10px;
    text-align: center
}
.header h1{
    font-size: 10px;
    font-weight: 800;
    margin-top: 10px;
}
.input-box{
    display: flex;
    flex-direction: column;
    margin: 10px 0;
    position: relative;
}
i{
    font-size: 20px;
    position: absolute;
    top: 35px;
    right: 12px;
    color: #595b5e;
}
input{
    height: 40px;
    border: 2px solid rgb(153,157,158);
    border-radius: 7px;
    margin: 7px 0;
    outline: none;
}
.input-field{
    font-weight: 500;
    padding: 0 10px;
    font-size: 17px;
    color: black;
    background: transparent;
    transition: all .3s ease-in-out;
}
.input-field:focus ~ i{
    color: rgb(89,53,180);
}
.input-submit{
    margin-top: 20px;
    background: #1e263a;
    border: none;
    color: #fff;
    cursor: pointer;
    transition: all .3s ease-in-out;
}
.input-submit:hover{
    background: #122b71;
}
.bottom{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin-top: 25px;
}
.bottom span a{
    color: #727374;
    text-decoration: none;
}
.bottom span a:hover{
    text-decoration: underline;
}
    </style>
</head>
<body>  
    <form action="{{url('proses_login')}}" method="post">
        <div class="container">
        <div class="box">
            <div class="header">
                <header><img src="../resources/img/logo.png" alt=""></header>
                <h4>Login</h4>
            </div>
            <div class="input-box">
                <label for="text">Username</label>
                <input type="text" class="input-field" id="username" name="username" required>
                <i class="bx bx-envelope"></i>
            </div>
            <div class="input-box">
                <label for="password">Password</label>
                <input type="password" class="input-field" id="password" name="password" required>
                <i class="bx bx-lock"></i>
            </div>
            <div class="input-box">
                <input type="submit" class="input-submit" value="Masuk">
            </div>
        </div>
        <div class="wrapper"></div>
        </div>
    </form>
</body>
</html>