<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Illuminate\Foundation\Testing\DatabaseTransactions;

use TestCase;

class AgendaTest extends TestCase {

    use WithoutMiddleware;
    use DatabaseTransactions;

    public function testDashboard() {
//        $this->withoutMiddleware();
        $this->visit('/admin/agenda')
                ->see('Mes rendez-vous')
                ->see('Tableau de bord');
    }

    /**
     * Get number of appointments.
     *
     * @return void
     */
    public function testAppointments() {
//        $this->withoutMiddleware();
        // check number of appointments today
//        $this->assertTrue(true);
        
//        $this->visit('api/get-statistics')->see('"RDV":2');
    }
    
    /**
     * Add a new appointment
     */
    public function testAddAppointment() {
        
    }

}
