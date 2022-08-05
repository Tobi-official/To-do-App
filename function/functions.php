<?php
          

    function is_user_authenticated() {
        return isset($_SESSION['email']) && isset($_SESSION['username']);
    }

    function ensure_user_is_authenticated() {
        if(!is_user_authenticated()) {
            header('location: login_username.php');
        }
    }


    // authentication for dashboard files
    function ensure_user_is_authenticated_dash() {
        if(!is_user_authenticated()) {
            header('location: ../login_username.php');
        }
    }



    // DISPLAY ALL TASKS
    function my_tasks() {
        
        $db_id = $GLOBALS['db_id'];

        $select = mysqli_query($GLOBALS['conn'], "SELECT id, title, date, category, notes, task FROM users_tasks WHERE sn='$db_id' ");

        if(mysqli_num_rows($select) > 0) {
            $result = mysqli_fetch_all($select);
            $i = 0;
            echo "<table class='table_format' border=1>";
            echo "<th>S/N</th>";
            echo "<th>Title</th>";
            echo "<th>Date</th>";
            echo "<th>Category</th>";
            echo "<th>Notes</th>";
            echo "<th>Task</th>";
            echo "<th>Delete Task</th>";
            
            $SN = 1;
            while($i < mysqli_num_rows($select)) {
            $data = $result[$i];

            $id = $data['0'];
            $title = $data['1'];
            $date = $data['2'];
            $category = $data['3'];
            $notes = $data['4'];
            $task = $data['5'];
            
            echo "<tr>";
                echo "<td>$SN</td>";
                echo "<td>$title</td>";
                echo "<td>$date</td>";
                echo "<td>$category</td>";
                echo "<td>$notes</td>";
                echo "<td>$task</td>";
                echo "<td><button name='delete_task' class='delete_task'><a href='my_tasks.php?db_id=$id'>Delete</a></button></td>";
                
                echo "</tr>";
                
                $i++;
                $SN++;
            }
            echo "</table>";
       
             
        } else {
            return "<h1 class='empty_task'> No record found!</h1> <p class='click_to_add_task'>Add a <span><a href='../includes/add_task.php'>TASK</a></span></p>";
        }

        if(isset($_GET['db_id'])) {
            if($_GET['db_id'] == $id) {
                    $delete = mysqli_query($GLOBALS['conn'], "DELETE  FROM users_tasks WHERE id='$id'");

                    if($delete) {
                            echo "<p class='delete_task_success'>Successfully deleted</p>";
                            header('location: ../includes/my_tasks.php');
                    }else {
                        echo "<p>Failed</p>";
                    }
                }
            } 
        }
            
        
    