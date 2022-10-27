<?php

namespace App\Models;

use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
      
    public function publishers()
    {
        return $this->belongsToMany(Publisher::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public static function getLatestCrimeBooks () 
    {
        $crime_books = Book::
        where('category_2_id', 12)
        ->orderBy('publication_date', 'desc')
        ->limit(13)
        ->get();
        
        return $crime_books;
    }
}
