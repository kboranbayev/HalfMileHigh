<?php
include('Entity.php');

/**
 *  Incomplete!
 * 
 * @author Sergey Bukharov, Karl Diab, Tim Davis, Jonathan Heggen, Kuanysh Boranbayev
 */
class Fleet extends Entity {
    private $id;      // holds aircraft code
    private $manufacturer;    // holds manufacturer company of a plane
    private $model;   // holds plane model
    private $price;   // holds price 
    private $seats;   // holds total seats of a plane
    private $reach;   // holds a reachable altitude of a plane
    private $cruise;  // holds cruise
    private $takeoff; // holds takeoff 
    private $hourly;  // holds hourly
    private $key;     // holds unique key identifier for a plane

    /**
     * Setter for plane id
     * @param string $id
     */
    public function setId($id) {
      $this->id = $id;
    }
  
    /**
     * Getter for plane id
     * @return string $id
     */
    public function getId() {
      return $this->id;
    }

    /**
     * Setter for plane manufacturer
     * @param string $manufacturer
     */
    public function setManufacturer($manufacturer) {
      $this->manufacturer = $manufacturer;
    }
  
    /**
     * Getter for plane manufacturer
     * @return string $manufacturer
     */
    public function getManufacturer() {
      return $this->manufacturer;
    }

    /**
     * Setter for plane model
     * @param string $model
     */
    public function setModel($model) {
      $this->model = $model;
    }
  
    /**
     * Getter for plane model
     * @return string $model
     */
    public function getModel() {
      return $this->model;
    }
    
    
    public function setPrice($price) {
      $this->price = $price;
    }
  
    /**
     * Getter for plane seat price
     * @return int $price
     */
    public function getPrice() {
      return $this->price;
    }
    
    /**
     * Setter for total plane seats
     * @param int $seats
     */
    public function setSeats($seats) {
      $this->seats = $seats;
    }
  
    /**
     * Getter for total plane seats
     * @return int $seats
     */
    public function getSeats() {
      return $this->seats;
    }

    /**
     * Setter for plane flying altitude
     * @param int $reach
     */
    public function setReach($reach) {
      $this->reach = $reach;
    }
  
    /**
     * Getter for plane flying altitude
     * @return int $reach
     */
    public function getReach() {
      return $this->reach;
    }

    /**
     * Setter for cruise
     * @param int $cruise
     */
    public function setCruise($cruise) {
      $this->cruise = $cruise;
    }
  
    /**
     * Getter for cruise
     * @return int $cruise
     */
    public function getCruise() {
      return $this->cruise;
    }
    
    /**
     * Setter for plane takeoff
     * @param int $takeoff
     */
    public function setTakeoff($takeoff) {
      $this->takeoff = $takeoff;
    }
  
    /**
     * Getter for plane takeoff
     * @return int $takeoff
     */
    public function getTakeoff() {
      return $this->takeoff;
    }

    /**
     * Setter for hourly
     * @param int $hourly
     */
    public function setHourly($hourly) {
      $this->hourly = $hourly;
    }
  
    /**
     * Getter for plane hourly
     * @return int $hourly
     */
    public function getHourly() {
      return $this->hourly;
    }
    
    /**
     * Setter for unique plane key
     * @param int $key
     */
    public function setKey($key) {
      $this->key = $key;
    }
  
    /**
     * Getter for unique plane key
     * @return int $key
     */
    public function getKey() {
      return $this->key;
    }
}