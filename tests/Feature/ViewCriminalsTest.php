<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewCriminalsTest extends TestCase
{
    /**@test*/
    /*A user can see all criminals listed..*/
    public function guests_cannot_view_criminals()
    {
        /*when we visit on the /criminals route*/
        $response = $this->get('/criminals');

        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
    
}

