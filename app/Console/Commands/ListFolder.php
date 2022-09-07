<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Prophecy\Argument;

class ListFolder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ListFolder {path} {--isRecursive=true}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lists the inner files and folders within the path provided.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $path = $this->argument('path');
        $isRecursive = ( $this->option('isRecursive') == 'true' ) ? true : false;

        if ( $isRecursive ){
            function scanAllDir($dir) {
                $result = [];
                foreach(scandir($dir) as $filename) {
                  if ($filename[0] === '.') continue;
                  $filePath = $dir . '/' . $filename;
                  if (is_dir($filePath)) {
                    foreach (scanAllDir($filePath) as $childFilename) {
                      $result[] = $filename . '/' . $childFilename;
                    }
                  } else {
                    $result[] = $filename;
                  }
                }
                return $result;
            }
            $files = scanAllDir( $path );
            $this->line( $files );
        } else {
            $files = scandir( $path );
            $this->line( $files );
        }
        return 0;
        // "/Users/joshmart/Desktop/React/10-calendar"
    }
}
