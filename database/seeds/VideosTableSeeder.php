<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Collection as CollectionSupport;
use Illuminate\Database\Eloquent\Collection as CollectionDatabase;
use LACC\Models\Video;
use LACC\Models\Serie;
use LACC\Models\Category;
use LACC\Repositories\VideoRepository;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var CollectionDatabase $series */
        $series = Serie::all();

        /** @var CollectionDatabase $categories */
        $categories = Category::all();

        /** @var \LACC\Media\ThumbUploads $repository */
        $repository = app( VideoRepository::class );

        $collectionThumbs = $this->getThumbs();
        $collectionVideos = $this->getVideos();

        factory( Video::class, 20 )
            ->create()
            ->each( function( $video ) use ( $series, $categories, $repository, $collectionThumbs, $collectionVideos ) {

                $repository->uploadThumb( $video->id, $collectionThumbs->random() );
                $repository->uploadFile( $video->id, $collectionVideos->random() );

                $video->categories()->attach( $categories->random( 4 )->pluck( 'id' ) );

                
                $num = rand( 1, 3 );
                if( $num % 2 == 0 ) {
                    $serie = $series->random();
                    $video->serie_id = $serie->id;
                    $video->serie()->associate( $serie );
                    $video->save();
                }
            } );
    }

    public function getThumbs()
    {
        return new CollectionSupport( [
            new \Illuminate\Http\UploadedFile(
                storage_path( 'app/files/faker/thumbs/php.png' ),
                'php.png'
            ),
            new \Illuminate\Http\UploadedFile(
                storage_path( 'app/files/faker/thumbs/java.png' ),
                'java.png'
            ),
            new \Illuminate\Http\UploadedFile(
                storage_path( 'app/files/faker/thumbs/laravel.png' ),
                'laravel.png'
            )
        ] );
    }

    public function getVideos()
    {
        return new CollectionSupport( [
            new \Illuminate\Http\UploadedFile(
                storage_path( 'app/files/faker/videos/video1.mp4' ),
                'video1.mp4'
            ),
            new \Illuminate\Http\UploadedFile(
                storage_path( 'app/files/faker/videos/video1.mp4' ),
                'video1.mp4'
            )
        ] );
    }
}
