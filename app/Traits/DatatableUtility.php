<?php
namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder;

trait DatatableUtility {
    public function scopeSetPagination(EloquentBuilder $builder, $request){
        return $builder->offset($request->start)->limit($request->length); 
    }

    public function scopeSearch(EloquentBuilder $builder, $request, $columns=[]){
        if($request->search['value']!=null){
        $searchTerm = $request->search['value'];
            if(count($columns) > 0){
                $builder = $builder->where(function($query) use ($columns, $searchTerm){
                    foreach($columns as $col){
                        $query = $query->orWhere($col, 'like', "%$searchTerm%");
                    }
                });
            }
        }
        return $builder;
    }
}

?>