<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection as CollectionSupport;
use Illuminate\Database\Eloquent\Collection as CollectionDatabase;

use LACC\Models\Serie;
use LACC\Repositories\SerieRepository;

class SeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var CollectionDatabase $series */
        $series = factory( Serie::class, 20 )->create();
        $repository = app( SerieRepository::class );
        $collectionThumbs = $this->getThumbs();

        $series->each( function( $serie ) use ( $repository, $collectionThumbs ) {
            $repository->uploadThumb( $serie->id, $collectionThumbs->random() );
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
}
