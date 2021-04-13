<?php
/**
 * Created by PhpStorm.
 * User: aarrunyal
 * Date: 5/5/20
 * Time: 10:53 PM
 */

namespace App\Services\Destination;


use App\Models\Destination\Destination;
use App\Models\Page\Page;
use App\Services\Service;

class DestinationService extends Service
{
    protected $uploadPath = "uploads/destination";
    protected $destination;

    public function __construct(Destination $destination)
    {
        $this->destination = $destination;
    }

    public function paginate($limit)
    {
        $destinations = $this->destination->orderBy('id', 'DESC')->paginate($limit);
        return $destinations;
    }


    public function findByColumn($column, $value)
    {
        $destinations = $this->destination->where($column, $value)->first();
        return $destinations;
    }

    public function store($data)
    {
        try {
            $titles = $data['title'];
            $d['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;;
            foreach ($titles as $title) {
                $d['title'] = $title;
                $this->destination->create($d);
            }
            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function update($slug, $data)
    {
        try {
            $destination = $this->findByColumn('slug', $slug);
            $data['title'] = $data['title'][0];
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            return $destination->update($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function delete($slug)
    {
        try {
            $destination = $this->findByColumn('slug', $slug);
            return $destination->delete();
        } catch (\Exception $ex) {
            return false;
        }
    }
}