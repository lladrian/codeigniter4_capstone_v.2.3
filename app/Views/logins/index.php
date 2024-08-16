<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="short cut icon" types="x-icon" href="<?= base_url('/assets/evsulogo.png') ?>"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COA Document Tracking System</title>
    <link rel="stylesheet" href="<?= base_url('/styles/login-styles.css') ?>">
    <style>
        .btn-group > div {
            margin-top:5px;
        }
    </style>
</head>
<body>
   
 

        <div class="welcome"> 
            <p>Welcome to <br> <span class="larger-text">INC FORM System</span></p>
        </div>
        
        <div class="btn-group btn">
            <div>
                <a class="coabtn" href="<?= base_url('/login/admin') ?>">Login as ADMIN</a>
            </div>
           <div>
                <a class="coabtn" href="<?= base_url('/login/student') ?>">Login as STUDENT</a>
            </div>
            <div>
                <a class="coabtn" href="<?= base_url('/login/staff') ?>">Login as STAFF</a>
            </div>
              <!--
            <div>
                <a class="coabtn" href="<?= base_url('/login/coa') ?>">Login as INTSTRUCTOR</a>
            </div>
            <div>
                <a class="coabtn" href="<?= base_url('/login/coa') ?>">Login as HEAD DEPARTMENT</a>
            </div>
            <div>
                <a class="coabtn" href="<?= base_url('/login/coa') ?>">Login as REGISTRAR</a>
            </div>
            <div>
                <a class="coabtn" href="<?= base_url('/login/coa') ?>">Login as CASHIER</a>
            </div> -->
        </div>
   
</body>
</html>