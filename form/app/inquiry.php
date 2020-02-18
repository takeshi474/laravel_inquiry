<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\Slack;
use Illuminate\Notifications\Notifiable;
use Illuminate\http\Request;

class inquiry extends Model
{
  use Notifiable;

  protected $fillable = ['name','email','post','image_url'];
}


  class SlackService
  {
    public function routeNotificationForSlack($notification)
    {
      return 'https://hooks.slack.com/services/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';
    }

    public function scopeSearch($query, $keyword)
    {
    return $query -> where('name', 'like', '%'. $keyword .'%')
                  -> orwhere('email', 'like', '%'. $keyword .'%')
                  -> orwhere('post', 'like', '%'. $keyword .'%')
                  -> get();
    }

}
