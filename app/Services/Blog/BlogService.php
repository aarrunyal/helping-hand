<?php
/**
 * Created by PhpStorm.
 * User: aarrunyal
 * Date: 5/5/20
 * Time: 10:53 PM
 */

namespace App\Services\Blog;


use App\Models\Blog\Blog;
use App\Services\Service;

class BlogService extends Service
{
    protected $uploadPath = "uploads/blog";
    protected $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function paginate($limit)
    {
        $blogs = $this->blog->orderBy('id', 'DESC')->paginate($limit);
        return $blogs;
    }

    public function findByColumn($column, $value)
    {
        $blogs = $this->blog->where($column, $value)->first();
        return $blogs;
    }

    public function store($data)
    {
        try {
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            $data['is_featured'] = (isset($data['is_featured']) && $data['is_featured'] == "on") ? 1 : 0;
            if (isset($data['social_share_image'])) {
                $data['social_share_image'] = $this->upload($data['social_share_image'], null, null, $this->uploadPath);
            }
            return $this->blog->create($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function update($slug, $data)
    {
        try {
            $blog = $this->findByColumn('slug', $slug);
            if (isset($data['social_share_image'])) {
                if (!empty($blog->social_share_image)) {
                    $this->deleteUploadedImage($blog->social_share_image, $this->uploadPath);
                }
                $data['social_share_image'] = $this->upload($data['social_share_image'], null, null, $this->uploadPath);
            }
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            $data['is_featured'] = (isset($data['is_featured']) && $data['is_featured'] == "on") ? 1 : 0;
            return $blog->update($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function delete($slug)
    {
        try {
            $blog = $this->findByColumn('slug', $slug);
            if (!empty($blog->social_share_image)) {
                $this->deleteUploadedImage($blog->social_share_image, $this->uploadPath);
            }
            return $blog->delete();
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function findByColumns($data, $all = false, $limit = null)
    {
        $response = $this->blog->where(function ($qry) use ($data) {
            if (sizeof($data) > 0) {
                foreach ($data as $k => $d) {
                    $qry->where($k, $data[$k]);
                }
            }
        });
        if ($all) {
            if ($limit)
                $response = $response->take($limit);
            return $response->get();
        }
        return $response->first();
    }
}
