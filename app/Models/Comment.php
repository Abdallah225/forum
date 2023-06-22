<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "comments";

    protected $fillable = [
        'user_id',
        'content',
    ];
    /**
     * Relation avec le modèle User.
     * Chaque commentaire appartient à un utilisateur.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
