<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class StorageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_storage_store_two_images_to_images_disk()
    {
        $fake = Storage::fake('images');

        $response = $this->json('POST', '/photos', [
            UploadedFile::fake()->image('photo1.jpg'),
            UploadedFile::fake()->image('photo2.jpg')
        ]);

        // Assert one or more files were stored...
        $fake->assertExists('photo1.jpg');
        $fake->assertExists(['photo1.jpg', 'photo2.jpg']);

        // Assert one or more files were not stored...
        $fake->assertMissing('missing.jpg');
        $fake->assertMissing(['missing.jpg', 'non-existing.jpg']);
    }
}
