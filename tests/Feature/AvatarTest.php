<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;

class AvatarTest extends TestCase
{
    use RefreshDatabase;

    public function an_admin_can_add_an_avatar_for_a_specific_criminal()
    {
    	$this->signIn();    	
        Storage::fake('public');
        $this->json('POST', route('avatar', auth()->id()), [
    		'avatar' => $file = UploadedFile::fake()->image('avatar.jpg')
    	]);
        $this->assertEquals(asset('avatars/'.$file->hashName()), auth()->user()->avatar_path);	    
        Storage::disk('public')->assertExists('avatars/' . $file->hashName());

    }

}
