<?php

    include "../configuration.php";
    include 'courseClass.php';
    $crsCls = new courseClass();
    
    $crsCls->SetPrefix("akzwy");

    $filename  = "courselist.json";

    $infile = fopen($filename,"r");

    $contents = fread($infile, filesize($filename));

    $decoded = json_decode($contents, true);

    //var_dump($decoded["courses"][0]["name"]);

    foreach ($decoded["courses"] as $course) {
            if ($crsCls->CourseExists(1, $course["id"])) 
                    $crsCls->UpdateCourse($course);
            else
                    $crsCls->InsertCourse($course);
            //echo $course["name"] . "\r\n";
    }

    //echo $decoded["courses"][0]["name"];

    fclose($infile);
?>
