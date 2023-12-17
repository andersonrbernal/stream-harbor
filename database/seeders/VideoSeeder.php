<?php

namespace Database\Seeders;

use App\Models\MediaCategory;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("videos")->delete();

        $videos = [
            array(
                "id" => 1,
                "description" => "Big Buck Bunny tells the story of a giant rabbit with a heart bigger than himself. When one sunny day three rodents rudely harass him, something snaps... and the rabbit ain't no bunny anymore! In the typical cartoon tradition he prepares the nasty rodents a comical revenge.\n\nLicensed under the Creative Commons Attribution license\nhttp://www.bigbuckbunny.org",
                "video_url" => "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4",
                "thumb_url" => fake()->imageUrl(),
                "title" => "Big Buck Bunny",
                "media_category_id" => MediaCategory::inRandomOrder()->first()->id ?? MediaCategory::factory()->create()->id
            ),
            array(
                "id" => 2,
                "description" => "The first Blender Open Movie from 2006",
                "video_url" => "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4",
                "thumb_url" => fake()->imageUrl(),
                "title" => "Elephant Dream",
                "media_category_id" => MediaCategory::inRandomOrder()->first()->id ?? MediaCategory::factory()->create()->id
            ),
            array(
                "id" => 3,
                "description" => "HBO GO now works with Chromecast -- the easiest way to enjoy online video on your TV. For when you want to settle into your Iron Throne to watch the latest episodes. For $35.\nLearn how to use Chromecast with HBO GO and more at google.com/chromecast.",
                "video_url" => "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4",
                "thumb_url" => fake()->imageUrl(),
                "title" => "For Bigger Blazes",
                "media_category_id" => MediaCategory::inRandomOrder()->first()->id ?? MediaCategory::factory()->create()->id
            ),
            array(
                "id" => 4,
                "description" => "Introducing Chromecast. The easiest way to enjoy online video and music on your TV—for when Batman's escapes aren't quite big enough. For $35. Learn how to use Chromecast with Google Play Movies and more at google.com/chromecast.",
                "video_url" => "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4",
                "thumb_url" => fake()->imageUrl(),
                "title" => "For Bigger Escape",
                "media_category_id" => MediaCategory::inRandomOrder()->first()->id ?? MediaCategory::factory()->create()->id
            ),
            array(
                "id" => 5,
                "description" => "Introducing Chromecast. The easiest way to enjoy online video and music on your TV. For $35.  Find out more at google.com/chromecast.",
                "video_url" => "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerFun.mp4",
                "thumb_url" => fake()->imageUrl(),
                "title" => "For Bigger Fun",
                "media_category_id" => MediaCategory::inRandomOrder()->first()->id ?? MediaCategory::factory()->create()->id
            ),
            array(
                "id" => 6,
                "description" => "Introducing Chromecast. The easiest way to enjoy online video and music on your TV—for the times that call for bigger joyrides. For $35. Learn how to use Chromecast with YouTube and more at google.com/chromecast.",
                "video_url" => "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerJoyrides.mp4",
                "thumb_url" => fake()->imageUrl(),
                "title" => "For Bigger Joyrides",
                "media_category_id" => MediaCategory::inRandomOrder()->first()->id ?? MediaCategory::factory()->create()->id
            ),
            array(
                "id" => 7,
                "description" => "Introducing Chromecast. The easiest way to enjoy online video and music on your TV—for when you want to make Buster's big meltdowns even bigger. For $35. Learn how to use Chromecast with Netflix and more at google.com/chromecast.",
                "video_url" => "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerMeltdowns.mp4",
                "thumb_url" => fake()->imageUrl(),
                "title" => "For Bigger Meltdowns",
                "media_category_id" => MediaCategory::inRandomOrder()->first()->id ?? MediaCategory::factory()->create()->id
            ),
            array(
                "id" => 8,
                "description" => "Sintel is an independently produced short film, initiated by the Blender Foundation as a means to further improve and validate the free/open source 3D creation suite Blender. With initial funding provided by 1000s of donations via the internet community, it has again proven to be a viable development model for both open 3D technology as for independent animation film.\nThis 15 minute film has been realized in the studio of the Amsterdam Blender Institute, by an international team of artists and developers. In addition to that, several crucial technical and creative targets have been realized online, by developers and artists and teams all over the world.\nwww.sintel.org",
                "video_url" => "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/Sintel.mp4",
                "thumb_url" => fake()->imageUrl(),
                "title" => "Sintel",
                "media_category_id" => MediaCategory::inRandomOrder()->first()->id ?? MediaCategory::factory()->create()->id
            ),
            array(
                "id" => 9,
                "description" => "Smoking Tire takes the all-new Subaru Outback to the highest point we can find in hopes our customer-appreciation Balloon Launch will get some free T-shirts into the hands of our viewers.",
                "video_url" => "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/SubaruOutbackOnStreetAndDirt.mp4",
                "thumb_url" => fake()->imageUrl(),
                "title" => "Subaru Outback On Street And Dirt",
                "media_category_id" => MediaCategory::inRandomOrder()->first()->id ?? MediaCategory::factory()->create()->id
            ),
            array(
                "id" => 10,
                "description" => "Tears of Steel was realized with crowd-funding by users of the open source 3D creation tool Blender. Target was to improve and test a complete open and free pipeline for visual effects in film - and to make a compelling sci-fi film in Amsterdam, the Netherlands.  The film itself, and all raw material used for making it, have been released under the Creatieve Commons 3.0 Attribution license. Visit the tearsofsteel.org website to find out more about this, or to purchase the 4-DVD box with a lot of extras.  (CC) Blender Foundation - http://www.tearsofsteel.org",
                "video_url" => "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/TearsOfSteel.mp4",
                "thumb_url" => fake()->imageUrl(),
                "title" => "Tears of Steel",
                "media_category_id" => MediaCategory::inRandomOrder()->first()->id ?? MediaCategory::factory()->create()->id
            ),
            array(
                "id" => 11,
                "description" => "The Smoking Tire heads out to Adams Motorsports Park in Riverside, CA to test the most requested car of 2010, the Volkswagen GTI. Will it beat the Mazdaspeed3's standard-setting lap time? Watch and see...",
                "video_url" => "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/VolkswagenGTIReview.mp4",
                "thumb_url" => fake()->imageUrl(),
                "title" => "Volkswagen GTI Review",
                "media_category_id" => MediaCategory::inRandomOrder()->first()->id ?? MediaCategory::factory()->create()->id
            ),
            array(
                "id" => 12,
                "description" => "The Smoking Tire is going on the 2010 Bullrun Live Rally in a 2011 Shelby GT500, and posting a video from the road every single day! The only place to watch them is by subscribing to The Smoking Tire or watching at BlackMagicShine.com",
                "video_url" => "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/WeAreGoingOnBullrun.mp4",
                "thumb_url" => fake()->imageUrl(),
                "title" => "We Are Going On Bullrun",
                "media_category_id" => MediaCategory::inRandomOrder()->first()->id ?? MediaCategory::factory()->create()->id
            ),
            array(
                "id" => 13,
                "description" => "The Smoking Tire meets up with Chris and Jorge from CarsForAGrand.com to see just how far $1,000 can go when looking for a car.The Smoking Tire meets up with Chris and Jorge from CarsForAGrand.com to see just how far $1,000 can go when looking for a car.",
                "video_url" => "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/WhatCarCanYouGetForAGrand.mp4",
                "thumb_url" => fake()->imageUrl(),
                "title" => "What care can you get for a grand?",
                "media_category_id" => MediaCategory::inRandomOrder()->first()->id ?? MediaCategory::factory()->create()->id
            )
        ];

        DB::table("videos")->insert($videos);
    }
}
