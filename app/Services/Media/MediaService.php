<?php


namespace App\Services\Media;

use App\Http\Resources\Media\MediaResource;
use App\Models\Media\Media;
use App\Services\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MediaService extends Service
{
    protected $media;
    protected $uploadPath = "uploads/media";


    public function __construct(Media $media)
    {
        $this->media = $media;
    }

    public function paginate($data = [], $limit = 10)
    {
        $media = $this->media->orderBy('id', "DESC")->where(function ($qry) use ($data) {
            if (isset($data['title']))
                $qry->where('title', 'like', '%' . $data['title'] . '%');
            if (isset($data['type']) && $data['type'] != "all") {
                $type = $this->getFileType($data['type']);
                $qry->where('type', $type);
            }
            if (isset($data['created_at']))
                $qry->where('created_at', '<=', $data['created_at']);
            if (isset($data['active']) && !empty($data['active'])) {
                $flag = $data['active'] == "active" ? 1 : 0;
                $qry->whereIsActive($flag);
            }
        })->paginate($limit);
        return ($media);
    }

    public function featuredImage($limit = 25)
    {
        $media = $this->media->whereIsFeatured(1)->orderBy('id', "DESC")
            ->paginate($limit);
        return ($media);
    }

    public function getByType($type, $limit)
    {
        $news = $this->media->whereType($type)->orderBy('id', "DESC")->paginate($limit);
        return ($news);
    }

    public function getBySlug($slug)
    {
        return $this->media->whereSlug($slug)->first();
    }


    public function store(Request $request)
    {
//        try {
            $size = $request->file('file')->getSize();
            $name = $request->file('file')->getClientOriginalName();
            $type = $request->file('file')->getType();
            $data['path'] = $this->upload($request->file('file'), null, null, $this->uploadPath, false);
            $data['size'] = ($size/1024);
            $data['title'] = ($name);
            $data['type'] = $type;
            $this->media->create($data);
            return true;
//        } catch
//        (\Exception $ex) {
//            return $ex;
//        }
    }

    public function getFileType($type)
    {
        switch ($type) {
            case 'pdf':
                $fileType = 'pdf';
                break;
            case 'pptx':
                $fileType = 'ppt';
                break;
            case 'ppt':
                $fileType = 'ppt';
                break;
            case 'docx':
                $fileType = 'doc';
                break;
            case 'doc':
                $fileType = 'doc';
                break;
            case 'csv':
                $fileType = 'excel';
                break;
            case 'xlsx':
                $fileType = 'excel';
                break;
            case 'mp3':
                $fileType = 'audio';
                break;
            case 'mp4':
                $fileType = 'video';
                break;
            case 'png':
                $fileType = 'image';
                break;
            case 'jpg':
                $fileType = 'image';
                break;
            case 'jpeg':
                $fileType = 'image';
                break;
            case 'svg':
                $fileType = 'image';
                break;
            default:
                $fileType = 'other';
                break;
        }
        return $fileType;
    }

    public function getById($id)
    {
        $media = $this->media->find($id);
        return ($media);
    }

    public function update($id, $data)
    {
        try {
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] = true) ? true : 0;
            $media = $this->getById($id);
            if (!empty($data['path'])) {
                if (!empty($media->path)) {
                    $this->deleteFile($this->uploadPath, $media->path);
                }
                $data['path'] = $this->upload($data['path'], null, null, $this->uploadPath);
            }
//            if ($data["is_featured"]) {
//                $this->makeNonFeatured($id);
//            }
            return $media->update($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function makeNonFeatured($id)
    {
        $medias = $this->media->where('id', "!=", $id)->get();
        if ($medias->count() > 0) {
            foreach ($medias as $v) {
                $v->is_featured = 0;
                $v->save();
            }
        }
    }

    public function delete($id)
    {
//        try {
        $media = $this->getById($id);
        if (!empty($media->path)) {
            $this->deleteUploadedImage($media->path, $this->uploadPath );
        }
        return $media->delete();
//        } catch (\Exception $ex) {
//            return false;
//        }
    }

    public function findByColumn($column, $media)
    {
        return $this->media->where($column, $media)->first();
    }

    public function findByColumns($data, $limit = 0)
    {
        $result = $this->media->where(function ($query) use ($data) {
            foreach ($data as $key => $media) {
                $query->where($key, $data[$key]);
            }
        });
        if (!empty($limit) || $limit != 0) {
            $result = $result->take($limit)->get();
            return ($result);
        } else {
            return ($result);
        }
    }
}
