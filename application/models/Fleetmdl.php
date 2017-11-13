<?php

require_once(APPPATH . 'models/Plane.php');
require_once(APPPATH . 'models/Wacky.php');

/**
 * This is a fleet model that stores information about the airplanes available
 * to Dove Airlines, including their id, manufacturer, model, price, # seats, reach,
 * cruise speed, takeoff speed, and hourly cost to operate.
 *
 * @author Sergey Bukharov, Karl Diab, Tim Davis, Jonathan Heggen, Kuanysh Boranbayev
 */
class Fleetmdl extends CSV_Model
{
    public $data;

    public function __construct()
    {
        parent::__construct(APPPATH . '/data/fleet.csv', 'id');

        $this->data = $this->all();
    }

    /**
     * Returns a single plane by id from API.
     */
    public function get($id, $key2 = null)
    {
        $wackyServer = new Wacky();

        $localPlane = parent::get($id, $key2);
        $remotePlane = $wackyServer->getAirplane($id);

        foreach (get_object_vars($remotePlane) as $prop => $val) {
          if (!property_exists($localPlane, $prop)) {
              $localPlane->$prop = $val;
          }
        }

				return $remotePlane;
    }

    /**
     * Returns a single plane by id from csv file
     * @return result holds data or null if not found
     */
    public function getPlane($id) {
        $result = array();
		foreach ($this->all() as $plane) {
			if (strcasecmp($plane->id, $id) == 0) {
				$result = (array)$plane;
				break;
			} else {
				$result = null;
			}
		}
		return $result;
    }

    // provide form validation rules
    public function rules()
    {
        $config = array(
                ['field' => 'id', 'label' => 'id', 'rules' => 'alpha_numeric_spaces|max_length[4]'],
                ['field' => 'manufacturer', 'label' => 'manufacturer', 'rules' => 'alpha_numeric_spaces|max_length[12]'],
                ['field' => 'model', 'label' => 'model', 'rules' => 'alpha_numeric_spaces|max_length[12]'],
                ['field' => 'price', 'label' => 'price', 'rules' => 'integer|less_than[6]'],
                ['field' => 'seats', 'label' => 'seats', 'rules' => 'integer|less_than[4]'],
                ['field' => 'reach', 'label' => 'reach', 'rules' => 'integer|less_than[10]'],
                ['field' => 'cruise', 'label' => 'cruise', 'rules' => 'integer|less_than[10]'],
                ['field' => 'takeoff', 'label' => 'takeoff', 'rules' => 'integer|less_than[6]'],
                ['field' => 'hourly', 'label' => 'hourly', 'rules' => 'integer|less_than[6]'],
            );
        return $config;
    }
}
