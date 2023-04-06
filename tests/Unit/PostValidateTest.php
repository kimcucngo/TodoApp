<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use App\Http\Requests\PostTaskRequest;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;
class PostValidateTest extends TestCase
{
   
    // public function testPostValidation(): void
    // {
    //     $object = new PostTaskRequest;
    //     $data = [
    //         'title' => 'hsk',
    //         'is_done' => '1'
    //     ];
    //     $validator = Validator::make($data,$object->rules());
    //     $result = $validator->passes();
    //     $this->assertEquals($result,false);
    // }

     /**
     * @dataProvider data
     */
    public function testPostValidation($title, $is_done, $expect): void
    {
        $object = new PostTaskRequest;
        $data = [
            'title' => $title,
            'is_done' => $is_done
        ];
        $validator = Validator::make($data,$object->rules());
        $result = $validator->passes();
        $this->assertEquals($result,$expect);
    }

    public function data() {
        return [
            ['hsk','1',false],
            ['hsksadsadas','1',true],
            ['','',false],
        ];
    }
}