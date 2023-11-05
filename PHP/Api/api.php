<?php

    class Api{
       private $host ="localhost"; 
       private $user ="root";
       private $pass = "";
       private $db="eshop";
       private $Conn;
        public function Connection()
        {
            $this->Conn = mysqli_connect($this->host,$this->user,$this->pass,$this->db);

        }

        public function InsertUser($First_Name,$Last_Name,$Email_Id,$Password,$full_address,$pincode,$city,$state)
            {
                    $this->Connection();
                    $query = "SELECT * FROM customer WHERE email='$Email_Id';";
                    $res1 = mysqli_query($this->Conn, $query);
                    if(mysqli_num_rows($res1)>0)
                    {
                        echo json_encode(['result'=>'Have User']);
                    }
                    else{
                    $qu = "Insert into customer(fname,lname,email,password,full_address,pincode,city,state) values('$First_Name','$Last_Name','$Email_Id','$Password','$full_address',$pincode,'$city','$state')";
                    $res = mysqli_query($this->Conn,$qu);
                    if($res)
                    {
                        echo json_encode(['result'=>'Insert Succfully']);
                    }
                    else
                    {
                        echo json_encode(['result'=>'Not Insert']);
                    }
                }
            }
            public function signin_user($Email_Id, $Password) {
                $this->Connection();
    
                $query = "SELECT * FROM customer WHERE email='$Email_Id';";
    
                $res = mysqli_query($this->Conn, $query);  // obj of mysqli_result class
    
                if(mysqli_num_rows($res) != 0)
                {
                    $query1 = "SELECT * FROM customer WHERE password='$Password' and email='$Email_Id';";
    
                    $res1 = mysqli_query($this->Conn, $query1); 

                    if(mysqli_num_rows($res1) != 0)
                    {
                        echo json_encode(['result'=>'Login Succfully']);
                    }  
                    else{
                        echo json_encode(['result'=>'Password Not Match']);
                    }
                }
                else{
                    echo json_encode(['result'=>'Not email fount Singup...']);
                }            
            }

            public function getProduct()
            {
                $this->Connection();
    
                $query = "SELECT * FROM product p, categories c, brand b,topsize t,bottomsize bo,colors cs  WHERE p.categories_id = c.categories_id and p.brand_id = b.brand_id and p.topsize_id =t.topsize_id and p.bottomsize_id = bo.bottomsize_id and p.color_id=cs.color_id";
                // $query = "select * from product ";
                $res = mysqli_query($this->Conn, $query);  

                $arry = [];
               if($res)
               {   
                while($data = mysqli_fetch_assoc($res))
                {
                     array_push($arry,$data);
                }
                echo json_encode($arry);
            }
            else
            {
                echo json_encode(['result' => 'selection failed']);
            }
            }
    }

?>