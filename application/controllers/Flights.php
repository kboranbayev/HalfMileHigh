<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * This class represents an information flights page on our airport info site.
 * 
 * @author Sergey Bukharov, Karl Diab, Tim Davis, Jonathan Heggen, Kuanysh Boranbayev
 */
class Flights extends Application
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://comp4711.local/flights
     */
    
   public function index()
    {
        //validate current role & generate content accordingly
        $role = $this->session->userdata('userrole');
        if ($role == ROLE_OWNER) {
            $this->data['modebutton'] = '<a href="/roles/actor/Guest" class="btn btn-info" role="button">Mode: Admin</a>';
            $this->data['modebutton'] .= $this->parser->parse('addflight',[], true);
            // Get all planes in our flight model
            $source = $this->flightsmdl->all();
            $this->data['pagebody'] = 'flightsadmin';
        } else {
            $this->data['modebutton'] = '<a href="/roles/actor/Owner" class="btn btn-info" role="button">Mode: User</a>';
            // Get all planes in our flight model
            $source = $this->flightsmdl->all();
            $this->data['pagebody'] = 'flights';
        }
            $this->data['flights'] = $source;
            $this->render();
    }
    
    public function add()
    {
        $flight = $this->flightsmdl->__construct();
        $this->session->set_userdata('flight', $flight);
        $this->showit();
    }
    
    public function edit($id = null)
    {   
        if ($id == null)
            redirect('/fleet');
        $flight = $this->flightsmdl->get($id);
        
        
        $this->session->set_userdata('flight', $flight);
        $this->showit();
    }
    
    // Render the current DTO
    private function showit()
    {
        $this->load->helper('form');
        $flight = (array)$this->session->userdata('flight');
        $this->session->set_userdata('flight', $flight);

        $this->data['id'] = $flight['id'];

        // if no errors, pass an empty message
        if ( ! isset($this->data['error']))
            $this->data['error'] = '';
        
        $fields = array(
            'fid'      => form_label('Id') . form_input('id', $flight['id']),
            'ffrom'      => form_label('From') . form_input('from', $flight['from']),
            'fto'      => form_label('To') . form_input('to', $flight['to']),
            'fdistance'      => form_label('Distance') . form_input('distance', $flight['distance']),
            'fdate'      => form_label('Date') . form_input('date', $flight['date']),
            'fdeparture'      => form_label('Departure') . form_input('departure', $flight['departure']),
            'farrival'      => form_label('Arrival') . form_input('arrival', $flight['arrival']),
            'faccode'      => form_label('Aircraft Code') . form_input('accode', $flight['accode']),
            'faccode'      => form_label('Aircraft Code') . form_input('accode', $flight['accode']),
            'zsubmit'    => form_submit('submit', 'Update Flight'),
        );
        $this->data = array_merge($this->data, $fields);

        $this->data['pagebody'] = 'flightedit';
        $this->render();
    }
    
    // handle form submission
    public function submit()
    {
        

        // setup for validation
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->flightsmdl->rules());
        
        
        
        // retrieve & update data transfer buffer
        $flight = (array) $this->session->userdata('flight');
        $flight = array_merge($flight, $this->input->post());
        $flight = (object) $flight;  // convert back to object
        $this->session->set_userdata('flight', (object) $flight);

        // validate away
        if ($this->form_validation->run())
        {
            $this->alert('Flight ' . $flight->id . ' updated successfully.', 'success');
            $this->flightsmdl->update($flight);
        } else {
            $this->alert('<strong>Validation errors, see below: <strong><br>' . validation_errors(), 'danger');
        }
        //$flight["id"] = $plane['id'];
        $this->session->set_userdata('flight', $flight);

        
        $this->showit();         
    }
    
    // build a suitable error mesage
    function alert($message) {
        $this->load->helper('html');        
        $this->data['error'] = heading($message,3);
    }
        
    // Forget about this edit
    function cancel() {
        $this->session->unset_userdata('flight');
        redirect('/flights');
    }
    
    // Delete this item altogether
    function delete()
    {
        $dto = $this->session->userdata('flight');
        $flight = $this->flightsmdl->get($dto['accode']);
        $this->flightsmdl->delete($flight['accode']);
        $this->session->unset_userdata('flight');
        redirect('/flights');
    }
    

}
