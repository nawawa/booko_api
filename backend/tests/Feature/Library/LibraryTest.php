<?php

namespace Tests\Feature\Library;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Library\TestCase\LibraryTestCase;

use App\Models\Library;

class LibraryTest extends LibraryTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @test
     * @dataProvider createLibraryDataProvider
     */
    public function 新規ライブラリー作成($input, $expect)
    {
        $param = ($input) ? $input: $this->library_param;
        $resource = ($expect) ? $expect: $this->library_resource;

        $response = $this->postJson($this->api_route, ['library_data' => $param]);
        $response
            ->assertStatus(201)
            ->assertExactJson($resource);

        $this->assertDatabaseHas('libraries', $param);
    }
    public function createLibraryDataProvider()
    {
        return [
            '正常にインサートされる' => ['', ''],
        ];
    }

    /**
     * @test
     */
    // public function ライブラリー取得()
    // {
        // GET
        // assertStatus
        // assertExactJson
    // }

    /**
     * @test
     */
    // public function ライブラリー更新()
    // {
        
    // }

    /**
     * @test
     */
    // public function ライブラリー削除()
    // {
        
    // }
}
