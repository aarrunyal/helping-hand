<?php
/**
 * Created by PhpStorm.
 * User: aarrunyal
 * Date: 5/5/20
 * Time: 10:53 PM
 */

namespace App\Services\Category;


use App\Models\Category\Category;
use App\Services\Service;

class CategoryService extends Service
{
    protected $uploadPath = "uploads/category";
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function paginate($limit)
    {
        $categories = $this->category->orderBy('id', 'DESC')->paginate($limit);
        return $categories;
    }

    public function getParents()
    {
        $categories = $this->category->whereIsParent(1)->orderBy('id', 'DESC')->get();
        return $categories;
    }

    public function findByColumn($column, $value)
    {
        $categories = $this->category->where($column, $value)->first();
        return $categories;
    }

    public function store($data)
    {
        try {
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            $data['is_parent'] = (isset($data['is_parent']) && $data['is_parent'] == "on") ? 1 : 0;
            if ($data['is_parent'])
                $data['parent_id'] = null;
            return $this->category->create($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function update($slug, $data)
    {
        try {
            $category = $this->findByColumn('slug', $slug);
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            $data['is_parent'] = (isset($data['is_parent']) && $data['is_parent'] == "on") ? 1 : 0;
            if ($data['is_parent'])
                $data['parent_id'] = null;
            return $category->update($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function delete($slug)
    {
        try {
            $category = $this->findByColumn('slug', $slug);
            return $category->delete();
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function findByColumns($data, $all = false)
    {
        $response = $this->category->where(function ($qry) use ($data) {
            if (sizeof($data) > 0) {
                foreach ($data as $k => $d) {
                    $qry->where($k, $data[$k]);
                }
            }
        });
        if ($all)
            return $response->get();
        return $response->first();
    }
}
