<?php

/*
* Retrieving data from wacky server.
*/
class Wacky extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /*
    * Returns airlines from wacky server.
    */
    public function getAirlines()
    {
        return json_decode(curl_get_contents(WACKY_AIRLINES_URL));
    }

    /*
    * Returns airports from wacky server.
    */
    public function getAirports()
    {
        return json_decode(curl_get_contents(WACKY_AIRPORTS_URL));
    }

    /*
    * Returns airplanes from wacky server.
    */
    public function getAirplanes()
    {
        return json_decode(curl_get_contents(WACKY_AIRPLANES_URL));
    }

    /*
    * Returns regions from wacky server.
    */
    public function getRegions()
    {
        return json_decode(curl_get_contents(WACKY_REGIONS_URL));
    }

    /*
    * Returns airline by id from wacky server.
    */
    public function getAirline($id)
    {
        return json_decode(curl_get_contents(WACKY_AIRLINES_URL . $id));
    }

    /*
    * Returns airport by id from wacky server.
    */
    public function getAirport($id)
    {
        return json_decode(curl_get_contents(WACKY_AIRPORTS_URL . $id));
    }

    /*
    * Returns airplane by id from wacky server.
    */
    public function getAirplane($id)
    {
        return json_decode($this->curl_get_contents(WACKY_AIRPLANES_URL . $id));
    }

    /*
    * Returns region by id from wacky server.
    */
    public function getRegion($id)
    {
        return json_decode(curl_get_contents(WACKY_REGIONS_URL . $id));
    }
    
    function curl_get_contents($url)
    {
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
      $data = curl_exec($curl);
      curl_close($curl);
      return $data;
    }
}
