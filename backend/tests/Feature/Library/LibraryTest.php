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
        $resource = ($expect) ? $expect: $this->expectLibraryResource($this->library_param);

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
    public function ライブラリー取得()
    {
        $response = $this->getJson($this->api_route . '/' . $this->library->uuid);
        $response
            ->assertStatus(200)
            ->assertExactJson(
                $this->expectLibraryResource($this->library->toArray())
            );
    }

    /**
     * @test
     * @dataProvider updateLibraryDataProvider
     */
    public function ライブラリー更新($param)
    {
        $updated_library_param = array_replace($this->library->toArray(), $param);
        
        $response = $this->putJson($this->api_route . '/' . $this->library->uuid, [
            'library_data' => $this->createRequestParamArray($updated_library_param)
        ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(
                $this->expectLibraryResource($updated_library_param)
            );
    }
    public function updateLibraryDataProvider()
    {
        return [
            '名前を更新' => [['name' => '図書館名を更新するテスト']],
        ];
    }

    /**
     * @test
     */
    // public function ライブラリー削除()
    // {
        
    // }
}
