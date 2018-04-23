<?php

namespace App\Console\Commands;

use App\SwapiUser;
use Illuminate\Console\Command;
use GuzzleHttp\Client;

class ParseSwapi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'swapi:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle()
    {
        $client = new Client();
        $url = 'https://swapi.co/api/people';
        $res = $client->request('GET', $url);
        $data = json_decode((string)$res->getBody());
        $count = $data->count;
        $bar = $this->output->createProgressBar($count);
        do {
            $res = $client->request('GET', $url);
            $data = json_decode((string)$res->getBody());
            $next_page = $data->next;
            $users = $data->results;
            foreach ($users as $user) {
                SwapiUser::create(
                    [
                        'name' => $user->name,
                        'height' => $user->height,
                        'mass' => $user->mass,
                        'hair_color' => $user->hair_color,
                        'skin_color' => $user->skin_color,
                        'eye_color' => $user->eye_color,
                        'birth_year' => $user->birth_year,
                        'gender' => $user->gender,
                        'homeworld' => $user->homeworld,
                        'url' => $user->url,
                        'films' => json_encode($user->films),
                        'species' => json_encode($user->species),
                        'vehicles' => json_encode($user->vehicles),
                        'starships' => json_encode($user->starships),
                        'created' => $user->created,
                        'edited' => $user->edited
                    ]
                );
                $bar->advance();
            }
            $url = $next_page;
        }
        while($next_page != null);
        $bar->finish();
    }
}
