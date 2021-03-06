<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of swingBySwingClass
 *
 * @author jmyer118
 */
class swingBySwingClass {
    //put your code here
    private $token;
    private $latitude;
    private $longitude;
    private $maxResults = 0;
    private $range = 50;
    private $results;
    
    
    function setToken($tokenValue)
    {
        $this->token = $tokenValue;
    }
    
    function setLatLon($lat, $lon) 
    {
        $this->latitude = $lat;
        $this->longitude = $lon;
    }
    
    function setMaxResults($max)
    {
        $this->maxResults = $max;
    }
    
    function setRange($rng)
    {
        $this->range = $rng;
    }
    
    function searchByLocation()
    {
        if (trim($this->token) == "")
            return -2;
        
        if (trim($this->latitude) == "" || trim($this->longitude) == "")
            return -3;
        
        $requestURL = "https://api.swingbyswing.com/v2/courses/" . 
                "search_by_location?lat=" . $this->latitude . "&lng=" . $this->longitude;
                
        if ($this->results > 0) {
            $requestURL .= "&" . $this->results;
        }
        
        if ($this->range > 0) {
            $requestURL .= "&radius=" . $this->range;
        }
        
        $requestURL .= "&access_token=" . $this->token;
        
        echo $requestURL . "\r\n";
        
        $this->results = file_get_contents($requestURL);
    }
    
    function getCourseByID($id)
    {
        
    }
    
    function getCourseData()
    {
        return $this->results;
    }
}
