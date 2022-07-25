<?php

namespace App\Providers;

use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;

class GoogleDriveServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Storage::extend("google", function ($app, $config) {
            $client = new \Google_Client();
            $client->setClientId($config['clientId']);
            $client->setClientSecret($config['clientSecret']);
            $client->refreshToken($config['refreshToken']);
            $service = new \Google_Service_Drive($client);
            $adapter = new GoogleDriveAdapter($service, $config['folderId']);
            //dd($adapter);
            return new Filesystem($adapter);
        });
    }
}

/*    $googleClient = new \Google_Client();
            $googleClient->setApplicationName('My App'); 
            $googleClient->setAccessToken(env('GOOGLE_OAUTH_ACCESS_TOKEN')); 
            $googleClient->setClientId(env('GOOGLE_APP_ID')); 
            $googleClient->setClientSecret(env('GOOGLE_APP_SECRET')); 

            if ($googleClient->isAccessTokenExpired()) { 
                $googleClient->fetchAccessTokenWithRefreshToken(); } 

            $api = new \Google_Service_Drive($client); 
            $file = new \Google_Service_Drive_DriveFile(); 
            $file->setName('Folder Name'); 
            $file->setMimeType('application/vnd.google-apps.folder'); 
            $folder = $api->files->create($file);*/