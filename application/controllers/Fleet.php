<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * This class represents the fleet page of our airport info site.
 * @author Sergey Bukharov, Karl Diab, Tim Davis, Jonathan Heggen, Kuanysh Boranbayev
 */
class Fleet extends Application
{
        
    /**
     * Index Page for this controller that grabs all planes from the fleet and renders the fleet view
     *
     * Maps to the following URL
     * 		http://comp4711.local/fleet
     */
    public function index()
    {
        //validate current role & generate content accordingly
        $role = $this->session->userdata('userrole');
        if ($role == ROLE_OWNER) {
            $this->data['modebutton'] = '<a href="/roles/actor/Guest" class="btn btn-info" role="button">Mode: Admin</a>';
            $this->data['modebutton'] .= $this->parser->parse('addfleet',[], true);
            // Get all planes in our fleet model
            $fleet = $this->fleetmdl->all();
            $this->data['pagebody'] = 'fleetadmin';
        } else {
            $this->data['modebutton'] = '<a href="/roles/actor/Owner" class="btn btn-info" role="button">Mode: User</a>';
            // Get all planes in our fleet model
            $fleet = $this->fleetmdl->all();
            $this->data['pagebody'] = 'fleet';
        }
            $this->data['fleet'] = $fleet;
            $this->render();
    }

    // Subcontroller to get a single plane from its id and renders its details in the plane view.
    public function show($planeid)
    {
        //validate current role & generate content accordingly
        $role = $this->session->userdata('userrole');
        if ($role == ROLE_OWNER) {
            //All the data points to display
            $plane = $this->fleetmdl->get($planeid);
            $this->data['pagebody'] = 'planeedit';
        } else {
            //All the data points to display
            $plane = $this->fleetmdl->get($planeid);
            $this->data['pagebody'] = 'plane';
        }
        
        $this->data['id'] = $plane['id'];
        $this->data['make'] = $plane['make'];
        $this->data['model'] = $plane['model'];
        $this->data['price'] = $plane['price'];
        $this->data['seats'] = $plane['seats'];
        $this->data['reach'] = $plane['reach'];
        $this->data['cruise'] = $plane['cruise'];
        $this->data['takeoff'] = $plane['takeoff'];
        $this->data['hourly'] = $plane['hourly'];
        
        
        //Display the data
        $this->render();
    }
    
    public function add()
    {
        $plane = $this->fleetmdl->__construct();
        $this->session->set_userdata('plane', $plane);
        $this->showit();
    }
    
    public function edit($id = null)
    {   
        if ($id == null)
            redirect('/fleet');
        $plane = $this->fleetmdl->get($id);
        $this->session->set_userdata('plane', $plane);
        $this->showit();
    }
    
    // Render the current DTO
    private function showit()
    {
        $this->load->helper('form');
        $plane = $this->session->userdata('plane');
        $this->data['id'] = $plane['id'];

        // if no errors, pass an empty message
        if ( ! isset($this->data['error']))
            $this->data['error'] = '';

        $fields = array(
            'fid'      => form_label('ID') . form_input('plane', $plane['id']),
            'fmake'      => form_label('Make') . form_input('plane', $plane['make']),
            'fmodel'      => form_label('Model') . form_input('plane', $plane['model']),
            'fprice'      => form_label('Price') . form_input('plane', $plane['price']),
            'fseats'      => form_label('Seats') . form_input('plane', $plane['seats']),
            'freach'      => form_label('Reach') . form_input('plane', $plane['reach']),
            'fcruise'      => form_label('Cruise') . form_input('plane', $plane['cruise']),
            'ftakeoff'      => form_label('Takeoff') . form_input('plane', $plane['takeoff']),
            'fhourly'      => form_label('Hourly') . form_input('plane', $plane['hourly']),
            'zsubmit'    => form_submit('submit', 'Update Fleet'),
        );
        $this->data = array_merge($this->data, $fields);

        $this->data['pagebody'] = 'planeedit';
        $this->render();
    }
    
    // handle form submission
    public function submit()
    {
        // setup for validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->fleetmdl->rules());

        // retrieve & update data transfer buffer
        $plane = (array) $this->session->userdata('plane');
        $plane = array_merge($plane, $this->input->post());
        $plane = (object) $plane;  // convert back to object
        $this->session->set_userdata('plane', (object) $plane);

        // validate away
        if ($this->form_validation->run())
        {
            if ($this->fleetmdl->update($plane)) {
            $this->alert('Plane ' . $plane['id'] . ' updated', 'success');
        } else
        {
            $this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
        }
        $this->showit();
        }
    }
    
    // build a suitable error mesage
    function alert($message) {
        $this->load->helper('html');        
        $this->data['error'] = heading($message,3);
    }
        
    // Forget about this edit
    function cancel() {
        $this->session->unset_userdata('plane');
        redirect('/fleet');
    }
    
    // Delete this item altogether
    function delete()
    {
        $dto = $this->session->userdata('plane');
        $plane = $this->fleetmdl->get($dto['id']);
        $this->fleetmdl->delete($plane['id']);
        $this->session->unset_userdata('plane');
        redirect('/fleet');
    }

}
