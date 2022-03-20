<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Post;
use App\Models\PostDetail;
use App\Models\PostType;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Add extends Component
{
    use WithFileUploads;

    protected $proxies = '*';

    public $page = 'post';
    public $input = [];
    public $deskripsi = [];
    public $title, $tag, $foto;

    protected $rules = [
        'title' => 'required|unique:posts',
        // 'tag' => 'required',
    ];

    public function render()
    {
        // $des[] = [
        //     // 'deskripsi' => 'isian data',
        //     'type' => 'text'
        // ];

        // $des = [];

        // $data[] = [
        //     // 'deskripsi' => 'isian heading',
        //     'type' => 'text'
        // ];

        // $result = array_merge($des, $data);

        // // unset($result[0]);

        // $result = array_values($result);

        // dd($result);


        return view('livewire.admin.post.add');
    }

    public function store()
    {
        $this->validate();

        $data = [];
        foreach($this->deskripsi as $key => $val) {
            $keys = array_keys($val);

            $data[] = $this->getDeskripsi($keys[0], $val, $key);

            // $data['file']->storeAs($folder, $name);
            // $data[] = $val[$keys[0]];
            // dd($keys[0]);
            // dd($val);
            // dd($keys[0]);
        }

        // $user = Auth::user()->id;
        $user = 1;
        $slug = Str::slug($this->title);

        $foto = '';
        if($this->foto) {
            $folder = "Thumbnail/" . date('Y/M/d/');
            $name = time() . "." . $this->foto->getClientOriginalExtension();
            $foto = $folder.$name;
        }

        $post = [
            'users_id' => $user,
            'title' => $this->title,
            'slug' => $slug,
            'thumbnail' => $foto,
            'click_view' => 0,
            'priority' => 0,
            'status' => 'Publik',
            'flag_aktif' => 1,
        ];

        // dd($data);

        DB::beginTransaction();
        try {

            $postId = Post::create($post);

            if($data) {
                foreach($data as $val) {

                    switch ($val) {
                        case "red":
                            echo "Your favorite color is red!";
                            break;
                        case "blue":
                            echo "Your favorite color is blue!";
                            break;
                        case "green":
                            echo "Your favorite color is green!";
                            break;
                        default:
                            echo "Your favorite color is neither red, blue, nor green!";
                    }

                    // PostDetail::create($data);
                }
            }

            DB::commit();
            session()->flash('success', 'Data Berhasil Disimpan.');
            return redirect()->route('tag.index');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            session()->flash('error', 'Gagal tambah data !');
        }
    }

    public function add($type)
    {
        $data = $this->input;
        $detail[] = [
            'type' => $type
        ];

        $this->input = array_merge($data, $detail);
    }

    public function remove($key)
    {
        unset($this->input[$key]);
    }

    public function getDeskripsi($keys, $value, $index)
    {
        $type = PostType::where('name_type', $keys)->first();

        switch ($keys) {
            case "Teks":
            case "Heading":
            case "Video":
                $data = [
                    'types_id' => $type->id,
                    'order' => $index + 1,
                    'contents' => $value[$keys],
                ];
                break;
            case "Link":
                $data = [
                    'types_id' => $type->id,
                    'order' => $index + 1,
                    'contents' => [
                        'link' => $value[$keys]['link'],
                        'name' => $value[$keys]['name'],
                    ],
                ];
                break;
            case "Image":
            case "Audio":
                $folder = "$keys/" . date('Y/M/d/');
                $name = time() . "." . $value[$keys]->getClientOriginalExtension();
                $data = [
                    'types_id' => $type->id,
                    'order' => $index + 1,
                    'contents' => $folder . $name,
                    'file' => $value[$keys],
                    'folder' => $folder,
                    'name' => $name,
                ];
                break;
        }

        return $data;
    }
}
