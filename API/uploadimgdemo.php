<?php


 if (!empty($_FILES['club_image']) && !empty($_REQUEST['USER_MOBILE'])) {
            $USER_MOBILE = $_REQUEST['USER_MOBILE'];
           // $source = $_REQUEST['sourcetype'];
           
            $errors = array();
            $file_name = $_FILES['club_image']['name'];
            $file_size = $_FILES['club_image']['size'];
            $file_tmp  = $_FILES['club_image']['tmp_name'];
            $file_type = $_FILES['club_image']['type'];
            $file_ext  = strtolower(end(explode('.', $_FILES['club_image']['name'])));
            $random1   = rand(10, 100000);
            $file_name = $USER_MOBILE . '_' . $random1 . '_' . $file_name;
            $expensions = array("jpeg", "JPG", "png", "JPEG", "jpg", "gif", "GIF", "PNG");
            $uploads_dir = $_SERVER['DOCUMENT_ROOT'] . "/uploads";
 $uploads_dir1="http://" . $_SERVER['SERVER_NAME']."/uploads";
           
            if($file_size > 10242880)
            {
                $msg = "File is too large. File must be less then 5MB";
                $data = array('User' => '');
                $data += array('msg' => $msg, 'status' => '0');
                $result = json_encode($data);
                echo $result;
            } 

           if (in_array($file_ext, $expensions) === false) {
                $msg = "Extension not allowed, Please choose a (jpeg,png,gif)  file.";
                $data = array('User' => '');
                $data += array('msg' => $msg, 'status' => '0');
                $result = json_encode($data);
                echo $result;
            } else {
                

              //compress($file_tmp, $uploads_dir . '/' . $file_name, 100);




$status = move_uploaded_file($file_tmp, $uploads_dir . '/' . $file_name);

                  /*  $data = array('User' => '');
                    $msg = 'Image Uploaded Successfully.';
                     $pathimg= ''. $uploads_dir1. '/' . $file_name;
                    $data += array('msg' => $msg,'pathimg' => $pathimg, 'status' => True);
                    $result = json_encode($data);*/
                    //echo $result;
 $msg = "File  Upload SuccessFully";
                $data = array('User' => '');
                $data += array('msg' => $file_name, 'status' => '1');
                $result = json_encode($data);
                echo $result;
                }
        }
       // die;

function compress($source, $destination, $quality) {

		$info = getimagesize($source);

		if ($info['mime'] == 'image/jpeg') 
			$image = imagecreatefromjpeg($source);

		elseif ($info['mime'] == 'image/gif') 
			$image = imagecreatefromgif($source);

		elseif ($info['mime'] == 'image/png') 
			$image = imagecreatefrompng($source);

		imagejpeg($image, $destination, $quality);

		return $destination;
	}
   ?>