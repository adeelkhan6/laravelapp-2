<?php

namespace App;

use\App\Mail\ProjectCreated;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
class project extends Model
{
    // protected $fillable = [

    //     'title', 'description'
    // ];

    protected $guarded = [];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::created(function($project){

    //         \Mail::to($project->owner->email)->send(
    //             new ProjectCreated($project)
    //         );
    //     });
    // }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
        $this->tasks()->create($task);
        // return Task::create([
        //     'project_id' => $this->id,
        //     'description' => $description

        // ]);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
