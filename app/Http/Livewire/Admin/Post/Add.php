<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Post;
use App\Models\PostDetail;
use App\Models\PostTag;
use App\Models\PostType;
use App\Models\Tag;
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
    public $tagId = [];
    public $title, $foto, $tags, $metaDesc;

    protected $rules = [
        'title' => 'required|unique:posts',
        'tag' => 'required',
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

        $this->tags = Tag::orderBy('name_tag', 'ASC')->get();

        return view('livewire.admin.post.add');
    }

    public function store()
    {
        // $this->validate();

        // dd($this->tagId);

        $keyword = '';
        if ($this->tagId) {
            foreach ($this->tagId as $index => $val) {
                $keys = Tag::find($val);

                if(count($this->tagId) == $index + 1){
                    $keyword .= "$keys->keyword";
                } else {
                    $keyword .= "$keys->keyword, ";
                }
            }
        }

        $data = [];
        foreach($this->deskripsi as $key => $val) {
            $keys = array_keys($val);

            $data[] = $this->getDeskripsi($keys[0], $val, $key);
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
            'meta_desc' => $this->metaDesc,
            'meta_keys' => $keyword,
            'flag_aktif' => 1,
        ];

        DB::beginTransaction();
        try {

            $postId = Post::create($post);

            if ($this->tagId) {
                foreach ($this->tagId as $val) {
                    $tag = [
                        'posts_id' => $postId->id,
                        'tags_id' => $val
                    ];

                    PostTag::create($tag);
                }
            }

            if($this->foto) {
                $this->foto->storeAs('public/'.$folder, $name);
            }

            if($data) {
                $result = [];
                foreach($data as $val) {

                    switch ($val['keys']) {
                        case "Teks":
                        case "Heading":
                        case "Video":
                            $result[] = [
                                'posts_id' => $postId->id,
                                'types_id' => $val['types_id'],
                                'order' => $val['order'],
                                'contents' => $val['contents'],
                            ];
                            break;
                        case "Link":
                            $result[] = [
                                'posts_id' => $postId->id,
                                'types_id' => $val['types_id'],
                                'order' => $val['order'],
                                'contents' => json_encode($val['contents']),
                            ];
                            break;
                        case "Image":
                            $result[] = [
                                'posts_id' => $postId->id,
                                'types_id' => $val['types_id'],
                                'order' => $val['order'],
                                'contents' => $val['contents'],
                            ];

                            $val['file']->storeAs('public/'.$val['folder'], $val['name']);
                            break;
                    }

                }
                PostDetail::insert($result);
            }

            DB::commit();
            session()->flash('success', 'Data Berhasil Disimpan.');
            return redirect()->route('post.index');
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
                    'keys' => $keys,
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
                    'keys' => $keys,
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
                    'keys' => $keys,
                ];
                break;
        }

        return $data;
    }

    public function select($item)
    {
        if ($item) {
            $this->tagId = Tag::find($item);
            $this->emit('selected', $this->tagId->id);
        } else
            $this->tagId = null;
    }
}
