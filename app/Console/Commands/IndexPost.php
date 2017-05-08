<?php

namespace App\Console\Commands;

use Config;
use Illuminate\Console\Command;
use TNTSearch;
class IndexPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'index:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Index the posts table';

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
    public function handle()
    {

        $indexer = TNTSearch::createIndex('posts.index');
        $indexer->setPrimaryKey('Post_id');
        $indexer->query('SELECT * FROM posts WHERE usertype LIKE "Seller";');
        $indexer->run();
    }
}
