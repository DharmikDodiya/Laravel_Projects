<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class storagecount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:count
    {path : Enter Your Folder Name}
    {--F|--folder : pass this is you want to count sub folder}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dir = base_path($this->argument('path'))."/";
        $files = array_filter(glob($dir."*"),"is_file") ?? 0;
        

        if($this->option('folder')){
            $folders = glob($dir."*",GLOB_ONLYDIR) ?? 0;
            $this->info("Total : " . count($files) . "Files & " . count($folders) . "Folders");
        }else{
            $this->info("Total : ".count($files) . "Files");
        }
        
    }
}
