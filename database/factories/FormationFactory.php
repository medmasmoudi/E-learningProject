<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Formation>
 */
class FormationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $courses = [
            [
                'title' => 'Introduction to Computer Science',
                'description' => 'Learn the basics of computer science and programming.',
                'image' => 'intro-to-cs.jpg',
                'tags' => 'Computer Science'
            ],
            [
                'title' => 'Data Structures and Algorithms',
                'description' => 'Explore fundamental data structures and algorithms used in computer science.',
                'image' => 'data-structures.jpg',
                'tags' => 'Algorithms'
            ],
            [
                'title' => 'Web Development Bootcamp',
                'description' => 'Become proficient in web development and design with hands-on exercises and real-world projects.',
                'image' => 'web-dev.jpg',
                'tags' => 'Web Development'
            ],
            [
                'title' => 'Artificial Intelligence Fundamentals',
                'description' => 'Understand the fundamental concepts of artificial intelligence and its practical applications.',
                'image' => 'ai.jpg',
                'tags' => 'Artificial Intelligence'
            ],
            [
                'title' => 'Database Design and Management',
                'description' => 'Learn how to design and manage databases for effective data storage and retrieval.',
                'image' => 'database.jpg',
                'tags' => 'Database'
            ],
            ['title' => 'Mobile App Development', 'description' => 'Learn how to create mobile applications for iOS and Android devices using popular programming languages and frameworks.', 'image' => 'mobile-dev.jpg', 'tags' => 'Mobile Development'],
            ['title' => 'Game Development', 'description' => 'Discover how to create games for various platforms using game engines and programming languages like Unity and C#.', 'image' => 'game-dev.jpg', 'tags' => 'Game development'],
            ['title' => 'Cybersecurity Fundamentals', 'description' => 'Learn the basics of cybersecurity and how to protect computer systems and networks from various threats and attacks.', 'image' => 'cybersecurity.jpg', 'tags' => 'Cybersecurity'],
            ['title' => 'Cloud Computing Essentials', 'description' => 'Gain an understanding of cloud computing technologies and services like AWS and Azure, and learn how to deploy and manage applications in the cloud.', 'image' => 'cloud.jpg', 'tags' => 'Cloud'],
            ['title' => 'Data Science and Analytics', 'description' => 'Explore the fundamentals of data science, including data mining, statistical analysis, and machine learning techniques.', 'image' => 'data-science.jpg', 'tags' => 'Data Science']
        ];

        $course = fake()->randomElement($courses);


        return [
            'Title' => $course['title'],
            'Description' => $course['description'],
            'Image' => $course['image'],
            'Tags' => $course['tags'],
        ];
    }
}