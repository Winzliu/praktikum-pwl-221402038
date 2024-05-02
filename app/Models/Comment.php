<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $primaryKey = 'comment_id'; // Jika tidak di tulis dia akan mengambil 'id',
    public $timestamps = false; // Jika tidak ditulis dia akan mengisikan column 'created_at' dan 'updated_at' pada table kita.

    protected $fillable = [
        'tanggal',
        'task_id',
        'comment'
    ]; // Jika tidak di tulis dia tidak akan memperbolehkan kita untuk mengisi data dari model ke database pada kolom tanggal dan task.

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
