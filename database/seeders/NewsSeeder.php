<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsData = [
            [
                'user_id' => 4,
                'news_heading' => 'India Launches Chandrayaan-4 Mission to Explore Moon',
                'news_header_image' => 'news_headers/chandrayaan.jpg',
                'short_description' => 'ISRO successfully launches Chandrayaan-4 to study lunar surface and water presence.',
                'news_large_description' => 'The Indian Space Research Organisation (ISRO) has launched Chandrayaan-4 with the aim of conducting advanced research on the Moon. Scientists believe this mission will provide deeper insights into lunar water reserves.',
                'images' => ['images/chandrayaan1.jpg', 'images/chandrayaan2.jpg'],
                'news_link' => 'https://www.isro.gov.in/chandrayaan4',
                'published_by' => 'ISRO Media Team',
                'content' => 'This mission highlights India’s growing capabilities in space exploration.',
                'category' => 'Science',
                'tags' => 'ISRO,Space,Moon,Chandrayaan',
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(2),
                'views_count' => 4240,
            ],
            [
                'user_id' => 4,
                'news_heading' => 'Stock Market Hits Record High in Mumbai',
                'news_header_image' => 'news_headers/stockmarket.jpg',
                'short_description' => 'Sensex surges past 75,000 points for the first time.',
                'news_large_description' => 'The Indian stock market witnessed a historic rally today as Sensex crossed 75,000 points. Experts attribute this growth to strong foreign investment and corporate earnings.',
                'images' => ['images/stock4.jpg', 'images/stock2.jpg'],
                'news_link' => 'https://economictimes.indiatimes.com',
                'published_by' => 'Economic Times',
                'content' => 'The rally was led by IT, banking, and energy stocks.',
                'category' => 'Business',
                'tags' => 'Sensex,Nifty,Stocks,Investment',
                'status' => 'published',
                'published_at' => Carbon::now()->subDay(),
                'views_count' => 980,
            ],
            [
                'user_id' => 4,
                'news_heading' => 'India Defeats Australia in Test Match',
                'news_header_image' => 'news_headers/cricket.jpg',
                'short_description' => 'Team India wins thrilling Test match at Wankhede Stadium.',
                'news_large_description' => 'India secured a thrilling victory against Australia in the first Test. Virat Kohli’s century and Bumrah’s bowling spell were key highlights.',
                'images' => ['images/cricket4.jpg', 'images/cricket2.jpg'],
                'news_link' => 'https://www.bcci.tv',
                'published_by' => 'BCCI Official',
                'content' => 'Fans celebrated across the nation as India sealed the win.',
                'category' => 'Sports',
                'tags' => 'Cricket,India,Australia,TestMatch',
                'status' => 'published',
                'published_at' => Carbon::now()->subHours(20),
                'views_count' => 2400,
            ],
            [
                'user_id' => 4,
                'news_heading' => 'AI Startups Booming in Bengaluru',
                'news_header_image' => 'news_headers/ai.jpg',
                'short_description' => 'Bengaluru becomes the hub for AI-based startups in Asia.',
                'news_large_description' => 'Artificial Intelligence is transforming industries, and Bengaluru is emerging as the Silicon Valley of Asia. Startups are attracting billions in funding.',
                'images' => ['images/ai4.jpg', 'images/ai2.jpg'],
                'news_link' => 'https://techcrunch.com',
                'published_by' => 'TechCrunch India',
                'content' => 'Over 50 AI startups have raised more than $500M in the last year.',
                'category' => 'Technology',
                'tags' => 'AI,Startups,Technology,Bengaluru',
                'status' => 'published',
                'published_at' => Carbon::now()->subHours(42),
                'views_count' => 4500,
            ],
            [
                'user_id' => 4,
                'news_heading' => 'Monsoon Arrives Early in Kerala',
                'news_header_image' => 'news_headers/monsoon.jpg',
                'short_description' => 'The Indian Meteorological Department announces early monsoon showers.',
                'news_large_description' => 'Kerala witnessed early monsoon rains, bringing relief from the summer heat. Farmers across South India are expected to benefit from timely rainfall.',
                'images' => ['images/monsoon4.jpg', 'images/monsoon2.jpg'],
                'news_link' => 'https://imd.gov.in',
                'published_by' => 'IMD',
                'content' => 'The early onset is expected to improve crop yields this season.',
                'category' => 'Weather',
                'tags' => 'Monsoon,Rain,Weather,Kerala',
                'status' => 'published',
                'published_at' => Carbon::now()->subHours(5),
                'views_count' => 800,
            ],
            [
                'user_id' => 4,
                'news_heading' => 'Global Leaders Meet for Climate Summit',
                'news_header_image' => 'news_headers/climate.jpg',
                'short_description' => 'World leaders gather to discuss climate change policies.',
                'news_large_description' => 'The annual Climate Summit saw participation from over 400 countries. Leaders pledged to cut emissions and invest in renewable energy.',
                'images' => ['images/climate4.jpg', 'images/climate2.jpg'],
                'news_link' => 'https://un.org/climate',
                'published_by' => 'United Nations',
                'content' => 'Commitments include reducing carbon footprint and promoting clean energy.',
                'category' => 'Environment',
                'tags' => 'Climate,Environment,UN,GlobalWarming',
                'status' => 'published',
                'published_at' => Carbon::now(),
                'views_count' => 4320,
            ],
        ];

        foreach ($newsData as $news) {
            News::create($news);
        }
    }
}
