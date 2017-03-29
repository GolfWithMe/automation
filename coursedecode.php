<?php

    include "../configuration.php";
    include 'courseClass.php';
    include 'swingBySwingClass.php'; 
    include "common.php";
    
    $crsCls = new courseClass();
    $sbsCls = new swingBySwingClass();
    
    $crsCls->SetPrefix($DBPrefix);
    
    $query = "Select * from " . $DBPrefix . "_gwm_zipcodes where Status='2'";
    $request = mysql_query($query);

    $sbsCls->setToken('28f455e9-dc7b-46f8-8dd5-4047f1b49e6c');
    
    While ($Ziprs = mysql_fetch_array($request)) {
    
        $sbsCls->setLatLon('39.353204', '-77.656983');
        
        echo ($sbsCls->searchByLocation());

        $contents = $sbsCls->getCourseData();

        $decoded = json_decode($contents, true);

        foreach ($decoded["courses"] as $course) {
                if ($crsCls->CourseExists(1, $course["id"])) {
                        $crsCls->UpdateCourse($course);
                } else {
                        $crsCls->InsertCourse($course);
                }
        } 
        
        $query = "Update " . $DBPrefix . "_gwm_zipcodes set Status='1' where uid='" . $Ziprs["uid"] . "'";
        $request = mysql_query($query);
    }
?>
