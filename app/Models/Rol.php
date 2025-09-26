<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $fillable = [
        'nombre'
    ];



    public function users ()
    {
        return $this->hasMany(User::class, 'id_rol');
    }

    protected $allowInclude = [
        'users'
    ];

    protected $allowFilter = [
        'id',
        'nombre'
    ];

    protected $allowSort = [
        'id',
        'nombre'
    ];  

    public function scopeIncluded(Builder $query){
        $param = request('included');
        if(empty($this->allowInclude) || empty($param)){
            return $query;
        }

        $relations = explode(',', $param);

        $allowInclude = collect($this->allowInclude);

        foreach($relations as $key => $relation){
            if(!$allowInclude->contains($relation)){
                unset($relations[$key]);
            }
        }

        $query->with($relations);
    }

    public function scopeFilter(Builder $query){
        
        if(empty($this->allowFilter) || empty(request('filter'))){
            return $query;
        }

        $filters = request('filter');
        $allowFilter = collect($this->allowFilter);

        foreach($filters as $filter => $value){
            if($allowFilter->contains($filter)){
                $query->where($filter, 'like', "%$value%");
            }
        }

        return $query;
    }

    public function scopeSort(Builder $query){
        if(empty($this->allowSort) || empty(request('sort'))){
            return $query;
        }

        $sortFields = explode(',', request('sort'));
        $allowSort = collect($this->allowSort);
        
        foreach($sortFields as $sortField){
            $direction = 'asc';
            if(substr($sortField, 0, 1) == '-'){

                $direction = 'desc';
                $sortField = substr($sortField, 1);
            }
            if($allowSort->contains($sortField)){
                $query->orderBy($sortField, $direction);
            }
        }

        return $query;

    }
}