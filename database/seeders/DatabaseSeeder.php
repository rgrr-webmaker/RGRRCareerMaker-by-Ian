<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create test students
        $student1 = User::create([
            'name' => 'John Doe',
            'email' => 'student@test.com',
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        Student::create([
            'user_id' => $student1->id,
            'phone' => '123-456-7890',
            'university' => 'University of Technology',
            'degree' => 'Bachelor of Science',
            'major' => 'Computer Science',
            'graduation_year' => 2025,
            'gpa' => 3.75,
            'skills' => 'PHP, Laravel, JavaScript, React, MySQL',
            'bio' => 'Passionate software developer with strong problem-solving skills.',
        ]);

        $student2 = User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@test.com',
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        Student::create([
            'user_id' => $student2->id,
            'phone' => '098-765-4321',
            'university' => 'State University',
            'degree' => 'Bachelor of Arts',
            'major' => 'Information Technology',
            'graduation_year' => 2024,
            'gpa' => 3.90,
            'skills' => 'Python, Django, Data Analysis, SQL',
            'bio' => 'Detail-oriented IT professional seeking challenging opportunities.',
        ]);

        // Create test employers
        $employer1 = User::create([
            'name' => 'Tech Corp HR',
            'email' => 'employer@test.com',
            'password' => Hash::make('password'),
            'role' => 'employer',
        ]);

        $employerProfile1 = Employer::create([
            'user_id' => $employer1->id,
            'company_name' => 'Tech Corp',
            'company_website' => 'https://techcorp.example.com',
            'company_phone' => '555-0100',
            'industry' => 'Technology',
            'company_size' => 500,
            'company_description' => 'Leading technology company specializing in software solutions.',
        ]);

        $employer2 = User::create([
            'name' => 'StartUp Inc Recruiter',
            'email' => 'startup@test.com',
            'password' => Hash::make('password'),
            'role' => 'employer',
        ]);

        $employerProfile2 = Employer::create([
            'user_id' => $employer2->id,
            'company_name' => 'StartUp Inc',
            'company_website' => 'https://startup.example.com',
            'company_phone' => '555-0200',
            'industry' => 'Software',
            'company_size' => 50,
            'company_description' => 'Innovative startup building next-generation applications.',
        ]);

        // Create jobs
        $job1 = Job::create([
            'employer_id' => $employerProfile1->id,
            'title' => 'Junior Software Developer',
            'description' => 'We are looking for a talented junior developer to join our team. You will work on exciting projects using modern technologies.',
            'requirements' => 'Bachelor degree in Computer Science or related field. Knowledge of PHP and Laravel. Strong problem-solving skills.',
            'location' => 'San Francisco, CA',
            'type' => 'full-time',
            'salary_min' => 60000,
            'salary_max' => 80000,
            'experience_level' => 'Entry Level',
            'benefits' => 'Health insurance, 401k, flexible hours',
            'is_active' => true,
            'deadline' => now()->addMonths(2),
        ]);

        $job2 = Job::create([
            'employer_id' => $employerProfile1->id,
            'title' => 'Frontend Developer Intern',
            'description' => 'Join our frontend team and learn from experienced developers. Work on real projects with cutting-edge technologies.',
            'requirements' => 'Currently enrolled in Computer Science program. Knowledge of HTML, CSS, JavaScript. Familiarity with React is a plus.',
            'location' => 'Remote',
            'type' => 'internship',
            'salary_min' => 20,
            'salary_max' => 25,
            'experience_level' => 'Internship',
            'benefits' => 'Mentorship, learning opportunities',
            'is_active' => true,
            'deadline' => now()->addMonth(),
        ]);

        $job3 = Job::create([
            'employer_id' => $employerProfile2->id,
            'title' => 'Full Stack Developer',
            'description' => 'We need a versatile full stack developer to help build our core product. You will have significant impact on product direction.',
            'requirements' => 'Experience with both frontend and backend development. Proficiency in JavaScript, Node.js, and modern frameworks. Database experience required.',
            'location' => 'New York, NY',
            'type' => 'full-time',
            'salary_min' => 80000,
            'salary_max' => 120000,
            'experience_level' => 'Mid Level',
            'benefits' => 'Equity, health insurance, unlimited PTO',
            'is_active' => true,
            'deadline' => now()->addMonths(3),
        ]);

        $job4 = Job::create([
            'employer_id' => $employerProfile2->id,
            'title' => 'Data Analyst',
            'description' => 'Analyze user data and provide insights to drive product decisions. Work closely with product and engineering teams.',
            'requirements' => 'Strong analytical skills. Experience with SQL and data visualization tools. Python or R knowledge preferred.',
            'location' => 'Austin, TX',
            'type' => 'contract',
            'salary_min' => 50,
            'salary_max' => 70,
            'experience_level' => 'Entry Level',
            'benefits' => 'Flexible schedule',
            'is_active' => true,
            'deadline' => now()->addMonths(1),
        ]);

        // Create applications
        Application::create([
            'job_id' => $job1->id,
            'student_id' => $student1->student->id,
            'cover_letter' => 'I am very interested in this position. My skills in Laravel and PHP make me a great fit for your team.',
            'status' => 'pending',
        ]);

        Application::create([
            'job_id' => $job2->id,
            'student_id' => $student1->student->id,
            'cover_letter' => 'I would love to intern at your company and learn from your experienced team.',
            'status' => 'reviewed',
            'reviewed_at' => now(),
        ]);

        Application::create([
            'job_id' => $job4->id,
            'student_id' => $student2->student->id,
            'cover_letter' => 'My data analysis skills and Python experience make me an ideal candidate for this role.',
            'status' => 'accepted',
            'employer_notes' => 'Great candidate, moving forward with interview.',
            'reviewed_at' => now(),
        ]);
    }
}
