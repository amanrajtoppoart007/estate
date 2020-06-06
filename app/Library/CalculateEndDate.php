<?php
namespace App\Library;
use Illuminate\Http\Request;
use Carbon\Carbon;
class CalculateEndDate
{
    var $rent_period_type;
    var $rent_period;
    var $start_date;
    public function __construct($rent_period_type,$rent_period,$start_date)
    {
        $this->rent_period_type = $rent_period_type;
        $this->rent_period      = $rent_period;
        $this->start_date       = new Carbon($start_date);
    }
   public function execute()
   {
       $endDate = null;
       switch ($this->rent_period_type) 
        {
            case 'daily':
                $endDate = $this->start_date->addDays($this->rent_period);
                break;
            case 'weekly':
                $endDate = $this->start_date->addWeeks($this->rent_period);
                break;
            case 'monthly':
                $endDate = $this->start_date->addMonth($this->rent_period);
                break;
            case 'half_yearly':
                $endDate = $this->start_date->addMonth($this->rent_period*6);
                break;
            case 'yearly':
                $endDate = $this->start_date->addYears($this->rent_period);
                break;
            default:
            $endDate = $this->start_date;
        }
        return $endDate;
   }
   
}