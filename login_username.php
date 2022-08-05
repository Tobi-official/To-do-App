<?php require "includes/header1.php"; 
        require "includes/header1.php"; ?>

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
            <div class="register login">
                       <div class="success"></div>
                        <div class="login_fail">

                        </div>
                <h1>Login in to your To-do App</h1>
                <form id="login_username" action="#" method="POST">
                    <div class="form_input">
                        <label for="username">Username</label><br>
                        <input id="username" type="text" class="input_control" name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="form_input">
                        <label for="password">Password</label><br>
                        <input id="password" type="password" class="input_control" name="password" placeholder="create a password" required>
                    </div>
                    <div class="form_input submit_form">
                        <button type="submit" name="login" class="submit">Submit</button>
                    </div>
                    <p class="email_login">Login in with your email? <span><a href="login_email.php">Click here</span></a></p>
                    <small>Not yet Registered? <span><a href="index.php">Register here</a></span></small>
                </form>
            </div>
        </div>
  <?php require "includes/footer.php"; ?>