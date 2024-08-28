<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PekerjaanSeeder extends Seeder
{
    /**
     * Seed the pekerjaan table with unique job titles.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_pekerjaan' => 'Software Developer'],
            ['nama_pekerjaan' => 'Data Analyst'],
            ['nama_pekerjaan' => 'Project Manager'],
            ['nama_pekerjaan' => 'Graphic Designer'],
            ['nama_pekerjaan' => 'Web Developer'],
            ['nama_pekerjaan' => 'Product Manager'],
            ['nama_pekerjaan' => 'Business Analyst'],
            ['nama_pekerjaan' => 'System Administrator'],
            ['nama_pekerjaan' => 'Database Administrator'],
            ['nama_pekerjaan' => 'UX/UI Designer'],
            ['nama_pekerjaan' => 'Network Engineer'],
            ['nama_pekerjaan' => 'Quality Assurance Engineer'],
            ['nama_pekerjaan' => 'DevOps Engineer'],
            ['nama_pekerjaan' => 'Content Writer'],
            ['nama_pekerjaan' => 'Digital Marketing Specialist'],
            ['nama_pekerjaan' => 'Sales Manager'],
            ['nama_pekerjaan' => 'Human Resources Manager'],
            ['nama_pekerjaan' => 'Financial Analyst'],
            ['nama_pekerjaan' => 'Operations Manager'],
            ['nama_pekerjaan' => 'Customer Support Specialist'],
            ['nama_pekerjaan' => 'Marketing Manager'],
            ['nama_pekerjaan' => 'Administrative Assistant'],
            ['nama_pekerjaan' => 'IT Support Specialist'],
            ['nama_pekerjaan' => 'Legal Advisor'],
            ['nama_pekerjaan' => 'Healthcare Professional'],
            ['nama_pekerjaan' => 'Education Coordinator'],
            ['nama_pekerjaan' => 'Engineering Manager'],
            ['nama_pekerjaan' => 'Research Scientist'],
            ['nama_pekerjaan' => 'Supply Chain Manager'],
            ['nama_pekerjaan' => 'Logistics Coordinator'],
            ['nama_pekerjaan' => 'Retail Manager'],
            ['nama_pekerjaan' => 'Construction Manager'],
            ['nama_pekerjaan' => 'Civil Engineer'],
            ['nama_pekerjaan' => 'Architect'],
            ['nama_pekerjaan' => 'Social Media Manager'],
            ['nama_pekerjaan' => 'Event Planner'],
            ['nama_pekerjaan' => 'Public Relations Specialist'],
            ['nama_pekerjaan' => 'Product Designer'],
            ['nama_pekerjaan' => 'Business Development Manager'],
            ['nama_pekerjaan' => 'Research Analyst'],
            ['nama_pekerjaan' => 'Accountant'],
            ['nama_pekerjaan' => 'Investment Banker'],
            ['nama_pekerjaan' => 'Consultant'],
            ['nama_pekerjaan' => 'Executive Assistant'],
        ];

        DB::table('pekerjaan')->truncate();
        DB::table('pekerjaan')->insert($data);
    }
}
