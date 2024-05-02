<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks'; // Jika tidak di tulis dia akan mengambil table, berdasarkan nama plural dari Modelnya. Task -> task's'
    protected $primaryKey = 'id'; // Jika tidak di tulis dia akan mengambil 'id',
    public $timestamps = false; // Jika tidak ditulis dia akan mengisikan column 'created_at' dan 'updated_at' pada table kita.

    protected $fillable = [
        'tanggal',
        'task'
    ]; // Jika tidak di tulis dia tidak akan memperbolehkan kita untuk mengisi data dari model ke database pada kolom tanggal dan task.

    public function comments()
    {
        return $this->hasMany(Comment::class, 'task_id');
    }
}
