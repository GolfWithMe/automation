<?php


/**
 * Description of courseClass
 *
 * @author jmyer118
 */
class courseClass {
    //put your code here
    private $dbPrefix = "";
    
    function InsertCourse($course) 
    {
        $membrtype = "1";
        
        $query = "insert into " . $this->dbPrefix . "_gwm_courses (Source, SourceID, Name, URL, MembershipType, Holes, LocalRank, "
                . "LocalMaxRank, Address1, City, State, Country, ZipCode, Lat, Lon, Phone, Inserted, Status) values ('1', '" .
                $course["id"] . "', '" . $course["name"] . "', '" . $course["website"] . "', '" . $membrtype . "', '" .
                $course["hole_count"] . "', '" . $course["local_rank"] . "', '" . $course["local_max_rank"] . "', '" .
                $course["addr_1"] . "', '" . $course["city"] . "', '" . $course["state_or_province"] . "', '" .
                $course["country"] . "', '" . $course["zip_code"] . "', '" . $course["location"]["lat"] . "', '" .
                $course["location"]["lng"] . "', '" . $course["phone"] . "', '" . date("Y-m-d H:i:s") . "', '1')";
        echo $query . "\r\n";
        
        //$result = mysql_execute($query);
    }

    function UpdateCourse($course)
    {
    }

    function CourseExists($source, $id)
    {
        $query = "Select * from " . $this->dbPrefix . "_gwm_courses where Source='" . $source . "' and SourceID='" . $id . "'";
        //$result = mysql_execute($query);
        
        return false;
        
        if (mysql_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
        
    }
    
    function SetPrefix($prefix)
    {
        $this->dbPrefix = $prefix;
    }
    
}
