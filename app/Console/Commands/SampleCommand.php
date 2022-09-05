<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SampleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // コマンドの名前
    protected $signature = 'sample-command';

    /**
     * The console command description.
     *
     * @var string
     */
    // コマンドの説明文
    protected $description = 'Sample Command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    // コマンドの実処理
    public function handle()
    {
        echo 'このコマンドはサンプルです。';
        return 0;
    }
}
