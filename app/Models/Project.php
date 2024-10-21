<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use LaracraftTech\LaravelDateScopes\DateScopes;

class Project extends Model
{
    use HasFactory;
    use DateScopes;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'value','email', 'phone',
        'award_date',
        'award',
        'location',
        'contract_amount',
        'tender_amount',
        'budget_amount',
        'company_name',
        'contructor_name',
        'contructor_origin',
        'category',
        'year',
        'procuring_entity',
        'status',
        'active',
        'contractor_id'
    ];

    public function contractor()
    {
        return $this->belongsTo(Contractor::class);
    }

    public function comments()
    {
        return $this->hasMany(project_comment::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public static function formatAmount($amount)
    {
        $suffixes = ['', 'K', 'M', 'B'];

        $index = 0;
        while ($amount >= 1000 && $index < count($suffixes) - 1) {
            $amount /= 1000;
            $index++;
        }

        return round($amount, 1) . $suffixes[$index];
    }

    public function getSlugAttribute(): string
    {
        return Str::slug($this->title);
    }

    public static function getProjectCount(){
        $count =  self::all()->count();

        if ($count > 0) {
            return  $count . '+';
        }
    
        return $count;
    }

    public static function getAwardCount()
    {
        $count = self::where('award', true)->count();

        if ($count > 0) {
            return  $count . '+';
        }
    
        return $count;
    }

    public static function getTotalContractsCount()
    {
        return self::where('Total contracts', true)->count();
    }

    public static function getTotalTendersAmount()
    {
        return self::sum('tender_amount');
    }

    public static function getTotalAwardsAmount()
    {
        return self::sum('award');
    }

    public static function getTotalContractsAmount()
    {
        return self::sum('contract_amount');
    }


}
