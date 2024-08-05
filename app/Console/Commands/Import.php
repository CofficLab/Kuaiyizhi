<?php

namespace App\Console\Commands;

use App\Entities\ExportedNode;
use App\Models\Idea;
use Illuminate\Console\Command;

class Import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->line("导入");
        $filePath = storage_path('app/data.json');
        if (!file_exists($filePath)) {
            $this->error($filePath . " 文件不存在");
            return;
        }

        $json = file_get_contents($filePath);
        $root = ExportedNode::fromJsonString($json);

        try {
            Idea::truncate();
            $root->save();
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }

        $this->info("导入完成");
    }
}
