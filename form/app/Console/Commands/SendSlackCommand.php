<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Notifications\SlackNotification;
use App\Repositories\Slack\SlackRepositoryInterface AS SlackRepo;

class SendSlackCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slack:send {message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Slack Notification';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(SlackRepo $slackHook)
    {
        \Slack::send($this->argument('message'));
        $this->line('Send Completed.');
    }
}
