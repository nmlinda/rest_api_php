<?php

  include 'db_connect.php';

    $postdata = file_get_contents("php://input");
    $id_mahasiswa = "";
    $nim = "";
    $nama ="";
    $alamat = "";

    if (isset($postdata)) {
        $request = json_decode($postdata);
        $id_mahasiswa = $request->id_mahasiswa;
        $nim = $request->nim;
        $nama = $request->nama;
        $alamat = $request->alamat;
        
        if($request){
            $query_register = mysqli_query($connect,"UPDATE mahasiswa SET nim = '$nim', nama = '$nama', alamat = '$alamat' WHERE id_mahasiswa = '$id_mahasiswa'");

            if($query_register){
         
                 $data =array(
                     'message' => "Register Success!",
                     'status' => "200"
                 );
             }
             else {
                 $data =array(
                     'message' => "Register Failed!",
                     'status' => "404",
                     'errornih' => $query_register
                 ); 
             }
        }
        else{
            $data =array(
                'message' => "No Data!",
                'status' => "503"
            ); 
        }
        
            

        echo json_encode($data);
    }
?>
