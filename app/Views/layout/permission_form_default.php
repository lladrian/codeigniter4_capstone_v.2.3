<!DOCTYPE html>
<html lang="en">
<head>
    <title>COA Document Tracking System</title>
    <link rel="short cut icon" types="x-icon" href="<?= base_url('/assets/computer_studies.png') ?>"/>
    <!-- <title><?= $this->renderSection('title') ?></title> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('fontawesome-free/css/all.min.css') ?>">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            /* background-color: wheat; */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .registration-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 1000px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;

        }

        /* .registration-form > form {
            width: 100%;
            height: 100%;
            display: flex;
            back
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .registration-form > form > div {
            width: 100%;
            height: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between; 
        }*/

        .form-group {
            width: 48%;
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group input[type="submit"] {
            color: #fff;
            cursor: pointer;
            background-color: #4caf50;
        }

        .form-group input[type="submit"]:hover {
            color: #fff;
        }

        .form-group .checkbox-group {
            display: flex;
            align-items: center;
        }

        .form-group input[type="checkbox"] {
            margin-right: 5px;
        }
        .default {
            cursor: default;
        }
    </style>
</head>
<body>

<div class="registration-form">
    <?php if(session()->getFlashdata('success') || session()->getFlashdata('error')): ?>
            <div id="error-container" style="width:100%;">
                <?php if(session()->getFlashdata('success')): ?>
                    <!-- Display the success message -->
                    <div class="alert alert-success">
                        <?php echo session()->getFlashdata('success'); ?>
                    </div>
                <?php endif; ?>
                <?php if(session()->getFlashdata('error')): ?>
                    <!-- Display the success message -->
                    <div class="alert alert-danger">
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <script>
                    // Automatically close the error message after 5 seconds (adjust as needed)
                    setTimeout(function() {
                        document.getElementById('error-container').style.display = 'none';
                    }, 4000); // 5000 milliseconds = 5 seconds
                </script>
            </div>
    <?php endif; ?>   
    
    <div style="width:100%;">
        <h1 style="margin-bottom: 30px;">
            <?= $this->renderSection('form-title') ?>
        </h1>
    </div>
  

    <div style="width:100%;" class="main-content">
        <?= $this->renderSection('content') ?>
    </div>

</div>



</body>
</html>
