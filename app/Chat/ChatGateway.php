<?php
namespace App\Chat ; 

interface ChatEntry {
	public function charge($amount,$token,$destinationId)  ; 
}