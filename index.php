<?php require "includes/header1.php"; ?>
<body>
    <section class="container">
        <div class="nav">
            <div class="title">
                <h3>TO-Do App</h3>
            </div>
            <div class="content">
                <h4>What is a TO-DO App?</h4>
                <ul>
                    <li>A TO-DO App basically sets a reminder of our daily tasks.</li>
                    <li>It also stores information about future events.</li>
                </ul>
                <h4>Features</h4>
                <p>It has a dynamic backend system which connect to the database and stores information</p>
                <p>I created it with the following Languages</p>
                <ul>
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>Javascript</li>
                    <li>PHP</li>
                    <li>AJax</li>
                    <li>Jquery</li>
                </ul>

            </div>
            </div>
        </div>

        
        <div class="main_body">
            <div class="content" id="content">
                <h1 id="h1"></h1>
                <h2 id="h2"></h2>
            </div>
            <div class="register">
                       <div class="success"></div>
                        <div class="fail"></div>
                <h1>Kindly fill the form below to register into my TO-DO APP</h1>
                <form id="register_form" method="POST">
                    <div class="form_input">
                        <label for="full_name">Full Name</label><br>
                        <input id="full_name" type="text" class="input_control" name="full_name" placeholder="Enter your full name" required>
                    </div>
                    <div class="form_input">
                        <label  for="email">Email</label><br>
                        <input id="email" type="email" class="input_control" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form_input">
                        <label for="username">Create Username</label><br>
                        <input id="username" type="text" class="input_control" name="username" placeholder="Choose a username" required>
                    </div>
                    <div class="form_input">
                        <label for="password">Password</label><br>
                        <input id="password" type="password" class="input_control" name="password" placeholder="create a password" required>
                    </div>
                    <div class="form_input">
                        <label for="confrim_password">Confirm Password</label><br>
                        <input id="confirm_password" type="password" class="input_control" name="confrim_password" placeholder="confrim your password" required>
                    </div>
                    <div class="form_input submit_form">
                        <button type="submit" name="submit" class="submit" id="submit">Submit</button>
                    </div>
                    
                    <small>Already Registered? <span><a href="login_username.php">Login here</a></span></small>
                </form>
            </div>
        </div>
  <?php require "includes/footer.php"; ?>