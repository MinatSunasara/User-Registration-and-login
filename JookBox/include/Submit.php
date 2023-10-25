<?php
        $nameerror=$emailerror=$passworderror=$addresserror=$mobilerror="";
        $nameerror_=$emailerror_=$passworderror_=$addresserror_=$mobilerror_="";
        if(isset($_POST['signup'])){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $name = $_POST['name'];
                if(empty($name) && strlen($name) < 3){
                    $nameerror = "**Required and minimum 3 character allow";
                }else{
                    if(!preg_match("/^[a-zA-Z]*$/",$name)){
                        $nameerror = "Only alphabatics allow";
                    }else{
                        $nameerror_ = $nameerror_;
                    }
                }
                $email=$_POST['email'];
                if(empty($email)){
                    $emailerror = "**Required";
                }else{
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $emailerror = "**invalid format";
                    }else{
                        $emailerror_ = $email;
                    }
                }
                $psw = $_POST['psw'];
                if(!empty($psw) && $psw != "" ){
                    if (strlen($psw) <= '8') {
                        $passworderror = "**Your Password Must Contain At Least 8 Digits !";
                    }
                    elseif(!preg_match("#[0-9]+#",$psw)) {
                        $passworderror = "**Your Password Must Contain At Least 1 Number !";
                    }
                    elseif(!preg_match("#[A-Z]+#",$psw)) {
                        $passworderror = "**Your Password Must Contain At Least 1 Capital Letter !";
                    }else{
                        $passworderror_= $psw;
                    }
                }else{
                    $passworderror = "**Required";
                }      
                $address=$_POST['address'];
                $mobile = $_POST['mobile'];
                if(empty($mobile)){
                    $mobilerror = "**Required";
                }else{ 
                    if(!preg_match("/^[0-9]*$/",$mobile)){
                        $mobilerror = "**Only numric value allow";
                    }else if(strlen($mobile)<10){
                            
                        $mobilerror = "mobile number must contain 10 digits";
                    }else{
                        $mobilerror_ = $mobile;
                    }
                    
                }
                $user_query = "SELECT * FROM `form` WHERE `email`='$email' AND `psw` = '$psw' ";
                $res = mysqli_query($conn,$user_query);
                $user_count = mysqli_num_rows($res);
                if($user_count > 0){
                    ?>
                        <script>
                            swal("Oppps!", "username and password already exist", "error");
                            var timer = setTimeout(function()
                            {
                                window.location.href="http://localhost:1234/JookBox/";        
                            }, 2000);
                        </script>            
                    <?php
                }else{
                    if($nameerror=="" && $emailerror=="" && $passworderror=="" && $mobilerror=="" ){ 
                        $sql="INSERT INTO form"."(name,email,psw,address,mobile)"."VALUES('$name','$email','$psw','$address',$mobile)";
                        $retvalue=mysqli_query($conn,$sql);
                        if(! $retvalue){
                            ?>
                                <script>
                                    swal("Opps!", "Data could not be enter. Please try again", "error ");
                                </script>
                            <?php
                        }else{
                        ?>
                            <script>
                                swal("Great!", "Registeration complete successfully", "success");
                            </script>
                        <?php
                        } 
                    }else{
                        ?>
                        <script>
                            swal("Opps!", "Data could not be enter. Please try again", "error");
                        </script>
                        <?php
                    }
                }
                
            }
        }else if(isset($_POST['signin'])){
            $email=$_POST['email'];
            $psw=$_POST['psw'];
            $result=mysqli_query($conn,"SELECT * FROM form where email='$email' AND psw='$psw'")or die("failed to query database".mysqli_error());
            $row=mysqli_fetch_assoc($result);
            if($row){
                $_SESSION['email'] = $email;
                $_SESSION['psw'] = $psw;
                ?>
                    <script>
                        swal("Great!", "Login successful", "success");
                        var timer = setTimeout(function() {
                        window.location.href = "http://localhost:1234/JookBox/include/welcome.php";
                        }, 2000);
                    </script>
                <?php 
            }else if($email=="" && $psw==""){
                ?>
                    <script>
                        swal("Please!", "Enter username and password", "error");
                        var timer = setTimeout(function() {
                        window.location.href = "http://localhost:1234/JookBox/";
                        }, 2000);
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        swal("Please!", "check your username and password", "error");
                        var timer = setTimeout(function() {
                            window.location.href = "http://localhost:1234/JookBox/";
                        }, 2000);
                    </script>
                <?php
            }
    }
    mysqli_close($conn);
    ?>