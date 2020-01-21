<?php
namespace App\Repositories\Slack;

use Illuminate\Notifications\Notifiable;

class SlackRepository implements SlackRepositoryInterface
{
  use Notifiable;

  protected $slack;

  public function routeNotificationForSlack()
  {
    dump("route 2 done");
    return env('SLACK_URL');
  }
}
