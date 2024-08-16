<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="short cut icon" types="x-icon" href="<?= base_url('/assets/evsulogo.png') ?>"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COA Document Tracking System</title>
    <link rel="stylesheet" href="<?= base_url('/styles/login-styles.css') ?>">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <!-- <a href="<?= base_url('/') ?>"><img src="<?= base_url('/assets/translogo.png') ?>" alt="Logo"></a> -->
            <a href="<?= base_url('/') ?>"><img src="<?= base_url('/assets/evsulogo.png') ?>" alt="Logo"></a>
        </div>
        <ul class="nav-links">
            <li><a href="<?= base_url('/') ?>">Home</a></li>
            <!-- <li><a href="<?= base_url('/contact') ?>">Contact us</a></li> -->
        </ul>   
    </nav>
  
    <div class="login-container">
        <div style="text-align: start; color:red;">
                     <?php if (session()->has('errors')) : ?>
                        <div id="error-container">  
                        <ul>
                             <?php foreach (session('errors') as $error) : ?>
                                 <li><?= esc($error) ?></li>
                             <?php endforeach ?>
                        </ul>
                        </div>
                        <script>
                            setTimeout(function() {
                                document.getElementById('error-container').style.display = 'none';
                            }, 3000); 
                        </script>
                     <?php endif ?>
        </div>
          
        <form class="login-form" id="loginForm">
        <?= csrf_field() ?>

            <h2>STAFF LOGIN</h2>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="text" id="email" name="email" placeholder="Enter Your Email Address" >
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter Your Password" >
            </div>
            <button class="submitbtn" type="submit">Login</button> 

        </form>
        <div>
            <a  class="forgotbtn" href="<?= base_url('/signup/staff') ?>" style="display: inline-block; width:100%; background:green; text-align:center; ">Sign Up</a>
        </div>
        <div>
            <a class="forgotbtn" href="<?= base_url('/recovery_account') ?>" style="display: inline-block; width:100%; text-align:center; ">Forgot Password</a>
        </div>
    </div>
 
    <script>
        const form = document.getElementById('loginForm');
        form.addEventListener('submit', async (event) => {
            event.preventDefault();

            const formData = new FormData(form);
            const data = new URLSearchParams(formData);

            const response = await fetch('/login/staff', {
                method: 'POST',
                body: data,
            });

            const result = await response.json();

            if (response.ok) {
                console.log(result);
            } else {
                console.log(result);
            }
        });
    </script>
</body>
</html>

