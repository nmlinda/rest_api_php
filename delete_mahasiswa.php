<?php
    include 'db_connect.php';

    $postdata = file_get_contents("php://input");
    $id_mahasiswa = "";

    if (isset($postdata)) {
        $request = json_decode($postdata);
        $id_mahasiswa = $request->id_mahasiswa;

        if($request){
            $query = mysqli_query($connect, "DELETE FROM mahasiswa WHERE id_mahasiswa = '$id_mahasiswa' ");

            if($query){
                $data =array(
                    'message' => "Delete succesfully",
                    'status' => "200"
                );
            }
            else{
                $data =array(
                    'message' => "Failed!",
                    'status' => "404"
                );
                    
            }
        }
        else {
            $data =array(
                'message' => "No Data!",
                'status' => "503"
            ); 
        }          
        
    }
    
    echo json_encode($data);

?>