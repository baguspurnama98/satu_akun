<?php

namespace App\Models;


trait FullTextSearch
{
    /**
     * Replaces spaces with full text search wildcards
     * https://arianacosta.com/php/laravel/tutorial-full-text-search-laravel-5/
     *
     * @param string $term
     * @return string
     */
    protected function fullTextWildcards($term)
    {
        // removing symbols used by MySQL
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $term = str_replace($reservedSymbols, '', $term);
 
        $words = explode(' ', $term);
        $count = 0;

        foreach($words as $key => $word) {
            /*
             * https://dev.mysql.com/doc/refman/5.6/en/fulltext-boolean.html
             * https://stackoverflow.com/questions/16993714/mysql-like-and-boolean-mode-fulltext-search
             * https://www.w3resource.com/mysql/mysql-full-text-search-functions.php#:~:text=Full%2DText%20Search%20in%20MySQL,based%20columns%20in%20the%20table.
             */
            if(strlen($word) >= 3) {
                if ($count === 0) {
                    $words[$key] = '*' . $word . '*'; // tadinya ini doang
                } else {
                    $words[$key] = '*(>' . $word . ')'; // aku tambahin ini biar memberi nilai lebih pada word berikutnya (">") tp sama aja
                }
            }
        }
 
        $searchTerm = implode(' ', $words);
 
        return $searchTerm;
    }
 
    /**
     * Scope a query that matches a full text search of term.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $term
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $term)
    {
        $columns = implode(',',$this->searchable);
 
        $searchableTerm = $this->fullTextWildcards($term);
    
        return $query->selectRaw("MATCH ({$columns}) AGAINST (? IN BOOLEAN MODE) AS relevance_score", [$searchableTerm])
            ->whereRaw("MATCH ({$columns}) AGAINST (? IN BOOLEAN MODE)", $searchableTerm)
            ->orderByDesc('relevance_score');
    }
}